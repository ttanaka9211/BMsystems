<?php

namespace App\Http\Controllers;

use App\Models\BaseShift;
use Illuminate\Http\Request;
use App\Models\Shift;
use Carbon\Carbon;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //require __DIR__.'/../vender/autoload.php';
        //当月の日数
        $start = Carbon::now()->addWeeks()->startOfWeek(); //->toDateString();
        $end = Carbon::now()->addWeeks()->endOfWeek(); //->toDateString();
        // $dateArray = array();
        // $cnt = 0;
        // for ($i = $start; $i <= $end; $i = date(date('Y-m-d', strtotime($i.'+1 day')))) {
        //     array_push($dateArray, $i.','.++$cnt);
        // }
        $start_date = 0;
        $i = 0;
        $a = 0;
        $weeks = BaseShift::get(['user_id', 'week_id', 'timezone_id']);

        //$date = $start->toDateString();
        $result = 0;
        $a = 0;
        $b = 0;
        //$a = $start->dayOfWeekIso;
        //echo $a;
        foreach ($weeks as $week) {
            $user_id = $week->user_id;
            $week_id = $week->week_id;
            $timezone_id = $week->timezone_id;
            //日付計算
            while ($start->dayOfWeekIso == $week_id) {
                $result = $start;
                $start = $start->addDays();
            }

            //開始時間
            $start_time = config('const.timezone_start')[$timezone_id];
            $year = $result->year;
            $month = $result->month;
            $day = $result->day;
            $hour = $start_time;
            $minute = 0;
            $second = 0;
            $start_date = Carbon::create(
                $year,
                $month,
                $day,
                $hour,
                $minute,
                $second
            );
            dump($start_date);

            //終了時間
            $end_time = config('const.timezone_end')[$timezone_id];
            $year = $result->year;
            $month = $result->month;
            $day = $result->day;
            $hour = $end_time;
            $minute = 0;
            $second = 0;
            $end_date = Carbon::create(
                $year,
                $month,
                $day,
                $hour,
                $minute,
                $second
            );
            //echo $start_date.'<br>';
            //echo $timezone_id.'<br>';

            //db登録用配列
            $data[$i] = [
                'user_id' => $user_id,
                'week_id' => $week_id,
                'timezone_id' => $timezone_id,
                'start_time' => $start_date,
                'ending_time' => $end_date,
                'date' => $result->toDateString(),
            ];
            ++$i;
        }
        //DB保存
        Shift::insert($data);

        return view('shift.test');
        // return view('shift.test', compact($dateArray));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}