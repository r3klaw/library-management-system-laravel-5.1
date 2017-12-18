<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->users->all();

        return view('users.index', [ 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'age' => 'required|integer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            //set password to secret for now (password should be system generated and email to member)
            'password' => bcrypt('secret'),
            'age' => $request->age,
            'is_admin' => false,
        ]);

        return redirect('/admin/members');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
        ]);

        return redirect('/admin/members');
    }

    /**
     * Destroy the given user.
     *
     * @param  Request  $request
     * @param  User  $user
     * @return Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect('/admin/members');
    }
}
