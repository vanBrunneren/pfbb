<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {

    	$users = User::get()->where('entry_status', 'public');
        $roles = Role::get()->where('entry_status', 'public');
    	return view('admin.user.index', compact('users', 'roles'));

    }

    public function create(Request $request)
    {
        $roles = Role::get()->where('entry_status', 'public');
        $user = new User;

        if($request->isMethod('post')) {

            $user->prename = $request->input('prename');
            $user->name = $request->input('name');
            $user->street_name = $request->input('street_name');
            $user->street_number = $request->input('street_number');
            $user->plz = $request->input('plz');
            $user->city = $request->input('city');
            $user->mobile = $request->input('mobile');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->entry_status = 'public';

            if(
                $user->prename &&
                $user->name &&
                $user->street_name &&
                $user->plz &&
                $user->city &&
                $user->mobile &&
                $user->email &&
                $user->password
            ) {

                $user->save();

                $user->roles()->detach();
                foreach($request->input('roles') as $role) {
                    $user->roles()->attach($role);
                }

                return redirect(route('admin_user'));

            }
        }

        return view('admin.user.create', compact('roles', 'user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::get()->where('id', $id)->first();
        $roles = Role::get()->where('entry_status', 'public');

        if($request->isMethod('post')) {
            $user->prename = $request->input('prename');
            $user->name = $request->input('name');
            $user->street_name = $request->input('street_name');
            $user->street_number = $request->input('street_number');
            $user->plz = $request->input('plz');
            $user->city = $request->input('city');
            $user->mobile = $request->input('mobile');
            $user->email = $request->input('email');
            $user->entry_status = 'public';
            if($request->input('password')) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();

            $user->roles()->detach();
            foreach($request->input('roles') as $role) {
                $user->roles()->attach($role);
            }

        }

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function delete(Request $request, $id)
    {
        $user = User::get()->where('id', $id)->first();
        $user->entry_status = 'deleted';
        $user->save();

        return back();
    }

    public function postAssignRoles(Request $request)
    {

    	$user = User::where('id', $request['userId'])->first();
    	$role = Role::where('name', $request['roleName'])->first();
        if($user->hasRole($role->name)) {
        	$user->roles()->detach($role->id);
        } else {
            $user->roles()->attach($role->id);
        }

    }

    public function showChangePasswordForm()
    {
        return view('admin.user.changepassword');
    }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Dein aktuelles Passwort entspricht nicht der Eingabe. Bitte versuche es noch einmal.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Dein neues Passwort kann nicht gleich sein wie dein altes Passwort. Bitte verwende ein anderes Passwort.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Dein Passwort wurde erfolgreich geändert!");

    }

}
