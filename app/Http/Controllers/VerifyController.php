<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function virefyAccount($id)
    {
        $user = User::find($id);
        if ($user->email_verified_at == null) {
            $user->email_verified_at = Carbon::now();
            $user->save();
            return redirect('/login')->with('success', 'Your account has been verified');
        } else {
            return redirect('/login')->with('success', 'Your account has already been verified');
        }
    }
}
