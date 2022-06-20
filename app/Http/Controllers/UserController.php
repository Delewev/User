<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = new User;
        $user->login = $request->login;
        $user->save();
        return new UserResource($user);
        return response()->json($user);
    }
    public function put(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['error' => true, 'massage' => 'No found']);
        }
        $user->update($request->all());
        return response()->json($user);

    }
    public function all()
    {
        $user = User::all();
        return UserResource::collection(User::all());
        return response()->json($user);
    }
    public function show($id){
        return new UserResource(User::with('post')->findOrFail($id));
    }

    public function reture($id)
    {
        $user = User::find($id,);
        if (is_null($user)) {
            return response()->json(['error' => true, 'massage' => 'No found']);
        }
        return response()->json($user);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json(['error' => true, 'massage' => 'No found']);
        }
        $user->delete();
        return response()->json();
    }

}
