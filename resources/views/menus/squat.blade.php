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
    <div class="measurement-container">
        <img class="measurement-image" src="{{ asset('img/pushup.jpg') }}" />
        <div class="measurement-main">
            <h1>スクワット</h1>
            <h2>Are you ready?</h2>
            <div>
                <input class="timer-cnt" id="sec-input" type="button" value="30" disabled>秒
            </div>
            <div class="timer">
                <input class="cnt-form" id="start-btn" type="button" value="スタート" onclick="startCount()">
                <input class="cnt-form" id="stop-btn" type="button" value="ストップ" onclick="stopCount()">
                <input class="cnt-form" id="reset-btn" type="button" value="リセット" onclick="resetCount()">
            </div>
            <form action="{{ route('squatresult') }}" method="POST">
                @csrf
                <input required class="number-form" name="squat_result" type="number" placeholder="回数" maxlength="2">
                <input class="result-btn" type="submit" value="記録する">
            </form>
            <script>
                //タイマーを格納する変数（タイマーID）の宣言
                var timer1;
                const secInput = document.getElementById("sec-input");
                const startBtn = document.getElementById("start-btn");
                const stopBtn = document.getElementById("stop-btn");
                const resetBtn = document.getElementById("reset-btn");

                //カウントダウン関数を1000ミリ秒毎に呼び出す関数
                function startCount(){
                    startBtn.disabled = true;
                    timer1 = setInterval("countDown()", 1000);
                }

                ///タイマー停止関数
                function stopCount(){
                    startBtn.disabled = false;
                    clearInterval(timer1);
                }

                // リセットボタン
                function resetCount(){
                    // document.getElementById("sec-input").value = "30";
                    secInput.value = 30;
                }

                // クリックされた際にスタートボタンの色の変更
                document.getElementById('start-btn').addEventListener('click',{
                    handleEvent: function (event) {
                        event.target.style.backgroundColor = "#0ae1f5";
                    }}, false);
                    
                // クリックされた際にストップボタンの色の変更
                document.getElementById('stop-btn').addEventListener('click',{
                handleEvent: function (event) {
                    event.target.style.backgroundColor = "#eb1111";
                }}, false);

                //カウントダウン関数
                function countDown(){
                    var sec = secInput.value;

                    if(sec == "") {
                        alert("時刻を設定して下さい！");
                        reSet();
                    } else {
                        if (sec == "") sec = 0;
                        sec = parseInt(sec);

                        tmWrite(sec - 1);
                    }
                }

                //リセットボタン関数
                function countDown(){
                    var sec = secInput.value;

                    if(sec == "") {
                        alert("時刻を設定して下さい！");
                        reSet();
                    } else {
                        if (sec == "") sec = 30;
                        sec = parseInt(sec);

                        tmWrite(sec - 1);
                    }
                }

                //残り時間を書き出す関数
                function tmWrite(int) {
                    int = parseInt(int);

                    if (int <=0) {
                        reSet();
                        alert("時間です！");
                    } else {
                        secInput.value = int % 60;
                    }
                }

                //フォームを初期状態に戻す(リセット)関数
                function reSet() {
                    secInput.value = "0";
                    startBtn.disabled = false;
                    clearInterval(timer1);
                }
            </script>
            <p class="menu-transition">
                <a href="{{ route('top') }}">メニューに戻る</a>
            </p>
        </div>
    </div>
</body>
@extends('layouts.footer')
</html>