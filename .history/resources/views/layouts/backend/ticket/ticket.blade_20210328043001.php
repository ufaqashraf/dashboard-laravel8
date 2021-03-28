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
                    <div id="disableDiv" style="padding: 5px;
                                background-color: white;
                                border: 1px solid #ddd;
                                box-shadow: 1px 1px #ddd;
                                border-radius: 5px;display: inline-flex;">
                        <button onclick="createTicket()" type="button" style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                style="margin-right: 5px;"></i>
                        </button>
                        <p style="margin-left: 5px;
                                font-weight: 700;
                                margin-bottom: 0px;">Create Ticket
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="loading-spin" id="spin">
                        <img src="{{ asset('/loading.gif') }}" alt="">
                    </div>
                    <div id="ticketForm" class="card" style="display: none;width: 50% !important;position: relative;">
                        <div class="card-header" style="background: #007bff">
                            <h3 class="card-title" style="color: #fff">Ticket Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="ticket-add" class="row">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group col-md-12">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Ticket Id</label>
                                        <input readonly id="ticket_id" name="ticket_id" type="text" class="form-control" placeholder="Enter ticket id" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Your Query</label>
                                        <textarea name="user_query" type="text" class="form-control" placeholder="Enter your query"></textarea>
                                    </div>
                                    <div class="form-group" style="width: 100%">
                                        <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="ticketEditForm" class="card" style="display: none;width: 50% !important;position:relative;">
                        <div class="card-header" style="background: #28a745">
                            <h3 class="card-title" style="color: #fff">Update Ticket</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="ticket-edit" class="row">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group col-md-12">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Ticket Id</label>
                                        <input readonly id="e_ticket_id" name="ticket_id" type="text" class="form-control" placeholder="Enter ticket id" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Your Query</label>
                                        <textarea id="e_query" name="user_query" type="text" class="form-control" placeholder="Enter your query"></textarea>
                                    </div>
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group" style="width: 100%">
                                        <button type="submit" style="width: 100%;" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($data->type == 'super_admin')
                    <div id="ticket_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Incoming Ticket List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Ticket ID</th>
                                        <th>Username</th>
                                        <th>User Query</th>
                                        <th>Status</th>
                                        <th>Communication</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($tickets->where('status','Pending') as $ticket)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $ticket->ticket_id }}</td>
                                            <td>{{ $ticket->get_user->f_name }}</td>
                                            <td>{{ Str::Limit($ticket->query,100,'...') }}</td>
                                            <td>
                                                <span style="cursor: pointer;"
                                                    onclick="changeStatus({{ $ticket->id }})"
                                                    class="badge badge-danger">Pending</span>
                                                <span style="cursor: pointer;"
                                                    onclick="changeStatus({{ $ticket->id }},'reject')"
                                                    class="badge badge-dark">Reject</span>
                                            </td>
                                            <td>
                                                <a href="{{url('/messenger')}}" class="badge badge-primary">Chat With User</a>
                                                <a href="{{url('/mail-inbox')}}" class="badge badge-success">Mail</a>
                                            </td>
                                            <td>
                                                <button onclick="viewTicket({{ $ticket }})"
                                                    class="btn btn-dark btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <button onclick="editTicket({{ $ticket }})"
                                                    class="btn btn-dark btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button onclick="deleteTicket(`{{ $ticket->id }}`)"
                                                    class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                    <div id="ticket_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Ticket Solved List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Ticket ID</th>
                                        <th>Username</th>
                                        <th>User Query</th>
                                        <th>Status</th>
                                        <th>Communication</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($tickets->where('status','Solved') as $ticket)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $ticket->ticket_id }}</td>
                                            <td>{{ $ticket->get_user->f_name }}</td>
                                            <td>{{ Str::Limit($ticket->query,100,'...') }}</td>
                                            <td>
                                                <span class="badge badge-success">Solved</span>
                                            </td>
                                            <td>
                                                <a href="{{url('/messenger')}}" class="badge badge-primary">Chat With User</a>
                                                <a href="{{url('/mail-inbox')}}" class="badge badge-success">Mail</a>
                                            </td>
                                            <td>
                                                <button onclick="viewTicket({{ $ticket }})"
                                                    class="btn btn-dark btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <button onclick="editTicket({{ $ticket }})"
                                                    class="btn btn-dark btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button onclick="deleteTicket(`{{ $ticket->id }}`)"
                                                    class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else 
                    <div id="ticket_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Ticket Solved List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example5" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Ticket ID</th>
                                        <th>User Query</th>
                                        <th>Status</th>
                                        <th>Communication</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($tickets->where('user_id',$data->id) as $ticket)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $ticket->ticket_id }}</td>
                                            <td>{{ Str::Limit($ticket->query,100,'...') }}</td>
                                            <td>
                                                <span class="badge badge-success">{{$ticket->status}}</span>
                                            </td>
                                            <td>
                                                <a href="{{url('/messenger')}}" class="badge badge-primary">Chat With Admin</a>
                                                {{-- <a href="{{url('/mail-inbox')}}" class="badge badge-success">Mail</a> --}}
                                            </td>
                                            <td>
                                                <button onclick="viewTicket({{ $ticket }})"
                                                    class="btn btn-dark btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <button onclick="editTicket({{ $ticket }})"
                                                    class="btn btn-dark btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button onclick="deleteTicket(`{{ $ticket->id }}`)"
                                                    class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="view_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="title" class="modal-title" id="exampleModalLabel" style="text-transform: capitalize;"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Ticket Id</label>
                        <input readonly id="v_ticket_id" name="ticket_id" type="text" class="form-control" placeholder="Enter ticket id" />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">User Query</label>
                        <textarea disabled id="v_query" name="query" type="text" class="form-control" placeholder="Enter your query"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="auth" value="{{$data->id}}">
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
    $(document).ready(function() {
        $('#example1').DataTable({
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

    <script type="text/javascript">
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
            $("#example5").DataTable();
            $('#example6').DataTable({
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
        
        window.onload =(()=>{
            var data = Math.floor(100000 + Math.random() * 900000)+$("#auth").val();
            $("#ticket_id").val(data);
        });

        function viewTicket(ticket){
            $("#v_ticket_id").val(ticket.ticket_id);
            $("#v_query").text(ticket.query);
            $("#title").text("View "+ticket.get_user.f_name+" Ticket");
            $("#view_ticket").modal('show');
        }

        function createTicket() {
            $("#ticket_table").hide();
            $("#ticketForm").show();
            $("#ticketEditForm").hide();
        }

        function closeForm() {
            $("#ticket_table").show();
            $("#ticketForm").hide();
            $("#ticketEditForm").hide();
        }

        function editTicket(ticket) {
            $("#e_ticket_id").val(ticket.ticket_id);
            $("#id").val(ticket.id);
            $("#e_query").val(ticket.query);
            $("#ticket_table").hide();
            $("#ticketForm").hide();
            $("#ticketEditForm").show();
        }

        $(document).ready(function() {
            $('#ticket-add').validate({
                rules: {
                    ticket_id: {
                        required: true
                    },
                    user_query: {
                        required: true
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $("#spin").show();
                    $("#ticketForm").css({
                        'opacity': '.4'
                    });
                    $.ajax({
                        url: "{{ route('ticket.store') }}",
                        method: "POST",
                        data: new FormData(document.getElementById("ticket-add")),
                        enctype: 'multipart/form-data',
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(res) {
                            $("#spin").hide();
                            window.location.reload();
                            Toast.fire({
                                title: 'Ticket create successfull'
                            })
                        },
                        error: function() {
                            $("#spin").hide();
                            Swal.fire({
                                title: 'Field required'
                            })
                        }
                    })
                }
            });

        });

        $(document).ready(function() {
            $('#ticket-edit').validate({
                rules: {
                    ticket_id: {
                        required: true
                    },
                    query: {
                        required: true
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $("#spin").show();
                    $("#ticketEditForm").css({
                        'opacity': '.4'
                    });
                    $.ajax({
                        url: "{{ route('ticket.update') }}",
                        method: "POST",
                        data: new FormData(document.getElementById("ticket-edit")),
                        enctype: 'multipart/form-data',
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(res) {
                            $("#spin").hide();
                            window.location.reload();
                            Toast.fire({
                                title: 'Ticket update successfull'
                            })
                        },
                        error: function() {
                            $("#spin").hide();
                            Swal.fire({
                                title: 'Field required'
                            })
                        }
                    })
                }
            });

        });

        function deleteTicket(id) {
            $.ajax({
                url: "{{ route('ticket.delete') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        title: 'Ticket delete successfull.'
                    })
                },
                error: function() {

                    Swal.fire({
                        title: 'Field required'
                    })
                }
            })
        }

        function changeStatus(id,val) {
            $.ajax({
                url: "{{ route('ticket.status') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id,
                    'val': val
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        title: 'Ticket solved successfull.'
                    })
                },
                error: function() {
                    window.location.reload();
                    Swal.fire({
                        title: 'Ticket Not Solved'
                    })
                }
            })
        }


    </script>
    

@endsection
@endsection
