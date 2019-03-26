<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   public function login(Request $request) {
        $input = $request->all();
        $user = User::firstOrCreate($input);
        return response()->json($user, 200);
   }

   public function getUser(Request $request, $id) {
      return response()->json(User::findOrFail($id), 200);
   }

   public function getUsers(Request $request) {
      return response()->json(User::all(), 200);
   }

   public function editUser(Request $request,$id) {
      $user = User::find($id);
      $input = $request->all();
      $user->name = $input['name'];
      $user->phone = $input['phone'];
      $user->address = $input['address'];
      if ($request->hasFile('image')) {
         $user->image = $request->image->storeAs('UserImages',$user->id + '_profile_picture.jpg');
     }
     $user->save();
     return response()->json($user, 200);
   }
}
