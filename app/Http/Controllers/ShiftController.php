<?php

namespace App\Http\Controllers;

use App\Models\BaseShift;
use Illuminate\Http\Request;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection\orderBy;


class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //当月の日数
        $start = Carbon::now()->addWeeks()->startOfWeek()->toDateString();
        $end = Carbon::now()->addWeeks()->endOfWeek()->toDateString();
        echo $start;
        $dateArray = array();
        $cnt = 0;
        for ($i = $start; $i <= $end; $i = date(date('Y-m-d', strtotime($i . '+1 day')))) {
            array_push($dateArray, $i . ',' . ++$cnt);
        }
        dump($dateArray);

        $idArray = array();
        //$builder = BaseShift::select(['id', 'user_id', 'week_id', 'timezone_id'])->get();
        //dump($builder);
        $builder = BaseShift::get(['id', 'week_id', 'timezone_id', 'user_id']);
        $idArray = $builder->toArray();
        dump($idArray);
        $idArray = (object) $idArray;
        dump($idArray);
        $weeks = $idArray->id;
        damp($weeks);
        // foreach ($weeks as $week) {
        //     $user_id = $array->user_id;
        //     $week_id = $array->week_id;
        //     $timezone_id = $array->timezone_id;
        //     $data[$i] = ['user_id' => $user_id, 'week_id' => $week_id, 'timezone_id' => $timezone_id];
        //     ++$i;
        // }
        // dump($data);
        return view('shift.test');
        // return view('shift.test', compact($dateArray));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}