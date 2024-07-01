@extends('admin.layout')

@section('content')
    <main data-aos="fade-up" data-aos-duration="500" class="bookList">
        <div class="head-title">
            <div class="left">
                <h1>កែប្រែសៀវភៅ</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('bookList') }}">បញ្ជីសៀវភៅ</a>
                    </li>
                    <li>កែប្រែសៀវភៅ</li>
                </ul>
            </div>
        </div>

        <form class="editBook" id="book-form" action="{{ route('books.update', $book->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="standalone">
                <label for="img">
                    <p>បញ្ចូលរូបភាព</p>
                    <img id="image-preview" src="{{ asset('uploads/' . $book->CoverImage) }}">
                </label>
                <input type="file" id="img" name="CoverImage" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="grid-container">
                <div>
                    <label for="title">ចំណងជើង</label>
                    <input type="text" id="title" name="Title" placeholder="ចំណងជើង" value="{{ $book->Title }}">
                </div>
                <div>
                    <label for="author">អ្នកនិពន្ធ</label>
                    <input type="text" id="author" name="Author" placeholder="អ្នកនិពន្ធ"
                        value="{{ $book->Author }}">
                </div>
                <div>
                    <label for="publisher">ចេញផ្សាយដោយ</label>
                    <input type="text" id="publisher" name="Publisher" placeholder="ចេញផ្សាយដោយ"
                        value="{{ $book->Publisher }}">
                </div>
                <div>
                    <label for="genre">ប្រភេទ</label>
                    <select name="Genre" id="genre">
                        <option value="">សូមជ្រើសរើសប្រភេទ</option>
                        <option value="1" {{ $book->Genre == '1' ? 'selected' : '' }}>រន្ធត់</option>
                        <option value="2" {{ $book->Genre == '2' ? 'selected' : '' }}>ចំណេះដឹង</option>
                        <option value="3" {{ $book->Genre == '3' ? 'selected' : '' }}>បច្ចេកវិទ្យា</option>
                        <option value="4" {{ $book->Genre == '4' ? 'selected' : '' }}>អាថ៌កំបាំង</option>
                        <option value="5" {{ $book->Genre == '5' ? 'selected' : '' }}>មនោសញ្ជេតនា</option>
                    </select>
                </div>
                <div>
                    <label for="PageCount">ចំនួនទំព័រ</label>
                    <input type="text" id="PageCount" name="PageCount" placeholder="ចំនួនទំព័រ"
                        value="{{ $book->PageCount }}">
                </div>
                <div>
                    <label for="language">ភាសា</label>
                    <input type="text" id="language" name="Language" placeholder="ភាសា" value="{{ $book->Language }}">
                </div>
                <div>
                    <label for="format">ប្រភេទសន្លឹក</label>
                    <input type="text" id="format" name="Format" placeholder="ប្រភេទសន្លឹក"
                        value="{{ $book->Format }}">
                </div>
                <div>
                    <label for="description">ការពណ៌នា</label>
                    <textarea type="text" id="description" name="Description" placeholder="ការពណ៌នា">{{ $book->Description }}</textarea>
                </div>
            </div>
            <button type="reset" style="background-color: rgb(255, 56, 56); margin-right:20px;" onclick="history.back()">
                <i class="fa-solid fa-xmark"></i> ចាកចេញ
            </button>
            <button type="submit" onclick="submitForm()">រក្សាទុក</button>
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
