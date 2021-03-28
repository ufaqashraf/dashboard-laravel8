@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h4>Domain</h4>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div id="addDomain" class="card card-primary col-4" style="margin-left: 15px;
                        padding-top: 8px;
                        height: 230px;
                        display: block;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Domain</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Domain</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" id="adddo">
                        @csrf

                        <div class="card-body" style="position: relative">
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Domain Name</label>
                                <input id="domain" name="domain" type="text" class="form-control"
                                    placeholder="Ex: domain.com" />
                            </div>
                            <input type="hidden" id="do_id" name="id">
                        </div>

                    </form>
                    <button id="submit" style="width: 100%" onclick="addDomain()" class="btn btn-primary">
                        Submit
                    </button>

                    <button id="update" style="width: 100%;display:none;" onclick="updateDomain()" class="btn btn-success">
                      Submit
                    </button>
                </div>

                <div class="card col-7" style="margin-left: 50px;">
                    <div class="card-header">
                        <h3 class="card-title">All Domain is here</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">
                                        SI#
                                    </th>
                                    <th class="sorting_asc">
                                        Domain Name
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
                                                class="btn btn-danger btn-xs" onclick="editDom(`{{ $user->company_url }}`)">
                                                Unblock
                                            </button>
                                            {{-- <button class="btn btn-danger btn-xs" onclick="deleteDom({{ $user->id }})">
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#example3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            dom: "Bfrtip",
            buttons: ["excel", "pdf", "print", "excelHtml5"]
        });
    });

</script>
    <script>
        // $(function () {
        // $("#example1").DataTable();
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        // });
        // });

        function editDom(domain) {
            $.ajax({
                url: "{{ route('domain.update') }}",
                method: "POST",
                data: {
                    "_token":"{{ csrf_token() }}",
                    domain:domain
                },
                success: function(response) {

                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Domain unblock successfull'
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
            $('#do_id').val('');
            $('#domain').val('');
            $("#updateDo").attr('id', 'adddo');
            $("#update").hide();
            $("#submit").show();
            $("#cardTitle-add").show();
            $("#cardTitle-update").hide();
        }

        function addDomain() {
            $.ajax({
                url: "{{ route('domain.update') }}",
                method: "POST",
                data: new FormData(document.getElementById("adddo")),
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
                        title: 'Domain created successfull'
                    })
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Domain not match!'
                    })
                }
            })
        };

        function updateDomain() {
            $.ajax({
                url: "{{ route('domain.update') }}",
                method: "POST",
                data: new FormData(document.getElementById("updateDo")),
                enctype: 'multipart/form-data',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {

                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Domain update successfull'
                    })


                },
                error: function() {
                    swal("Wrong data", {
                        icon: "error"
                    });
                }
            })
        };


    </script>
@endsection
@endsection
