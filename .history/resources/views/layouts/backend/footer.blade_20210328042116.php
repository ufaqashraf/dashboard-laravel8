<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2020 <a href="https://ideatechsolution.com">AdminPanel</a>.</strong> All rights reserved.
  </footer>

</div>
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('backend/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
{{-- <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('backend/dist/js/jqvalidation.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script src="{{ asset('backend/dist/js/validate.js')}}"></script>

<script>
  const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>






@yield('js')
</body>

</html>
