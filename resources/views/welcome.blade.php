<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SeavPhov</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fistContent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fiveContent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Horror.css') }}">
    <link rel="stylesheet" href="{{ asset('css/listContent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/secondContent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thirdContent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fourthContent.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/fontawesome.min.js"
        integrity="sha512-1M9vud0lqoXACA9QaA8IY8k1VR2dMJ2Qmqzt9pN2AH7eQHWpNsxBpaayV0kKkUsF7FLVQ2sA2SSc8w5VOm7/mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    {{-- !---------------------------------Header---------------------------- --}}
    @include('layouts.header')
    {{-- !------------------------------------Content---------------------------------- --}}
    <div class="container">
        {{-- !------------------------First-Content------------------------------ --}}
        @include('layouts.firstcontent')
        {{-- ! ---------------------Second-Content----------------------------------- --}}
        @include('layouts.TrendingBookSlide')
        {{-- !---------------------Third-Content----------------------------------- --}}
        @include('layouts.New-Arrivals')
        {{-- !---------------------Five-Content----------------------------------- --}}
        @include('layouts.Item-Genre')
        {{-- !----------------------Genre-Content---------------------------------- --}}
        @include('MainGenre.horror')
        @include('MainGenre.knowledge')
        @include('MainGenre.technology')
    </div>
    {{-- !-------------------------Footer------------------------------- --}}
    @include('layouts.footer')
    <script>
        AOS.init();
      </script>
    <script>
        const swiperEl = document.querySelector('swiper-container');
        const swiperParams = {
            slidesPerView: 1,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                420: {
                    slidesPerView: 1,
                }
            },
            on: {
                init() {
                    // ...
                },
            },
        };

        Object.assign(swiperEl, swiperParams);

        swiperEl.initialize();
    </script>
</body>
</html>
