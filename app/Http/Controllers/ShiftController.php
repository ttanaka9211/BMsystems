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
        return view('shift.calendar');
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

        return view('shift.calendar');
        // return view('shift.test', compact($dateArray));
    }

    public function setShifts(Request $request)
    {
        $start = $this->formatDate($request->all()['start']);
        $end = $this->formatDate($request->all()['end']);

        $events = Shift::select('id', 'user_id', 'start_time', 'ending_time')->whereBetween('start_time', [$start, $end])->get();
        $newArr = [];
        foreach ($events as $item) {
            $newItem['id'] = $item['id'];
            $newItem['user_id'] = $item['user_id'];
            $newItem['start_time'] = $item['start_time'];
            $newItem['ending_time'] = $item['ending_time'];
            $newArr[] = $newItem;
        }
        echo json_encode($newArr);
    }

    public function formatDate($date)
    {
        return str_replace('T00:00:00+09:00', '', $date);
    }

    public function addEvent(Request $request)
    {
        $data = $request->all();
        $event = new Shift();
        $event->id = $this->generateId();
        $event->date = $data['date'];
        $event->start_time = $data['start_time'];
        $event->ending_time = $data['ending_time'];
        $event->user_id = $data['user_id'];
        $event->save();

        return response()->json(['id' => $event->id]);
    }

    // ajaxで受け取ったデータをデータベースに追加し、今度はidを返す。

    public function editEventDate(Request $request)
    {
        $data = $request->all();
        $event = Shift::find($data['id']);
        $event->date = $data['newDate'];
        $event->start_time = $data['start_time'];
        $event->ending_time = $data['ending_time'];
        $event->user_id = $data['user_id'];
        $event->save();

        return null;
    }

    // ajaxで受け取ったデータからデータベースの日付データを変更。

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