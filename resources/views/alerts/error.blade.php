@if(session()->has('error'))
<div class="toast show" style="margin-right: auto;margin-left: auto">
    <div class="toast-header" style="color:red">
        <div style="width: 90%"> ERROR </div>
        <button style="width: 10%" type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body"style="color:red">
        {{session()->get('error')}}
    </div>
</div>
@endif
