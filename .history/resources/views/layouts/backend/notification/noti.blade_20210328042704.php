
@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-3">
                        <h4>Alert and Singnals</h4>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="card col-12">
                    <div class="card-header">
                        <h3 class="card-title">Alert and Singnals</h3>
                    </div>
                    <!-- /.card-header -->
                    @if ($data->type == "user")
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" style="margin-bottom:30px;">
                            <thead style="background: #7575c1 !important;color: white !important;">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Faild Rules</th>
                                    <th>Passed Rules</th>
                                    <th>Alert Type</th>
                                    <th>Alert Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead style="background: #7575c1 !important;color: white !important;">
                                <tr>
                                    <th>Headline</th>
                                    <th>Alert Description</th>
                                    <th>Alert Serverity
                                        <button type="button" class="btn btn-default btn-xs float-right dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu"role="menu">
                                            <a class="dropdown-item"href="javascript:void(0)" onclick="changeColor('low')">Low</a>
                                            <a class="dropdown-item"href="javascript:void(0)" onclick="changeColor('medium')">Medium</a>
                                            <a class="dropdown-item"href="javascript:void(0)" onclick="changeColor('high')">High</a>
                                        </div>
                                    </th>
                                    <th>IP</th>
                                    <th>User Location</th>
                                    <th>Serverity Color</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td id="color">test</td>
                                    <td>test</td>
                                     <td>
                                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead style="background: #7575c1 !important;color: white !important;">
                                <tr>
                                    <th>Headline</th>
                                    <th>Alert Description</th>
                                    <th>Alert Serverity
                                        <button type="button" class="btn btn-default btn-xs float-right dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu"role="menu">
                                            <a class="dropdown-item"href="javascript:void(0)" onclick="changeColor('low')">Low</a>
                                            <a class="dropdown-item"href="javascript:void(0)" onclick="changeColor('medium')">Medium</a>
                                            <a class="dropdown-item"href="javascript:void(0)" onclick="changeColor('high')">High</a>
                                        </div>
                                    </th>
                                    <th>IP</th>
                                    <th>User Location</th>
                                    <th>Serverity Color</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td id="color">test</td>
                                    <td>test</td>
                                     <td>
                                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-dark btn-xs"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

@section('js')

<script type="text/javascript">
    $(function() {
        $("#example3").DataTable();
        $('#example4').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    
    
    function changeColor(val){
        if(val == 'low'){
            $("#color").css({'background':"blue",'color':'white'});
        }else if(val == 'medium'){
            $("#color").css({'background':"orange",'color':'white'});
        }else if(val == "high"){
            $("#color").css({'background':"red",'color':'white'});
        }
    }
</script>

<script>


</script>

@endsection
@endsection
