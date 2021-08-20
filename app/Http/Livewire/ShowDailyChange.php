<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class ShowDailyChange extends Component
{
    public $stock;
    public $listeners=['stockCountChanged'=>'render'];
    public function mount($stock)
    {
        $this->stock=$stock;
    }
    public function render()
    {
        return view('livewire.show-daily-change',['change'=>$this->getDailyChange()]);
    }


    public function getDailyChange()
    {
        return Stock::find($this->stock)->getDailyChange();
    }


}
