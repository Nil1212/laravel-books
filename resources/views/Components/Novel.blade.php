<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookReview</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Genre/NewBook.css') }}">
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
        {{-- !------------------------NewBook-Content------------------------------ --}}
        <div class="newBook">
            <h2 data-aos="fade-right" data-aos-duration="500">បច្ចេកវិទ្យា</h2>
            <div class="bookList">
                <ul data-aos="fade-up" data-aos-duration="500" id="bookList">
                    <!-- Initially display the first 10 books -->
                    @foreach ($nbooks->take(10) as $index => $book)
                        <li class="book-item">
                            <a href="{{ route('books.show', $book->id) }}">
                                <img src="{{ asset('uploads/' . $book->CoverImage) }}" alt="">
                                <div class="bookTitle">
                                    <p>{{ $book->Title }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="loadMore">
                <!-- Pagination buttons -->
                <button id="prevPage" disabled>ថយ</button>
                <p>មើលច្រើន</p>
                <button id="nextPage">បន្ត</button>
            </div>
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
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const booksPerPage = 10;
                let currentPage = 1;
                let booksAll = @json($nbooks->toArray()); // Convert PHP array to JavaScript array

                // Function to display books based on the current page
                function displayBooks(page) {
                    const startIndex = (page - 1) * booksPerPage;
                    const endIndex = startIndex + booksPerPage;
                    const booksToShow = booksAll.slice(startIndex, endIndex);

                    const bookList = document.getElementById('bookList');
                    bookList.innerHTML = ''; // Clear previous books

                    booksToShow.forEach(book => {
                        const li = document.createElement('li');
                        li.classList.add('book-item');
                        li.innerHTML = `
                            <a href="{{ route('books.show', '') }}/${book.id}">
                                <img src="{{ asset('uploads/') }}/${book.CoverImage}" alt="">
                                <div class="bookTitle">
                                    <p>${book.Title}</p>
                                </div>
                            </a>
                        `;
                        bookList.appendChild(li);
                    });
                    // Enable/disable pagination buttons based on current page and total books
                    document.getElementById('prevPage').disabled = page === 1;
                    document.getElementById('nextPage').disabled = endIndex >= booksAll.length;
                }

                // Initial display of books
                displayBooks(currentPage);

                // Event listener for the next page button
                document.getElementById('nextPage').addEventListener('click', function() {
                    currentPage++;
                    displayBooks(currentPage);
                });

                // Event listener for the previous page button (optional)
                document.getElementById('prevPage').addEventListener('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        displayBooks(currentPage);
                    }
                });
            });
        </script>
</body>

</html>
