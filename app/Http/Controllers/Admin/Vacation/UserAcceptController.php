<?php

namespace App\Http\Controllers\Admin\Vacation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAcceptController extends Controller
{
    public function index()
    {
        return view('admin.vacation.index');
    }
}
