@extends('layouts.backend.mail.inbox')

@section('mail_content')
<style>
    .nav-link-color {
        color: #000 !important;
    }
</style>

<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Compose New Message</h3>

        </div>
        <!-- /.card-header -->
        <form id="compose">
            @csrf
            <div class="card-body row">
                <div class="form-group col-sm-12">
                    {{-- <input id="to" name="to" value="{{ optional($msg)->to }}" class="form-control" placeholder="To:"> --}}
                    <select id="to" name="to" class="form-control">
                        <option value="" selected="selected" hidden>To:</option>
                        @foreach ($users as $item)
                        <option value="{{$item->email}}">{{$item->f_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <input id="subject" value="{{ optional($msg)->subject }}" name="subject" class="form-control" placeholder="Subject:">
                </div>
                <div class="form-group col-sm-12">
                    <textarea id="msg" name="msg" class="form-control">{{ optional($msg)->msg }}</textarea>
                </div>
            </div>
            <input type="hidden" id="msg_id" name="id" value="{{ optional($msg)->id }}">
            <div class="card-footer">
                <div class="float-right">
                    <button type="button" onclick="draft()" class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                        Draft</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" onclick="discard()" class="btn btn-default"><i class="fas fa-times"></i>
                    Discard</button>
            </div>
        </form>
    </div>
</div>

@section('js')

<script>
      function discard(){
        $("#to").val('');
        $("#subject").val('');
        $("#msg").val('');
      }

      function draft(){
        $.ajax({
            url:"{{ route('mail.draft') }}",
            method:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                'to': $("#to").val(),
                'subject':$("#subject").val(),
                'msg':$("#msg").val()
            },
            success: function(response) {
                window.location.reload();
                Toast.fire({
                    icon:'success',
                    title:'Message saved successfull.'
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
      }

      $(document).ready(function () {
        $('#compose').validate({
            rules: {
                to: {
                    required: true
                },
                subject: {
                    required: true
                },
                msg: {
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
                    url: "{{route('send.msg')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("compose")),
                    enctype: 'multipart/form-data',
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
                        window.location.reload();
                        Toast.fire({
                            icon: 'success',
                            title: 'Message send successfull.'
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
</script>
@endsection
@endsection
