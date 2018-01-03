
@extends('user.index')


@section('page')
    <div class="ks-column ks-page">
        <div class="ks-header">
            <section class="ks-title">
                <h3>Profile Settings</h3>
                <div class="ks-controls">
                    <button type="button" class="btn btn-primary-outline ks-light ks-profile-tabs-block-toggle" data-block-toggle=".ks-profile > .ks-tabs-container">Tabs</button>
                    <button type="button" class="btn btn-primary-outline ks-light ks-settings-menu-block-toggle" data-block-toggle=".ks-settings-tab > .ks-menu">Menu</button>
                </div>
            </section>
        </div>

        <div class="ks-content">
            <div class="ks-body ks-profile">
                <div class="ks-header">
                    <div class="ks-user">
                        <img src="{{asset((new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar())}}" class="ks-avatar" width="100" height="100">
                        <div class="ks-info">
                            <div class="ks-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                            <div class="ks-description">{{\App\users::find(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->getMeta('gender')}}</div>
                            <div class="ks-description">{{\App\users::find(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->getMeta('city')}}, {{\App\users::find(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->getMeta('country')}}</div>
                        </div>
                    </div>

                </div>
                <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator ks-full ks-light">
                    <ul class="nav ks-nav-tabs">
                        <!-- <li class="nav-item">
                             <a class="nav-link" href="#" data-toggle="tab" data-target="#overview" aria-expanded="true">Overview</a>
                         </li>



                         <li class="nav-item">
                             <a class="nav-link" href="#" data-toggle="tab" data-target="#contacts" aria-expanded="false">Contacts</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#" data-toggle="tab" data-target="#orders" aria-expanded="false">Orders</a>
                         </li>
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

                         -->

                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-toggle="tab" data-target="#settings" aria-expanded="false">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- <div class="tab-pane" id="overview" role="tabpanel" aria-expanded="false">
                             Content 1
                         </div>

                         <div class="tab-pane" id="contacts" role="tabpanel" aria-expanded="false">
                             Content 2
                         </div>
                         <div class="tab-pane" id="orders" role="tabpanel" aria-expanded="true">
                             Content 3
                         </div>
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
                         -->

                        <div class="tab-pane active" id="settings" role="tabpanel" aria-expanded="false">
                            @hasSection('settings-tab')
                            @yield('settings-tab')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection



