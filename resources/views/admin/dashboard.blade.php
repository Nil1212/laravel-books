@extends('admin.layout')

@section('content')
    <main class="dashboard" data-aos="fade-up" data-aos-duration="500">
        <div class="head-title">
            <div class="left">
                <h1>ផ្ទាំងគ្រប់គ្រងទូទៅ</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">ប្រភេទសៀវភៅដែលយើងមាន</a>
                    </li>

                </ul>
            </div>
        </div>

        <ul class="box-info">
            <li>
                <img class='bx' src="{{ asset('images/horror.png') }}"></img>
                <span class="text">
                    <h3>បែបរន្ធត់</h3>
                    <p>{{ $counts['Horror'] ?? 0 }} រឿង </p>
                </span>
            </li>
            <li>
                <img class='bx' src="{{ asset('images/img-5.png') }}"></img>
                <span class="text">
                    <h3>ចំណេះដឹង</h3>
                    <p>{{ $counts['Knowledge'] ?? 0 }} ក្បាល</p>
                </span>
            </li>
            <li>
                <img class='bx' src="{{ asset('images/smallimage.png') }}"></img>
                <span class="text">
                    <h3>បច្ចេកវិទ្យា</h3>
                    <p>{{ $counts['Technology'] ?? 0 }} ក្បាល</p>
                </span>
            </li>
            <li>
                <img class='bx' src="{{ asset('images/mystery.png') }}"></img>
                <span class="text">
                    <h3>អាថ៏កំបាំង</h3>
                    <p>{{ $counts['Mystery'] ?? 0 }} រឿង</p>
                </span>
            </li>
            <li>
                <img class='bx' src="{{ asset('images/img-4.png') }}"></img>
                <span class="text">
                    <h3>មនោសញ្ចេតនា</h3>
                    <p>{{ $counts['Drama'] ?? 0 }} រឿង</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>សៀវភៅថ្មី</h3>
                    {{-- <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i> --}}
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>រូបភាព</th>
                            <th>ឈ្មោះ</th>
                            <th>ប្រភេទ</th>
                            <th>កាលបរិច្ឆេទចូល</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/' . $book->CoverImage) }}" style="width:50px"
                                        class="rounded-sm">
                                </td>
                                <td>
                                    <p>{{ $book->Title }}</p>
                                </td>
                                <td>{{ $book->genre->GenreName }}</td>
                                <td>{{ $book->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>ថ្មីបំផុតសម្រាប់ប្រភេទនីមួយៗ</h3>
                    {{-- <i class='bx bx-filter'></i> --}}
                </div>
                <ul class="todo-list">
                    @foreach ($booksByGenre as $genreId => $books)
                        @if ($books->isNotEmpty())
                            <li>
                                <img src="{{ asset('uploads/' . $books->first()->CoverImage) }}" style="width:50px"
                                    class="rounded-sm">
                                <div class="title">
                                    <p style="margin-left: 20px;"><span style="color: #fa9a41;">ឈ្មោះ៖
                                        </span>{{ $books->first()->Title }}</p>
                                    <p style="margin-left: 20px;"><span style="color: #fa9a41;">ប្រភេទ៖​
                                        </span>{{ $books->first()->genre->GenreName }}</p>
                                </div>
                            </li>
                        @else
                            <li>No books found for Genre {{ $genreId }}</li>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </main>
@endsection
