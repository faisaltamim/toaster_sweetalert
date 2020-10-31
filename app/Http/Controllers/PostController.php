<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {
    //use it for authentication
    public function __construct() {
        $this->middleware( 'auth' );
    }
    //post insert
    public function post( Request $req ) {

        $data           = array();
        $data['title']  = $req->title;
        $data['author'] = $req->author;
        $data['tags']   = $req->tags;
        $data['desc']   = $req->msg;
        // dd( $data );

        $runQuery = DB::table( 'posts' )->insert( $data );
        return redirect()->back()->with("succMssgByTstr","Posts Added!");

    }
    //al posts show
    public function allPost() {
        echo "hi iam faisal tamim";
    }
}
