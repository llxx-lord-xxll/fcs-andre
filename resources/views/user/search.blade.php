
@extends('user.index')

@section('title')
    Search Result -
@endsection


@section('page')
<div class="ks-column ks-page">
    <div class="ks-header">
        <section class="ks-title">
            <h3>Search result for {{app('request')->input('where')}}</h3>
        </section>
    </div>

    <div class="ks-content">
        <div class="ks-body">
            <div class="ks-nav-body-wrapper">
                <div class="container-fluid ks-rows-section search-panel">
                    <div class="row">
                        @if(count($arrProf)<=0)
                            <div class="col-lg-12">
                                No matched result found
                            </div>
                        @else
                            @foreach($arrProf as $profile)

                                <div class="col-lg-2">
                                    <div class="card">
                                        <img class="card-img-top embed-responsive" src=" {{asset($profile['avatar'] )}}" alt=" {{$profile['name']}}">
                                        <div class="card-block">
                                            <h5 class="card-title"> {{$profile['name']}}</h5>
                                            <p class="card-text">{{$profile['headline']}}</p>
                                            <a href="{{asset(env('ADMIN_PATH').'/'.'+/'.$profile['id'])}}" class="btn btn-success"><span class="la la-align-center la-comment" style="font-size: 20px"></span></a>
                                            <a href="{{asset(env('ADMIN_PATH').'/'.'+/'.$profile['id'])}}" class="btn btn-primary"><span class="la la-align-center la-eye" style="font-size: 20px"></span></a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

