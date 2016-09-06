<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\UserRequest;

use Waran\Traits\Admin\MultiDeleteTrait;

class UserController extends Controller
{
    use MultiDeleteTrait;

    protected $primaryModel = User::class;

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function view(User $user)
    {
        return view('admin.user.view', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
      $user = new User;
      $user->fill($request->only('name', 'email', 'intro'));
      $user->fill(['password' => bcrypt($request->password)]);
      $user->save();

      \Toastr::success('User created.', 'Success');
      return redirect()->route('admin::user.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UserRequest $request)
    {
        $user->fill($request->only('name', 'email', 'intro'));
        if(isset($request->password) || !empty($request->password)) $user->password = bcrypt($request->password);
        $user->save();

        \Toastr::success('User updated.', 'Success');
        return redirect()->route('admin::user.index');
    }
}
