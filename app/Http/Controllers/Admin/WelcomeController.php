<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;

// class WelcomeController extends Controller
// {
//     public function index()
//     {
//         $user = Auth::user();


//         if (array_key_exists('image', $user)) {
//             $image = Storage::put('restaurant_covers', $user['image']);
//             $data['image'] = $image;
//         }

//         return view('admin.restaurant.index', compact('user'));
//     }
// }



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [];

        if ($user->image && is_file($user->image)) {
            $imageContent = file_get_contents($user->image);
            $image = Storage::put('restaurant_covers', $imageContent);
            $data['image'] = $image;
        }

        return view('admin.restaurant.index', compact('user', 'data'));
    }
}
