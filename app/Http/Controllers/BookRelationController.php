<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookRel;
use App\Models\Category;
use App\Models\MapLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books      = Book::all();
        $categorys  = Category::all();
        $images     = MapLocation::all();
        $data       = DB::table('vw_bookshelf_detail')->select('*')->get();

        return view('pages.transaction', [
            'books'     => $books,
            'categorys' => $categorys,
            'images'    => $images,
            'data'      => $data
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = BookRel::create($request->all());
        return redirect()->route('book-relation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $books          = Book::all();
        $categorys      = Category::all();
        $images         = MapLocation::all();
        $transaction    = BookRel::find($id);

        return view('form.edit-transaction', [
            'books'         => $books,
            'categorys'     => $categorys,
            'images'        => $images,
            'transaction'   => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $transaction = DB::table('vw_bookshelf_detail')->select('*')->where('id', $id)->first();
        return response()->json($transaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        info($request);
        $mapLocation = BookRel::find($id);
        $mapLocation->update($request->all());
        return redirect()->route('book-relation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        BookRel::destroy($id);
        return redirect()->route('book-relation.index');
    }
}
