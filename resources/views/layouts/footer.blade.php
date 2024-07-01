<footer data-aos="fade-up" data-aos-duration="500">
    <div class="left-footer">
        <h3>សៀវភៅ</h3>
        <ul>
            @foreach ($bookSlide->take(10) as $index => $book)
                <li>{{ $book->Title }}</li>
            @endforeach
        </ul>
    </div>
    <div class="center-footer">
        <img src="{{ asset('icon/logo.png') }}" alt="">
        <p>ផ្លាស់ប្ដូរការគិតរបស់អ្នកឱ្យកាន់តែប្រសើរ ជាមួយនឹងការអានសៀវភៅ</p>
        <p class="phone">+855 999999999</p>
        <p class="media"><i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-instagram"></i><i
                class="fa-brands fa-x-twitter"></i><i class="fa-brands fa-linkedin-in"></i></p>
    </div>
    <div class="right-footer">
        <h3>អាសយដ្ឋាន</h3>
        <p>វត្តជប់, ស្រុកព្រះនេត្រព្រះ, ខេត្តបន្ទាយមានជ័យ</p>
        <p class="email"><i class="fa-regular fa-envelope"></i>Gmail@gmail.com</p>
        <p class="copyright">&copy; <span>២០២៤ រក្សាសិទ្ធិដោយ <a href="{{ route('dashboard') }}">និល</a></span>
        </p>
    </div>
</footer>
