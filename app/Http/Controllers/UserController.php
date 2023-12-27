<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.user',compact('users'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
            User::create([
                'role' => $request->role,
                'fname'=> $request->fname,
                'mname'=> $request->mname,
                'lname'=> $request->lname,
                'dob'=> $request->dob,
                'address'=> $request->address,
                'contact'=> $request->contact,
                'email'=> $request->email,
                'password'=> Hash::make($request['password']),
            ]);

            Alert::success('User Created.');
            return redirect('/users');
            // return redirect()->back();

            } catch(\Exception $e){
            Alert::warning('Duplicate entry, please try again.');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);

        if (!$user) {
            Alert::warning('User not found.');
            return redirect()->back();
        }

        $duplicateCheck = User::where('id', '!=', $id)
            ->where('email', $request->input('email'))
            ->first();

        if (!$duplicateCheck) {
            $user->role = $request->input('role');
            $user->fname = $request->input('fname');
            $user->mname = $request->input('mname');
            $user->lname = $request->input('lname');
            $user->dob = $request->input('dob');
            $user->address = $request->input('address');
            $user->contact = $request->input('contact');
            $user->email = $request->input('email');
            // $user->password = Hash::make($request->input('password'));

            $user->save();

            Alert::success('User updated.');
            return redirect('/users');
        } else {
            Alert::warning('Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $userToDelete = User::find($id);
        if ($userToDelete && $userToDelete->id === Auth::id()) {
            Auth::logout();
        }
        $userToDelete->delete();
        Alert::success('User Deleted!');
        return redirect()->back();
    }

}
