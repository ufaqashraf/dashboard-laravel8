@extends('layouts.backend.app')
<style>
    .loading-spin{
        position: absolute;
        z-index: 9999;
        left: 40%;
        top: 25%;
        display: none;
    }
    .loading-spin img{
        height: 60%;
        width: 80%;
    }
</style>
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Website Settings</h1>
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
                                <h3 class="card-title">Setup Basic Info</h3>
                            </div>
                            <div class="card-body">

                                <div class="col-md-12" style="float: left; padding-left: 0">
                                    
                                    <div class="form-group">
                                        <label>Website Name*</label>
                                        <input name="site_name" type="text" value="{{ optional($setting)->site_name }}" class="form-control" placeholder="Enter website name" />
                                    </div>
                                    <div class="form-group">
                                        <label>Website Title*</label>
                                        <input name="site_title" type="text" value="{{ optional($setting)->site_title }}" class="form-control" placeholder="Enter website title" />
                                    </div>
                                    <div class="form-group">
                                        <label>Website Tagline*</label>
                                        <input name="site_tag_line" type="text" value="{{ optional($setting)->site_tag_line }}" class="form-control" placeholder="Enter website tagline" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input name="email" value="{{ optional($setting)->email }}" type="email" class="form-control" placeholder=" Enter email" />
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone Number</label>
                                        <input name="cell" value="{{ optional($setting)->cell }}" type="number" class="form-control" placeholder="Enter telephone number" />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" type="text" class="form-control" placeholder="Enter Address">{{ optional($setting)->address }}</textarea>
                                    </div>
                                    <div style="width:100%;display:inline-flex;">
                                        <div class="form-group" style="width:60%;">
                                            <label for="logo">Logo *</label>
                                            <div style="height: 7.7rem; border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 60% !important; cursor: pointer;">
                                                <input id="image" type="file" class="form-control" name="logo" style="opacity: 0; height: 7.7rem; cursor: pointer; padding: 0px;">
                                                <img src="{{ asset('/images/'.optional($setting)->logo) }}" id="image-img" style="height: 7.7rem; width: 100% !important; cursor: pointer;margin-top: -126px;" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="width:60%;">
                                            <label for="logo">Icon*</label>
                                            <div style="height: 7.7rem; border: dashed 1.5px blue;
                                                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                                width: 60% !important; cursor: pointer;">
                                                <input id="icon" type="file" class="form-control" name="icon" style="opacity: 0; height: 7.7rem; cursor: pointer; padding: 0px;">
                                                <img src="{{ asset('/images/'.optional($setting)->icon) }}" id="icon-img" style="height: 7.7rem; width: 100% !important; cursor: pointer;margin-top: -126px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="float: right" class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Social Link</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input value="{{ optional($setting)->fb_link }}" name="fb_link" type="text" class="form-control" placeholder="Facebook link" />
                                </div>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input value="{{ optional($setting)->twitt_link }}" name="twitt_link" type="text" class="form-control" placeholder="Twitter link" />
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input value="{{ optional($setting)->insta_link }}" name="insta_link" type="text" class="form-control" placeholder="Instagram link" />
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input value="{{ optional($setting)->tube_link }}" name="tube_link" type="text" class="form-control" placeholder="Youtube link" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="float: right" class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Website Meta Teg</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Meta Name</label>
                                    <input value="{{ optional($setting)->meta_name }}" name="meta_name" type="text" class="form-control" placeholder="meta name" />
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <input value="{{ optional($setting)->meta_des }}" name="meta_des" type="text" class="form-control" placeholder="meta description" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="id" type="hidden" value="{{ optional($setting)->id }}"/>
                    <div class="card" style="width: 100%">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                site_name: {
                    required: true
                },
                site_tag_line: {
                    required: true
                },
                email: {
                    required: true,
                    email:true
                },
                cell: {
                    required: true
                },
                address: {
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
                $("#setting_add").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{ route('setting.store') }}",
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
                            title: 'Setup successfull.'
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
    
    function iconUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#icon-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#icon").change(function() {
        iconUrl(this);
    });


</script>

@endsection
@endsection
