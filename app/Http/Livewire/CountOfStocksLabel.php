<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CountOfStocksLabel extends Component
{
public $stockCount;
public $stock;
    protected $listeners = ['stockCountChanged'=>'refreshCountOfStocks'];
    public function refreshCountOfStocks()
    {
        $this->stockCount = Auth::user()->stocks()->where(['stock_id'=>$this->stock])->count();
    }
    public function mount($stock)
    {
        $this->stock = $stock;
       // $userStocks = Auth::user()->stocks;

      return( $this->stockCount = Auth::user()->stocks()->where(['stock_id'=>$stock])->count());
    }
    public function render()
    {
        return view('livewire.count-of-stocks-label',['count'=>$this->stockCount]);
    }
}
