<?php

namespace App\Models;

use App\Http\Middleware\PreventRequestsDuringMaintenance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Stock extends Model
{
    use HasFactory;
    public static $TAX = 1;
    protected $table = 'stocks';

    public function getLatestPrice()
    {
        return StockHistory::where(['stock_id'=>$this->id])->latest()->first()->sum;
    }


    public function getDailyChange()
    {
        $firstValueForToday = StockHistory::whereDate('created_at',Carbon::today())
            ->where('stock_id','=',$this->id)
            ->oldest()
            ->first();
        if($firstValueForToday!=null)
        {
            return
                round(

                    StockHistory::whereDate('created_at',Carbon::today())
                        ->where('stock_id','=',$this->id)
                        ->oldest()
                        ->first()
                        ->sum/
                    $this->getLatestPrice()
                    -1,3)*100;
        }
        else
        {
            return 0;
        }
    }


    public function getProfitability()
    {

        $user = Auth::user();
        $count = $user->howManyStocksCanSell($this->id);
        return  ( $this->getLatestPrice() - $this->getAvgBuyPrice($this->id)  )
            ;
    }

    public function getAvgBuyPrice($userId)
    {

        return StockUser::where(['user_id'=>Auth::id(),'stock_id'=>$this->id])->avg('buy_price');
    }
}
