<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() { return view('auth.login', ['roles' => config('bumdes.roles')]); }

    public function store(Request $r)
    {
        $data = $r->validate([
            'role'     => ['required', 'in:' . implode(',', array_keys(config('bumdes.roles')))],
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Lolos hanya jika akun benar-benar punya role yang dipilih
        $ok = Auth::attempt(
            ['username' => $data['username'], 'password' => $data['password'], 'role' => $data['role']],
            $r->boolean('remember')
        );
        if (! $ok) {
            return back()->withErrors(['username' => 'NIK/akun, kata sandi, atau wewenang tidak cocok.'])->onlyInput('username', 'role');
        }
        $r->session()->regenerate();
        return redirect()->route(config("bumdes.roles.{$data['role']}.home"));
    }

    public function destroy(Request $r)
    {
        Auth::logout(); $r->session()->invalidate(); $r->session()->regenerateToken();
        return redirect()->route('login');
    }
}
