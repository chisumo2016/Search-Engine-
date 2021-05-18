<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Documents extends Component
{
    use WithPagination;
    public function render()
    {
        $documents = Document::with('user')
            ->orderBy('created_at','DESC')
            ->paginate(2);
        return view('livewire.documents',compact('documents'));
    }
}
