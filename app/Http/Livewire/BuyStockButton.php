<?php

namespace App\Http\Livewire;

use App\Http\Services\StockOperations;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuyStockButton extends Component
{
    public $stock;
    private $stockProvider;
    public $enabled;

    public $listeners=['stockCountChanged'=>'refreshButton'];
    public function buyStock(Stock $stock)
    {

        $this->stockProvider = new StockOperations();

        $price = $stock->getLatestPrice();
//        $count = $request->count;
        //Если цена в реквесте ниже реальной цены, то это ошибка
//        if($price < Stock::findorfail($stock)->getLatestPrice()) {
//            return back()->withErrors(['message'=> 'Указана цена выше, чем цена биржи']);
//        }
        //Если сумма реквеста +1% меньше его денег, то ошибка
        if ($price * (1 + Stock::$TAX / 100) > Auth::user()->money) {
            $this->addError('error','Not enough money');
//           TODO Куда-то вывести ошибку

        }
        else {
            $this->stockProvider->buyStocks(Auth::user(), $stock);
            $this->emit('stockCountChanged');
        }
        // return redirect('stocks')->with(['messages'=>'Успешно куплено '.$count. ' шт. по цене '.$request->price]);
    }

    public function mount($stock)
    {
        $this->stock = $stock;
        $this->enabled = Auth::user()->howManyStocksCanBuy($this->stock)>=1;
    }

    public function refreshButton()
    {
        $this->enabled = Auth::user()->howManyStocksCanBuy($this->stock)>=1;
    }

    public function render()
    {
        $this->enabled = Auth::user()->howManyStocksCanBuy($this->stock)>=1;
        //logger(Auth::user()->howManyStocksCanBuy($this->stock));
//        if (Auth::user()->howManyStocksCanBuy($this->stock)>=1) {
//            logger('USERCANBUY');
//            return view('livewire.buy-stock-button', ['stock' => $this->stock]);
//        } else {
//            logger('USERCANNOTBUY');
            return view('livewire.buy-stock-button',['enabled'=>$this->enabled]);

//        }
    }
}
