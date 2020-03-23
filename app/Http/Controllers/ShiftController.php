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
        // dump($dateArray);
        //dump($start->addDay());
        $i = 0;
        $a = 0;
        $weeks = BaseShift::get(['user_id', 'week_id', 'timezone_id']);

        $date = $start->toDateString();
        $date4 = $end->toDateString();
        $date2 = $start->dayOfWeekIso;
        $date3 = $end->dayOfWeekIso;
        $result = 0;
        $a = 0;
        $b = 0;
        //dump($date);
        //dump($date2);
        //dump($date3);
        //dump($date4);
        //dump($start->addDay());
        //
        foreach ($weeks as $week) {
            $user_id = $week->user_id;
            $week_id = $week->week_id;
            $timezone_id = $week->timezone_id;
            //dump($week_id);
            //dump(strtotime($date));
            //$start->addDays();
            //echo $start;

            while ($start <= $end) {
                //

                echo $start . "<br>";
                $a = $start->dayOfWeekIso;
                var_dump($a) . "<br>";
                var_dump($week_id) . "<br>";
                if ($a === $week_id) {
                    //echo $start . "<br>";
                    $result = $start;
                }

                $start = $start->addDays();

                echo $result . "(result)<br>";
            }
            //dump($result);
            $data[$i] = [
                'user_id' => $user_id,
                'week_id' => $week_id,
                'timezone_id' => $timezone_id,
                'date' => $result->toDateString()
            ];
            ++$i;
        }
        //dump($result);

        //dump($date);
        dump($data);
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
        //
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