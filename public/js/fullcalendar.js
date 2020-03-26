document.addEventListener('DOMContentLoaded', function () {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');
    var checkbox = document.getElementById('drop-remove');


    var calendar = new FullCalendar.Calendar(calendarEl, {

        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        locale: 'ja',
        //プラグイン読み込み
        header: {
            left: 'today month,basicWeek',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        defaultView: 'timeGridWeek',
        //カレンダーを月ごとに表示
        editable: true,
        //イベント編集
        firstDay: 1,
        //秋の始まりを設定。1→月曜日。defaultは0(日曜日)
        eventDurationEditable: false,
        //イベントの期間変更
        selectLongPressDelay: 0,
        // スマホでタップしたとき即反応
        //events: [
        //    {
        //        title: 'イベント',
        //        start: '2019-01-01'
        //    }
        //],
        //一旦イベントのサンプルを表示。動作確認用。
        events: "shift/setEvents",

        eventDrop: function (info) {
            //eventをドラッグしたときの処理
            editEventDate(info);
            //あとで使う関数
        },

        dateClick: function (info) {
            //日付をクリックしたときの処理
            addEvent(calendar, info);
            //あとで使う関数
        },
    });
    calendar.render();
});
