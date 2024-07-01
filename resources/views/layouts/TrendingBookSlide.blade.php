<div class="second-content" data-aos="fade-right" data-aos-duration="500">
    <div class="book-trending">
        <h2>សៀវភៅពេញនិយម</h2>
    </div>
    <div class="book-items">
        <swiper-container init="false" slides-per-view="3" loop="true" autoplay-delay="2500" class="mySwiper">
            @foreach ($bookSlide as $book)
                <swiper-slide>
                    <li>
                        <a class="list-item" href="{{ route('books.show', $book->id) }}">
                            <div class="item-img">
                                <img src="{{ asset('uploads/' . $book->CoverImage) }}" alt="">
                            </div>
                            <h4>{{$book->Title}}</h4>
                            <div class="stars">
                                <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                                <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                                <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                                <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                                <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                            </div>
                            <p>អ្នកនិពន្ធ៖ {{$book->Author}}</p>
                            <p>កាលបរិច្ឆេទបញ្ចូល៖ {{ date('Y-m-d', strtotime($book->created_at)) }}</p>
                        </a>
                    </li>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </div>
</div>
