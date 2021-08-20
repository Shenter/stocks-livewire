<button
    @if ($enabled)
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
        wire:click="buyStock({{$stock}})">
    @else

            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed">

            @endif
            Купить
</button>


