<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Documents extends Component
{
    use WithPagination;

    public  $term;

    protected  $queryString = ['term'];
    public  $idToDelete;


    public function render()
    {
        if($this->term){
            $documents = Document::search($this->term)->paginate(3);
        }else{
            $documents = Document::with('user')
                ->orderBy('created_at','DESC')
                ->paginate(3);
        }
        return view('livewire.documents',compact('documents'));
    }

    public  function  confirmDelete(int $id)
    {
       $this->idToDelete = $id;

       $this->dispatchBrowserEvent('show-delete-modal');
    }

    public  function  destroy()
    {
        Document::destroy($this->idToDelete);
        $this->dispatchBrowserEvent('hide-delete-modal');
        $this->render();
    }
}
