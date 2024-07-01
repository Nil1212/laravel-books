<div class="five-content" data-aos="fade-right" data-aos-duration="500">
    <div class="genre-title">
        <h2>ប្រភេទសៀវភៅ</h2>
    </div>
    <div class="genre">
        <ul>
            <li>
                <a class="list-item" href="{{ route('knowledge') }}">
                    <div class="genre-item-img">
                        <img src="{{ asset('uploads/' . $lastBookKL->CoverImage) }}" alt="">
                    </div>
                    <div class="item-detail">
                        <h4>{{ $lastBookKL->Title }}</h4>
                        <div class="stars">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                        </div>
                        <p>អ្នកនិពន្ធ៖ <span>{{ $lastBookKL->Author }}</span></p>
                        <p>ប្រភេទ៖​ <span>{{ $lastBookKL->genre->GenreName }}</span></p>
                        <p>ចំនួន៖ <span>{{ $CountKL }} ក្បាល</span></p>
                    </div>
                </a>
            </li>
            <li>
                <a class="list-item" href="{{ route('knowledge') }}">
                    <div class="genre-item-img">
                        <img src="{{ asset('uploads/' . $lastBookN->CoverImage) }}" alt="">
                    </div>
                    <div class="item-detail">
                        <h4>{{ $lastBookN->Title }}</h4>
                        <div class="stars">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                        </div>
                        <p>អ្នកនិពន្ធ៖ <span>{{ $lastBookN->Author }}</span></p>
                        <p>ប្រភេទ៖​ <span>{{ $lastBookN->genre->GenreName }}</span></p>
                        <p>ចំនួន៖ <span>{{ $CountN }} ក្បាល</span></p>
                    </div>
                </a>
            </li>
            <li>
                <a class="list-item" href="{{ route('knowledge') }}">
                    <div class="genre-item-img">
                        <img src="{{ asset('uploads/' . $lastBookH->CoverImage) }}" alt="">
                    </div>
                    <div class="item-detail">
                        <h4>{{ $lastBookH->Title }}</h4>
                        <div class="stars">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                        </div>
                        <p>អ្នកនិពន្ធ៖ <span>{{ $lastBookH->Author }}</span></p>
                        <p>ប្រភេទ៖​ <span>{{ $lastBookH->genre->GenreName }}</span></p>
                        <p>ចំនួន៖ <span>{{ $CountH }} ក្បាល</span></p>
                    </div>
                </a>
            </li>
            <li>
                <a class="list-item" href="{{ route('knowledge') }}">
                    <div class="genre-item-img">
                        <img src="{{ asset('uploads/' . $lastBookT->CoverImage) }}" alt="">
                    </div>
                    <div class="item-detail">
                        <h4>{{ $lastBookT->Title }}</h4>
                        <div class="stars">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                        </div>
                        <p>អ្នកនិពន្ធ៖ <span>{{ $lastBookT->Author }}</span></p>
                        <p>ប្រភេទ៖​ <span>{{ $lastBookT->genre->GenreName }}</span></p>
                        <p>ចំនួន៖ <span>{{ $CountT }} ក្បាល</span></p>
                    </div>
                </a>
            </li>
            <li>
                <a class="list-item" href="{{ route('knowledge') }}">
                    <div class="genre-item-img">
                        <img src="{{ asset('uploads/' . $lastBookM->CoverImage) }}" alt="">
                    </div>
                    <div class="item-detail">
                        <h4>{{ $lastBookM->Title }}</h4>
                        <div class="stars">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-fill.svg') }}" alt="">
                            <img src="{{ asset('icon/star-emptys.svg') }}" alt="">
                        </div>
                        <p>អ្នកនិពន្ធ៖ <span>{{ $lastBookM->Author }}</span></p>
                        <p>ប្រភេទ៖​ <span>{{ $lastBookM->genre->GenreName }}</span></p>
                        <p>ចំនួន៖ <span>{{ $CountM }} ក្បាល</span></p>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
