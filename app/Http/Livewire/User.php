<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $ids;
    public $name;
    public $email;
    public $password;
    public $search;
    public $file;

    public function edit($id)
    {
        $user=\App\Models\User::where('id',$id)->first();
        $this->ids=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->password=$user->password;
        $this->file=$user->file;
    }

    public function update()
    {
        $user=\App\Models\User::where('id',$this->ids)->first();
        $data=$this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'file'=>'required'
        ]);
        $file=$this->file->store('files','public');
        $data['file']=$file;
        $user->update($data);
        session()->flash('msg',"Updated User SuccessFly");
        $this->emit('closeModal');
    }

    public function store()
    {
        $data=$this->validate([
           'name'=>'required',
           'email'=>'required|email',
           'password'=>'required',
            'file'=>'required'
        ]);

        $file=$this->file->store('files','public');

        $data['file']=$file;

        \App\Models\User::create($data);

        session()->flash('msg',"Created User SuccessFly");
    }

    public function delete($id)
    {
        $user=\App\Models\User::find($id);
        $user->delete();
        session()->flash('msg',"Deleted User SuccessFly");
    }


    public function render()
    {
            $users=\App\Models\User::where('name','LIKE',"%$this->search%")
                ->orWhere('email','LIKE',"%$this->search%")
                ->orderBy('id','DESC')
                ->paginate(20);
        return view('livewire.user',compact('users'));
    }
}
