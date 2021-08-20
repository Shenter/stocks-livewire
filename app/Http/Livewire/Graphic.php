<?php

namespace App\Http\Livewire;

use App\Http\Services\DataPreparer;
use Livewire\Component;

class Graphic extends Component
{
    public $data;
    public $values;


public function mount()
{
    $this->data = DataPreparer::prepareUserCash();
}



    public function render()
    {
        $data = DataPreparer::prepareUserCash();
        return view('livewire.graphic',['data'=>$data]);
    }
}
