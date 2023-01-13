<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $image;

    protected $rules=[
        'title'=>['required','unique:products'],
        'description'=>['required',],
        'price'=>['required','integer','min:1000'],
        'image'=>['required','image','max:2048']
    ]; 


    public function submit(){
        $this->validate();

        $this->image->store('products/image','public');
    }
    public function render()
    {
        return view('livewire.product.create')->extends('layouts.app')->section('content');
    }
}
