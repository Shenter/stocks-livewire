<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class ShowProfitability extends Component
{
public $stock;
    public function mount($stock)
    {
        $this->stock = $stock;
    }
    public function render()
    {
        $stock=Stock::find($this->stock);

        return view('livewire.show-profitability',['profitability'=>round($stock->getProfitability()/100,2)]);
    }
}
