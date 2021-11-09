<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Resources\AuthorResource;


class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AuthorResource::collection(Author::get()->take(3));
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
            'name'=>'min:3|max:10',
            'age'=>'min:1|max:10',
            'province'=>'nullable'
        ]);
        $Author=new Author();
        $Author->name=$request->name;
        $Author->age=$request->age; 
        $Author->province=$request->province;
        $Author->save();

        return response()->json(['message'=>'Autor created'],201);
        
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
        return Author::findOrFail($id);
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
            'name'=>'min:3|max:10',
            'age'=>'min:1|max:10',
            'province'=>'nullable'
        ]);
        $Author=new AuthorResource(Author::findOrFail($id));
        $Author->name=$request->name;
        $Author->age=$request->age; 
        $Author->province=$request->province;
        $Author->save();

        return response()->json(['message'=>'Autor updated'],200);
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
        return Author::destroy($id);
    }
}
