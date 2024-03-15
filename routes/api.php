<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\SeriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);

});

Route::delete('/excluir/{id}', [SeriesController::class, 'delete']);
Route::post('/editar/{id}', [SeriesController::class, 'edit']);
Route::post('/login', function(Request $request){
  $credenciais = $request->only(['email', 'password']);

//   $user = User::whereEmail($credenciais['email'])->first();

//   if($user === null || !Hash::check($credenciais['password'], $user->password)){
//       return response()->json('Unauthorized', 401);
//   }

  if(!Auth::attempt($credenciais)){
    return response()->json('Unauthorized', 401);

  }

  $user = Auth::user();

  $token = $user->createToken('token');

  return response()->json($token->plainTextToken);
});


Route::post('/create', [UsersController::class, 'store']);
