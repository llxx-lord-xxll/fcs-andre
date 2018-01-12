
@extends('user.index')

@section('title')
    {{$u->name}}'s Profile -
@endsection

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{asset('user/libs/datatables-net/media/css/dataTables.bootstrap4.min.css')}}"> <!-- original -->
<link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/libs/datatables-net/datatables.min.css')}}"> <!-- customization -->
<link rel="stylesheet" type="text/css" href="{{asset('user/libs/swiper/css/swiper.min.css')}}"> <!-- original -->
<link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/widgets/tables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/profile/customer.min.css')}}">
@endsection

@section('page')
<div class="ks-column ks-page">
    <div class="ks-header">
        <section class="ks-title">
            <h3>{{$u->name}}'s Profile</h3>
        </section>
    </div>

    <div class="ks-content">
        <div class="ks-body ks-profile">
            <div class="ks-header">
                <div class="ks-user">
                    <img src="{{asset( (new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar($u->id) )}}" class="ks-avatar" width="100" height="100">
                    <div class="ks-info">
                        <div class="ks-name">{{$u->name}}</div>
                        @if(\App\users::find($u->id)->getMeta('city')!=null)
                            <div class="ks-description">{{\App\users::find(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->getMeta('gender')}}</div>
                            <div class="ks-description">Lives in {{\App\users::find($u->id)->getMeta('city')}}, {{\App\users::find($u->id)->getMeta('country')}}</div>
                        @endif
                        <div>
                            <a class="btn btn-success" href="{{asset(env('ADMIN_PATH').'/'."messages/create?user=".\App\users::find($u->id)->getMeta('username') )}}">Send Message</a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light">
                <ul class="nav ks-nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-toggle="tab" data-target="#overview" aria-expanded="true">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#contacts" aria-expanded="false">Educations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#orders" aria-expanded="false">Works &amp; Experiences</a>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#wish-list" aria-expanded="false">Wish list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#storecredit" aria-expanded="false">Store credit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#returns" aria-expanded="false">Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#reward-points" aria-expanded="false">Reward points</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab" data-target="#settings" aria-expanded="false">Settings</a>
                    </li>-->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="ks-overview-tab">
                            <div class="row">
                                <div class="col-xl-9 ks-tables-container">
                                    <div class="card panel panel-default ks-information ks-light">
                                        <h5 class="card-header">
                                            <span class="ks-text">Overview</span>
                                        </h5>
                                        <div class="card-block">
                                           <div class="ks-description">
                                               {{\App\users::find($u->id)->getMeta('headline')}}
                                           </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card panel panel-default ks-information ks-light">
                                        <h5 class="card-header">
                                            <span class="ks-text">Contact Info</span>
                                            <a href="#" class="btn btn-primary-outline ks-light ks-no-text"><span class="la la-pencil ks-icon"></span></a>
                                        </h5>
                                        <div class="card-block">
                                            <table class="ks-table-description">
                                                <tbody>
                                                @if(\App\users::find($u->id)->getMeta('mob') !=null)
                                                <tr>
                                                    <td class="ks-icon">
                                                        <span class="la la-mobile-phone"></span>
                                                    </td>
                                                    <td class="ks-text">
                                                        {{\App\users::find($u->id)->getMeta('mob')}}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td class="ks-icon ks-fs-14">
                                                        <span class="la la-envelope"></span>
                                                    </td>
                                                    <td class="ks-text">
                                                        <a href="mailto:{{$u->email}}">{{$u->email}}</a>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <div class="card panel panel-default ks-information ks-light">
                                        <h5 class="card-header">
                                            <span class="ks-text">Additional Info</span>
                                            <a href="#" class="btn btn-primary-outline ks-light ks-no-text"><span class="la la-pencil ks-icon"></span></a>
                                        </h5>
                                        <div class="card-block">
                                            <div class="ks-info-list">
                                                <div class="ks-item">
                                                    <div class="ks-name">Referred From</div>
                                                    <div class="ks-text">Google Search</div>
                                                </div>
                                                <div class="ks-item">
                                                    <div class="ks-name">Business Sector</div>
                                                    <div class="ks-text">Retail</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="contacts" role="tabpanel" aria-expanded="false">


                            @foreach(\App\users::find($u->id)->getByMeta('education')->get() as $edu)
                            <div class="card panel panel-default ks-information ks-light">

                                <div class="card-block ks-payment-methods">
                                <div class="ks-box">
                                    <div class="col-lg-10">
                                        <h4 class="ks-title">{{json_decode($edu->value,true)['institue']}}</h4>
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                    <span class="ks-text">
                                    @if(json_decode($edu->value,true)['to'] != "")
                                            Studied {{json_decode($edu->value,true)['degree']}} in {{json_decode($edu->value,true)['group']}}
                                        @else
                                            Studies {{json_decode($edu->value,true)['degree']}} in {{json_decode($edu->value,true)['group']}}
                                        @endif
                                    </span>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="ks-text">{{\Carbon\Carbon::parse(json_decode($edu->value,true)['from'])->format('d M, Y')}} </span>
                                                @if(json_decode($edu->value,true)['to'] != "")
                                                    <span class="ks-text"> to {{\Carbon\Carbon::parse(json_decode($edu->value,true)['to'])->format('d M, Y')}}</span>
                                                @endif
                                            </div>

                                        </div>

                                        @if(json_decode($edu->value,true)['desc'] != "")
                                            <div class="col-lg-12">
                                <span class="ks-description" style="padding-top: 10px">
                                    <strong>Description</strong>
                                    <p>{{json_decode($edu->value,true)['desc']}}</p>
                                </span>
                                            </div>
                                        @endif

                                    </div>


                                </div>
                                </div>

                            </div>
                        @endforeach


                    </div>
                    <div class="tab-pane" id="orders" role="tabpanel" aria-expanded="true">

                                @foreach(\App\users::find($u->id)->getByMeta('work')->get() as $work)
                            <div class="card panel panel-default ks-information ks-light">
                                <div class="card-block ks-payment-methods">
                                    <div class="ks-payment-method">
                                        <div class="col-lg-10">
                                            <h4 class="ks-title">{{json_decode($work->value,true)['company']}}</h4>
                                            <div class="col-lg-12">
                                                <span class="ks-text">{{json_decode($work->value,true)['title']}} </span>
                                                <span class="ks-text">
                                    @if(json_decode($work->value,true)['to'] != "")
                                                        from
                                                    @else
                                                        since
                                                    @endif
                                </span>
                                                <span class="ks-text">{{\Carbon\Carbon::parse(json_decode($work->value,true)['from'])->format('d M, Y')}}</span>
                                                @if(json_decode($work->value,true)['to'] != "")
                                                    <span class="ks-text"> to {{\Carbon\Carbon::parse(json_decode($work->value,true)['to'])->format('d M, Y')}}</span>
                                                @endif
                                            </div>
                                            @if(json_decode($work->value,true)['desc'] != "")
                                                <div class="col-lg-12">
                                <span class="ks-description" style="padding-top: 10px">
                                    <strong>Description</strong>
                                    <p>{{json_decode($work->value,true)['desc']}}</p>
                                </span>
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                        </div>
                            @endforeach



                    </div>

                    <!--
                    <div class="tab-pane" id="wish-list" role="tabpanel" aria-expanded="false">
                        Content 1
                    </div>
                    <div class="tab-pane" id="storecredit" role="tabpanel" aria-expanded="false">
                        Content 2
                    </div>
                    <div class="tab-pane" id="returns" role="tabpanel" aria-expanded="true">
                        Content 3
                    </div>
                    <div class="tab-pane" id="reward-points" role="tabpanel" aria-expanded="false">
                        Content 1
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel" aria-expanded="false">
                        Content 1
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection