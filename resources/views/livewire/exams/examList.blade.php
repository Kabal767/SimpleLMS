<div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card-body">

        <!-- We encapsulate in a row for correct padding of the input-group-->
        <div class="row m-3">

            <div class="input-group">
            </div>

        </div>

    </div>
    
    <div class="card-footer">
    </div>

</div>