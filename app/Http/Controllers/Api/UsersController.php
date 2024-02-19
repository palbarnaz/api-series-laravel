<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{


  public function store(Request $request){

   $data = $request->except(['_token']);
   $data['password'] = Hash::make($data['password']);

   $user = User::create($data);

  return response()->json('usuario cadastrado!', 201);



  }
}

