@if( $errors->has() || Session::has('status'))
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-dismissable alert-danger">

                @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach

                @if(Session::has('message'))
                    {{ Session::get('message') }}
                @endif

                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            </div>
        </div>
    </div>
</div>
@endif


<div class="container container-message" style="display: none;">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-dismissable alert-success">
                <p id="message"></p>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            </div>
        </div>
    </div>
</div>
