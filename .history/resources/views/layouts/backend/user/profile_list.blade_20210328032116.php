
@extends('layouts.backend.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-2">
                        <h4>User Listddddd</h4>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div id="info" class="card col-12" style="display: none;">
                    <div class="card-header">
                        <h3 id="v_user" class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Username</label>
                                <input readonly type="text" id="v_username" class="form-control" placeholder="Username" name="username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Password</label>
                                <input readonly type="password" id="v_password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Email</label>
                                <input readonly type="email" id="v_email" class="form-control" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">First Name</label>
                                <input readonly type="text" id="v_f_name" class="form-control" placeholder="First name" name="f_name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Last Name</label>
                                <input readonly type="text" id="v_l_name" class="form-control" placeholder="Last name" name="l_name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Phone Number</label>
                                <input readonly type="number" id="v_phn" class="form-control" placeholder="Mobile number" name="phn">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Selected Price Plan</label>
                                <select disabled class="form-control" name="price_plan_id" id="price_plan_id">
                                    <option id="v_plan" value="" selected="selected" hidden></option>

                                </select>
                            </div>
                            <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Selected Price Plan Duration</label>
                                <select disabled class="form-control">
                                    <option id="v_duration" value="" selected="selected" hidden></option>

                                </select>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Address</label>
                                <input readonly id="v_address" type="text" class="form-control" placeholder="Address" name="address">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                </div>
                            </div>

                            <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">City</label>
                                <input readonly id="v_city" type="text" class="form-control" placeholder="City" name="city">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-city"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">State</label>
                                <input readonly id="v_state" type="text" class="form-control" placeholder="State" name="state">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Country</label>
                                <input readonly id="v_country" type="text" class="form-control" placeholder="Country" name="country">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Postal Code</label>
                                <input readonly id="v_post_code" type="text" class="form-control" placeholder="Postal Code" name="post_code">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-mailbox"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Company</label>
                                <input readonly id="v_company" type="text" class="form-control" placeholder="Company Name" name="company">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Company Url</label>
                                <input readonly id="v_url" type="text" class="form-control" placeholder="Company Url" name="company_url">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-6"
                                style="width:48% !important;margin-bottom:15px;margin-left:20px;">
                                <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Position</label>
                                <input readonly id="v_position" type="text" class="form-control" placeholder="Position" name="position">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-location"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="edit_data" class="card col-12" style="display: block;">
                    <div class="card-header">
                        <h3 id="e_user" class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="update_data">
                            @csrf
                            <div class="row">
                                <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Username</label>
                                    <input type="text" id="e_username" class="form-control" placeholder="Username" name="username">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Password</label>
                                    <input type="password" id="e_password" class="form-control" name="password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Email</label>
                                    <input type="email" id="e_email" class="form-control" placeholder="Email" name="email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">First Name</label>
                                    <input type="text" id="e_f_name" class="form-control" placeholder="First name" name="f_name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Last Name</label>
                                    <input type="text" id="e_l_name" class="form-control" placeholder="Last name" name="l_name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-left:20px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Phone Number</label>
                                    <input type="number" id="e_phn" class="form-control" placeholder="Mobile number" name="phn">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-right:10px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Selected Price Plan</label>
                                    <select class="form-control" name="price_plan_id" id="price_plan_id">
                                        <option id="e_plan" value="" selected="selected" hidden></option>
                                        @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Selected Plan Duration</label>
                                    <select name="duration" class="form-control">
                                        <option id="e_duration" value="" selected="selected" hidden></option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Quarterly">Quarterly</option>
                                        <option value="Annually">Annually</option>
                                    </select>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Address</label>
                                    <input id="e_address" type="text" class="form-control" placeholder="Address" name="address">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-address-card"></i>
                                        </div>
                                    </div>
                                </div>

                                <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">City</label>
                                    <input id="e_city" type="text" class="form-control" placeholder="City" name="city">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-city"></i>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">State</label>
                                    <input id="e_state" type="text" class="form-control" placeholder="State" name="state">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-flag"></i>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Country</label>
                                    <input id="e_country" type="text" class="form-control" placeholder="Country" name="country">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-flag"></i>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Postal Code</label>
                                    <input id="e_post_code" type="text" class="form-control" placeholder="Postal Code" name="post_code">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-mailbox"></i>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-left:20px;margin-bottom:15px;"
                                    class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Company</label>
                                    <input id="e_company" type="text" class="form-control" placeholder="Company Name" name="company">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div style="width:48% !important;margin-bottom:15px;margin-right:10px;" class="input-group mb-6">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Company Url</label>
                                    <input id="e_url" type="text" class="form-control" placeholder="Company Url" name="company_url">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-6"
                                    style="width:48% !important;margin-bottom:15px;margin-left:20px;">
                                    <label style="width:100%" class="mr-sm-2" for="inlineFormCustomSelect">Position</label>
                                    <input id="e_position" type="text" class="form-control" placeholder="Position" name="position">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-location"></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="user_id" name="id">
                                <div style="width:100% !important;margin-bottom:15px;margin-top: 32px;">
                                    <button type="submit" class="btn btn-success btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="list" class="card col-12"  style="display: none;>
                    <div class="card-header">
                        <h3 class="card-title">User List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI #</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Private Key</th>
                                    <th>Public Key</th>
                                    <th>Status</th>
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
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->private_test_key}}</td>
                                    <td>{{$user->public_test_key}}</td>
                                    <td>
                                        @if ($user->status == 0 && $user->is_block ==0 )
                                            <span style="cursor: pointer" onclick="changeStatus({{$user->id}})" class="badge badge-danger">Inactive</span>
                                        @elseif($user->status == 1 && $user->is_block ==0)
                                            <span style="cursor: pointer" onclick="changeStatus({{$user->id}})" class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- @if ($user->is_block ==1)
                                            <span class="badge badge-danger">Blocked</span>
                                        @else
                                        @endif --}}
                                            <button onclick="edit({{ $user }})" class="btn btn-dark btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="view({{ $user }})" class="btn btn-info btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </button>
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
    // function edit(user){
        $("#edit_data").show();
        $("#info").hide();
        $("#list").hide();
        $("#e_user").text(user.f_name+"'s Info");
        $("#e_username").val(user.username);
        $("#e_f_name").val(user.f_name);
        $("#e_l_name").val(user.l_name);
        $("#e_email").val(user.email);
        $("#e_phn").val(user.phn);
        $("#e_address").val(user.address);
        $("#e_city").val(user.city);
        $("#e_state").val(user.state);
        $("#e_country").val(user.country);
        $("#e_post_code").val(user.post_code);
        $("#e_position").val(user.position);
        $("#e_company").val(user.company);
        $("#e_url").val(user.company_url);
        $("#e_plan").text(user.get_plan.name);
        $("#e_plan").val(user.get_plan.id);
        $("#e_duration").val(user.duration);
        $("#e_duration").text(user.duration);
        $("#user_id").val(user.id);
    // }

    function view(user){
        $("#info").hide();
        $("#edit_data").show();
        $("#list").hide();
        $("#v_user").text(user.f_name+"'s Info");
        $("#v_username").val(user.username);
        $("#v_f_name").val(user.f_name);
        $("#v_l_name").val(user.l_name);
        $("#v_email").val(user.email);
        $("#v_phn").val(user.phn);
        // $("#v_password").val(user.password);
        $("#v_address").val(user.address);
        $("#v_city").val(user.city);
        $("#v_state").val(user.state);
        $("#v_country").val(user.country);
        $("#v_post_code").val(user.post_code);
        $("#v_position").val(user.position);
        $("#v_company").val(user.company);
        $("#v_url").val(user.company_url);
        $("#v_plan").text(user.get_plan.name);
        $("#v_duration").text(user.duration);
    }

    $(document).ready(function() {
        $('#update_data').validate({
            rules: {
                username: {
                    required: true
                },
                f_name: {
                    required: true
                },
                l_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phn: {
                    required: true,
                    digits: true,
                    minlength: 13,
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                country: {
                    required: true
                },
                post_code: {
                    required: true
                },
                service_type: {
                    required: true
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "{{ route('user.update') }}",
                    method: "POST",
                    data: $('#update_data').serialize(),
                    success: function(res) {
                        window.location.reload();
                        Toast.fire({
                            icon:"success",
                            title:"Update Successfull"
                        })
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Email already taken',
                            text: 'Input unique email address.'
                        })
                    }
                })
            }
        });

    });


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
