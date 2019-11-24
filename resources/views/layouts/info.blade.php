@if( session()->has('info'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success" role="alert">
                {{ session('info') }}
            </div>    
        </div>    
    </div>
@endif