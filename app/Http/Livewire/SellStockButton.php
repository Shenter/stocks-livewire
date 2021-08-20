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
        //TODO Проверка данных, вдруг у него нет этих акций?
//if (Auth::user()->howManyStocksCanSell($this->stock)>=1) {
//
//            return view('livewire.sell-stock-button', ['stock' => $this->stock]);
//        } else {
//            return view('livewire.sell-stock-button-disabled');
//        }
//        $count = $request->count;
        //Если цена в реквесте ниже реальной цены, то это ошибка
//        if($price < Stock::findorfail($stock)->getLatestPrice()) {
//            return back()->withErrors(['message'=> 'Указана цена выше, чем цена биржи']);
//        }
        //Если сумма реквеста +1% меньше его денег, то ошибка

//           TODO Куда-то вывести ошибку

        $this->stockProvider->sellStocks( $stock);
        $this->emit('stockCountChanged');
    }


}
