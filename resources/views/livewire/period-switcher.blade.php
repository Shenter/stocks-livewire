<div>
<link rel="stylesheet" href="{{asset('css/selector.css')}}">
<div class="switch-button">

    <input class="switch-button-checkbox"
           type="checkbox"
           id="checklabel"
           checked

           wire:click="changePeriod(document.getElementById('checklabel').checked)">
          </input>
    <label class="switch-button-label" for=""    ><span class="switch-button-label-span">День</span></label>

</div>

</div>
