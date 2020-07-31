@if(session()->has('messageDanger'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('messageDanger') }}
    </div>
@endif
@if(session()->has('messageSuccess'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('messageSuccess') }}
    </div>
@endif