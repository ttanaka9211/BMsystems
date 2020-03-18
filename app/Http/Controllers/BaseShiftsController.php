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
        return view('BaseShifts.index');
        //->with(['BaseShifts' => BaseShift::where('user_id', auth::id())->get()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'shift[]' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //チエックボックスをわける
        $shifts = $request->shift;
        dump($shifts);

        $data = array();
        foreach ($shifts as $shift) {
            $s = explode('_', $shift);
            array_merge($data, ['user_id' => $user_id, 'name' => $name, 'email' => $email, 'week_id' => $s[0], 'timezone_id' => $s[1], 'created_at' => $now, 'updated_at' => $now]);
        }
        dump($data);
        //DB保存
        //BaseShift::insert($data);
        //$admin_email = 'admin@example.com';
        //Mail::to($admin_email)->send(new ShiftRequest($request->name));

        // return redirect('BaseShifts');
    }
}