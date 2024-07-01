<div class="first-content" data-aos="fade-right" data-aos-duration="500">
    <div class="first-left-content">
        <div class="first-title-content">
            <h2><span>ស្វែងរកសៀវភៅ</span> <br>ដែលអ្នកចូលចិត្ត</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Viverra velit nibh
                diam nulla sagittis congue. Faucibus rhoncus lobortis.</p>
            <a href="{{ route('NewBook') }}" class="btn-hover">
                <div class="book-image"><img src="{{ asset('icon/book.svg') }}" alt=""></div>
                <p> ចូលមើលសៀវភៅ</p>
            </a>
        </div>
    </div>
    <div class="first-right-content">
        @if ($books->isNotEmpty())
            <img class="small-image" src="{{ asset('uploads/' . $books->first()->CoverImage) }}" alt="">
        @endif

        <img src="{{ asset('images/firstImage.png') }}" alt="">
    </div>
</div>
{{-- !-------------------------List-content----------------------------- --}}
<div class="list-content" data-aos="fade-up" data-aos-duration="500">
    <ul class="little-list-content">
        <li class="desc-detail"><img src="{{ asset('icon/best-book.svg') }}" alt="">សៀវភៅល្អៗ</li>
        <li class="desc-detail"><img src="{{ asset('icon/award.svg') }}" alt="">ពេញនិយម</li>
        <li class="desc-detail"><img src="{{ asset('icon/stars.svg') }}" alt="">សម្បូរបែប</li>
        <li class="desc-detail"><img src="{{ asset('icon/read.svg') }}" alt="">គុណភាពល្អ</li>
    </ul>
</div>
