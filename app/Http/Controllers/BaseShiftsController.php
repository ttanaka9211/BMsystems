<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\BaseShift;
use App\Mail\ShiftRequest;

class BaseShiftsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('BaseShifts.index')->with(['BaseShifts' => BaseShift::where('user_id', auth::id())->get()]);
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

        BaseShift::create($request->all());
        $admin_email = 'admin@example.com';
        Mail::to($admin_email)->send(new ShiftRequest($request->name));
        return redirect('BaseShifts');
    }
}
