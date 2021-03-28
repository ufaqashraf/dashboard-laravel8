@extends('layouts.frontend.app')

@section('content')

<div class="banner">
    <div class="bg-color">
        <div class="container">
            <div class="row">
                <div class="banner-text text-center">
                    <div class="text-border">
                        <h2 class="text-dec">Trusted Fraud Prevention</h2>
                    </div>
                    <div class="intro-para text-center quote">
                        <p class="big-text">At Trazenet, we provide advanced fraud prevention tools for Government,
                            Banks and Online Merchants.</p>
                        <p class="small-text">Our Solution is an end-to-end fraud prevention system</p>
                        <a href="{{route('login')}}" target="_blank" class="btn get-quote">GET STARTED NOW</a>
                    </div>
                    <a href="#feature" class="mouse-hover">
                        <div class="mouse"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Banner-->



<!--Organisations-->
<section id="organisations" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">About Us</h2>
                <p class="cta-2-txt">Are you a bank, acquirer, merchant or a player in the commerce value chain,
                    Trazenet is all you need to manage your entire payment risk Online and offline, card or
                    non-card, Our risk engine helps prevent fraud using machine learning.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-4 user-details">
                <div class="user-image">
                    <img src="img/account_takeover.jpg" class="img-circlea" width="150">

                </div>
                <div class="user-info-block">
                    <div class="user-body">
                        <div class="tab-content">
                            <h2>Account Takeover</h2>
                            <p>We apply predictive behavioural
                                analytics to stop account
                                takeovers even when fraudsters
                                are using information that are
                                readily available from data
                                breaches coupled with
                                sophisticated techniques such as
                                phishing with fake websites,
                                malware or spyware, mining
                                social media or hijacking a
                                mobile device.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 user-details">
                <div class="user-image">
                    <img src="img/payment_fund.jpg" class="img-circlea" width="178">
                </div>
                <div class="user-info-block">
                    <div class="user-body">
                        <div class="tab-content">
                            <h2>Payment Fraud</h2>
                            <p>Trazenet instantly assesses risk
                                across multiple channels and payment
                                types with real-time scoring.
                                Detect payment fraud in a variety of
                                transactions from prepaid debit cards
                                to ACH transfers</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 user-details">
                <div class="user-image">
                    <img src="img/help.jpg" class="img-circlea" width="150">
                </div>
                <div class="user-info-block">
                    <div class="user-body">
                        <div class="tab-content">
                            <h2>Insider Fraud</h2>
                            <p>Our Insider Fraud solutions help
                                minimise financial loss, protect
                                customers and identify employee
                                misconduct, collusion, and theft.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>
<!--/ Organisations-->






<!--Feature-->
<section id="feature" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="header-section text-center">
                <h2>WHO WE SERVE</h2>
                <!--          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.</p>-->
                <hr class="bottom-line">
            </div>
            <div class="feature-info">
                <div class="fea">
                    <div class="col-md-3">
                        <div class="heading pull-right">
                            <h4>Banks</h4>
                            <p>Account Opening & Fraud Prevention, ID Checks, account verification accelerate
                                customer acceptance with less friction.</p>
                            <p>While Businesses endavour to safeguard against Fraud and other nefarious
                                activities,We have built the best fraud prevention tools to help in the fight.</p>
                        </div>
                        <div class="fea-img pull-left">
                            <i class="fa fa-institution"></i>
                        </div>
                    </div>
                </div>
                <div class="fea">
                    <div class="col-md-3">
                        <div class="heading pull-right">
                            <h4>Acquirer</h4>
                            <p>Trazenet gives you the ability to manage your portfolios based on your risk
                                tolerance. it provides the best tools to monitor potential fraud actions and allos
                                you to suspend transaction.</p>
                        </div>
                        <div class="fea-img pull-left">
                            <i class="fa fa-cubes"></i>
                        </div>
                    </div>
                </div>
                <div class="fea">
                    <div class="col-md-3">
                        <div class="heading pull-right">
                            <h4>Merchants</h4>
                            <p>Our high tech fraud prevention tool is designed to meet your eCommerce needs,
                                increase revenues and eliminate chargebacks.</p>
                            <p>Improve customer experience as we make it possible for orders to be approve without
                                manual review.</p>
                        </div>
                        <div class="fea-img pull-left">
                            <div>
                                <i class="fa fa-gg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="fea">
                        <div class="col-md-3">
                            <div class="heading pull-right">
                                <h4>Sole Traders</h4>
                                <p>With your Mobile device you can monitor your online businesses with our well
                                    built rule engine. Alert and Signals will reach you within seconds of actions,
                                    trace and investigate with our technology!</p>
                            </div>
                            <div class="fea-img pull-left">
                                <i class="fa fa-retweet"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!--/ feature-->


<!--work-shop-->
<!--  <section id="work-shop" class="section-padding">
<div class="container">
  <div class="row">
    <div class="header-section text-center">
      <h2>Download Our Desktop Application and Fraudwatch Footer Icon</h2>

      <hr class="bottom-line">
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="service-box text-center">
        <div class="icon-box">
          <i class="fa fa-download color-green"></i>
        </div>
        <div class="icon-text">
          <a href="setup.exe"><h4 class="ser-text">Desktop Application</h4></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="service-box text-center">
        <div class="icon-box">
          <i class="fa fa-cloud-download color-green"></i>
        </div>
        <div class="icon-text">
          <a href="sitelogo.txt"><h4 class="ser-text">Fraud Bursting Icon</h4></a>
        </div>
      </div>
    </div>

  </div>
</div>
</section> -->
<!--/ work-shop-->

<!--Cta-->
<section id="cta-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Dont Fight Fraud!</h2>
                <p class="cta-2-txt">We will fight the battle for you! Give us a call or send us an email!</p>
                <div class="row">
                    <div class="col-md-4 text-right">
                        <p>02037371836</p>
                    </div>
                    <div class="col-md-4 text-center"><a href="#footer" class="btn quote get-quote">REPORT IT
                            NOW</a></div>

                    <div class="col-md-4 text-left">
                        <p>admin@i-encry.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Cta---


<!--Pricing-->
<section id="pricing" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="header-section text-center">
                <h2>Our Pricing</h2>
                <!--          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.</p>-->
                <hr class="bottom-line">
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="price-table">
                    <!-- Plan  -->
                    <div class="pricing-head pricing-content">
                        <h4>SILVER</h4>
                        <span class="amount">$50.00 Per Website/ Month</span>
                        <ul>
                            <li>
                                <h5>Supported User - 1</h5>
                            </li>
                            <li>Setup & 24/7 Support<i class="fa fa-check icon-success"></i></li>
                            <li>10 Rules Set up<i class="fa fa-check icon-success"></i></li>
                            <li>Alerts & Signals<i class="fa fa-check icon-success"></i></li>
                            <li>Unlimited Reporting<i class="fa fa-check icon-success"></i></li>
                            <li>Fraud Analysis Chart<i class="fa fa-check icon-success"></i></li>
                            <li>Personalised Dashboard<i class="fa fa-check icon-success"></i></li>
                            <li>Customise with Your Logo<i class="fa fa-check icon-success"></i></li>
                            <li>Fraudwatch Footer Icon<i class="fa fa-check icon-success"></i></li>
                            <li>Desktop Application<i class="fa fa-check icon-success"></i></li>
                        </ul>
                    </div>



                    <!-- Plean Detail -->
                    <div class="price-in mart-15">
                        <a href="{{ route('login') }}" target="_blank" class="btn btn-bg green btn-block">PURCHACE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="price-table">
                    <!-- Plan  -->
                    <div class="pricing-head pricing-content">
                        <h4>GOLD</h4>
                        <span class="amount">$100.00 Per Website/ Month</span>
                        <ul>
                            <li>
                                <h5>Supported User - 1</h5>
                            </li>
                            <li>Setup & 24/7 Support<i class="fa fa-check icon-success"></i></li>
                            <li>50 Rules Set up<i class="fa fa-check icon-success"></i></li>
                            <li>Alerts & Signals<i class="fa fa-check icon-success"></i></li>
                            <li>Unlimited Reporting<i class="fa fa-check icon-success"></i></li>
                            <li>Fraud Analysis Chart<i class="fa fa-check icon-success"></i></li>
                            <li>Personalised Dashboard<i class="fa fa-check icon-success"></i></li>
                            <li>Customise with Your Logo<i class="fa fa-check icon-success"></i></li>
                            <li>Fraudwatch Footer Icon<i class="fa fa-check icon-success"></i></li>
                            <li>Desktop Application<i class="fa fa-check icon-success"></i></li>
                        </ul>
                    </div>

                    <!-- Plean Detail -->
                    <div class="price-in mart-15">
                        <a href="{{ route('login') }}" target="_blank" class="btn btn-bg red btn-block">PURCHASE</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="price-table">
                    <!-- Plan  -->
                    <div class="pricing-head pricing-content">
                        <h4>PLATINUM</h4>
                        <span class="amount">$200.00 Per Website/ Month</span>
                        <ul>
                            <li>
                                <h5>Supported User- 1</h5>
                            </li>
                            <li>Free Setup & 24/7 Support<i class="fa fa-check icon-success"></i></li>
                            <li>150 Rules<i class="fa fa-check icon-success"></i></li>
                            <li>Alerts & Signals<i class="fa fa-check icon-success"></i></li>
                            <li>Unlimited Reporting<i class="fa fa-check icon-success"></i></li>
                            <li>Fraud Analysis Chart<i class="fa fa-check icon-success"></i></li>
                            <li>Personalised Dashboard<i class="fa fa-check icon-success"></i></li>
                            <li>Customise with Your Logo<i class="fa fa-check icon-success"></i></li>
                            <li>Fraudwatch Footer Icon<i class="fa fa-check icon-success"></i></li>
                            <li>Desktop Application<i class="fa fa-check icon-success"></i></li>
                        </ul>
                    </div>

                    <!-- Plean Detail -->
                    <div class="price-in mart-15">
                        <a href="{{ route('login') }}" target="_blank" class="btn btn-bg red btn-block">PURCHASE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
