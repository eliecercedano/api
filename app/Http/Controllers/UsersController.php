<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;


class UsersController extends Controller
{
    private $paginate = 10;
    
    public function index()
    {
        return new UserCollection(User::paginate($this->paginate));
    }

    public function getAll()
    {
        return new UserCollection(User::get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        
        $user->save();

        return new UserResource($user);
    }
   
    public function show(User $user)
    {
        return  new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'email', 'password']));

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return response()->json([
            'message' => 'user deleted!'
        ], 204);
    }

}
