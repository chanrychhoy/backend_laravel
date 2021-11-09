<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BookResource::collection(Book::latest()->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'min:3|max:10',
            'body'=>'min:3|max:50'
        ]);
        $Book=new Book();
        $Book->author_id=$request->author_id;
        $Book->title=$request->title;
        $Book->body=$request->body;
        $Book->save();

        return response()->json(['message'=>'Book created'],201);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Book::findOrFail($id);
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
        //
        $request->validate([
            'title'=>'min:3|max:10',
            'body'=>'min:3|max:50'
        ]);
        $Book=new BookResource(Book::findOrFail($id));
        $Book->author_id=$request->author_id;
        $Book->title->$request->title;
        $Book->body->$request->body;
        $Book->save();

        return response()->json(['message'=>'Book updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Book::destroy($id);
    }
}
