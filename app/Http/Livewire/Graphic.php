<?php

namespace App\Http\Livewire;

use App\Http\Services\DataPreparer;
use Livewire\Component;

class Graphic extends Component
{
    public $data;

    public $values;
    public $period;
    public $listeners = ['changeGraphicPeriod'=>'rerender'];

    public function mount($period = ['period'=>'day'])
    {

        $this->period = $period;
        $this->data = DataPreparer::prepareUserCash( $this->period);

    }
    public function render()
    {
        $this->data = DataPreparer::prepareUserCash( $this->period);
        return view('livewire.graphic',['data'=>$this->data]);
    }


    public function rerender($period)
    {
        $this->period = $period;

        $this->data = DataPreparer::prepareUserCash( $this->period);

//        return view('livewire.graphic',['data'=>$this->data]);
    }



}
