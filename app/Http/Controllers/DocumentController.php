<?php

namespace App\Http\Controllers;

use App\Actions\SaveDocumentAction;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::with('user')->paginate(1);
        return  view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, saveDocumentAction $documentAction)
    {
        //dd($request);
       $validated = $request->validate([
           'document' => 'required|mimes:txt'
       ]);

        $documentAction->execute($request->toArray());
        return redirect(route('documents.index'));



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public  function  search(Request  $request)
    {
        $documents = Document::search($request->term)->paginate(1);
        return  view('documents.index', compact('documents'));
    }
}


/*
 //dd($request);
       $validated = $request->validate([
           'document' => 'required|mimes:txt'
       ]);

       $uploadedFile = $request->file('document');
       $file = $uploadedFile->store('documents');

       if (!$request->filename){
           $originalFilename = basename($uploadedFile->getClientOriginalName(), '.' .$uploadedFile->getClientOriginalExtension());
       }
       //store in database
       $document  = new Document();
       $document->filename = $originalFilename  ?? $request->filename;

        $document->location = $file;
        $document->description = "";
        $document->user_id = auth()->user()->id;
        $document->save();

        return redirect(route('documents.index'));
 */
