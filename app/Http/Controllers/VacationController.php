<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Vacation;
use App\User;
use App\Mail\VacationRequest;

class VacationController extends Controller
{
    public function index()
    {
        return view('vacations.index')->with(['vacations' => Vacation::all()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'date' => 'required | after:tomorrow+13day',
            'reason' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Vacation::create($request->all());
        $admin_email = 'admin@example.com';
        Mail::to($admin_email)->send(new VacationRequest($request->name));
        return redirect('vacations');
    }
    // protected function registered(Request $request, $user)
    // {
    //     $admin_email = 'admin@example.com';
    //     Mail::to($admin_email)->send(new VacationRequest($user));

    //     return '申請が完了しました。承認されるまでしばらくお待ちください';
    // }
}
