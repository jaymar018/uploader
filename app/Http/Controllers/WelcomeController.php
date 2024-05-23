<?php

namespace App\Http\Controllers;


use CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    
    public function showWelcome(Request $request, $userId)
    {
        return view('welcome-message', ['userId' => $userId]);
    }

    // public function acknowledgeWelcome(Request $request)
    // {
    //     $user = Auth::user();
    //     $user->has_seen_welcome_message = true;
    //     $user->save();

    //     return redirect('/home');
    // }    

    public function acknowledgeWelcome(Request $request, $userId)
    {
        
        $request->session()->forget('seen_welcome_page');
        DB::table('cms_users')->where('id', $userId)->update(['has_seen_welcome_message' => true]);

        return redirect(CRUDbooster::adminPath());
    }

    public function cancelWelcome(Request $request)
    {
        $request->session()->forget('seen_welcome_page');
        return redirect('/admin/login');
    }
}
