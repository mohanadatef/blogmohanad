<?php

namespace App\Http\Controllers;

use app\Http\Requests\User\UserEditRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit',compact('data'));
    }

    public function update(UserEditRequest $request,$id)
    {
        $datas = User::find($id);
        $datas->name = $request->name;
        $datas->email = $request->email;
        $datas->password = Hash::make($request->password);
        $datas->update();
        return redirect('');
    }
}
