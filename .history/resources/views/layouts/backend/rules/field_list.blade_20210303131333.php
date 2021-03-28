
@extends('layouts.backend.app')
<style>
    .loading-spin{
        position: absolute;
        z-index: 9999;
        left: 21%;
        top: 37%;
        display: none;
    }
    .loading-spin img{
        height: 100px;
        width: 100px;
    }
</style>
@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div id="disableDiv" style="padding: 5px;
                        background-color: white;
                        border: 1px solid #ddd;
                        box-shadow: 1px 1px #ddd;
                        border-radius: 5px;display: inline-flex;">
                        <button onclick="createField()" type="button"  style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                        </button>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Add Field
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
                    <div id="fieldForm" class="card" style="display: none;width: 50% !important;position: relative;">
                        <div class="card-header" style="background: #007bff">
                            <h3 class="card-title" style="color: #fff">Rules Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="field-add" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Slug</label>
                                    <input name="slug" type="text" class="form-control"
                                        placeholder="Enter slug" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Name</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Slug</label>
                                    <select name="type" class="form-control">
                                        <option value="" selected="selected" hidden>Select type</option>
                                        <option value="Text">Text</option>
                                        <option value="Numeric">Numeric</option>
                                        <option value="Comparable">Comparable</option>
                                        <option value="Dropdown">Dropdown</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rules Description</label>
                                    <textarea name="description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Mandatory?</label>
                                    <div class="form-group clearfix">
                                      <div class="icheck-success d-inline">
                                        <input type="radio" name="status" value="1" checked="" id="radioSuccess1">
                                        <label for="radioSuccess1">
                                            Yes
                                        </label>
                                      </div>
                                      <div class="icheck-danger d-inline">
                                        <input type="radio" name="status" value="0" id="radioSuccess2">
                                        <label for="radioSuccess2">
                                            No
                                        </label>
                                      </div>
                                    </div>
                                </div>
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="fieldEditForm" class="card" style="display: none;width: 50% !important">
                        <div class="card-header" style="background: #28a745">
                            <h3 class="card-title" style="color: #fff">Update Field Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="field-edit" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control"
                                        placeholder="Enter slug" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Type</label>
                                    <select name="type" class="form-control">
                                        <option id="type" value="" selected="selected" hidden></option>
                                        <option value="Text">Text</option>
                                        <option value="Numeric">Numeric</option>
                                        <option value="Comparable">Comparable</option>
                                        <option value="Dropdown">Dropdown</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rules Description</label>
                                    <textarea id="description" name="description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Mandatory?</label>
                                    <div class="form-group clearfix">
                                      <div onclick="check(1)" class="icheck-success d-inline">
                                        <input id="status_y" type="radio" name="status" value="1">
                                        <label for="status_y">
                                            Yes
                                        </label>
                                      </div>
                                      <div onclick="check(0)" class="icheck-danger d-inline">
                                        <input id="status_n" type="radio" name="status" value="0">
                                        <label for="status_n">
                                            No
                                        </label>
                                      </div>
                                    </div>
                                </div>
                                <input type="hidden" id="field_id" value="" name="id">
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="view_field" class="card" style="display: none;width: 50% !important">
                        <div class="card-header" style="background: #28a745">
                            <h3 class="card-title" style="color: #fff">View Field Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Slug</label>
                                    <input readonly id="v_slug" name="slug" type="text" class="form-control"
                                        placeholder="Enter slug" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Name</label>
                                    <input readonly id="v_name" name="name" type="text" class="form-control"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Type</label>
                                    <select name="type" class="form-control" disabled>
                                        <option readonly id="v_type" value="" selected="selected" hidden></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rules Description</label>
                                    <textarea disabled id="v_description" name="description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Field Mandatory?</label>
                                    <div class="form-group clearfix">
                                      <div onclick="check(1)" class="icheck-success d-inline">
                                        <input readonly id="v_status_y" type="radio" name="status" value="1">
                                        <label for="status_y">
                                            Yes
                                        </label>
                                      </div>
                                      <div onclick="check(0)" class="icheck-danger d-inline">
                                        <input readonly id="v_status_n" type="radio" name="status" value="0">
                                        <label for="status_n">
                                            No
                                        </label>
                                      </div>
                                    </div>
                                </div>
                                <div class="form-group" style="width: 100%">
                                    <button onclick="closeForm()" type="button" style="width: 100%" class="btn btn-success">Cancle</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="field_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Field List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Field Slug</th>
                                        <th>Field Name</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Mandatory</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($fields as $field)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$field->slug}}</td>
                                        <td>{{$field->name}}</td>
                                        <td>{{$field->type}}</td>
                                        <td>{{$field->description}}</td>
                                        <td>
                                            @if ($field->status == 1)
                                                <span class="badge badge-info">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button onclick="editField({{$field}})" class="btn btn-dark btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="viewField({{$field}})" class="btn btn-info btn-xs">
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
    function createField(){
        $("#field_table").hide();
        $("#fieldForm").show();
        $("#fieldEditForm").hide();
        $("#view_field").hide();
    }

    function closeForm(){
        $("#field_table").show();
        $("#fieldForm").hide();
        $("#fieldEditForm").hide();
        $("#view_field").hide();
    }

    function viewField(field){
        $("#v_slug").val(field.slug);
        $("#v_name").val(field.name);
        $("#v_type").val(field.type);
        $("#v_type").text(field.type);
        $("#v_description").val(field.description);
        if (field.status == 1) {
            $("#v_status_y").attr('checked',true);
            $("#v_status_n").attr('checked',false);
        }else if(field.status == 0){
            $("#v_status_n").attr('checked',true);
            $("#v_status_y").attr('checked',false);
        }
        $("#field_id").val(field.id);
        $("#view_field").show();
        $("#field_table").hide();
        $("#fieldForm").hide();
        $("#fieldEditForm").hide();
    }

    function editField(field){
        $("#view_field").hide();
        $("#slug").val(field.slug);
        $("#name").val(field.name);
        $("#type").val(field.type);
        $("#type").text(field.type);
        $("#description").val(field.description);
        if (field.status == 1) {
            $("#status_y").attr('checked',true);
            $("#status_n").attr('checked',false);
        }else if(field.status == 0){
            $("#status_n").attr('checked',true);
            $("#status_y").attr('checked',false);
        }
        $("#field_id").val(field.id);
        $("#field_table").hide();
        $("#fieldForm").hide();
        $("#fieldEditForm").show();
    }

    $(document).ready(function () {
        $('#field-add').validate({
            rules: {
                name: {
                    required: true
                },
                slug: {
                    required: true
                },
                type: {
                    required: true
                },
                description: {
                    required: true
                },
                status: {
                    required: true
                },
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
                $("#fieldForm").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{route('field.store')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("field-add")),
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
                            title: 'Field upload successfull.'
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
        $('#field-edit').validate({
            rules: {
                name: {
                    required: true
                },
                slug: {
                    required: true
                },
                type: {
                    required: true
                },
                description: {
                    required: true
                },
                status: {
                    required: true
                },
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
                $("#fieldEditForm").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{route('field.update')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("field-edit")),
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
                            title: 'Field update successfull.'
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

</script>

@endsection
@endsection
