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
                            <td class="daily_tr">
                                {{-- <div>
                                    <form method="post" action="/delete/{{ $pushupresult['id'] }}" id='delete-form'>
                                        @csrf
                                        <button><i id='delete-button' class=""fas fa-trash></i> </button>
                                    </form>
                                </div> --}}
                                {{-- <div class="delete-btn">
                                    <form method="post" action="{{ route('delete', $pushupresult->id) }}" onsubmit="return checkDelete()">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary" onclick=>削除</button>
                                    </form>
                                    <input type="submit" value="削除">
                                </div> --}}
                                <b>{{ $pushupresults->pushup_result }}</b> 回
                                <div>
                                    <form action="{{ route('pushup.destroy', ['id'=>$pushupresults->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit">削除</button>  
                                    </form>
                                </div>
                            </td>
                            <td class="number">
                                <b>{{ $situpresults->situp_result }}</b> 回
                                <div>
                                    <form action="{{ route('situp.destroy', ['id'=>$situpresults->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit">削除</button> 
                                    </form>
                                </div>
                            </td>
                                
                            <td class="number">
                                <b>{{ $squatresults->squat_result }}</b> 回
                                <div>
                                    <form action="{{ route('squat.destroy', ['id'=>$squatresults->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit">削除</button>  
                                    </form>
                                </div>
                            </td>
                        </tr>
                    
                    <!-- 本日の合計記録 -->
                        <tr>
                            <td class="event">
                            <?php 
                                $day = new DateTime();
                                echo $day->format('d'.'日');
                            ?>の合計記録</td>
                            <td><b>{{ $pushupresults_sum_day->total_pushup_result }}</b> 回</td>
                            <td><b>{{ $situpresults_sum_day->total_situp_result }} </b> 回</td>
                            <td><b>{{ $squatresults_sum_day->total_squat_result }} </b> 回</td>
                        </tr>
                    <!-- 過去最高記録 -->
                        <tr>
                            <td class="event">過去最高記録</td>
                            <td><b>{{ $pushupresults_max->max('pushup_result') }}</b> 回</td>
                            <td><b>{{ $situpresults_max->max('situp_result') }}</b> 回</td>
                            <td><b>{{ $squatresults_max->max('squat_result') }}</b> 回</td>
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

