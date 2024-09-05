<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\User\Http\Requests\StoreUserRequest;
use Modules\User\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'users' => User::all()->except('1')
        ];

        return view('user::users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $request->validated();

        try {
            DB::transaction(function () use ($request) {
                User::create([
                    'name' => $request->input('name'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                ]);
            });
            toast(__('User added successfully.'), 'success');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            toast(__('Failed to add user. Please try again.'), 'warning');
            return back()->withInput();
        }
    }

    /**
     * Show the specified resource.
     */
    public function show(User $user)
    {
        return view('user::users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = [
            'user' => $user
        ];

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('user::users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $request->validated();

        try {
            DB::transaction(function () use ($request, $user) {
                $user->update([
                    'name' => $request->input('name'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password') ?? $user->password,
                ]);
            });
            toast(__('User updated successfully.'), 'success');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            toast(__('Failed to update user. Please try again.'), 'warning');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            DB::transaction(function () use ($user) {
                $user->delete();
            });
            toast(__('User deleted successfully.'), 'success');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Log::error('User delete failed: ' . $e->getMessage());
            toast(__('Failed to delete User. Please try again.'), 'warning');
            return back()->withInput();
        }
    }
}
