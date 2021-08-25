<?php

namespace App\Http\Services;

use App\Models\Stock;
use App\Models\StockUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StockOperations
{

    public function buyStocks(User $user, Stock $stock)
    {
        $cost = round($stock->getLatestPrice() * (1 + Stock::$TAX/100) ,2);
        //TODO ТУДУ ТУДУ Проверка наличия денег на покупку туду туду
       //TODO  $adminMoney = DB::table('admin_money')->first()->sum + $price*$count* (Stock::$TAX/100);
//      TODO  DB::table('admin_money')->update(['sum'=>$adminMoney]);
        $user->money -= $cost;
        $user->save();

            $stockUser = new StockUser([
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
                'stock_id' => $stock->id,
                'user_id' => $user->id,
                'buy_price' => $cost,
            ]);
            $stockUser->save();
    }

    public function sellStocks(Stock $stock)
    {


            $cost = round($stock->getLatestPrice() * (1 - Stock::$TAX / 100));
            //  $adminMoney = DB::table('admin_money')->first()->sum + $price * $count * (Stock::$TAX / 100);
            //   DB::table('admin_money')->update(['sum' => $adminMoney]);
            $user = Auth::user();
            $user->money += $cost;
            $user->save();
            StockUser::where(['user_id' => Auth::user()->id, 'stock_id' => $stock->id])->take(1)->delete();

    }


}
