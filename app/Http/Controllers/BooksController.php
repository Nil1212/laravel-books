<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // ? =======================Home Page=========================
    public function index(Request $request)
    {
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        // ?================NewLast 3Book=============
        $books = Books::orderBy('id', 'desc')->limit(3)->get();

        //? =====================Knowledge=============
        $lastBookKL = Books::where('Genre', 2)
            ->orderBy('id', 'desc')
            ->first();
        $CountKL = Books::where('Genre', 2)->count();

        //? =====================Novel=============
        $lastBookN = Books::where('Genre', 5)
            ->orderBy('id', 'desc')
            ->first();
        $CountN = Books::where('Genre', 5)->count();
        //? =====================Horror=============
        $lastBookH = Books::where('Genre', 1)
            ->orderBy('id', 'desc')
            ->first();
        $CountH = Books::where('Genre', 1)->count();
        //? =====================Technology=============
        $lastBookT = Books::where('Genre', 3)
            ->orderBy('id', 'desc')
            ->first();
        $CountT = Books::where('Genre', 3)->count();
        //? =====================Mystery=============
        $lastBookM = Books::where('Genre', 4)
            ->orderBy('id', 'desc')
            ->first();
        $CountM = Books::where('Genre', 4)->count();

        $data = [
            'books' => $books,
            'bookSlide' => $bookSlide,
            'lastBookKL' => $lastBookKL,
            'CountKL' => $CountKL,
            'lastBookN' => $lastBookN,
            'CountN' => $CountN,
            'lastBookH' => $lastBookH,
            'CountH' => $CountH,
            'lastBookT' => $lastBookT,
            'CountT' => $CountT,
            'lastBookM' => $lastBookM,
            'CountM' => $CountM,
        ];

        if ($request->expectsJson()) {
            return response()->json($data);
        }

        return view('welcome', $data);
    }

    public function searchs(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query
        $books = Books::where('Title', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->get();
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('search', compact('books', 'query', 'bookSlide'));
    }
    // ? ====================================Book Component========================
    public function newbook(Request $request) {
        $booksAll = Books::orderBy('id', 'desc')->get();
        $bookSlide = Books::orderBy('id', 'desc')->limit(6)->get();

       $books = [
            'status'=> 200,
            'books'=> $booksAll
       ];
       if ($request->expectsJson()) {
        return response()->json($books, 200);
    }
       return view('Components.NewBook', compact('booksAll', 'bookSlide'));
    }
    // ?=============Api============
    public function books() {
        $books = Books::orderBy('id', 'desc')->get();
        if($books->count()>0){
            return response()->json([
                'status'=> 200,
                'books'=> $books
            ], 200);
        }else {
            return response()->json([
                'status'=> 404,
                'books'=> 'No Book Found'
            ], 404);
        }
    }

    public function technology()
    {
        $tbooks = Books::where('Genre', 3)->orderBy('id', 'desc')->get();
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('Components.Technology', compact('tbooks', 'bookSlide'));
    }
    public function novel()
    {
        $nbooks = Books::where('Genre', 5)->orderBy('id', 'desc')->get();
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('Components.Novel', compact('nbooks', 'bookSlide'));
    }
    public function horror()
    {
        $hbooks = Books::where('Genre', 1)->orderBy('id', 'desc')->get();
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('Components.Horror', compact('hbooks', 'bookSlide'));
    }
    public function knowledge()
    {
        $kbooks = Books::where('Genre', 2)->orderBy('id', 'desc')->get();
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('Components.knowledge', compact('kbooks', 'bookSlide'));
    }
    public function mystery()
    {
        $mbooks = Books::where('Genre', 4)->orderBy('id', 'desc')->get();
        // ?-----------Books Slide---------------
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('Components.mystery', compact('mbooks', 'bookSlide'));
    }
    // ?=====================Search Books===========================
    public function search(Request $request)
    {
        $query = $request->input('findBook');
        $books = Books::where('Title', 'LIKE', "%{$query}%")->get();

        return response()->json($books);
    }

    // ?==========================Admin Fetch Books By Genre========================
    public function admin()
    {
        // Fetch books with Genre ID of 1, sorted by ID in descending order
        $books1 = Books::where('Genre', 1)
            ->orderBy('id', 'desc')
            ->get();

        // Fetch books with Genre ID of 2, sorted by ID in descending order
        $books2 = Books::where('Genre', 2)
            ->orderBy('id', 'desc')
            ->get();

        // Fetch books with Genre ID of 3, sorted by ID in descending order
        $books3 = Books::where('Genre', 3)
            ->orderBy('id', 'desc')
            ->get();
        // Fetch books with Genre ID of 4, sorted by ID in descending order
        $books4 = Books::where('Genre', 4)
            ->orderBy('id', 'desc')
            ->get();

        // Fetch books with Genre ID of 5, sorted by ID in descending order
        $books5 = Books::where('Genre', 5)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.bookList', compact('books1', 'books2', 'books3', 'books4', 'books5'));
    }

    // ?======================Fetch 1 Book Per each Genre ========================
    public function Aitem()
    {
        $genreIds = [1, 2, 3, 4, 5];

        $booksByGenre = [];
        foreach ($genreIds as $genreId) {
            $books = Books::where('Genre', $genreId)
                ->orderBy('id', 'desc')
                ->limit(1)
                ->get();
            $booksByGenre[$genreId] = $books;
        }

        $books = Books::orderBy('id', 'desc')
            ->limit(5)
            ->get();

        // Assuming genre IDs and names
        $genreIds = [
            'Horror' => 1,
            'Knowledge' => 2,
            'Technology' => 3,
            'Mystery' => 4,
            'Drama' => 5,
        ];

        $counts = [];
        foreach ($genreIds as $name => $id) {
            $counts[$name] = Books::where('Genre', $id)->count();
        }

        return view('admin.dashboard', compact('booksByGenre', 'books', 'counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  ?=====================Store admin======================
    public function create()
    {
        return view('admin.bookList');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'CoverImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'Title' => 'required|string|max:255',
            'Author' => 'required|string|max:255',
            'Publisher' => 'required|string|max:255',
            'Genre' => 'exists:genre,id',
            'PageCount' => 'required|integer',
            'Language' => 'required|string|max:255',
            'Format' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('bookList')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Initialize the imageName variable
            $imageName = null;

            // Handle the file upload
            if ($request->hasFile('CoverImage')) {
                $image = $request->file('CoverImage');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('uploads'), $imageName); // Store in public/uploads directory

                // Log successful file upload
                Log::info('File uploaded successfully: ' . public_path('uploads') . '/' . $imageName);
            }

            // Create the book with the correct data
            $bookData = $request->all();
            if ($imageName) {
                $bookData['CoverImage'] = $imageName;
            }

            Books::create($bookData);

            return redirect()->route('bookList')->with('success', 'អ្នកបានបញ្ចូលសៀវភៅជោគជ័យ');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error uploading file: ' . $e->getMessage());

            return redirect()->route('bookList')->with('error', 'មានបញ្ហាក្នុងការបញ្ចូលសៀវភៅ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  ?======================Show Index========================
    public function show($id)
    {
        $book = Books::findOrFail($id);
        $otherBooks = Books::where('Genre', $book->Genre)
            ->where('id', '!=', $id)->get();
        $bookSlide = Books::orderBy('id', 'desc')
            ->limit(6)
            ->get();
        return view('layouts.ShowItem', compact('book', 'otherBooks', 'bookSlide'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  ?===============================Edit Book========================
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        return view('admin.FormControl.editBook', compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Define validation rules
        $rules = [
            'CoverImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'Title' => 'required|string|max:255',
            'Author' => 'required|string|max:255',
            'Publisher' => 'required|string|max:255',
            'Genre' => 'exists:genre,id',
            'PageCount' => 'required|integer',
            'Language' => 'required|string|max:255',
            'Format' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('books.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $book = Books::findOrFail($id);

            // Handle the file upload
            if ($request->hasFile('CoverImage')) {
                // Delete the old image
                if ($book->CoverImage && file_exists(public_path('uploads/' . $book->CoverImage))) {
                    unlink(public_path('uploads/' . $book->CoverImage));
                }

                $image = $request->file('CoverImage');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName); // Store in public/uploads directory

                // Log successful file upload
                Log::info('File uploaded successfully: ' . public_path('uploads') . '/' . $imageName);
                $book->CoverImage = $imageName;
            }

            // Update book data
            $book->Title = $request->Title;
            $book->Author = $request->Author;
            $book->Publisher = $request->Publisher;
            $book->Genre = $request->Genre;
            $book->PageCount = $request->PageCount;
            $book->Language = $request->Language;
            $book->Format = $request->Format;
            $book->Description = $request->Description;
            $book->save();

            return redirect()->route('bookList')->with('success', 'អ្នកបានកែសម្រួលសៀវភៅជោគជ័យ');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error updating book: ' . $e->getMessage());

            return redirect()->route('books.edit', $id)->with('error', 'មានបញ្ហាក្នុងការកែសម្រួលសៀវភៅ');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  ?===============================Delete===========================
    public function destroy($id)
    {
        $book = Books::findOrFail($id);

        // Optionally, delete the cover image file
        if (file_exists(public_path('uploads/' . $book->CoverImage))) {
            unlink(public_path('uploads/' . $book->CoverImage));
        }

        $book->delete();

        return redirect()->route('bookList');
    }
}
