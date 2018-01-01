
@extends('user.myprofile')

@section('title')
    Experience Settings -
@endsection


@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/select2/css/select2.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/libs/select2/select2.min.css')}}"> <!-- Customization -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/profile/settings.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/flatpickr/flatpickr.min.css')}}"> <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/libs/flatpickr/flatpickr.min.css')}}"> <!-- customization -->
@endsection

@section('settings-tab')
    <div class="ks-settings-tab">
        <div class="ks-menu">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item">
                    <a class="nav-link " href="{{asset(env('ADMIN_PATH').'/'.'myprofile/general')}}">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/contact')}}">Contact Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/experience')}}">Experience</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/education')}}">Education</a>
                </li>
            </ul>
        </div>
        <form class="ks-form ks-experience"> <!-- ks-uppercase ks-light -->
            <h3 class="ks-header">Experience</h3>

            <div class="ks-group">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Company</label>
                        <input type="text" class="form-control" placeholder="" value="KOSMO LLC">
                    </div>
                    <div class="col-lg-4">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="" value="Product Designer">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>From</label>
                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                    <input id="input-group-icon-text" type="text" class="form-control ks-datepicker">
                                    <span class="icon-addon">
                                                                <span class="la la-calendar-o"></span>
                                                            </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>To</label>
                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                    <input type="text" class="form-control ks-datepicker">
                                    <span class="icon-addon">
                                                                <span class="la la-calendar-o"></span>
                                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="custom-control custom-checkbox ks-fh-control-position-fix">
                            <input type="checkbox" class="custom-control-input" checked>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">I currently work here</span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col-lg-6">
                                <label>State/Province</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Description</label>
                        <textarea class="form-control" rows="4" placeholder="Type something..."></textarea>
                    </div>
                </div>
                <div class="form-group ks-remove-position">
                    <button type="button" class="btn btn-danger-outline ks-light">
                        <span class="la la-trash ks-icon"></span>
                        <span class="text ks-text">Remove this position</span>
                    </button>
                </div>
            </div>

            <div class="ks-group">
                <button type="button" class="btn btn-success">
                    <span class="la la-plus ks-icon"></span>
                    <span class="ks-text">Add experience</span>
                </button>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script src="libs/flatpickr/flatpickr.min.js"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $(".ks-datepicker").flatpickr();
            });
        })(jQuery);
    </script>

@endsection
