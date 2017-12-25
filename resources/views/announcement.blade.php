@if(Session('announcement'))
    <div class="alert alert-{{Session('flag')}}">
        {{Session('announcement')}}
    </div>
    @endif