<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Rout;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('rout')->get();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $routs = Rout::get();
        return view('users.create',compact('routs'));
    }
    public function store(StoreUserRequest $request)
    {
        User::create(array_merge($request->all(),[
            'active' => $request->active ?? false,
            'password' => bcrypt($request->id_number),
        ]));
        toast("تم اضافة المندوب بنجاح",'success');
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        $routs = Rout::get();
        return view('users.edit', compact('user','routs'));
    }
    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->update($request->all());
        toast("تم تعديل المندوب بنجاح",'success');
        return redirect()->route('users.index');
    }

    public function activate(User $user)
    {
        $user->update([
            'active' => true,
        ]);
        toast("تم تنشيط المندوب بنجاح",'success');
        return redirect()->back();
    }
    public function deactivate(User $user)
    {
        $user->update([
            'active' => false,
        ]);
        toast("تم الغاء تنشيط المندوب بنجاح",'success');
        return redirect()->back();
    }
    public function delete(User $user)
    {
        $user->delete();
        toast("تم حذف المندوب بنجاح",'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new UsersExport(), 'users_'.now().'.xlsx');
    }
}
