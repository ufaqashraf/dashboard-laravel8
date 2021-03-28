
@extends('layouts.backend.app')
<style>
    .loading-spin {
        position: absolute;
        z-index: 9999;
        left: 21%;
        top: 37%;
        display: none;
    }

    .loading-spin img {
        height: 100px;
        width: 100px;
    }

</style>
@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-2">
                        <h4>API key</h4>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                @if ($data->type == "super_admin")
                <div class="card col-12">
                    <div class="card-header">
                        <h3 class="card-title">API key</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI #</th>
                                    <th>Private Key</th>
                                    <th>Public Key</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($users as $user)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$user->private_test_key}}</td>
                                    <td>{{$user->public_test_key}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->f_name}}</td>
                                    <td>
                                        @if ($user->status == 0)
                                            <span style="cursor: pointer" onclick="changeStatus({{$user->id}})" class="badge badge-danger">Inactive</span>
                                        @else
                                            <span style="cursor: pointer" onclick="changeStatus({{$user->id}})" class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="loading-spin" id="spin">
                        <img src="{{ asset('/loading.gif') }}" alt="">
                    </div>
                    <div id="planForm" class="card" style="width: 50% !important;position: relative;">
                        <div class="card-header" style="background:#28a745">
                            <h3 class="card-title" style="color: #fff">Api Key</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="edit" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Private Key</label>
                                    <input readonly name="private_key" value="{{optional($data)->private_test_key}}" type="text" class="form-control" placeholder="Private Key" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Public Key</label>
                                    <input readonly value="{{optional($data)->public_test_key}}" name="public key" type="text" class="form-control"
                                        placeholder="Enter public key" />
                                </div>
                            </form> 
                            <div class="form-group" style="width: 100%;margin-bottom: -8px;">
                                <button type="button" onclick="edit()" style="width: 100%" class="btn btn-success">Generate New Api key</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
</script>

<script>
    function edit(){
        $("#spin").show();
        $("#planForm").css({
            'opacity': '.4'
        });
        $.ajax({
            url: "{{route('edit.key')}}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}"
            },
            success: function(res) {
                $("#spin").hide();
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Key generate successfull.'
                })
            },
            error: function(res) {
                $("#spin").hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Field required'
                })
            }
        })
    }

    function changeStatus(id){
        $.ajax({
            url: "{{route('change.user.status')}}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}",
                'id':id
            },
            success: function(res) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'User active successfull.'
                })
            },
            error: function(res) {
                if (res.status == 401) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'User Inactive successfull.'
                    })
                }else{

                    Swal.fire({
                        icon: 'error',
                        title: 'Field required'
                    })
                }
            }
        })
    }

</script>

@endsection
@endsection
