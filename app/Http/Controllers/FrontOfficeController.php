<?php

namespace App\Http\Controllers;

use App\Models\BookRel;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontOfficeController extends Controller
{
    public function index()
    {
        $kategori = $this->getKategori();
        return view("pages/landing-page", ["kategori" => $kategori]);
    }

    public function getKategori()
    {
        $data = DB::table('m_category')
            ->leftjoin('t_book_rel', 'm_category.id', '=', 't_book_rel.id_kategory')
            ->select(DB::raw('COUNT(t_book_rel.id_buku) as book_count'), 'm_category.kategori', 'm_category.id')
            ->groupBy('m_category.id', 'm_category.kategori')
            ->get();

        return $data;
    }

    public function category(int $id){
        $list_buku  = DB::table('vw_bookshelf_detail')->where('id_kategori',$id)->get();
        return view('pages/book-list', ['list'=> $list_buku]);
    }

    public function search(Request $request){
        $keyword    = $request->get('keyword');
        $list_buku  = DB::table('vw_bookshelf_detail')->where('judul','like','%'.$keyword.'%')->get();

        return view('pages/book-list', ['list'=> $list_buku]);
    }

    public function info(Request $request, int $id){
        $detail_buku  = DB::table('vw_bookshelf_detail')->where('id_buku',$id)->first();
        info($detail_buku->judul);
        return view('pages/book-info', ['info'=> $detail_buku]);
    }
}
