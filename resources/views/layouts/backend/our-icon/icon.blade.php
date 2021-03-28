@extends('layouts.backend.app')
<style>
    .loading-spin{
        position: absolute;
        z-index: 9999;
        left: 22%;
        top: 33%;
        display: none;
    }
    .loading-spin img{
        height:-1%;
        width: 55%;
    }
</style>
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Our Icon</h1>
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
                <form id="setting_add" style="position: relative;">
                    @csrf
                    <div style="float: left" class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Setup Icon</h3>
                            </div>
                            <div class="card-body">

                                <div class="col-md-12" style="float: left; padding-left: 0">
                                    <div class="form-group">
                                        <label>Icon Name*</label>
                                        <input name="icon_name" type="text" value="{{ optional($data)->icon_name }}" class="form-control" placeholder="Enter icon name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Icon *</label>
                                        <div style="height: 7.7rem; border: dashed 1.5px blue;
                                            background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                            width: 30% !important; cursor: pointer;">
                                            <input id="image" type="file" class="form-control" name="icon" style="opacity: 0; height: 7.7rem; cursor: pointer; padding: 0px;">
                                            <img src="{{ asset('/images/'.optional($data)->icon) }}" id="image-img" style="height: 7.7rem; width: 100% !important; cursor: pointer;margin-top: -126px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input name="id" type="hidden" value="{{ optional($data)->id }}"/>
                        <div class="card" style="width: 100%">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
  </div>

@section('js')
<script>

    $(document).ready(function () {
        $('#setting_add').validate({
            rules: {
                icon_name: {
                    required: true
                },
                icon: {
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
                $("#setting_add").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{ route('icon.store') }}",
                    method: "POST",
                    data: new FormData(document.getElementById("setting_add")),
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
                            title: 'Icon setup successfull.'
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


    function imageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#image").change(function() {
        imageUrl(this);
    });


</script>

@endsection
@endsection
