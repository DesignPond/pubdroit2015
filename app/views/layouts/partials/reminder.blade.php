@if(Session::has('status') || Session::has('error'))
    <?php
        $style   = (Session::has('error') ? 'danger' : 'success');
        $message = (Session::has('error') ? Session::get('error') : Session::get('status'));
    ?>
    <div class="alert alert-dismissable alert-{{$style}}">
        {{  $message }}<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    </div>
@endif