    @extends('layouts.app')

    @section('content')
    <form action="{{url('baseshift/store')}}" method="post" class="form-group">
        @csrf
        <div>
            <label>user_id</label><br>
            <input type="text" name="user_id" id="" value="{{Auth::id()}}">
        </div>
        <div>
            <label>name</label><br>
            <input type="text" name="name" id="" value="{{ Auth::user()->name }}">
        </div>
        <div>
            <label>email</label><br>
            <input type="text" name="email" id="" value="{{ Auth::user()->email }}">
        </div>
        <div class="form-group">
            <label>月曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="1_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="1_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="1_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="1_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="1_5" >
        </div>
        <div class="form-group">
            <label>火曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="2_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="2_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="2_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="2_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="2_5" >
        </div>
        <div class="form-group">
            <label>水曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="3_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="3_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="3_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="3_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="3_5" >
        </div>
        <div class="form-group">
            <label>木曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="4_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="4_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="4_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="4_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="4_5" >
        </div>
        <div class="form-group">
            <label>金曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="5_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="5_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="5_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="5_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="5_5" >
        </div>
        <div class="form-group">
            <label>土曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="6_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="6_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="6_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="6_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="6_5" >
        </div>
        <div class="form-group">
            <label>日曜</label><br>
            <label >5:00~9:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="7_1" >
            <label >9:00~13:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="7_2" >
            <label >12:00~17:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="7_3" >
            <label >17:00~22:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="7_4" >
            <label >22:00~5:00</label>
            <input type="checkbox" class="form-control" name="shift[]" value="7_5" >
        </div>
        <div class="form-grup">
            <input type="submit" value="送信" />
        </div>
    </form>
    @php
        var_dump($data);
    @endphp

    @endsection
