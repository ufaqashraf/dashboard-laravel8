<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Quick Links</h2>

                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><i class="fa fa-angle-right"></i><a href="#">How it works</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">About Us</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Our Services</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Contact us</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Features</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Pricing Plan</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Careers</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-md-6">
      <ul class="">
        <li class=""><i class="fa fa-angle-right"></i><a href="">Features</a></li>
        <li><i class="fa fa-angle-right"></i><a href=""> Pricing Plan</a></li>
        <li><i class="fa fa-angle-right"></i><a href=""> Careers</a></li>
        <li><i class="fa fa-angle-right"></i><a href="">Terms & Conditions</a></li>
      </ul>
    </div> -->
                </div>
            </div>
            <div class="col-md-4">
                <h2>Support</h2>
                <div class="single-support">
                    <div class="icon">
                        <i class="fa fa-facebook"></i>
                    </div>

                    <div class="text">
                        <h4>Address :</h4>
                        <span>223 Regent Street Mayfair, London W1B 2QD.</span>
                        <span style="display: block;"></span>
                    </div>
                </div>

                <div class="single-support">
                    <div class="icon">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <div class="text">
                        <h4>Call Us Now :</h4>
                        <span>02037371836</span>
                    </div>
                </div>

                <div class="single-support">
                    <div class="icon">
                        <i class="fa fa-facebook"></i>
                    </div>

                    <div class="text">
                        <h4>Email Us Now :</h4>
                        <span>info@trazenet.com</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2>Stay Informed</h2>
                <h3>Subscribe to Our Newsletter.</h3>
                <form class="mc-trial row">

                    <!-- End email input -->
                    <div class="form-group">
                        <div class=" controls">
                            <input name="EMAIL" placeholder="Enter Your email" class="form-control" type="email">
                        </div>
                    </div>
                    <!-- End email input -->
                    <div class="">
                        <p>
                            <button name="submit" type="submit" class="btn btn-block btn-submit">
                                Submit <i class="fa fa-arrow-right"></i></button>
                        </p>
                    </div>
                </form>

                <h5>Follow Us On :</h5>
                <ul class="social-links">
                    <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
                    <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
                    <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
                    <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
                    <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
                </ul>

            </div>
        </div>
    </div>

    <!--
<div class="container text-center">

  <h3>Newsletter</h3>

  <form class="mc-trial row">
    <div class="form-group col-md-3 col-md-offset-2 col-sm-4">
      <div class=" controls">
        <input name="name" placeholder="Enter Your Name" class="form-control" type="text">
      </div>
    </div>

    <div class="form-group col-md-3 col-sm-4">
      <div class=" controls">
        <input name="EMAIL" placeholder="Enter Your email" class="form-control" type="email">
      </div>
    </div>

    <div class="col-md-2 col-sm-4">
      <p>
        <button name="submit" type="submit" class="btn btn-block btn-submit">
        Submit <i class="fa fa-arrow-right"></i></button>
      </p>
    </div>
  </form>

  <div class="footer-logo text-center">
     <img src="img/logo_white.png" alt="">
  </div>

  <ul class="social-links">
    <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
    <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
    <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
    <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
    <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
</ul>
   ©2017 All right Reserved <a href="http://www.trazenet.com/">trazenet.Com</a>

</div>
-->

</footer>




<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
{{-- <script src="contactform/contactform.html"></script> --}}
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
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
