<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Type;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/admin/restaurantwelcome";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'address' => ['required', 'string', 'max:100'],
                'PIVA' => ['required', 'integer', 'unique:users'],
                'image_logo' => ['required'],
                'types' => ['required']
            ],
            [
                'name' => 'Il campo nome ristorante non può essere vuoto.',
                'email.required' => 'Il campo email non può essere vuoto.',
                'email.email' => 'Formato email non valido.',
                'email.unique' => 'Email già registrata.',
                'password.required' => 'Il campo password non può essere vuoto.',
                'password.min' => 'La password deve essere minimo 8 caratteri.',
                'password.confirmed' => 'La password di conferma non coincide.',
                'address.required' => 'Il campo indirizzo non può essere vuoto.',
                'PIVA.required' => 'Il campo P.IVA non può essere vuoto.',
                'PIVA.digits' => 'Il campo P.IVA deve avere 11 cifre.',
                'PIVA.numeric' => 'Formato P.IVA non valido.',
                // 'image_logo.required' => 'Carica un immagine del ristorante.',
                // 'image_logo.mimes' => 'Formato immagine non valida.',
                // 'image_logo.max' => 'Dimensione massima consentita 2048kb.',
                'types.required' => 'Almeno una tipologia deve essere selezionata.',
                'types.exists' => 'La tipologia selezionata non esiste.'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $image = Storage::put('restaurant_covers', $data['image_logo']);


        $newUser = User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'PIVA' => $data['PIVA'],
            'image_logo' => $image,

        ]);

        // dd($data);

        $newUser = User::orderBy('id', 'desc')->first();

        if (array_key_exists('types', $data)) {

            $newUser->types()->sync($data['types']);
        };




        return $newUser;
    }
    public function showRegistrationForm()
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }
}
