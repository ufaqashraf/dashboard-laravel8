
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
                @if ($data->type == 'super_admin')
                <div class="row mb-2">
                    <div id="disableDiv" style="padding: 5px;
                        background-color: white;
                        border: 1px solid #ddd;
                        box-shadow: 1px 1px #ddd;
                        border-radius: 5px;display: inline-flex;">
                        <button onclick="createVirus()" type="button"  style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                        </button>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Add Antivirus
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="loading-spin" id="spin">
                        <img src="{{ asset('/loading.gif') }}" alt="">
                    </div>
                    <div id="virusForm" class="card" style="display: none;width: 50% !important;position: relative;">
                        <div class="card-header" style="background: #007bff">
                            <h3 class="card-title" style="color: #fff">Antivirus Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="virus-add" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Name</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Description</label>
                                    <textarea name="description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <div class="col-md-12" style="display: inline-flex;">
                                    <label for="image" style="margin-right: 20px;" class="col-form-label">Virus Logo</label>
                                    <div class="form-group">
                                        <div class="logo-wrapper">
                                            <input id="logo" type="file" class="form-control logo-input" name="logo">
                                            <img src="" id="logo-img" class="img-wrapper"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="virusEditForm" class="card" style="display: none;width: 50% !important">
                        <div class="card-header" style="background: #28a745">
                            <h3 class="card-title" style="color: #fff">Update Antivirus Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="virus-edit" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Name</label>
                                    <input id="name" name="edit_name" type="text" class="form-control"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Description</label>
                                    <textarea id="description" name="edit_description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <div class="col-md-12" style="display: inline-flex;">
                                    <label for="image" class="col-form-label">Virus Logo</label>
                                    <div class="form-group">
                                        <div class="logo-wrapper">
                                            <input id="edit-logo" type="file" class="form-control logo-input" name="edit-logo">
                                            <img src="" id="edit-logo-img" class="img-wrapper"/>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" id="slug" name="slug">
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%;" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="virus_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Antivirus List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Name</th>
                                        <th>Logo</th>
                                        <th>Description</th>
                                        @if ($data->type == 'super_admin')
                                        <th>Status</th>
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($viruses as $virus)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$virus->name}}</td>
                                        <td>
                                            <img src="{{asset('/images/'.$virus->logo)}}" height="50px" width="50px" alt="">
                                        </td>
                                        <td>{{Str::limit($virus->description,100,'...')}}</td>
                                        @if ($data->type == 'super_admin')
                                        <td>
                                            @if ($virus->status == 0)
                                                <span style="cursor: pointer;" onclick="changeStatus({{ $virus->id }})" class="badge badge-danger">Inactive</span>
                                            @else
                                                <span style="cursor: pointer;" onclick="changeStatus({{ $virus->id }})" class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button onclick="editVirus({{$virus}})" class="btn btn-dark btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="deleteVirus(`{{$virus->slug}}`)" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    function createVirus(){
        $("#virus_table").hide();
        $("#virusForm").show();
        $("#virusEditForm").hide();
    }

    function closeForm(){
        $("#virus_table").show();
        $("#virusForm").hide();
        $("#virusEditForm").hide();
    }

    function editVirus(virus){
        $("#name").val(virus.name);
        $("#slug").val(virus.slug);
        $("#description").text(virus.description);
        document.getElementById("edit-logo-img").src = "{{ asset('/images/') }}/" + virus.logo;
        $("#virus_table").hide();
        $("#virusForm").hide();
        $("#virusEditForm").show();
    }

    function imageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logo-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function() {
        imageUrl(this);
    });

    function imageEditUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#edit-logo-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#edit-logo").change(function() {
        imageEditUrl(this);
    });

    $(document).ready(function () {
        $('#virus-add').validate({
            rules: {
                name: {
                    required: true
                },
                description: {
                    required: true
                },
                logo: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form){
                $("#spin").show();
                $("#virusForm").css({
                    'opacity': '.4'
                });
                $.ajax({
                    url: "{{route('virus.store')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("virus-add")),
                    enctype: 'multipart/form-data',
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        $("#spin").hide();
                        window.location.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Antivirus upload successfull.'
                        })
                    },
                    error: function() {
                        $("#spin").hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'Field required'
                        })
                    }
                })
            }
        });

    });

    $(document).ready(function () {
        $('#virus-edit').validate({
            rules: {
                edit_name: {
                    required: true
                },
                edit_description: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form){
                $.ajax({
                    url: "{{route('virus.update')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("virus-edit")),
                    enctype: 'multipart/form-data',
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        window.location.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Antivirus update successfull.'
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
        });

    });

    function deleteVirus(slug){
        $.ajax({
            url: "{{route('virus.delete')}}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}",
                'slug':slug
            },
            success: function(res) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Virus delete successfull.'
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

    function changeStatus(id){
        $.ajax({
            url: "{{route('virus.status')}}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}",
                'id':id
            },
            success: function(res) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Antivirus Active successfull.'
                })
            },
            error: function() {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Antivirus De-Active successfull.'
                })
            }
        })
    }

</script>

@endsection
@endsection
