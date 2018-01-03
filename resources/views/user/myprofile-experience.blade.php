
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
        <div class="ks-form ks-billing"> <!-- ks-uppercase ks-light -->
            <h3 class="ks-header">Work &amp; Experiences</h3>

            <div class="card panel panel-default ks-information ks-light">
                <h5 class="card-header">
                    <button class="btn btn-primary-outline  ks-light" data-toggle="modal" data-target=".bd-example-modal-horizontal-form">Add New</button>

                </h5>
                <div class="card-block ks-payment-methods">

                    @foreach(\App\users::find(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())->getByMeta('work')->get() as $work)

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

                        <div class="col-lg-2 pull-right">
                           <!-- <button type="button" class="btn btn-primary ks-light ks-no-text"><span class="la la-pencil ks-icon edit-work"></span></button> -->
                            <button type="button" class="btn btn-primary ks-light ks-no-text" data-content="{{$work->id}}"><span class="la la-trash-o ks-icon del-work"></span></button>
                        </div>



                    </div>

                    @endforeach
                    <!--
                    <div class="ks-manage-payment">
                        <div class="ks-header">New payment method</div>
                        <form>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>Card Number</label>
                                    <input type="text" class="form-control" placeholder="0000-0000-0000-0000">
                                </div>
                                <div class="col-lg-9">
                                                            <span class="ks-card-type ks-active">
                                                                <img src="assets/img/payment/visa.png">
                                                            </span>
                                    <span class="ks-card-type">
                                                                <img src="assets/img/payment/ma.png">
                                                            </span>
                                    <span class="ks-card-type">
                                                                <img src="assets/img/payment/ms.png">
                                                            </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label>CVV <span class="la la-question-circle ks-text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top"></span></label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Exp. Month</label>
                                            <select class="form-control ks-selectpicker select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="">Month</option>
                                                <option value="01">January (01)</option>
                                                <option value="02">February (02)</option>
                                                <option value="03">March (03)</option>
                                                <option value="04">April (04)</option>
                                                <option value="05">May (05)</option>
                                                <option value="06">June (06)</option>
                                                <option value="07">July (07)</option>
                                                <option value="08">August (08)</option>
                                                <option value="09">September (09)</option>
                                                <option value="10">October (10)</option>
                                                <option value="11">November (11)</option>
                                                <option value="12">December (12)</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 180px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-wjgq-container"><span class="select2-selection__rendered" id="select2-wjgq-container" title="Month">Month</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Exp. Year</label>
                                            <select class="form-control ks-selectpicker select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="">Year</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 180px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-kgjm-container"><span class="select2-selection__rendered" id="select2-kgjm-container" title="Year">Year</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Save card</button>
                                <a href="#" class="ks-cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                    -->
                </div>
            </div>


        </div>

    </div>
    <div class="modal fade bd-example-modal-horizontal-form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 40%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Work</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form class="ks-form ks-experience" id="form_add_xp"> <!-- ks-uppercase ks-light -->
                            {{csrf_field()}}
                            <div class="ks-group">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Company</label>
                                        <input type="text" class="form-control" placeholder="" name="company">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="" name="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>From</label>
                                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                                    <input name="from" id="input-group-icon-text" type="text" class="form-control ks-datepicker flatpickr-input" readonly="readonly">
                                                    <span class="icon-addon">
                                                                <span class="la la-calendar-o"></span>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>To</label>
                                                <div class="input-icon icon-right icon icon-lg icon-color-primary">
                                                    <input name="to" type="text" class="form-control ks-datepicker flatpickr-input" readonly="readonly">
                                                    <span class="icon-addon">
                                                                <span class="la la-calendar-o"></span>
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="padding-top: 5px">
                                                <label id="xpstatus" class="custom-control custom-checkbox">
                                                    <input name="status" type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">I currently work here</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Location</label>
                                                <input name="city" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control" rows="4" placeholder="Type something..."></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="ks-group">
                                <button type="submit" class="btn btn-success" name="xpsubmit" value="add">
                                    <span class="la la-plus ks-icon"></span>
                                    <span class="ks-text">Add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    <script src="{{asset('user/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $(".ks-datepicker").flatpickr();
            });
        })(jQuery);


        (function ($) {
            $(document).ready(function() {
                var adxp = $('#form_add_xp');



                adxp.validate({
                    onsubmit:true,
                    errorElement: 'span', //default input error message container
                    errorClass: 'help-block help-block-error', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    ignore: "",  // validate all fields including form hidden input
                    rules: {
                        mob: {
                            required: true
                        },
                        country: {
                            required: true
                        },
                        title: {
                            required: true
                        }
                    },
                    errorPlacement: function (error, element) { // render error placement for each input type
                        var cont = $(element).parent('.div');
                        if (cont) {
                            cont.after(error);
                        } else {
                            element.after(error);
                        }
                    },

                    highlight: function (element) { // hightlight error inputs
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                    },

                    unhighlight: function (element) { // revert the change done by hightlight
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set error class to the control group
                    },

                    success: function (label) {
                        label.closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    },

                    submitHandler: function (form) {

                        $.post('', adxp.serialize()).done(function (data) {
                            var obj = jQuery.parseJSON( data );
                            if(obj[0].status === 'success')
                            {
                                new Noty({
                                    text: obj[0].msg,
                                    type   : 'success',
                                    theme  : 'mint',
                                    layout : 'bottomRight',
                                    timeout: 2000
                                }).show();
                                window.setTimeout(function () {
                                    window.location.reload();
                                },2000)
                            }
                            else
                            {
                                new Noty({
                                    text: obj[0].msg,
                                    type   : 'error',
                                    theme  : 'mint',
                                    layout : 'bottomRight',
                                    timeout: 2000
                                }).show();
                            }
                        });


                        $('.bd-example-modal-horizontal-form').modal('hide');

                    }
                });


                $(document).on('submit','#form_add_xp',function(e){
                    e.preventDefault();
                });
                $(document).on('click','.del-work',function(e){
                    $.post( "", {"xpsubmit":"del","content":$(this).parent().attr('data-content')},function( data ) {
                        var obj = jQuery.parseJSON( data );
                        if(obj[0].status === 'success')
                        {
                            new Noty({
                                text: obj[0].msg,
                                type   : 'success',
                                theme  : 'mint',
                                layout : 'bottomRight',
                                timeout: 2000
                            }).show();
                            window.setTimeout(function () {
                                window.location.reload();
                            },2000)
                        }
                        else
                        {
                            new Noty({
                                text: obj[0].msg,
                                type   : 'error',
                                theme  : 'mint',
                                layout : 'bottomRight',
                                timeout: 2000
                            }).show();
                        }
                    });
                });

                $(document).on('click','#form_add_xp input[name=status]',function(e){
                    if (this.checked == true)
                    {
                        $('#form_add_xp input[name=to]').parent().parent().hide();

                    }
                    else
                    {
                        $('#form_add_xp input[name=to]').parent().parent().show();
                    }
                });

            });
        })(jQuery);

    </script>



@endsection
