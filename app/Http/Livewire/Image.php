<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    public $image= [];


    public function uploadImage()
    {

        foreach ($this->image as $key=>$img){
            $this->image[$key]=$img->store('image','public');
        }

        $this->image=json_encode($this->image);
        \App\Models\Image::create(['image'=>$this->image]);

        $this->emit('resetForm');

    }

    public function render()
    {
        return view('livewire.image');
    }
}
