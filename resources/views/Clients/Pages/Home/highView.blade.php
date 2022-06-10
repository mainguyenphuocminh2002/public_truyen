@php
use App\Helper\Common;
@endphp
<div style="padding-left: 4%" class="py-5">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ranking py-3 px-4">
                    <div class="d-flex justify-content-between">
                        <h5 style="font-weight: bold;" >Đọc Nhiều Tuần</h5>
                        <a class="ranking-watchmore" href="{{route('Clients.categorys.highView')}}">Xem tất cả</a>
                    </div>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($highviewProducts as $val )
                    @php
                        ++$i;
                    @endphp
                    <div class="d-flex my-2">
                        <a class="ranking-content" style="flex: 1" href="#"
                        ><b>{{$i . '. ' }}</b>{{$val->name}}</a
                        >
                        <p class="m-0 ml-2">{{Common::makeView($val->views,false)}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ranking py-3 px-4">
                    <div class="d-flex justify-content-between">
                        <h5 style="font-weight: bold;" >Cất Giữ Tuần</h5>
                        <a class="ranking-watchmore" href="{{route('Clients.categorys.favorites')}}">Xem tất cả</a>
                    </div>
                    @php
                    $i = 0;
                @endphp
                @foreach ($favoritesProducts as $val )
                @php
                    ++$i;
                @endphp
                <div class="d-flex my-2">
                    <a class="ranking-content" style="flex: 1" href="#"
                    ><b>{{$i . '. ' }}</b>{{$val->name}}</a
                    >
                    <p class="m-0 ml-2">{{Common::makeView($val->favorites,false)}}</p>
                </div>
                @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ranking py-3 px-4 ">
                    <div class="d-flex justify-content-between">
                        <h5 style="font-weight: bold;" >Thịnh Hành Tuần</h5>
                        <a class="ranking-watchmore" href="{{route('Clients.categorys.comments')}}">Xem tất cả</a>
                    </div>
                    @php
                    $i = 0;
                @endphp
                @foreach ($commentProducts as $val )
                @php
                    ++$i;
                @endphp
                <div class="d-flex my-2">
                    <a class="ranking-content" style="flex: 1" href="#"
                    ><b>{{$i . '. ' }}</b>{{$val->name}}</a
                    >
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
