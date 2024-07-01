@extends('admin.layout')

@section('content')
    <main data-aos="fade-up" data-aos-duration="500" class="bookList">
        <div class="head-title">
            <div class="left">
                <h1>បញ្ជីសៀវភៅ</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">បញ្ចូលសៀវភៅ</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="box-info">
            <li onclick="toggleFormActive(event)" style="max-width: 300px">
                <a href="#">
                    <i class='bx bx-plus'></i>
                    <span class="text">
                        <h3>បញ្ចូលសៀវភៅ</h3>
                    </span>
                </a>
            </li>
        </ul>
        {{-- ?------------------------------------------ Add Data --------------------------- --}}
        <form class="addBook" id="book-form" action="{{ route('books.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="standalone">
                <label for="img">
                    <p>បញ្ចូលរូបភាព</p>
                    <img id="image-preview" src="{{ asset('icon/add-img.png') }}">
                </label>
                <input type="file" id="img" name="CoverImage" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="grid-container">
                <div>
                    <label for="title">ចំណងជើង</label>
                    <input type="text" id="title" name="Title" placeholder="ចំណងជើង" required>
                </div>
                <div>
                    <label for="author">អ្នកនិពន្ធ</label>
                    <input type="text" id="author" name="Author" placeholder="អ្នកនិពន្ធ" required>
                </div>
                <div>
                    <label for="publisher">ចេញផ្សាយដោយ</label>
                    <input type="text" id="publisher" name="Publisher" placeholder="ចេញផ្សាយដោយ" required>
                </div>
                <div>
                    <label for="genre">ប្រភេទ</label>
                    <select name="Genre" id="genre">
                        <option value="">សូមជ្រើសរើសប្រភេទ</option>
                        <option value="1">រន្ធត់</option>
                        <option value="2">ចំណេះដឹង</option>
                        <option value="3">បច្ចេកវិទ្យា</option>
                        <option value="4">អាថ៌កំបាំង</option>
                        <option value="5">មនោសញ្ជេតនា</option>
                    </select>
                </div>
                <div>
                    <label for="PageCount">ចំនួនទំព័រ</label>
                    <input type="text" id="PageCount" name="PageCount" placeholder="ចំនួនទំព័រ" required>
                </div>
                <div>
                    <label for="language">ភាសា</label>
                    <input type="text" id="language" name="Language" placeholder="ភាសា" required>
                </div>
                <div>
                    <label for="format">ប្រភេទសន្លឹក</label>
                    <input type="text" id="format" name="Format" placeholder="ប្រភេទសន្លឹក" required>
                </div>
                <div>
                    <label for="description">ការពណ៌នា</label>
                    <textarea type="text" id="description" name="Description" placeholder="ការពណ៌នា" required></textarea>
                </div>
            </div>
            <button type="reset" style="background-color: rgb(255, 56, 56); margin-right:20px;"
                onclick="toggleFormActive(event)">
                <i class="fa-solid fa-xmark"></i> ចាកចេញ
            </button>
            <button type="submit" onclick="submitForm()">បញ្ចូលសៀវភៅ</button>
        </form>
        {{-- ?------------------------ Success or Error Messages ------------------- --}}
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="left" style="margin-top: 30px">
            <ul class="breadcrumb">
                <li>
                    <p>មើលសៀវភៅ</p>
                </li>
            </ul>
        </div>
        <div class="table-data">
            @include('admin.bookList.horror')
            @include('admin.bookList.knowledge')
            @include('admin.bookList.technology')
            @include('admin.bookList.mystery')
            @include('admin.bookList.loving')
        </div>
    </main>
@endsection

<script>
    function toggleFormActive(event) {
        document.getElementById('book-form').classList.toggle('form-active');
    }

    function khmerToArabic(khmerNumber) {
        const khmerDigits = '០១២៣៤៥៦៧៨៩'; // Khmer digits from 0 to 9
        let arabicNumber = '';

        for (let i = 0; i < khmerNumber.length; i++) {
            const digit = khmerNumber[i];
            const arabicDigit = khmerDigits.indexOf(digit);
            if (arabicDigit === -1) {
                // If it's not a Khmer digit, return the input as is (or handle as needed)
                return khmerNumber;
            }
            arabicNumber += arabicDigit;
        }

        return arabicNumber;
    }

    function submitForm() {
        const pageCountInput = document.getElementById('PageCount');
        const khmerNumber = pageCountInput.value;
        const arabicNumber = khmerToArabic(khmerNumber);

        // Optionally update the input value to the converted number
        pageCountInput.value = arabicNumber;

        // Submit the form or send the data to the server
        console.log('Converted Number:', arabicNumber);
        // Here you can add the code to submit the form, e.g., using AJAX or form submission
    }

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
