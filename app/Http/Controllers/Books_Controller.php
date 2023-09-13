<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

use \Exception;
use \Illuminate\Database\QueryException;


class Books_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #echo 'Book List Page';
        $data = Books::all();
        return  view("book_list_page",["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        #echo "Book Craete Page";
        return  view("book_create_page");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
                #echo $request;
                Books::create($request->all());
				#echo "Save Successful";

                return redirect('/books')->with('status', 'success');
			}
		catch(\Illuminate\Database\QueryException $e){
				#echo $e;
                return redirect('/books/add')->with('status', 'error')->with('msg', $e->getMessage());
			}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Books::where('ISBN', $id)->first();
        return  view("book_edit_page",["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //echo $id;
        //echo $request;
        try{
                #echo $request;
                $book = Books::where('ISBN', $id)->first();
                $book->fill($request->all())->save();
				#echo "Save Successful";

                return redirect('/books')->with('status', 'success');
			}
		catch(\Illuminate\Database\QueryException $e){
				#echo $e;
                return redirect('/books/edit/'.$id)->with('status', 'error')->with('msg', $e->getMessage());
			}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
                $book = Books::where('ISBN', $id)->delete();
                return redirect('/books')->with('status', 'success');
			}
		catch(\Illuminate\Database\QueryException $e){
				#echo $e;
                return redirect('/books')->with('status', 'error')->with('msg', $e->getMessage());
			}
    }
}
