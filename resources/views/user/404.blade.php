
@extends('user.index')

@section('title')
    Not Found -
@endsection


@section('page')
<div class="ks-column ks-page">
    <div class="ks-content">
        <div class="ks-body ks-error-page">
            <div class="ks-error-code">404</div>
            <div class="ks-error-description">Sorry, but this page doesn't exists</div>
            <a href="{{asset(env('ADMIN_PATH').'/')}}" class="btn btn-primary ks-light">Go to the main page</a>
        </div>
    </div>
</div>
@endsection