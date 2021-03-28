@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h4>IP</h4>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div id="addIp" class="card card-primary col-4" style="margin-left: 15px;
                        padding-top: 8px;
                        height: 230px;
                        display: block;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New IP</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update IP</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" id="addip">
                        @csrf

                        <div class="card-body" style="position: relative">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">IP</label>
                                <input id="ip" name="ip" type="text" class="form-control"
                                    placeholder="Ex: 0000.00.00.00" />
                            </div>
                            <input type="hidden" id="user_id" name="id">
                        </div>

                    </form>
                    <button id="submit" style="width: 100%" onclick="addIp()" class="btn btn-primary">
                        Submit
                    </button>
                </div>

                <div class="card col-7" style="margin-left: 50px;">
                    <div class="card-header">
                        <h3 class="card-title">All IP is here</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">
                                        SI#
                                    </th>
                                    <th class="sorting_asc">
                                        IP
                                    </th>
                                    <th class="sorting">
                                        Action
                                    </th>
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
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $i }}</td>
                                        <td class="sorting_1">{{ $user->company_url }}</td>
                                        <td style="display: inline-flex;">
                                            <button style="margin-right: 5px;" href="#"
                                                class="btn btn-primary btn-xs" onclick="editIp({{ $user->id }})">
                                                Unblock
                                            </button>
                                            {{-- <button class="btn btn-danger btn-xs" onclick="deleteIp({{ $user->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>

@section('js')
    <script>
        $(function () {
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

        function editIp(ip) {
            $.ajax({
                url: "{{ route('domain.update') }}",
                method: "POST",
                data: {
                    '_token':"{{ csrf_token() }}",
                    id:id
                }
                success: function(response) {

                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'IP update successfull'
                    })


                },
                error: function() {
                    swal("Wrong data", {
                        icon: "error"
                    });
                }
            })
        }

        function closeForm() {
            $("#cardHeader").css({
                'color': '#fff',
                'background-color': '#007bff',
                'border-color': '#28a745',
                'box-shadow': 'none',
            });
            $('#ip_id').val('');
            $('#ip').val('');
            $("#updateIp").attr('id', 'addip');
            $("#update").hide();
            $("#submit").show();
            $("#cardTitle-add").show();
            $("#cardTitle-update").hide();
        }

        function addIp() {
            $.ajax({
                url: "{{ route('domain.update') }}",
                method: "POST",
                data: new FormData(document.getElementById("addip")),
                enctype: 'multipart/form-data',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    window.location.reload();
                    $("#loading").hide();
                    Toast.fire({
                        icon: 'success',
                        title: 'IP update successfull'
                    })
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Wrong data entry.'
                    })
                }
            })
        };

    </script>
@endsection
@endsection
