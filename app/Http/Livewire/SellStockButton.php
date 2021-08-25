<?php

namespace App\Http\Livewire;

use App\Http\Services\StockOperations;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SellStockButton extends Component
{
    public $listeners=['stockCountChanged'=>'render'];
    public $enabled;

public $stock;
    public function mount($stock)
    {
        $this->stock = $stock;
        $this->enabled = Auth::user()->howManyStocksCanSell($this->stock)>=1;
    }

    public function render()
    {
        $this->enabled = Auth::user()->howManyStocksCanSell($this->stock)>=1;
        return view('livewire.sell-stock-button', ['stock' => $this->stock,'enabled'=>$this->enabled]);

    }

    public function sellStock(Stock $stock)
    {
        $this->stockProvider = new StockOperations();

        if (Auth::user()->howManyStocksCanSell($this->stock)>=1) {
            $this->stockProvider->sellStocks( $stock);
            $this->emit('stockCountChanged');
        }
        else
        {
            $this->addError('error','No stocks for sale');
        }
    }


}
