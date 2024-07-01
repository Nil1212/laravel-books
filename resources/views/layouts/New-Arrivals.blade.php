<div class="third-content" data-aos="fade-up" data-aos-duration="500">
    <div class="new-arrival">
        <h2>មកដល់ថ្មី</h2>
        <button class="btn-hover">
            <a href="{{ route('NewBook') }}" style="display: flex">
                <div class="book-image "><img src="{{ asset('icon/hand-point.svg') }}" alt=""></div>
                <p> មើលទាំងអស់</p>
            </a>
        </button>
    </div>
    <div class="new-arrival-book">
        <ul>
            @foreach ($books as $book)
                <li>
                    <a class="list-item" href="{{ route('books.show', $book->id) }}">
                        <div class="item-img">
                            <img src="{{ asset('uploads/' . $book->CoverImage) }}" alt="">
                        </div>
                        <h4>{{ $book->Title }}</h4>
                        <div class="stars">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                        </div>
                        <p>អ្នកនិពន្ធ៖ {{ $book->Author }}</p>
                        <p>កាលបរិច្ឆេទបញ្ចូល៖ {{ date('Y-m-d', strtotime($book->created_at)) }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
