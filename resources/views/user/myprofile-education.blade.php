
@extends('user.myprofile')

@section('title')
    Education Settings -
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
                    <a class="nav-link " href="{{asset(env('ADMIN_PATH').'/'.'myprofile/experience')}}">Experience</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/education')}}">Education</a>
                </li>
            </ul>
        </div>
        <form class="ks-form ks-education"> <!-- ks-uppercase ks-light -->
            <h3 class="ks-header">Education</h3>

            <div class="ks-group">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Year Started</label>
                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                    <input id="input-group-icon-text" type="text" class="form-control ks-datepicker">
                                    <span class="icon-addon">
                                                                <span class="la la-calendar-o"></span>
                                                            </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Year Ended</label>
                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                    <input type="text" class="form-control ks-datepicker" placeholder="">
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
                            <span class="custom-control-description">Currently enrolled</span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Degree</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col-lg-6">
                                <label>Field of Study</label>
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
                    <span class="ks-text">Add school</span>
                </button>
            </div>
        </form>
    </div>
    @endsection


@section('scripts')
    <script src="{{asset('user/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $(".ks-datepicker").flatpickr();
            });
        })(jQuery);
    </script>

@endsection
