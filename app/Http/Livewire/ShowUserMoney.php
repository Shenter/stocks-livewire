<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowUserMoney extends Component
{
    public $money;
    public $listeners = ['stockCountChanged'=>'refreshUserMoney'];
    public function mount()
    {
        $this->money = round(Auth::user()->money/100,2);
    }
    public function refreshUserMoney()
    {
        $this->money = round(Auth::user()->money/100,2);
    }
    public function render()
    {
        return view('livewire.show-user-money',['money'=>round(($this->money/100),2)]);
    }
}
