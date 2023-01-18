<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->user->name = $request->input('name');
        $this->user->password = Hash::make($request->input('password'));
        $this->user->email = $request->input('email');
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
                $fileName = uniqid().'.'.$image->getClientOriginalExtension();
                Storage::putFileAs('/public/images/avatars', $image, $fileName);
            $this->user->avatar = $fileName;
        }
        $this->user->save();
        $this->user->roles()->sync($request->input('roles'));
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = $user->withoutRelations('roles');
        return view('admin.users.edit', ['user' => $user, 'roles' => Role::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->email = $request->input('email');
        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $fileName = uniqid().'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('/public/images/avatars', $image, $fileName);
            $user->avatar = $fileName;
        }
        $user->save();
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
