@if(session()->has('message'))
    <div class="alert alert-{{ session()->get('message-type', 'info') }} text-center" role="alert">
        {{ session()->get('message') }}
    </div>
@endif