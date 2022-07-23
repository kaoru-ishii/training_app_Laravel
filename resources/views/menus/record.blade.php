<!DOCTYPE html>
<html lang="ja">
@extends('layouts.head')
<body>
    <header>
        <h1>
            <a href="{{ route('top') }} ">Training</a>
        </h1>
        <nav>
            <ul>
                <li><a href="{{ route('top') }}">Menu</a></li>
                {{-- <li><a href="{{ route('logout') }}" >ログアウト</a></li> --}}
                <li>
                    <a href={{ route('logout') }} onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="record">
        <img class="record-image" src="{{ asset('img/record.jpg') }}" alt="">
        <div class="record-Main">
            <h1 class="title">記録表</h1>
            <h2><?php echo date('m') ?>月</h2>
                <table>
                    <tr>
                        <th>  </th>
                        <th>腕立て</th>
                        <th>腹筋</th>
                        <th>スクワット</th>
                    </tr>

                    <!-- 直近の記録 -->
                        <tr>
                            <td class="event">直近の記録</td>
                            <td>
                                @if($pushupresults)
                                    <b>{{ $pushupresults->pushup_result }}</b> 回
                                    <div>
                                        <form action="{{ route('pushup.destroy', ['id'=>$pushupresults->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit">削除</button>  
                                        </form>
                                    </div>
                                @else
                                    <b>0 </b>回
                                @endif
                            </td>
                            <td>
                                @if($situpresults)
                                    <b>{{ $situpresults->situp_result }}</b> 回
                                    <div>
                                        @if($situpresults)
                                        <form action="{{ route('situp.destroy', ['id'=>$situpresults->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit">削除</button> 
                                        </form>
                                        @endif
                                    </div>
                                @else
                                    <b>0 </b>回
                                @endif
                            </td>          
                            <td>
                                @if($squatresults)
                                    <b>{{ $squatresults->squat_result }}</b> 回
                                    <div>
                                        @if($squatresults)
                                        <form action="{{ route('squat.destroy', ['id'=>$squatresults->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit">削除</button>  
                                        </form>
                                        @endif
                                    </div>
                                @else
                                    <b>0 </b>回
                                @endif
                            </td>
                        </tr>
                    
                    <!-- 本日の合計記録 -->
                        <tr>
                            <td class="event">
                            <?php 
                                $day = new DateTime();
                                echo $day->format('d'.'日');
                            ?>の合計記録</td>

                            <td>
                                @if($hasTodayPushup ?? 'pushup_result')
                                    <b>{{ $pushupresults_sum_day }}</b> 回
                                @else
                                    <b>0 </b>回
                                @endif
                            </td>

                            <td>    
                                @if($hasTodaySitup ?? 'situp_result')
                                    <b>{{ $situpresults_sum_day }}</b> 回
                                @else
                                    <b>0 </b>回
                                @endif
                            </td>

                            <td>
                                @if($hasTodaySquat ?? 'squat_result')
                                    <b>{{ $squatresults_sum_day }}</b> 回
                                @else
                                    <b>0 回</b>
                                @endif
                            </td>
                        </tr>

                            {{-- エラーはなくなるが`ifが効かなくなる --}}
                        {{-- <tr>
                            @if($hasTodayPushup ?? '' ?? 'pushup_result' )
                                <td><b>{{ $pushupresults_sum_day->total_pushup_result }}</b> 回</td>
                            @else
                                <td><b>0 </b>回</td>
                            @endif

                            @if($hasTodaySitup ?? '' ?? 'situp_result')
                                <td><b>{{ $situpresults_sum_day->total_situp_result }}</b> 回</td>
                            @else
                                <td><b>0 </b>回</td>
                            @endif

                            @if($hasTodaySquat ?? '' ?? 'squat_result')
                                <td><b>{{ $squatresults_sum_day->total_squat_result }}</b> 回</td>
                            @else
                                <td><b>0 回</b></td>
                            @endif
                        </tr> --}}

                    <!-- 過去最高記録 -->
                    <tr>
                        <td class="event">過去最高記録</td>
                        <td>
                            @if($pushupresults)
                            <b>{{ $pushupresults_max }}</b> 回
                            @else
                                <b>0 </b>回
                            @endif
                        </td>
                        <td>
                            @if($situpresults_max)
                            <b>{{ $situpresults_max }}</b> 回
                            @else
                                <b>0 </b>回
                            @endif
                        </td>
                        <td>
                            @if($squatresults_max)
                            <b>{{ $squatresults_max }}</b> 回
                            @else
                                <b>0 </b>回
                            @endif
                        </td>
                    </tr>

                    <!-- 過去合計記録 -->
                        <tr>
                            <td class="event">過去合計記録</td>
                            <td><b>{{ $pushupresults_sum }}</b> 回</td>
                            <td><b>{{ $situpresults_sum }}</b> 回</td>
                            <td><b>{{ $squatresults_sum }}</b> 回</td>
                        </tr>
                </table>
                <script>
                    function checkDelete(){
                        if(window.confirm('削除してもよろしいですか？')) {
                            return true;
                        }else {
                            return false;
                        }
                    }
                </script>
            <p><a href="{{ route('finish') }}">次に進む</a></p>
            <p><a href="{{ route('top') }}">メニューに戻る</a></p>
        </div>
    </div>
</body>
@extends('layouts.footer')
</html>



