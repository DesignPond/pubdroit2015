@if($errors->has())
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-dismissable alert-danger">
                @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
                @endforeach
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            </div>
        </div>
    </div>
</div>
@endif

@if(Session::has('status'))
<div class="container container-message">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-dismissable alert-{{  Session::get('status') }}">
                @if(Session::has('message'))
                {{  Session::get('message') }}
                @endif
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            </div>
        </div>
    </div>
</div>
@endif