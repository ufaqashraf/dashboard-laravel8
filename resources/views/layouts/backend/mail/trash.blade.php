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
        <div class="card-header">
            <h3 class="card-title">Trash</h3>
            <div class="float-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
              </div>
            </div>
          </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
              @foreach ($mails->where('status','trash') as $mail)
              <a href="{{ route('show.mail',$mail->id) }}"></a>
              <tr>
                <td>
                  <div class="icheck-primary">
                    <a href="{{route('msg.destroy',$mail->id)}}" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></a>
                  </div>
                </td>
                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                <td class="mailbox-name"><a href="{{ route('show.mail',$mail->id) }}">{{ Str::limit(optional($mail)->to,'10',' ') }}</a></td>
                <td class="mailbox-subject">{{ Str::limit($mail->msg,50,'...') }}
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">{{ \Carbon\Carbon::parse(optional($mail)->updated_at)->diffForHumans() }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer p-0">
        <div class="mailbox-controls">
          <div class="float-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
</div>

@endsection
