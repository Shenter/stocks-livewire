<select name="period" >
    <option value="day" onclick="location.href='{{route('dashboard',['period'=>'day'])}}'" @if(request()->period=='day') selected @endif>День</option>
    <option value="month" onclick="location.href='{{route('dashboard',['period'=>'month'])}}'" @if(request()->period=='month') selected @endif>Месяц</option>
</select>
