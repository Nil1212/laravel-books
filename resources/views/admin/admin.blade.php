@extends('admin.layout')

@section('content')
    <main data-aos="fade-up" data-aos-duration="500" class="admin">
        <div class="head-title">
            <div class="left">
                <h1>អ្នកគ្រប់គ្រង</h1>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>អ្នកគ្រប់គ្រង</h3>
                    <button onclick="toggleFormActive(event)">បង្កើត</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>រូបភាព</th>
                            <th>ឈ្មោះ</th>
                            <th>អ៊ីម៉ែល</th>
                            <th>លេខសម្ងាត់</th>
                            <th>ពេលបង្កើត</th>
                            <th>ធ្វើបច្ចុប្បន្នភាពនៅ</th>
                            <th>កែប្រែ</th>
                            <th>លុប</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('icon/logo.png') }}"></td>
                            <td>Admin1</td>
                            <td>admin@gmail.com</td>
                            <td>admin@1</td>
                            <td>01-10-2021</td>
                            <td>01-10-2021</td>
                            <td><a href="#"><i style="color:#fa9a41" class="bx bxs-edit"></i></a></td>
                            <td><a href="#"><i style="color: #fa9a41" class="bx bxs-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- ?------------------------------------------ Add Data --------------------------- --}}
        <form class="addBook" action="{{ route('admin.create') }}" id="book-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="standalone">
                <label for="img">
                    <p>បញ្ចូលរូបភាព</p>
                    <img id="image-preview" src="{{ asset('icon/add-img.png') }}">
                </label>
                <input type="file" id="img" name="userImage" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="grid-container">
                <div>
                    <label for="name">ឈ្មោះ</label>
                    <input type="text" id="name" name="username" placeholder="Username...">
                </div>
                <div>
                    <label for="email">អ៊ីម៉ែល</label>
                    <input type="email" id="email" name="email" placeholder="Email...">
                </div>
                <div>
                    <label for="password">ពាក្យសម្ងាត់</label>
                    <input type="password" id="password" name="password" placeholder="Password...">
                </div>
                <div>
                    <label for="password_confirmation">បញ្ជាក់ពាក្យសម្ងាត់</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password...">
                </div>
            </div>
            <button type="reset" style="background-color: rgb(255, 56, 56); margin-right:20px;" onclick="toggleFormActive(event)">
                <i class="fa-solid fa-xmark"></i> ចាកចេញ
            </button>
            <button type="submit" onclick="submitForm()">បញ្ចូលអ្នកគ្រប់គ្រង</button>
        </form>
    </main>
@endsection
<script>
    function toggleFormActive(event) {
        document.getElementById('book-form').classList.toggle('form-active');
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
