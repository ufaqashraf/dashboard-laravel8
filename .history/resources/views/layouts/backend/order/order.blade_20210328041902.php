@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <h1>Order Overview</h1>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @if ($data->type == 'user')
                    <div id="user_order_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Order List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($orders->where('user_id',$data->id) as $order)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('MMM Do YYYY, h:mm A') }}</td>
                                            <td>{{ optional($order->get_user)->f_name }}</td>
                                            <td>{{ $order->package }}</td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ $order->duration }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else 
                    <div id="all_order_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Order List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($orders as $order)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('MMM Do YYYY, h:mm A') }}</td>
                                            <td>{{ optional($order->get_user)->f_name }}</td>
                                            <td>{{ $order->package }}</td>
                                            <td>{{ $order->price }}</td>
                                            <td>{{ $order->duration }}</td>
                                            <td>
                                                <button onclick="deleteOrder({{$order->id}})" class="btn btn-danger btn-xs">
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

@section('js')

    {{-- <script type="text/javascript">
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

    </script> --}}

    <script>
        function deleteOrder(id){
            $.ajax({
                url: "{{ route('delete.order') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Order delete successfull.'
                    })
                },
                error: function() {

                    Swal.fire({
                        icon: 'error',
                        title: 'Field required'
                    })
                }
            })
        }
    </script>

@endsection
@endsection
