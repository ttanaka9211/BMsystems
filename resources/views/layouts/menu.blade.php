<div class="col-md-2">
    <div class="card">
        <div class="card-header">メニュー</div>
        <div class="card-body">
            <div class="panel panel-default">
                {{-- <ul class="nav nav-pills nav-stacked" style="display:block;"> --}}
                    <ul class="navbar-nav mr-auto">
                        @can('system-only') {{-- システム管理者権限のみに表示される --}}
                            <li><a href="">機能１</a></li>
                        @elsecan('admin-higher')　{{-- 管理者権限以上に表示される --}}
                            <li><a href="">機能２</a></li>
                            <li><a href="">機能３</a></li>
                            <li><a href="">機能４</a></li>
                            <li><a href="">機能5</a></li>
                        @elsecan('user-higher') {{-- 一般権限以上に表示される --}}
                            <li><a href="">機能４</a></li>
                            <li><a href="">機能５</a></li>
                        @endcan
                    </ul>
            </div>
        </div>
    </div>
</div>
