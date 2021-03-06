<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

//use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // create the user
        $attributes = request()->validate([
            'name'=>['required','max:255'],
            'username'=>['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
 //         'username'=>'required|min:3|max:255|unique:users,username',  //another format option (old school)
            'email'=>['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password'=>'required|min:7|max:255'  //another format option (old school)
        ]);

//        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);


     //   session()->flash('success', 'Your account has been created.');

        return redirect('/')->with('success', 'Your account has been created.');
    }
}

