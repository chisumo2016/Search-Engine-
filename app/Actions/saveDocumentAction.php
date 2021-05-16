<?php

namespace  App\Actions;

use App\Models\Document;

class  SaveDocumentAction
{
    public  function  execute(array $upload): bool
    {
        $uploadedFile = $upload['document'];
        $file = $uploadedFile->store('documents');

        if (!$upload['filename']){
            $originalFilename = basename($uploadedFile->getClientOriginalName(), '.' .$uploadedFile->getClientOriginalExtension());
        }
        //store in database
        $document  = new Document();
        $document->filename = $originalFilename  ?? $upload['filename'];

        $document->location = $file;
        $document->description = "";
        $document->user_id = auth()->user()->id;
        $document->save();

        return true;
    }
}
