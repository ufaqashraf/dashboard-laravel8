
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
    [class*=icheck-]>input:first-child:checked+input[type=hidden]+label::after, [class*=icheck-]>input:first-child:checked+label::after {
        
        top: -3px !important;
        left: -3px !important;
        width: 5px !important;
        height: 9px !important;
    }
    [class*=icheck-]>input:first-child+input[type=hidden]+label::before, [class*=icheck-]>input:first-child+label::before {
        
        width: 15px !important;
        height: 15px !important;
    }
    .d-d-inline{
        font-size: 14px !important;
        font-weight: 400 !important;
    }
    [class*=icheck-]>label {
        min-height: 10px !important;
        line-height: 15px !important;
    }
    label:not(.form-check-label):not(.custom-file-label) {
        font-weight: 500 !important;
        font-size: 15px !important;
    }
    .custom-btn{
        padding: 5px;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 1px 1px #ddd;
        border-radius: 5px;
        display: inline-flex;
    }
    .custom-btn p{
        margin-left: 5px;
        font-weight: 700;
        margin-bottom: 0px;
    }
    .custom-btn p span{
        float: left;
    }
    .t-head{
        background: #7575c1 !important;
        color: white !important;
    } 
</style>
@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row col-md-2">
                    @php
                        $count = 0;
                        $count = $data->get_rules->count();
                    @endphp
                    @if (optional($data->get_plan)->rules != $count)
                    <div class="custom-btn" style="">
                        <button onclick="createRules()" type="button"  style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                        </button>
                        <p>
                            Add Rules
                            <span class="badge badge-warning">
                                @php
                                    $count = 0;
                                    $count = $data->get_rules->count();
                                @endphp
                                @if (optional($data->get_plan)->rules != $count)
                                {{$count ?? 0}}/{{optional($data->get_plan)->rules ?? 00}}
                                @endif
                            </span>
                        </p>
                    </div>
                    @elseif(optional($data->get_plan)->rules == $count && $data->type == 'user')
                    <div class="custom-btn" style="">
                        <a href="{{route('plan')}}"  style="padding: 10px;" class="btn btn-success">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                        </a>
                        <p>
                            Upgrade Now
                        </p>
                    </div>
                    @else
                    <div class="custom-btn" style="">
                        <button onclick="createRules()" type="button"  style="padding: 10px;" class="btn btn-primary">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                        </button>
                        <p>
                            Add Rules
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="loading-spin" id="spin">
                        <img src="{{ asset('/loading.gif') }}" alt="">
                    </div>
                    <div id="rulesForm" class="card" style="display: none;width: 50% !important;position: relative;">
                        <div class="card-header" style="background: #007bff">
                            <h3 class="card-title" style="color: #fff">Rules Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="rules-add" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rule Field</label>
                                    <select name="rule1" class="form-control">
                                        <option selected="selected" hidden>Select Rules Field</option>
                                        @foreach ($fields as $field)
                                        <option value="{{$field->name}}">{{$field->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Condition</label>
                                    <select name="condition" class="form-control">
                                        <option selected="selected" hidden>Select Condition</option>
                                        <option value="Equal To">Equal To</option>
                                        <option value="Not Equal To">Not Equal To</option>
                                        <option value="Custom">Custom</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    {{-- <label class="mr-sm-2" for="inlineFormCustomSelect">Rule Field</label> --}}
                                    <select name="rule2" class="form-control">
                                        <option selected="selected" hidden>Select Rules Field</option>
                                        @foreach ($fields as $field)
                                        <option value="{{$field->name}}">{{$field->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                      <input onclick="view()" value="Disallow Repeated Use" type="checkbox" id="checkboxDanger1">
                                      <label for="checkboxDanger1">
                                          Disallow Repeated Use
                                      </label>
                                    </div>
                                </div>
                                <div id="v_1" class="form-group col-md-12" style="display: none;">
                                    <input id="advance_opt1" name="advance_opt1" type="text" class="form-control"
                                        placeholder="Enter no. of times for alert" />
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                      <input value="Block Blocklisted IP" name="advance_opt2" type="checkbox" id="checkboxDanger2">
                                      <label for="checkboxDanger2">
                                          Block Blocklisted IP
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                      <input value="Block Domain Names" name="advance_opt3" type="checkbox" id="checkboxDanger3">
                                      <label for="checkboxDanger3">
                                        Block Domain Names
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                        <input onclick="view_1()" value="Alert for Special Characters/Strings in the Field" name="" type="checkbox" id="checkboxDanger4">
                                        <label for="checkboxDanger4">
                                            Alert for Special Characters/Strings in the Field
                                        </label>
                                    </div>
                                </div>
                                <div id="v_2" class="form-group col-md-12" style="display: none;">
                                    <input id="advance_opt4" name="advance_opt4" type="text" class="form-control"
                                        placeholder="Enter Characters/String Separated by(,)" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rule Action</label>
                                    <select name="rule_action" class="form-control">
                                        <option selected="selected" hidden>Select action</option>
                                        <option value="Manual Review">Manual Review</option>
                                        <option value="Approve">Approve</option>
                                        <option value="Reject">Reject</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rules Description</label>
                                    <textarea name="description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="rulesEditForm" class="card" style="display: none;width: 50% !important;position: relative;">
                        <div class="card-header" style="background: #28a745">
                            <h3 class="card-title" style="color: #fff">Update Rules Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="rules-edit" class="row">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rule Field</label>
                                    <select name="rule1" class="form-control">
                                        <option id="rule1" value="" selected="selected" hidden></option>
                                        @foreach ($fields as $field)
                                        <option value="{{$field->name}}">{{$field->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Condition</label>
                                    <select name="condition" class="form-control">
                                        <option id="condition" selected="selected" hidden></option>
                                        <option value="Equal To">Equal To</option>
                                        <option value="Not Equal To">Not Equal To</option>
                                        <option value="Custom">Custom</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    {{-- <label class="mr-sm-2" for="inlineFormCustomSelect">Rule Field</label> --}}
                                    <select name="rule2" class="form-control">
                                        <option id="rule2" selected="selected" hidden></option>
                                        @foreach ($fields as $field)
                                        <option value="{{$field->name}}">{{$field->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                      <input value="Disallow Repeated Use" name="advance_opt1" type="checkbox" id="checkboxDanger5">
                                      <label for="checkboxDanger5">
                                          Disallow Repeated Use
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                      <input value="Block Blocklisted IP" name="advance_opt2" type="checkbox" id="checkboxDanger6">
                                      <label for="checkboxDanger6">
                                          Block Blocklisted IP
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                      <input value="Block Domain Names" name="advance_opt3" type="checkbox" id="checkboxDanger7">
                                      <label for="checkboxDanger7">
                                        Block Domain Names
                                      </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="icheck-danger d-inline">
                                        <input value="Alert for Special Characters/Strings in the Field" name="advance_opt4" type="checkbox" id="checkboxDanger8">
                                        <label for="checkboxDanger8">
                                            Alert for Special Characters/Strings in the Field
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rule Action</label>
                                    <select name="rule_action" class="form-control">
                                        <option id="rule_action" selected="selected" hidden></option>
                                        <option value="Manual Review">Manual Review</option>
                                        <option value="Approve">Approve</option>
                                        <option value="Reject">Reject</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Rules Description</label>
                                    <textarea id="description" name="description" type="text" class="form-control"
                                        placeholder="Enter description"></textarea>
                                </div>
                                <input type="hidden" id="rule_id" name="id">
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%;" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="rules_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Rules List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead class="t-head">
                                    <tr>
                                        <th>SI #</th>
                                        <th>Field Name</th>
                                        <th>Condition</th>
                                        <th>Rules Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($ruleses as $rules)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$rules->rule1}}</td>
                                        <td>
                                            {{optional($rules)->condition}} {{optional($rules)->advance_opt1}} {{optional($rules)->advance_opt2}} 
                                            {{optional($rules)->advance_opt3}} {{optional($rules)->advance_opt4}} {{$rules->rule2}}
                                        </td>
                                        <td>
                                            {{$rules->rule_action}}
                                        </td>
                                        <td>
                                            <button onclick="editRules({{$rules}})" class="btn btn-dark btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="deleteRules({{$rules->id}})" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
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
    // $(function() {
    //     $("#example3").DataTable();
    //     $('#example4').DataTable({
    //         "paging": true,
    //         "lengthChange": false,
    //         "searching": false,
    //         "ordering": true,
    //         "info": true,
    //         "autoWidth": false,
    //     });
    // });
</script>

<script>
    function view(){
        if($("#v_1").show() == true){
            document.getElementById("v_1").style.display = none;
        }else{
            $("#v_1").show();
        }
    }

    function view_1(){
        $("#v_2").show()
    }

    function createRules(){
        $("#rules_table").hide();
        $("#rulesForm").show();
        $("#rulesEditForm").hide();
    }

    function closeForm(){
        $("#rules_table").show();
        $("#rulesForm").hide();
        $("#rulesEditForm").hide();
    }
    
    function deleteRules(id){
        $.ajax({
            url: "{{route('rules.delete')}}",
            method: "POST",
            data: {
                '_token':"{{ csrf_token() }}",
                'id':id
            },
            success: function(res) {
                window.location.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Rules delete successfull.'
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

    function editRules(rules){
        $("#rule1").val(rules.rule1);
        $("#rule1").text(rules.rule1);
        $("#condition").val(rules.condition);
        $("#condition").text(rules.condition);
        $("#rule2").val(rules.rule2);
        $("#rule2").text(rules.rule2);
        if (rules.advance_opt1 !=null) {
            $("#checkboxDanger5").attr('checked',true);
        }
        if (rules.advance_opt1 !=null) {
            $("#checkboxDanger5").attr('checked',true);
        }
        if (rules.advance_opt2 !=null) {
            $("#checkboxDanger6").attr('checked',true);
        }
        if (rules.advance_opt3 !=null) {
            $("#checkboxDanger7").attr('checked',true);
        }
        if (rules.advance_opt4 !=null) {
            $("#checkboxDanger8").attr('checked',true);
        }

        $("#checkboxDanger6").val(rules.advance_opt2);
        $("#checkboxDanger7").val(rules.advance_opt3);
        $("#checkboxDanger8").val(rules.advance_opt4);
        $("#rule_action").val(rules.rule_action);
        $("#rule_action").text(rules.rule_action);
        $("#description").val(rules.description);
        $("#rule_id").val(rules.id);
        $("#rules_table").hide();
        $("#rulesForm").hide();
        $("#rulesEditForm").show();
    }

    $(document).ready(function () {
        $('#rules-add').validate({
            rules: {
                condition: {
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
                $("#rulesForm").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{route('rules.store')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("rules-add")),
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
                            title: 'Rules upload successfull.'
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
        $('#rules-edit').validate({
            rules: {
                edit_condition: {
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
                $("#rulesEditForm").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{route('rules.update')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("rules-edit")),
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
                            title: 'Rules update successfull.'
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
