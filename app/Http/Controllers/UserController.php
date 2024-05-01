<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $roles = ['admin', 'super_admin'];

        whereIn()
        return User::latest()->get();
        return User::whereIn('role', $roles)->get();
        return User::whereIn('role', $roles)->count();

        whereNotIn()
        return User::whereNotIn('role', $roles)->get();
        return User::whereNotIn('role', $roles)->pluck('name');
        return User::whereNotIn('role', $roles)
            ->pluck('name', 'email', 'role')
            ->map(function ($email, $name) { // pluck just allow 2 param which are the key and value columns to retrieve
                return ['email' => $email, 'name' => $name];
            });

        return User::whereNotIn('role', $roles)
            ->get()
            // ->get(['name', 'email', 'role'])
            ->map(function ($user) {
                return [
                    'email' => $user->email,
                    'name' => $user->name,
                    'role' => $user->role,
                    'email_verified_at' => $user->email_verified_at,
                    'email_verified_date' => $user->email_verified_at ? Carbon::parse($user->email_verified_at)->format('Y-m-d') : null,
                    'email_verified_time' => $user->email_verified_at ? Carbon::parse($user->email_verified_at)->format('h:m:s') : null
                ];
            });

        $users = User::whereNotIn('role', $roles)->pluck('name', 'email')->map(function ($name, $email) {
            return ['name' => $name, 'email' => $email];
        });        

        $uniqueRoles = User::whereNotIn('role', $roles)->pluck('role')->unique();
        return User::whereNotIn('role', $roles)->get();
        return User::whereNotIn('role', $roles)->get(['name', 'email', 'role', 'email_verified_at']);
        return User::whereNotIn('role', $roles)->count();

        whereNull() and whereNotNull()
    }
}
