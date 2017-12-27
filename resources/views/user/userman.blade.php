
@extends('user.index')

@section('title')
    Users -
@endsection


@section('stylesheets')

    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/datatables-net/media/css/dataTables.bootstrap4.min.css')}}"> <!-- original -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/libs/datatables-net/datatables.min.css')}}"> <!-- customization -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/libs/select2/css/select2.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/assets/styles/libs/select2/select2.min.css')}}"> <!-- Customization -->
    @endsection
@section('page')
    <div class="ks-column ks-page">
        <div class="ks-header">
            <section class="ks-title">
                <h3>Users</h3>

                <div class="ks-controls">
                    <nav class="breadcrumb ks-default">
                        <a class="breadcrumb-item ks-breadcrumb-icon" href="/">
                            <span class="la la-home ks-icon"></span>
                        </a>
                        <a href="#" class="breadcrumb-item">Dashboard</a>
                        <span class="breadcrumb-item active" href="#">User Managements</span>
                    </nav>

                    <button class="btn btn-primary-outline ks-light ks-content-nav-toggle" data-block-toggle=".ks-content-nav > .ks-nav">Menu</button>
                </div>
            </section>
        </div>

        <div class="ks-content">
            <div class="ks-body ks-content-nav">
                <div class="ks-nav-body">
                    <div class="ks-nav-body-wrapper">
                        <div class="container-fluid">
                            <table id="ks-datatable" class="table table-striped table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Joined</th>
                                    <th>Last Active</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Joined</th>
                                    <th>Last Active</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($users as $user)

                                        <tr>
                                            <td><input type="checkbox" name="sel_user" value="{{$user[0]}}"></td>
                                            <td>{{$user[1]}}</td>
                                            <td>{{$user[2]}}</td>
                                            <td>{{$user[3]}}</td>
                                            <td>{{$user[4]}}</td>
                                            <td>{{$user[5]}}</td>
                                        </tr>

                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('scripts')
    <script src="{{asset('user/libs/datatables-net/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('user/libs/datatables-net/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('user/libs/select2/js/select2.min.js')}}"></script>
    <script type="application/javascript">
        (function ($) {
            $(document).ready(function() {
                $('#ks-datatable').DataTable({
                    "initComplete": function () {
                        $('.dataTables_wrapper select').select2({
                            minimumResultsForSearch: Infinity
                        });
                    }
                });
            });
        })(jQuery);
    </script>

    @endsection