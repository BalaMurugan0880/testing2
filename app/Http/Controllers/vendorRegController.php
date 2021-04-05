<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;

	

class vendorRegController extends Controller
{
     public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|string',
            'email'=>'required|unique:users|email|string',
            'password' => 'required|confirmed',
        ]);
        
         $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'role' => request('role'),
            ]);

          $role = Role::where('name', 'vendor')->first();
        
          $user->roles()->attach($role->id);

          return redirect('/login');
    }

}
