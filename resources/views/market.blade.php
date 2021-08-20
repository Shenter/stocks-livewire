<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stocks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table width="100%">
                        <thead>
                        <tr>
                            <td>Наименование</td>
                            <td>Наличие дивидендов</td>
                            <td>Изменение за день</td>
                            <td>Текущая цена</td>
                            <td>Куплено</td>
                            <td>Действия</td>
                        </tr>
                        </thead>
                        <tbody>
@foreach($stocks as $stock)
                            <tr>
                                <td>{{$stock['name']}}</td>
                                <td>-</td>
                                <td>@if($stock->getDailyChange()<0)
                                        <span style="color: red">

                                    @elseif($stock->getDailyChange()==0)
                                        <span style="color: black">
                                    @elseif($stock->getDailyChange()>0)
                                <span style="color: green">+
                                    @endif
                                    {{$stock->getDailyChange()}}</span></td>
                                <td>{{round($stock->getLatestPrice()/100,2)}}</td>
                                <td>
                                    @livewire('count-of-stocks-label',['stock'=>$stock->id])
                                </td>
                                <td>
                                    @livewire('sell-stock-button',['stock'=>$stock->id])
                                </td>
                                <td>
                                    @livewire('buy-stock-button',['stock'=>$stock->id])
                                </td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
