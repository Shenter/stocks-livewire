<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeriodSwitcher extends Component
{
    public String $period;
    public function mount($period = 'day')
    {
        $this->period = 'day';

    }
    public function render()
    {
        return view('livewire.period-switcher',['period'=>$this->period]);

    }

    public function changePeriod(bool $period)
    {

        if($period==false)
        {
            $this->period = 'day';
        }
        if($period==true)
        {
            $this->period = 'month';
        }

        $this->emit('changeGraphicPeriod',     ['period'=>$this->period]);
    }
}
