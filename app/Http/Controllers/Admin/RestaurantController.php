<?php

namespace App\Http\Controllers\Admin;
use App\Dish;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{

    private $validations = [
        'slug'      => [
            'required',
            'string',
            'max:100',
        ],
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
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->image = $data['image'];
        $dish->description = $data['description'];
        $dish->visibility = $data['visibility'];
        $dish->slug = $data['slug'];
        $dish->user_id = $user->id ;
        $dish->save();

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
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

        return view('admin.dishes.edit', compact('dish'));
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
        $data = $request->all();
        $single_dish = Dish::findOrFail($id);
        $single_dish->update($data);

        return redirect()->route('admin.dishes.index', $single_dish->id);
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