<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use App\Model\Role;
use App\Model\Photo;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if (trim($request->password) == '') {
            $userInput = $request->except('password');
        } else {
            $userInput = $request->all();
            $userInput['password'] = bcrypt($request->password);
        }

        if ($file = $request->photo) {
            $fileName = time().$file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo = Photo::create(['path'=>$fileName]);

            $userInput['photo_id'] = $photo->id;
        }

        User::create($userInput);

        // return $userInput;

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $userInput = $request->all();

        if ($file = $request->photo) {
            $fileName = time().$file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo = Photo::create(['path'=>$fileName]);

            $userInput['photo_id'] = $photo->id;
        }

        $user->update($userInput);

        // return $user;
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->path);

        $photo = Photo::where('id', $user->photo->id)->delete();

        $user->delete();

        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('/admin');
    }
}
