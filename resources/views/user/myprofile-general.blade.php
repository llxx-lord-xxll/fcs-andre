
@extends('user.myprofile')

@section('title')
    General Settings -
@endsection

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/select2/css/select2.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/libs/select2/select2.min.css')}}"> <!-- Customization -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/profile/settings.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/widgets/upload.min.css')}}">
@endsection


@section('settings-tab')


    <div class="ks-settings-tab">
        <div class="ks-menu">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item">
                    <a class="nav-link active" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/general')}}">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/contact')}}">Contact Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/experience')}}">Experience</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset(env('ADMIN_PATH').'/'.'myprofile/education')}}">Education</a>
                </li>
            </ul>
        </div>
        <form class="ks-form ks-general"> <!-- ks-uppercase ks-light -->
            <h3 class="ks-header">
                General
            </h3>

            <div class="ks-manage-avatar ks-group">
                <img class="ks-avatar" src="{{asset((new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar())}}" width="100" height="100">
                <div class="ks-body">
                    <div class="ks-header">Your Avatar</div>
                    <div class="ks-description">
                        A square image 100x100px is recommended
                    </div>
                    <div class="ks-controls">

                        <button class="btn btn-primary ks-btn-file">
                            <span class="la la-cloud-upload ks-icon"></span>
                            <span class="ks-text">Upload Image</span>
                            <input id="ks-file-upload-widget-input" type="file" name="dp[]" data-url="">
                        </button>

                    </div>
                </div>
            </div>
            <div class="ks-group ks-linked-accounts">
                <div class="ks-header">Link account with another member</div>
                <div class="ks-body">
                    <span class="ks-linked-account">Your account linked with <span class="ks-name">Alex Frolov</span> <img class="ks-avatar" src="{{asset('user/assets/img/avatars/ava-3.png')}}" width="24" height="24"></span>
                    <a href="#">Unlink Account</a>
                </div>
            </div>
            <div class="ks-group ks-connect-with-social-accounts">
                <div class="ks-header">Connect with social accounts</div>
                <div class="ks-body">
                    <div class="ks-connect-with">
                        <button type="button" class="btn btn-danger">
                            <span class="la la-google ks-icon"></span> <span class="ks-text">Connect with Google</span>
                        </button>
                    </div>
                    <div class="ks-connect-with ks-connected">
                        <button type="button" class="btn btn-primary-outline ks-light">
                            <span class="la la-facebook ks-icon"></span>
                            <span class="text ks-text">Connected as <span class="ks-name">Stephen Bates</span></span>
                        </button>
                        <a href="#">Disconnect</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endsection

@section('scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.2/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.2/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.2/js/jquery.fileupload.js"></script>


    <script type="text/javascript">

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $(function () {
            'use strict';
           /* $('#ks-file-upload-widget-input').fileupload({
                dataType: 'json',
                add: function (e, data) {
                    $('.ks-btn-file>span.ks-text').text('Uploading...');
                    data.submit();
                },
                done: function (e, data) {
                    $('.ks-btn-file>span.ks-text').text('Upload Image');
                    console.log(data);
                },
                fail:function (e,data) {
                    console.log('Error:-');
                    console.log(data);
                    $('.ks-btn-file>span.ks-text').text('Upload Image');
                }
            });
            */

            $(function () {
                $('#ks-file-upload-widget-input').fileupload({
                    dataType: 'json',
                    add: function (e, data) {
                        $('.ks-btn-file>span.ks-text').text('Uploading...');
                        data.submit();
                    },
                    done: function (e, data) {
                        if (data.textStatus ==="success")
                        {
                            new Noty({
                                text: 'Image uploaded',
                                type   : 'success',
                                theme  : 'mint',
                                layout : 'topRight',
                                timeout: 2000
                            }).show();
                            window.setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        }
                        else
                        {
                            new Noty({
                                text: 'Uploading error! Please try again later.',
                                type   : 'error',
                                theme  : 'mint',
                                layout : 'topRight',
                                timeout: 2000
                            }).show();

                        }
                        $('.ks-btn-file>span.ks-text').text('Upload Image');


                    }
                });
            });


            // Upload images only


        });




    </script>
@endsection