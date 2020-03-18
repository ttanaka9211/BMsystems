<?php

namespace App\Http\Controllers\Admin\BaseShift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAcceptController extends Controller
{
    public function index()
    {
        return view('admin.baseshift.index');
    }
}
