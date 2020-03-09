<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Vacation;
use App\User;

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
        return redirect('vacations');
    }
    protected function registered(Request $request, $user)
    {
    }
}
