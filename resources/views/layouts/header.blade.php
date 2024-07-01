<header>
    <div class="main-header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('icon/logo.png') }}" alt="">
            </a>
        </div>
        <div class="search-bar">
            <form action="{{ route('books.search') }}" method="GET">
            <input id="search" name="query" type="text" placeholder="ស្វែងរកសៀវភៅ...">
            <i class="fa-solid fa-magnifying-glass"></i>
            </form>
        </div>
        <div class="menu-bar">
            <nav class="menu">
                <ol>
                    <li class="menu-item book-menu menu-all">
                        <a href="#0">សៀវភៅ <i class="fa-solid fa-chevron-down"></i></a>
                        <ol class="sub-menu">
                            <li class="menu-item"><a href="{{ route('NewBook') }}">ថ្មីៗ</a></li>
                            <li class="menu-item"><a href="#0">ពេញនិយម</a></li>
                        </ol>
                    </li>
                    <li class="menu-item book-menu menu-all">
                        <a href="#0">ប្រភេទ <i class="fa-solid fa-chevron-down"></i></a>
                        <ol class="sub-menu">
                            <li class="menu-item"><a href="{{ route('technology') }}">បច្ចេកវិទ្យា</a></li>
                            <li class="menu-item"><a href="{{route('knowledge')}}">ចំណេះដឹង</a></li>
                            <li class="menu-item"><a href="{{route('horror')}}">រន្ធត់</a></li>
                            <li class="menu-item"><a href="{{ route('novel') }}">មនោសញ្ជេតនា</a></li>
                            <li class="menu-item"><a href="{{route('mystery')}}">អាថ៍កំបាំង</a></li>
                        </ol>
                    </li>
                    <li class="menu-item book-menu menu-all"><a href="#0">អំពី
                            <i class="fa-solid fa-chevron-down"></i></a>
                        <ol class="sub-menu">
                            <li class="menu-item"><a href="#0">អ្នកបង្កើត</a></li>
                            <li class="menu-item"><a href="#0">ពួក​យើង</a></li>
                        </ol>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</header>
