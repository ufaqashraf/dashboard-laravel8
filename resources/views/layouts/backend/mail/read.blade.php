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
        <h3 class="card-title">Read Mail</h3>

        <div class="card-tools">
          <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
          <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="mailbox-read-info">
          <h5>{{optional($msg)->subject}}</h5>
          <h6>To: {{optional($msg)->to}}
            <span class="mailbox-read-time float-right">{{\Carbon\Carbon::parse(optional($msg)->updated_at)->diffForHumans()}}</span></h6>
        </div>
        <div class="mailbox-read-message">
          <p>{{ optional($msg)->msg }}</p>
        </div>
        <!-- /.mailbox-read-message -->
      </div>
    </div>
    <!-- /.card -->
  </div>

  <script>
    $(function () {
      //Enable check and uncheck all functionality
      $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
          //Uncheck all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
          //Check all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
      })
      //Handle starring for glyphicon and font awesome
      $('.mailbox-star').click(function (e) {
        e.preventDefault()
        //detect type
        var $this = $(this).find('a > i')
        var glyph = $this.hasClass('glyphicon')
        var fa    = $this.hasClass('fa')
        //Switch states
        if (glyph) {
          $this.toggleClass('glyphicon-star')
          $this.toggleClass('glyphicon-star-empty')
        }
        if (fa) {
          $this.toggleClass('fa-star')
          $this.toggleClass('fa-star-o')
        }
      })
    })
  </script>
@endsection
