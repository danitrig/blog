<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);

        $user->name = $request->name;
        $user->subname = $request->subname;
        $password = $request->password;

        if (empty($password)) {
        } else {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'images/users/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
            $user->image = $destinationPath . $filename;
        }

        $user->save();

        return redirect()->back();
    }

    public function delete(Request $request, $userId)
    {
        $user = User::find($userId);

        $user->delete();

        return redirect()->back();
    }
}
