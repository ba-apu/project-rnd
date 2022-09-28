@if (count($errors) > 0)
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Request::session()->exists('status'))
<div class="alert alert-{{ Request::session()->pull('status') }}">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul class="list-unstyled">
        <li>{!! Request::session()->pull('message') !!} </li>
    </ul>    
</div>
@endif