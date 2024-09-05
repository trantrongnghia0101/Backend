<?php

namespace App\Http\Controllers;

use App\Models\Role; // Thêm import Role model
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private Builder $model;

    public function __construct()
    {
        $this->model = (new User())->query();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);
        View::share('title', $title);
    }

    public function index(Request $request)
    {
        $users = User::all();
        $user = Auth::user();
        $roles = RoleUser::where('user_id', $user->id)->get();
        // $roles = $user ? $user->roles()->pluck('role') : [];
        return view('users.index', [
            'users' => User::with('roles.role_users'),
            'roles' => $roles,
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        $roles = Role::all(); // Lấy tất cả các vai trò
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $user->roles()->sync($request->input('roles', [])); // Gán vai trò cho người dùng

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function edit(User $user)
    {
        $roles = Role::all(); // Lấy tất cả các vai trò
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        $user->roles()->sync($request->input('roles', [])); // Cập nhật vai trò cho người dùng

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    //login
    public function indexlogin(Request $request){
       
        return view("login");
    }

    public function login(LoginRequest $request){
        $credentials = [
            "email"=> $request->email,
            "password"=> $request->password,
        ];
        if (Auth::attempt($credentials)){
            return redirect()->route('users.index')->with('success', 'Đăng nhập thành công.');
        }

        return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không đúng.');
    }
    // public function logout(Request $request){
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect()->route('admin');

    // }
}
