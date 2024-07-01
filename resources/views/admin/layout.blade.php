<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bookList.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/editBook.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/fontawesome.min.js"
        integrity="sha512-1M9vud0lqoXACA9QaA8IY8k1VR2dMJ2Qmqzt9pN2AH7eQHWpNsxBpaayV0kKkUsF7FLVQ2sA2SSc8w5VOm7/mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>SeavPhovAdmin</title>
</head>
<body>
    <section id="sidebar">
        <a href="{{route('home')}}" class="brand">
            <img class='bx' style="width: 40px" src="{{ asset('icon/logo.png') }}"></img>
            <span class="text">សៀវភៅ</span>
        </a>
        <ul class="side-menu top">
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">ផ្ទាំងគ្រប់គ្រងទូទៅ</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('bookList') ? 'active' : '' }}">
                <a href="{{ route('bookList') }}">
                    <i class='bx bxs-book'></i>
                    <span class="text">បញ្ជីសៀវភៅ</span>
                </a>

            </li>
            <li class="{{ request()->routeIs('aboutUs') ? 'active' : '' }}">
                <a href="{{ route('aboutUs') }}">
                    <i class='bx bxs-user'></i>
                    <span class="text">អំពីយើង</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin') ? 'active' : '' }}">
                <a href="{{ route('admin') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">អ្នកគ្រប់គ្រង</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            {{-- <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li> --}}
            <li>
                <a href="#" class="logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="text">ចាកចេញ</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="{{ route('books.search') }}" method="GET">
                <div class="form-input">
                    <input type="search" id="search" name="query" placeholder="ស្វែងរក...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            {{-- <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label> --}}
            <a href="#" class="profile">
                <img src="{{ asset('icon/book.svg') }}">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        @yield('content')
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src={{ asset('js/script.js') }}></script>
    <script>
        AOS.init();
      </script>
</body>

</html>
