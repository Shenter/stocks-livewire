<div>
    @if ($change<0)
        <span style="color:red">
    @elseif($change==0)
        <span style="color:black">
    @elseif($change>0)
        <span style="color:green">+@endif{{$change}}%</span>
</div>
