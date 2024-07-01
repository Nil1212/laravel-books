<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookReview</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/showitem.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/fontawesome.min.js"
        integrity="sha512-1M9vud0lqoXACA9QaA8IY8k1VR2dMJ2Qmqzt9pN2AH7eQHWpNsxBpaayV0kKkUsF7FLVQ2sA2SSc8w5VOm7/mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    {{-- Header --}}
    @include('layouts.header')

    {{-- Content --}}
    <div class="container">
        <div class="Detail-Item" data-aos="fade-up" data-aos-duration="500">
            <div class="img-detail">
                <img src="{{ asset('uploads/' . $book->CoverImage) }}" alt="" class="img-detail">
            </div>
            <div class="book-detail">
                <div class="book-description">
                    <h3>ចំណងជើង៖ <span>{{ $book->Title }}</span></h3>
                    <h3>អ្នកនិពន្ធ៖ <span> {{ $book->Author }}</span></h3>
                    <h3>ប្រភេទ៖ <span>{{ $book->genre->GenreName }}</span></h3>
                    <h3>ចំនួនទំព័រ៖ <span>{{ $book->PageCount }}</span>ទំព័រ</h3>
                    <h3>ចេញផ្សាយដោយ៖ <span>{{ $book->Publisher }}</span></h3>
                    <h3>ភាសា៖ <span>{{ $book->Language }}</span></h3>
                    <h3>ប្រភេទក្រប៖ <span>{{ $book->Format }}</span></h3>
                </div>
            </div>
            <div class="comment">
                <div class="fb-comments" data-href="{{ url()->current() }}" data-width="382" data-numposts="5"></div>
            </div>
        </div>
        <div class="description">
            <h4>ការពិពណ៌នា</h4>
            <div class="detail-description">
                <p> &emsp;
                    {{ $book->Description }}
                </p>
            </div>
        </div>
        <div class="others-books" data-aos="fade-up" data-aos-duration="500">
            <h3>សៀវភៅផ្សេងទៀត</h3>
            <div class="others">
                <ul>
                    @foreach ($otherBooks as $otherBook)
                        <li>
                            <a class="a-other-book" href="{{ route('books.show', $otherBook->id) }}">
                                <div class="image">
                                    <img src="{{ asset('uploads/' . $otherBook->CoverImage) }}" alt="">
                                </div>
                                <div class="book-title-detail">
                                    <p>{{ $otherBook->Title }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/km_KH/sdk.js#xfbml=1&version=v20.0"
        nonce="uirotsd2"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
