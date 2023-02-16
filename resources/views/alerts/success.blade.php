@if(session()->has('success'))
<div class="toast show" style="margin-right: auto;margin-left: auto">
    <div class="toast-header" style="color:lawngreen">
        <div style="width: 90%"> SUCCESS </div>
        <button style="width: 10%" type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body"style="color:lawngreen">
        {{session()->get('success')}}
    </div>
</div>
@endif
