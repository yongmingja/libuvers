<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\User\Http\Requests\UpdatePasswordProfileRequest;
use Modules\User\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        $data = [
            'user' => Auth::user()
        ];

        return view('user::profile.edit', $data);
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        try {
            DB::transaction(function () use ($request, $user) {
                $user->update([
                    "name" => $request->input('name'),
                    "username" => $request->input('username'),
                    "email" => $request->input('email'),
                ]);
            });
            toast(__('User updateed successfully.'), 'success');
            return redirect()->route('profile.edit');
        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            toast(__('Failed to update user. Please try again.'), 'warning');
            return back()->withInput();
        }
    }

    public function updatePassword(UpdatePasswordProfileRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        try {
            DB::transaction(function () use ($request, $user) {
                $user->update([
                    "password" => $request->input('password'),
                ]);
            });
            toast(__('User updateed successfully.'), 'success');
            return redirect()->route('profile.edit');
        } catch (\Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            toast(__('Failed to update user. Please try again.'), 'warning');
            return back()->withInput();
        }
    }
}
