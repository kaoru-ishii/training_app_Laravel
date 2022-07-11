<!DOCTYPE html>
@extends('layouts.head')
<body>
    {{-- @extends('layouts.header') --}}
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
    <div class="container">
        <img class="image" src="{{ asset('img/menu.jpg') }}" alt="">
        <div class="main">
            <h1 class="title">トレーニング記録</h1>
            <p>こんにちは！{{ Auth::user()->name }} さん</p>
            <h2 class="title">メニュー</h2>
            <form action="{{ route('pushup') }}">
                <input class="input-form" type="submit" value="腕立て" size=50 style="font-size:20px;">
            </form>
            <form action="{{ route('situp') }}">
                <input class="input-form" type="submit" value="腹筋" size=50 style="font-size:20px;">
            </form> 
            <form action="{{ route('squat') }}">
                <input class="input-form" type="submit" value="スクワット" size=50 style="font-size:20px;">
            </form>
            <form action="{{ route('record') }}">
                <input class="input-form" type="submit" value="総合記録" size=50 style="font-size:20px;">
            </form>
        </div>
    </div>
</body>
@extends('layouts.footer')
</html>