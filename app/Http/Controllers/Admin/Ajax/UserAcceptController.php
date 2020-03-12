<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\UserAccept;
use Illuminate\Support\Facades\Mail;

class UserAcceptController extends Controller
{
    public function index()
    {
        $query = \App\Models\Vacation::query();

        return $query->get();
    }

    public function accept(Request $request)
    {
        $user = \App\Models\Vacation::find($request->user_id);
        $user->accepted = $request->accept;
        $result = $user->save();
        $email = new UserAccept($user);
        Mail::to($user->email)->send($email);
        return ['result' => $result];
    }
}
