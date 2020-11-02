<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {
    //use it for authentication
    public function __construct() {
        $this->middleware( 'auth' );
    }
    //post insert
    public function post( Request $req ) {

        //query builder data save here
        // $data           = array();
        // $data['title']  = $req->title;
        // $data['author'] = $req->author;
        // $data['tags']   = $req->tags;
        // $data['desc']   = $req->msg;
        // $runQuery     = DB::table( 'posts' )->insert( $data );

        //eloquent data save here
        $dataSave         = new \App\Models\Post;
        $dataSave->title  = $req->title;
        $dataSave->author = $req->author;
        $dataSave->tags   = $req->tags;
        $dataSave->desc   = $req->msg;
        $dataSave->save();

        $notification = [
            'message' => 'Post Successfully Added',
            'alert'   => 'success',
        ];
        return redirect()->back()->with( $notification );

    }
    //al posts show
    public function allPost() {
        $allData = \App\Models\Post::all();
        return view( 'all_posts', compact( 'allData' ) );
    }
    //delete post
    public function deletePost( $id ) {
        //query builder delete
        // $delete = DB::table( 'posts' )->where( 'id', $id )->delete();
        //delete user info
        $idTitle = DB::table( 'posts' )->where( 'id', $id )->first();

        //eloquent delete

        $dltPost = \App\Models\Post::find( $id );
        $runDlt  = $dltPost->delete();
        if ( $runDlt == true ) {

            $notification = [
                'message' => $idTitle->author . ' \'s Post Delete Successfully',
                'alert'   => 'success',
            ];
        }
        return redirect()->back()->with( $notification );

    }
}
