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
    <div class="container">
        <img class="image" src="{{ asset('img/result.jpg') }}" >
        <div class="main">
            <h1 class="title">トレーニング日記</h1>
            <h2></h2>
            <h4 class="title">大変よく頑張りました！！<br>継続して続けましょう！！</h4>
            <form action="{{ route('top') }}">
                <input class="input-form" type="submit" value="メニューに戻る" size=50 style="font-size:20px;">
            </form>
        </div>
    </div>
</body>
@extends('layouts.footer')
</html>