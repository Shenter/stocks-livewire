<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StockUser extends Model
{
    use HasFactory;
    protected $table = 'stock_user';
    protected $fillable = ['updated_at','created_at','stock_id' ,'user_id', 'buy_price'];
    public function getAvgBuyPrice($stockId)
    {

        return $this::where(['user_id'=>Auth::id(),'stock_id'=>$stockId])->avg('buy_price');

//        return($prices/100);

    }




    public function getCount($stockId):int
    {
        return count($this::where(['user_id'=>Auth::id(),'stock_id'=>$stockId])->get());
    }
}
