<?php

namespace App\Http\Controllers;

use App\Models\Dream;

class DashboardController extends Controller
{
    // A normal user sees their own dreams, an admin sees all dreams 
    public function index()
    {
        $user = auth()->user();

        //Claude:: an admin can switch between the two lists with ?view=mine / ?view=all.
        //A normal user always gets their own dreams, whatever the address says.
        $viewingAll = $user->is_admin && request('view', 'all') !== 'mine';

        if ($viewingAll) {
            $dreams = Dream::with(['patterns', 'user'])->latest('dreamt_at')->get(); //bscly all dreams
        } else {
            $dreams = $user->dreams()->with('patterns')->latest('dreamt_at')->get(); //fetching the users own dreams
        }

        return view('userzone.dashboard', [
            'dreams' => $dreams,
            'viewingAll' => $viewingAll,
        ]);
    }
}
