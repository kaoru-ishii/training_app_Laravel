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