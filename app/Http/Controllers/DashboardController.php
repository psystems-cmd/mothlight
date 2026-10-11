<?php

namespace App\Http\Controllers;

use App\Models\Dream;

class DashboardController extends Controller
{
    // A normal user sees their own dreams, an admin sees all dreams 
    public function index()
    {
        $user = auth()->user();

        if ($user->is_admin) {
            $dreams = Dream::latest('dreamt_at')->get(); //bscly all dreams
        } else {
            $dreams = $user->dreams()->latest('dreamt_at')->get(); //fetching the users own dreams
        }

        return view('userzone.dashboard', [
            'dreams' => $dreams,
        ]);
    }
}