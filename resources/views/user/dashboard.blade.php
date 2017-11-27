
@extends('user.index')

@section('title')
    Dashboard -
    @endsection

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/kosmo/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/fonts/weather/css/weather-icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/c3js/c3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/noty/noty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/widgets/payment.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/widgets/panels.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/dashboard/tabbed-sidebar.min.css')}}">
    @endsection

@section('page')
    <div class="ks-column ks-page">
        <div class="ks-header">
            <section class="ks-title-and-subtitle">
                <div class="ks-title-block">
                    <h3 class="ks-main-title">Dashboard</h3>
                    <div class="ks-sub-title">All the informations in brief at once</div>
                </div>

            </section>
        </div>

        <div class="ks-content">
            <div class="ks-body">
                <div class="ks-dashboard-tabbed-sidebar">
                    <div class="ks-dashboard-tabbed-sidebar-widgets">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card ks-card-widget ks-widget-payment-card-rate-details">
                                    <h5 class="card-header">
                                        Exchange Rates

                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-card-widget-datetime">
                                            These rates are for the 24-hour period ending <span class="ks-text-bold">Wednesday, Feb 8, 2017</span>
                                            23:00 WAT
                                        </div>

                                        <table class="table ks-payment-card-rate-details-table">
                                            <tr>
                                                <td class="ks-currency">
                                                    <img src="{{asset('user/assets/img/flags/24/United-States.png')}}" class="ks-flag">
                                                    US Dollar
                                                </td>
                                                <td class="ks-amount">320.00</td>
                                            </tr>
                                            <tr>
                                                <td class="ks-currency">
                                                    <img src="{{asset('user/assets/img/flags/24/United-Kingdom.png')}}" class="ks-flag">
                                                    Pounds Sterling
                                                </td>
                                                <td class="ks-amount">407.59</td>
                                            </tr>
                                            <tr>
                                                <td class="ks-currency">
                                                    <img src="{{asset('user/assets/img/flags/24/European-Union.png')}}" class="ks-flag">
                                                    Euro
                                                </td>
                                                <td class="ks-amount">347.83</td>
                                            </tr>
                                            <tr>
                                                <td class="ks-currency">
                                                    <img src="{{asset('user/assets/img/flags/24/Canada.png')}}" class="ks-flag">
                                                    Canadian Dollar
                                                </td>
                                                <td class="ks-amount">248.39</td>
                                            </tr>
                                            <tr>
                                                <td class="ks-currency">
                                                    <img src="{{asset('user/assets/img/flags/24/United-Arab-Emirates.png')}}" class="ks-flag">
                                                    U.A.E. Dirham
                                                </td>
                                                <td class="ks-amount">88.91</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="card ks-card-widget ks-widget-payment-earnings">
                                    <h5 class="card-header">
                                        Online Sales

                                        <div class="dropdown ks-control">
                                            <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="ks-icon la la-ellipsis-h"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Add Card</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-card-widget-datetime">
                                            Activity from <span class="ks-text-bold">Jan 4, 2017</span> to <span class="ks-text-bold">Jan 10, 2017</span>
                                        </div>

                                        <div class="ks-payment-earnings-amount">$2.37</div>
                                        <div class="ks-payment-earnings-amount-description">
                                            You’ve made $230 today
                                        </div>

                                        <div id="ks-next-payout-chart" class="ks-payment-earnings-chart"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card ks-card-widget ks-widget-payment-earnings">
                                            <h5 class="card-header">
                                                Online Bookings

                                                <div class="dropdown ks-control">
                                                    <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="ks-icon la la-ellipsis-h"></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Add Card</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </h5>
                                            <div class="card-block">
                                                <div class="ks-card-widget-datetime">
                                                    In <span class="ks-text-bold">12 Months</span>
                                                </div>

                                                <div class="ks-payment-earnings-amount">$23.54</div>
                                                <div class="ks-payment-earnings-amount-description">
                                                    Last month you’ve made $230
                                                </div>

                                                <div id="ks-total-earning-chart" class="ks-payment-earnings-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">

                                    </div>
                                    <div class="col-lg-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card ks-card-widget ks-widget-tasks-table">
                                    <h5 class="card-header">
                                        Upcomming Events

                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">View All Events</a>
                                            <a href="#" class="ks-control-icon">
                                                <span class="la la-plus-circle ks-icon"></span>
                                            </a>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <table class="table ks-table-tasks">
                                            <tr>
                                                <td class="ks-cell-checkbox">
                                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </td>
                                                <td>Create new prototype for the landing page</td>
                                                <td class="ks-text-right">
                                                    <span class="badge badge-cranberry">Tomorrow</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ks-cell-checkbox">
                                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </td>
                                                <td>Add new Google Analitics code to all files</td>
                                                <td class="ks-text-right">
                                                    <span class="badge badge-default"> in 3 days</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ks-cell-checkbox">
                                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </td>
                                                <td>Finish dashboard UI Kit</td>
                                                <td class="ks-text-right">
                                                    <span class="badge badge-default"> in 5 days</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ks-cell-checkbox">
                                                    <label class="custom-control custom-checkbox ks-checkbox ks-no-description ks-checkbox-success">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                    </label>
                                                </td>
                                                <td>Update parallax scroll on team page</td>
                                                <td class="ks-text-right">
                                                    <span class="badge badge-default"> in 7 days</span>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card ks-card-widget ks-widget-chart-orders">
                                    <h5 class="card-header">
                                        Ticket Sales &amp; Booking Overview

                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">January 2018</a>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-chart-orders-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-3">
                                <div class="card ks-card-widget ks-widget-payment-total-amount ks-purple-light">
                                    <h5 class="card-header">
                                        Total Delegates

                                        <div class="dropdown ks-control">
                                            <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="ks-icon la la-ellipsis-h"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Add Card</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-payment-total-amount-item-icon-block">
                                            <span class="ks-icon-combo-chart ks-icon"></span>
                                        </div>

                                        <div class="ks-payment-total-amount-item-body">
                                            <div class="ks-payment-total-amount-item-amount">
                                                <span class="ks-amount">103</span>
                                            </div>
                                            <div class="ks-payment-total-amount-item-description">
                                                Today status
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card ks-card-widget ks-widget-payment-total-amount ks-green-light">
                                    <h5 class="card-header">
                                        Total Speakers

                                        <div class="dropdown ks-control">
                                            <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="ks-icon la la-ellipsis-h"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Add Card</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-payment-total-amount-item-icon-block">
                                            <span class="la la-microphone ks-icon"></span>
                                        </div>

                                        <div class="ks-payment-total-amount-item-body">
                                            <div class="ks-payment-total-amount-item-amount">
                                                <span class="ks-amount">2612</span>
                                            </div>
                                            <div class="ks-payment-total-amount-item-description">
                                                Today status
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card ks-card-widget ks-widget-payment-total-amount ks-pink-light">
                                    <h5 class="card-header">
                                        Total Alumni

                                        <div class="dropdown ks-control">
                                            <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="ks-icon la la-ellipsis-h"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Add Card</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-payment-total-amount-item-icon-block">
                                            <span class="la la-user ks-icon"></span>
                                        </div>

                                        <div class="ks-payment-total-amount-item-body">
                                            <div class="ks-payment-total-amount-item-amount">
                                                <span class="ks-amount">23</span>
                                            </div>
                                            <div class="ks-payment-total-amount-item-description">
                                                Today status
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card ks-card-widget ks-widget-payment-total-amount ks-orange-light">
                                    <h5 class="card-header">
                                        Number of Chapters

                                        <div class="dropdown ks-control">
                                            <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="ks-icon la la-flag"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Add Card</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="ks-payment-total-amount-item-icon-block">
                                            <span class="la la-area-chart ks-icon"></span>
                                        </div>

                                        <div class="ks-payment-total-amount-item-body">
                                            <div class="ks-payment-total-amount-item-amount">
                                                <span class="ks-amount">67</span>
                                            </div>
                                            <div class="ks-payment-total-amount-item-description">
                                                Today status
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card ks-card-widget ks-payment-widget-table-and-map">
                                    <h5 class="card-header">
                                        Global Sales by Top Locations

                                        <div class="ks-controls">
                                            <a href="#" class="ks-control-link">This year</a>
                                        </div>
                                    </h5>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <table class="table ks-payment-widget-table-and-map-table">
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/United-States.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            The USA
                                                        </td>
                                                        <td class="text-right">
                                                            2.910
                                                        </td>
                                                        <td class="ks-amount">53.23%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/United-Kingdom.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            UK
                                                        </td>
                                                        <td class="text-right">
                                                            1.300
                                                        </td>
                                                        <td class="ks-amount">20.43%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/Canada.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            Canada
                                                        </td>
                                                        <td class="text-right">
                                                            760
                                                        </td>
                                                        <td class="ks-amount">10.35%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/France.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            France
                                                        </td>
                                                        <td class="text-right">
                                                            600
                                                        </td>
                                                        <td class="ks-amount">6.47%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/Germany.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            Germany
                                                        </td>
                                                        <td class="text-right">
                                                            530
                                                        </td>
                                                        <td class="ks-amount">4.91%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/Spain.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            Spain
                                                        </td>
                                                        <td class="text-right">
                                                            322
                                                        </td>
                                                        <td class="ks-amount">2.01%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ks-flag" width="20">
                                                            <img src="{{asset('user/assets/img/flags/24/Russia.png')}}" class="ks-flag">
                                                        </td>
                                                        <td>
                                                            Russia
                                                        </td>
                                                        <td class="text-right">
                                                            210
                                                        </td>
                                                        <td class="ks-amount">0.66%</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-7">
                                                <div id="ks-payment-widget-table-and-map-map" data-height="284"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card ks-widget-weather-and-datetime ks-sunny">
                                    <div class="ks-widget-weather-and-datetime-weather-block">
                                        <div class="ks-widget-weather-and-datetime-weather-block-amount">
                                            +24º
                                        </div>
                                        <div class="ks-widget-weather-and-datetime-weather-block-type">
                                            Sunny
                                        </div>
                                    </div>
                                    <div class="ks-widget-weather-and-datetime-datetime-block">
                                        <div class="ks-widget-weather-and-datetime-datetime-block-datetime">6:18 pm</div>
                                        <div class="ks-widget-weather-and-datetime-datetime-block-location">HONG KONG</div>
                                        <span class="ks-icon wi wi-day-cloudy"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card ks-widget-weather-and-datetime ks-cold">
                                    <div class="ks-widget-weather-and-datetime-weather-block">
                                        <div class="ks-widget-weather-and-datetime-weather-block-amount">
                                            -24º
                                        </div>
                                        <div class="ks-widget-weather-and-datetime-weather-block-type">
                                            Show
                                        </div>
                                    </div>
                                    <div class="ks-widget-weather-and-datetime-datetime-block">
                                        <div class="ks-widget-weather-and-datetime-datetime-block-datetime">6:18 pm</div>
                                        <div class="ks-widget-weather-and-datetime-datetime-block-location">HONG KONG</div>
                                        <span class="ks-icon wi wi-snow"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="card ks-widget-simple-weather-only ks-sunny">
                                    <span class="ks-icon wi wi-day-cloudy"></span>
                                    <div class="ks-widget-simple-weather-only-body">
                                        <div class="ks-widget-simple-weather-only-block-amount">
                                            +10º
                                        </div>
                                        <div class="ks-widget-simple-weather-only-location">
                                            HONG KONG
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="card ks-widget-simple-weather-only ks-cold">
                                    <span class="ks-icon wi wi-snow"></span>
                                    <div class="ks-widget-simple-weather-only-body">
                                        <div class="ks-widget-simple-weather-only-block-amount">
                                            -2º
                                        </div>
                                        <div class="ks-widget-simple-weather-only-location">
                                            HONG KONG
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script type="application/javascript">
        (function ($) {
            $(document).ready(function () {
                c3.generate({
                    bindto: '#ks-next-payout-chart',
                    data: {
                        columns: [
                            ['data1', 6, 5, 6, 5, 7, 8, 7]
                        ],
                        types: {
                            data1: 'area'
                        },
                        colors: {
                            data1: '#81c159'
                        }
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: false
                    },
                    point: {
                        show: false
                    },
                    axis: {
                        x: {show:false},
                        y: {show:false}
                    }
                });

                c3.generate({
                    bindto: '#ks-total-earning-chart',
                    data: {
                        columns: [
                            ['data1', 6, 5, 6, 5, 7, 8, 7]
                        ],
                        types: {
                            data1: 'area'
                        },
                        colors: {
                            data1: '#4e54a8'
                        }
                    },
                    legend: {
                        show: false
                    },
                    tooltip: {
                        show: false
                    },
                    point: {
                        show: false
                    },
                    axis: {
                        x: {show:false},
                        y: {show:false}
                    }
                });

                c3.generate({
                    bindto: '.ks-chart-orders-block',
                    data: {
                        columns: [
                            ['Sales', 150, 200, 220, 280, 400, 160, 260, 400, 300, 400, 500, 420, 500, 300, 200, 100, 400, 600, 300, 360, 600],
                            ['Booking', 350, 300,  200, 140, 200, 30, 200, 100, 400, 600, 300, 200, 100, 50, 200, 600, 300, 500, 30, 200, 320]
                        ],
                        colors: {
                            'Revenue': '#f88528',
                            'Profit': '#81c159'
                        }
                    },
                    point: {
                        r: 5
                    },
                    grid: {
                        y: {
                            show: true
                        }
                    }
                });

                var maplace = new Maplace({
                    map_div: '#ks-payment-widget-table-and-map-map',
                    controls_on_map: false
                });
                maplace.Load();
            });
        })(jQuery);
    </script>

    @endsection