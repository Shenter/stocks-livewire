<x-app-layout>
    <x-slot name="header">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('messages'))
                <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                    <p class="font-bold">Это успех!</p>
                    <p>{{session('messages')}}</p>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <table width="100%">
                        <thead>
                        <tr>
                            <td>Наименование</td>
                            <td>Количество</td>
                            <td>Цена покупки</td>
                            <td>Текущая цена</td>
                            <td>% изменения</td>
                            <td>Доходность</td>
                            <td>Действия</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                        <tr>
                            <td>{{$stock->name}}</td>
                            <td>@livewire('count-of-stocks-label',['stock'=>$stock->id])</td>
                            <td>{{round($stock->getAvgBuyPrice($stock->id)/100,2)}}</td>
                            <td>{{round($stock->getLatestPrice()/100,2)}}</td>
                            <td>@livewire('show-daily-change',['stock'=>$stock->id])</td>
                            <td>@livewire('show-profitability',['stock'=>$stock->id])</td>


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
