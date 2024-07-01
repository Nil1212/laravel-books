@extends('admin.layout')

@section('content')
    <main data-aos="fade-up"  data-aos-duration="500" class="aboutUs">
        <div class="head-title">
            <div class="left">
                <h1>អំពីយើង</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">ផ្ទាំងគ្រប់គ្រង</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="menuAboutUs">
                <div class="head">
                    <h3>អ្នកបង្កើត</h3>
                    <a href=""><p>មើល</p></a>
                    <a href=""><i class='bx bx-edit'></i></a>
                    <a href=""><i class='bx bx-trash'></i></a>
                </div>
                <p style="max-lines: 2; text-overflow:ellipsis;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book.</p>
            </div>
            <div class="menuAboutUs">
                <div class="head">
                    <h3>ពួកយើង</h3>
                    <a href=""><p>មើល</p></a>
                    <a href=""><i class='bx bx-edit'></i></a>
                    <a href=""><i class='bx bx-trash'></i></a>
                </div>
                <p style="max-lines: 2; text-overflow:ellipsis;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book.</p>
            </div>
        </div>
    </main>
@endsection
