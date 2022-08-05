<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TestRemind;

class Counter extends Component
{
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $modalStatus;

    public $word = '';
    protected $posts;
    public $aste;

//    public function mount()
//    {
//        $this->dates = TestRemind::all();
//    }
    public function openModal() //modalStatusをtrueにしmodalを表示する
    {

//        $this->resetInputFields();
        $this->modalStatus = true;
    }

    public function closeModal() //modalStatusをfalseにしmodalを閉じる
    {
        $this->modalStatus = false;
    }

    public function updatedType()
    {
        $this->search();
    }

    public function render()
    {
        $this->search();

        return view('livewire.counter', ['posts'=>$this->posts]);
    }

    public function search()
    {
        $this->posts = TestRemind::where('task', 'like', '%'.$this->word.'%')->get();
    }

    public function modaltest()
    {
        $this->posts = TestRemind::where('task', 'like', '%'.$this->word.'%')->get();
    }
}


