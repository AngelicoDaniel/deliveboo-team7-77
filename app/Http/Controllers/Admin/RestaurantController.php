<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    private $validations = [
        'name'          => 'required|string|max:100',
        'price'         => 'required|integer',
        'image'         => 'url|max:200',
        'visibility'    => 'tinyinteger',
        'description'   => 'required|string',

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function index()
    {
        $user = Auth::user();
        $dishes = Dish::where('user_id', $user->id)->get();



        return view('admin.dishes.index', [
            'dishes' => $dishes,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $dish = new Dish;
        if (array_key_exists('image', $data)) {
            $image = Storage::put('dish_covers', $data['image']);
            $data['image'] = $image;
        }

        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->image = $data['image'];
        $dish->description = $data['description'];
        $dish->visibility = $data['visibility'];
        $dish->user_id = $user->id;
        $dish->save();

        $request->validate(
            [
                'name' => 'required',
                'price' => 'required|numeric|min:0.01',
                'image' => 'required',
                'description' => 'required',
                'visibility' => 'required'
            ],
            [
                'name.required' => 'Il campo nome è obbligatorio.',
                'price.required' => 'Il prezzo è obbligatorio.',
                'price.numeric' => 'Formato prezzo non valido.',
                'price.min' => 'Il prezzo deve essere uguale o maggiore a 0.01',
                'image.required' => 'Carica un immagine.',
                'image.mimes' => 'Formato immagine non valido.',
                'image.max' => 'Dimensioni massime consentite 4096kb.'
            ]
        );

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { {
            $single_dish = Dish::findOrFail($id);

            return view('admin.dishes.show', compact('single_dish'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);

        if ($dish->user_id != Auth::user()->id) {
            return abort(404);
        } else {
            return view('admin.dishes.edit', compact('dish'));
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0.1',
            'description' => 'required|min:10',
            'visibility' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // aggiunta della validazione dell'immagine
        ]);

        $dish->name = $validatedData['name'];
        $dish->price = $validatedData['price'];
        $dish->description = $validatedData['description'];
        $dish->visibility = $validatedData['visibility'];

        // Aggiornamento dell'immagine solo se l'utente ha selezionato una nuova immagine
        if ($request->hasFile('image')) {
            Storage::delete($dish->image);
            $dish->image = $request->file('image')->store('public/images');
        }

        $dish->save();

        return redirect()->route('admin.dishes.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $single_dish = Dish::findOrFail($id);

        // if ($single_dish->id) {
        //     Storage::delete($single_dish->id);
        // };

        $single_dish->orders()->sync([]);

        $single_dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}
