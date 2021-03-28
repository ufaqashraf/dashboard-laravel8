@extends('layouts.frontend.app')
<style>
  .loading-spin{
        position: absolute;
        z-index: 9999;
        left: 45%;
        top: 50%;
        display: none;
    }
    .loading-spin img{
        height: 100%;
        width: 100%;
    }
</style>
@section('content')
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content no 1-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center form-title">Login</h4>
                </div>
                <div class="modal-body padtrbl">

                    <div class="login-box-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <div class="form-group">
                            <form name="" id="loginForm">
                                <div class="form-group has-feedback">
                                    <!----- username -------------->
                                    <input class="form-control" placeholder="Username" id="loginid" type="text"
                                        autocomplete="off" />
                                    <span
                                        style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                                        id="span_loginid"></span>
                                    <!---Alredy exists  ! -->
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <!----- password -------------->
                                    <input class="form-control" placeholder="Password" id="loginpsw" type="password"
                                        autocomplete="off" />
                                    <span
                                        style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                                        id="span_loginpsw"></span>
                                    <!---Alredy exists  ! -->
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox icheck">
                                            <label>
                                                <input type="checkbox" id="loginrem"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <button type="button" class="btn btn-green btn-block btn-flat"
                                            onclick="userlogin()">Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!--Modal box-->
    <div class="modal fade" id="results" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content no 1-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center form-title">Results</h4>
                </div>
                <div class="modal-body padtrbl">

                    <div class="login-box-body">
                        <p class="login-box-msg">Results of Demo Form</p>
                        <div id="dresults" class="form-group">
                            Alert: <p id="dralerts"></p>
                            Passed Rules: <p id="drpasses"></p>
                            Failed Rules: <p id="drfails"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <section class="api_demo">
        <div class="loading-spin" id="spin">
          <img src="{{ asset('/loading.gif') }}" alt="">
        </div>
        <div id="demoForm" class="container" style="position: relative;">
            <form id="form">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <h3 class="" style="color: #717f86;">Order Details</h3>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Format</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>json</option>
                                <option>xml</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">customer_name</label>
                            <input type="text" name="f_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ip (mandatory)</label>
                            <input type="text" class="form-control"
                                placeholder="103.41.212.90">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">user_order_id</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">user_order_memo</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">amount</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">quantity</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Format</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="AFN"> AFN (Afghanistan Afghani)</option>
                                <option value="ALL"> ALL (Albania Lek)</option>
                                <option value="DZD"> DZD (Algeria Dinar)</option>
                                <option value="AOA"> AOA (Angola Kwanza)</option>
                                <option value="ARS"> ARS (Argentina Peso)</option>
                                <option value="AMD"> AMD (Armenia Dram)</option>
                                <option value="AWG"> AWG (Aruba Guilder)</option>
                                <option value="AUD"> AUD (Australia Dollar)</option>
                                <option value="AZN"> AZN (Azerbaijan New Manat)</option>
                                <option value="BSD"> BSD (Bahamas Dollar)</option>
                                <option value="BHD"> BHD (Bahrain Dinar)</option>
                                <option value="BDT"> BDT (Bangladesh Taka)</option>
                                <option value="BBD"> BBD (Barbados Dollar)</option>
                                <option value="BYR"> BYR (Belarus Ruble)</option>
                                <option value="BZD"> BZD (Belize Dollar)</option>
                                <option value="BMD"> BMD (Bermuda Dollar)</option>
                                <option value="BTN"> BTN (Bhutan Ngultrum)</option>
                                <option value="BOB"> BOB (Bolivia Boliviano)</option>
                                <option value="BAM"> BAM (Bosnia and Herzegovina Convertible Marka)</option>
                                <option value="BWP"> BWP (Botswana Pula)</option>
                                <option value="BRL"> BRL (Brazil Real)</option>
                                <option value="BND"> BND (Brunei Darussalam Dollar)</option>
                                <option value="BGN"> BGN (Bulgaria Lev)</option>
                                <option value="BIF"> BIF (Burundi Franc)</option>
                                <option value="KHR"> KHR (Cambodia Riel)</option>
                                <option value="CAD"> CAD (Canada Dollar)</option>
                                <option value="CVE"> CVE (Cape Verde Escudo)</option>
                                <option value="KYD"> KYD (Cayman Islands Dollar)</option>
                                <option value="CLP"> CLP (Chile Peso)</option>
                                <option value="CNY"> CNY (China Yuan Renminbi)</option>
                                <option value="COP"> COP (Colombia Peso)</option>
                                <option value="XOF"> XOF (Communauté Financière Africaine (BCEAO) Franc)</option>
                                <option value="XAF"> XAF (Communauté Financière Africaine (BEAC) CFA Franc BEAC)</option>
                                <option value="KMF"> KMF (Comoros Franc)</option>
                                <option value="XPF"> XPF (Comptoirs Français du Pacifique (CFP) Franc)</option>
                                <option value="CDF"> CDF (Congo/Kinshasa Franc)</option>
                                <option value="CRC"> CRC (Costa Rica Colon)</option>
                                <option value="HRK"> HRK (Croatia Kuna)</option>
                                <option value="CUC"> CUC (Cuba Convertible Peso)</option>
                                <option value="CUP"> CUP (Cuba Peso)</option>
                                <option value="CZK"> CZK (Czech Republic Koruna)</option>
                                <option value="DKK"> DKK (Denmark Krone)</option>
                                <option value="DJF"> DJF (Djibouti Franc)</option>
                                <option value="DOP"> DOP (Dominican Republic Peso)</option>
                                <option value="XCD"> XCD (East Caribbean Dollar)</option>
                                <option value="EGP"> EGP (Egypt Pound)</option>
                                <option value="SVC"> SVC (El Salvador Colon)</option>
                                <option value="ERN"> ERN (Eritrea Nakfa)</option>
                                <option value="ETB"> ETB (Ethiopia Birr)</option>
                                <option value="EUR"> EUR (Euro Member Countries)</option>
                                <option value="FKP"> FKP (Falkland Islands (Malvinas) Pound)</option>
                                <option value="FJD"> FJD (Fiji Dollar)</option>
                                <option value="GMD"> GMD (Gambia Dalasi)</option>
                                <option value="GEL"> GEL (Georgia Lari)</option>
                                <option value="GHS"> GHS (Ghana Cedi)</option>
                                <option value="GIP"> GIP (Gibraltar Pound)</option>
                                <option value="GTQ"> GTQ (Guatemala Quetzal)</option>
                                <option value="GGP"> GGP (Guernsey Pound)</option>
                                <option value="GNF"> GNF (Guinea Franc)</option>
                                <option value="GYD"> GYD (Guyana Dollar)</option>
                                <option value="HTG"> HTG (Haiti Gourde)</option>
                                <option value="HNL"> HNL (Honduras Lempira)</option>
                                <option value="HKD"> HKD (Hong Kong Dollar)</option>
                                <option value="HUF"> HUF (Hungary Forint)</option>
                                <option value="ISK"> ISK (Iceland Krona)</option>
                                <option value="INR"> INR (India Rupee)</option>
                                <option value="IDR"> IDR (Indonesia Rupiah)</option>
                                <option value="XDR"> XDR (International Monetary Fund (IMF) Special Drawing Rights)</option>
                                <option value="IRR"> IRR (Iran Rial)</option>
                                <option value="IQD"> IQD (Iraq Dinar)</option>
                                <option value="IMP"> IMP (Isle of Man Pound)</option>
                                <option value="ILS"> ILS (Israel Shekel)</option>
                                <option value="JMD"> JMD (Jamaica Dollar)</option>
                                <option value="JPY"> JPY (Japan Yen)</option>
                                <option value="JEP"> JEP (Jersey Pound)</option>
                                <option value="JOD"> JOD (Jordan Dinar)</option>
                                <option value="KZT"> KZT (Kazakhstan Tenge)</option>
                                <option value="KES"> KES (Kenya Shilling)</option>
                                <option value="KPW"> KPW (Korea (North) Won)</option>
                                <option value="KRW"> KRW (Korea (South) Won)</option>
                                <option value="KWD"> KWD (Kuwait Dinar)</option>
                                <option value="KGS"> KGS (Kyrgyzstan Som)</option>
                                <option value="LAK"> LAK (Laos Kip)</option>
                                <option value="LBP"> LBP (Lebanon Pound)</option>
                                <option value="LSL"> LSL (Lesotho Loti)</option>
                                <option value="LRD"> LRD (Liberia Dollar)</option>
                                <option value="LYD"> LYD (Libya Dinar)</option>
                                <option value="MOP"> MOP (Macau Pataca)</option>
                                <option value="MKD"> MKD (Macedonia Denar)</option>
                                <option value="MGA"> MGA (Madagascar Ariary)</option>
                                <option value="MWK"> MWK (Malawi Kwacha)</option>
                                <option value="MYR"> MYR (Malaysia Ringgit)</option>
                                <option value="MVR"> MVR (Maldives (Maldive Islands) Rufiyaa)</option>
                                <option value="MRO"> MRO (Mauritania Ouguiya)</option>
                                <option value="MUR"> MUR (Mauritius Rupee)</option>
                                <option value="MXN"> MXN (Mexico Peso)</option>
                                <option value="MDL"> MDL (Moldova Leu)</option>
                                <option value="MNT"> MNT (Mongolia Tughrik)</option>
                                <option value="MAD"> MAD (Morocco Dirham)</option>
                                <option value="MZN"> MZN (Mozambique Metical)</option>
                                <option value="MMK"> MMK (Myanmar (Burma) Kyat)</option>
                                <option value="NAD"> NAD (Namibia Dollar)</option>
                                <option value="NPR"> NPR (Nepal Rupee)</option>
                                <option value="ANG"> ANG (Netherlands Antilles Guilder)</option>
                                <option value="NZD"> NZD (New Zealand Dollar)</option>
                                <option value="NIO"> NIO (Nicaragua Cordoba)</option>
                                <option value="NGN"> NGN (Nigeria Naira)</option>
                                <option value="NOK"> NOK (Norway Krone)</option>
                                <option value="OMR"> OMR (Oman Rial)</option>
                                <option value="PKR"> PKR (Pakistan Rupee)</option>
                                <option value="PAB"> PAB (Panama Balboa)</option>
                                <option value="PGK"> PGK (Papua New Guinea Kina)</option>
                                <option value="PYG"> PYG (Paraguay Guarani)</option>
                                <option value="PEN"> PEN (Peru Nuevo Sol)</option>
                                <option value="PHP"> PHP (Philippines Peso)</option>
                                <option value="PLN"> PLN (Poland Zloty)</option>
                                <option value="QAR"> QAR (Qatar Riyal)</option>
                                <option value="RON"> RON (Romania New Leu)</option>
                                <option value="RUB"> RUB (Russia Ruble)</option>
                                <option value="RWF"> RWF (Rwanda Franc)</option>
                                <option value="SHP"> SHP (Saint Helena Pound)</option>
                                <option value="WST"> WST (Samoa Tala)</option>
                                <option value="STD"> STD (São Tomé and Príncipe Dobra)</option>
                                <option value="SAR"> SAR (Saudi Arabia Riyal)</option>
                                <option value="SPL"> SPL (Seborga Luigino)</option>
                                <option value="RSD"> RSD (Serbia Dinar)</option>
                                <option value="SCR"> SCR (Seychelles Rupee)</option>
                                <option value="SLL"> SLL (Sierra Leone Leone)</option>
                                <option value="SGD"> SGD (Singapore Dollar)</option>
                                <option value="SBD"> SBD (Solomon Islands Dollar)</option>
                                <option value="SOS"> SOS (Somalia Shilling)</option>
                                <option value="ZAR"> ZAR (South Africa Rand)</option>
                                <option value="LKR"> LKR (Sri Lanka Rupee)</option>
                                <option value="SDG"> SDG (Sudan Pound)</option>
                                <option value="SRD"> SRD (Suriname Dollar)</option>
                                <option value="SZL"> SZL (Swaziland Lilangeni)</option>
                                <option value="SEK"> SEK (Sweden Krona)</option>
                                <option value="CHF"> CHF (Switzerland Franc)</option>
                                <option value="SYP"> SYP (Syria Pound)</option>
                                <option value="TWD"> TWD (Taiwan New Dollar)</option>
                                <option value="TJS"> TJS (Tajikistan Somoni)</option>
                                <option value="TZS"> TZS (Tanzania Shilling)</option>
                                <option value="THB"> THB (Thailand Baht)</option>
                                <option value="TOP"> TOP (Tonga Pa'anga)</option>
                                <option value="TTD"> TTD (Trinidad and Tobago Dollar)</option>
                                <option value="TND"> TND (Tunisia Dinar)</option>
                                <option value="TRY"> TRY (Turkey Lira)</option>
                                <option value="TMT"> TMT (Turkmenistan Manat)</option>
                                <option value="TVD"> TVD (Tuvalu Dollar)</option>
                                <option value="UGX"> UGX (Uganda Shilling)</option>
                                <option value="UAH"> UAH (Ukraine Hryvnia)</option>
                                <option value="AED"> AED (United Arab Emirates Dirham)</option>
                                <option value="GBP"> GBP (United Kingdom Pound)</option>
                                <option value="USD" selected> USD (United States Dollar)</option>
                                <option value="UYU"> UYU (Uruguay Peso)</option>
                                <option value="UZS"> UZS (Uzbekistan Som)</option>
                                <option value="VUV"> VUV (Vanuatu Vatu)</option>
                                <option value="VEF"> VEF (Venezuela Bolivar)</option>
                                <option value="VND"> VND (Viet Nam Dong)</option>
                                <option value="YER"> YER (Yemen Rial)</option>
                                <option value="ZMW"> ZMW (Zambia Kwacha)</option>
                                <option value="ZWD"> ZWD (Zimbabwe Dollar)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">department</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">email_domain</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">phone</label>
                            <input type="text" name="phn" class="form-control" placeholder="enter phone number">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">email hash*</label>
                            <input type="email" name="email" class="form-control" placeholder="enter email">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">username hash*</label>
                            <input type="text" name="username" class="form-control" placeholder="enter username">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">password hash*</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="" style="color: #717f86;">Billing Details</h3>

                        <div class="form-group">
                            <label for="paymentMethod">payment_mode</label>
                            <div>
                                <select id="paymentMethod" name="paymentMethod" class="form-control chosen-select">

                                    <option value="creditcard"> Credit Card</option>
                                    <option value="paypal"> PayPal</option>
                                    <option value="googlecheckout"> Google Checkout</option>
                                    <option value="cod"> Cash On Delivery</option>
                                    <option value="moneyorder"> Money Order</option>
                                    <option value="wired"> Wire Transfer</option>
                                    <option value="bankdeposit"> Bank Deposit</option>
                                    <option value="bitcoin"> Bitcoin</option>
                                    <option value="others" selected> Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="billCity">bill_city</label>
                            <div>
                                <input name="billCity" id="billCity" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="billZIPCode">bill_zip_code</label>
                            <div>
                                <input name="billZIPCode" id="billZIPCode" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="billState">bill_state</label>
                            <div>
                                <input name="billState" id="billState" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="billCountry">bill_country</label>
                            <div>
                                <select id="billCountry" name="billCountry" class="form-control chosen-select">
                                    <option value=""> Select Country...</option>

                                    <option value="AF"> Afghanistan</option>
                                    <option value="AL"> Albania</option>
                                    <option value="DZ"> Algeria</option>
                                    <option value="AS"> American Samoa</option>
                                    <option value="AD"> Andorra</option>
                                    <option value="AO"> Angola</option>
                                    <option value="AI"> Anguilla</option>
                                    <option value="AQ"> Antarctica</option>
                                    <option value="AG"> Antigua and Barbuda</option>
                                    <option value="AR"> Argentina</option>
                                    <option value="AM"> Armenia</option>
                                    <option value="AW"> Aruba</option>
                                    <option value="AU"> Australia</option>
                                    <option value="AT"> Austria</option>
                                    <option value="AZ"> Azerbaijan</option>
                                    <option value="BS"> Bahamas</option>
                                    <option value="BH"> Bahrain</option>
                                    <option value="BD"> Bangladesh</option>
                                    <option value="BB"> Barbados</option>
                                    <option value="BY"> Belarus</option>
                                    <option value="BE"> Belgium</option>
                                    <option value="BZ"> Belize</option>
                                    <option value="BJ"> Benin</option>
                                    <option value="BM"> Bermuda</option>
                                    <option value="BT"> Bhutan</option>
                                    <option value="BO"> Bolivia</option>
                                    <option value="BA"> Bosnia and Herzegovina</option>
                                    <option value="BW"> Botswana</option>
                                    <option value="BV"> Bouvet Island</option>
                                    <option value="BR"> Brazil</option>
                                    <option value="IO"> British Indian Ocean Territory</option>
                                    <option value="BN"> Brunei Darussalam</option>
                                    <option value="BG"> Bulgaria</option>
                                    <option value="BF"> Burkina Faso</option>
                                    <option value="BI"> Burundi</option>
                                    <option value="KH"> Cambodia</option>
                                    <option value="CM"> Cameroon</option>
                                    <option value="CA"> Canada</option>
                                    <option value="CV"> Cape Verde</option>
                                    <option value="KY"> Cayman Islands</option>
                                    <option value="CF"> Central African Republic</option>
                                    <option value="TD"> Chad</option>
                                    <option value="CL"> Chile</option>
                                    <option value="CN"> China</option>
                                    <option value="CX"> Christmas Island</option>
                                    <option value="CC"> Cocos (Keeling) Islands</option>
                                    <option value="CO"> Colombia</option>
                                    <option value="KM"> Comoros</option>
                                    <option value="CG"> Congo</option>
                                    <option value="CK"> Cook Islands</option>
                                    <option value="CR"> Costa Rica</option>
                                    <option value="CI"> Cote D'Ivoire</option>
                                    <option value="HR"> Croatia</option>
                                    <option value="CU"> Cuba</option>
                                    <option value="CY"> Cyprus</option>
                                    <option value="CZ"> Czech Republic</option>
                                    <option value="CD"> Democratic Republic of Congo</option>
                                    <option value="DK"> Denmark</option>
                                    <option value="DJ"> Djibouti</option>
                                    <option value="DM"> Dominica</option>
                                    <option value="DO"> Dominican Republic</option>
                                    <option value="TP"> East Timor</option>
                                    <option value="EC"> Ecuador</option>
                                    <option value="EG"> Egypt</option>
                                    <option value="SV"> El Salvador</option>
                                    <option value="GQ"> Equatorial Guinea</option>
                                    <option value="ER"> Eritrea</option>
                                    <option value="EE"> Estonia</option>
                                    <option value="ET"> Ethiopia</option>
                                    <option value="FK"> Falkland Islands (Malvinas)</option>
                                    <option value="FO"> Faroe Islands</option>
                                    <option value="FJ"> Fiji</option>
                                    <option value="FI"> Finland</option>
                                    <option value="FR"> France</option>
                                    <option value="FX"> France, Metropolitan</option>
                                    <option value="GF"> French Guiana</option>
                                    <option value="PF"> French Polynesia</option>
                                    <option value="TF"> French Southern Territories</option>
                                    <option value="GA"> Gabon</option>
                                    <option value="GM"> Gambia</option>
                                    <option value="GE"> Georgia</option>
                                    <option value="DE"> Germany</option>
                                    <option value="GH"> Ghana</option>
                                    <option value="GI"> Gibraltar</option>
                                    <option value="GR"> Greece</option>
                                    <option value="GL"> Greenland</option>
                                    <option value="GD"> Grenada</option>
                                    <option value="GP"> Guadeloupe</option>
                                    <option value="GU"> Guam</option>
                                    <option value="GT"> Guatemala</option>
                                    <option value="GN"> Guinea</option>
                                    <option value="GW"> Guinea-bissau</option>
                                    <option value="GY"> Guyana</option>
                                    <option value="HT"> Haiti</option>
                                    <option value="HM"> Heard and Mc Donald Islands</option>
                                    <option value="HN"> Honduras</option>
                                    <option value="HK"> Hong Kong</option>
                                    <option value="HU"> Hungary</option>
                                    <option value="IS"> Iceland</option>
                                    <option value="IN"> India</option>
                                    <option value="ID"> Indonesia</option>
                                    <option value="IR"> Iran (Islamic Republic of)</option>
                                    <option value="IQ"> Iraq</option>
                                    <option value="IE"> Ireland</option>
                                    <option value="IL"> Israel</option>
                                    <option value="IT"> Italy</option>
                                    <option value="JM"> Jamaica</option>
                                    <option value="JP"> Japan</option>
                                    <option value="JO"> Jordan</option>
                                    <option value="KZ"> Kazakhstan</option>
                                    <option value="KE"> Kenya</option>
                                    <option value="KI"> Kiribati</option>
                                    <option value="KR"> Korea, Republic of</option>
                                    <option value="KW"> Kuwait</option>
                                    <option value="KG"> Kyrgyzstan</option>
                                    <option value="LA"> Lao People's Democratic Republic</option>
                                    <option value="LV"> Latvia</option>
                                    <option value="LB"> Lebanon</option>
                                    <option value="LS"> Lesotho</option>
                                    <option value="LR"> Liberia</option>
                                    <option value="LY"> Libyan Arab Jamahiriya</option>
                                    <option value="LI"> Liechtenstein</option>
                                    <option value="LT"> Lithuania</option>
                                    <option value="LU"> Luxembourg</option>
                                    <option value="MO"> Macau</option>
                                    <option value="MK"> Macedonia</option>
                                    <option value="MG"> Madagascar</option>
                                    <option value="MW"> Malawi</option>
                                    <option value="MY"> Malaysia</option>
                                    <option value="MV"> Maldives</option>
                                    <option value="ML"> Mali</option>
                                    <option value="MT"> Malta</option>
                                    <option value="MH"> Marshall Islands</option>
                                    <option value="MQ"> Martinique</option>
                                    <option value="MR"> Mauritania</option>
                                    <option value="MU"> Mauritius</option>
                                    <option value="YT"> Mayotte</option>
                                    <option value="MX"> Mexico</option>
                                    <option value="FM"> Micronesia, Federated States of</option>
                                    <option value="MD"> Moldova, Republic of</option>
                                    <option value="MC"> Monaco</option>
                                    <option value="MN"> Mongolia</option>
                                    <option value="MS"> Montserrat</option>
                                    <option value="MA"> Morocco</option>
                                    <option value="MZ"> Mozambique</option>
                                    <option value="MM"> Myanmar</option>
                                    <option value="NA"> Namibia</option>
                                    <option value="NR"> Nauru</option>
                                    <option value="NP"> Nepal</option>
                                    <option value="NL"> Netherlands</option>
                                    <option value="AN"> Netherlands Antilles</option>
                                    <option value="NC"> New Caledonia</option>
                                    <option value="NZ"> New Zealand</option>
                                    <option value="NI"> Nicaragua</option>
                                    <option value="NE"> Niger</option>
                                    <option value="NG"> Nigeria</option>
                                    <option value="NU"> Niue</option>
                                    <option value="NF"> Norfolk Island</option>
                                    <option value="KP"> North Korea</option>
                                    <option value="MP"> Northern Mariana Islands</option>
                                    <option value="NO"> Norway</option>
                                    <option value="OM"> Oman</option>
                                    <option value="PK"> Pakistan</option>
                                    <option value="PW"> Palau</option>
                                    <option value="PA"> Panama</option>
                                    <option value="PG"> Papua New Guinea</option>
                                    <option value="PY"> Paraguay</option>
                                    <option value="PE"> Peru</option>
                                    <option value="PH"> Philippines</option>
                                    <option value="PN"> Pitcairn</option>
                                    <option value="PL"> Poland</option>
                                    <option value="PT"> Portugal</option>
                                    <option value="PR"> Puerto Rico</option>
                                    <option value="QA"> Qatar</option>
                                    <option value="RE"> Reunion</option>
                                    <option value="RO"> Romania</option>
                                    <option value="RU"> Russian Federation</option>
                                    <option value="RW"> Rwanda</option>
                                    <option value="KN"> Saint Kitts and Nevis</option>
                                    <option value="LC"> Saint Lucia</option>
                                    <option value="VC"> Saint Vincent and the Grenadines</option>
                                    <option value="WS"> Samoa</option>
                                    <option value="SM"> San Marino</option>
                                    <option value="ST"> Sao Tome and Principe</option>
                                    <option value="SA"> Saudi Arabia</option>
                                    <option value="SN"> Senegal</option>
                                    <option value="SC"> Seychelles</option>
                                    <option value="SL"> Sierra Leone</option>
                                    <option value="SG"> Singapore</option>
                                    <option value="SK"> Slovak Republic</option>
                                    <option value="SI"> Slovenia</option>
                                    <option value="SB"> Solomon Islands</option>
                                    <option value="SO"> Somalia</option>
                                    <option value="ZA"> South Africa</option>
                                    <option value="GS"> South Georgia And The South Sandwich Islands</option>
                                    <option value="ES"> Spain</option>
                                    <option value="LK"> Sri Lanka</option>
                                    <option value="SH"> St. Helena</option>
                                    <option value="PM"> St. Pierre and Miquelon</option>
                                    <option value="SD"> Sudan</option>
                                    <option value="SR"> Suriname</option>
                                    <option value="SJ"> Svalbard and Jan Mayen Islands</option>
                                    <option value="SZ"> Swaziland</option>
                                    <option value="SE"> Sweden</option>
                                    <option value="CH"> Switzerland</option>
                                    <option value="SY"> Syrian Arab Republic</option>
                                    <option value="TW"> Taiwan</option>
                                    <option value="TJ"> Tajikistan</option>
                                    <option value="TZ"> Tanzania, United Republic of</option>
                                    <option value="TH"> Thailand</option>
                                    <option value="TG"> Togo</option>
                                    <option value="TK"> Tokelau</option>
                                    <option value="TO"> Tonga</option>
                                    <option value="TT"> Trinidad and Tobago</option>
                                    <option value="TN"> Tunisia</option>
                                    <option value="TR"> Turkey</option>
                                    <option value="TM"> Turkmenistan</option>
                                    <option value="TC"> Turks and Caicos Islands</option>
                                    <option value="TV"> Tuvalu</option>
                                    <option value="UG"> Uganda</option>
                                    <option value="UA"> Ukraine</option>
                                    <option value="AE"> United Arab Emirates</option>
                                    <option value="GB"> United Kingdom</option>
                                    <option value="US"> United States</option>
                                    <option value="UM"> United States Minor Outlying Islands</option>
                                    <option value="UY"> Uruguay</option>
                                    <option value="UZ"> Uzbekistan</option>
                                    <option value="VU"> Vanuatu</option>
                                    <option value="VA"> Vatican City State (Holy See)</option>
                                    <option value="VE"> Venezuela</option>
                                    <option value="VN"> Viet Nam</option>
                                    <option value="VG"> Virgin Islands (British)</option>
                                    <option value="VI"> Virgin Islands (U.S.)</option>
                                    <option value="WF"> Wallis and Futuna Islands</option>
                                    <option value="EH"> Western Sahara</option>
                                    <option value="YE"> Yemen</option>
                                    <option value="YU"> Yugoslavia</option>
                                    <option value="ZM"> Zambia</option>
                                    <option value="ZW"> Zimbabwe</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="binNo">bin_no</label>
                            <div>
                                <input name="binNo" id="binNo" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="binBankName">bin_bank_name</label>
                            <div>
                                <input name="binBankName" id="binBankName" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="binBankCountry">bin_bank_country</label>
                            <div>
                                <input name="binBankCountry" id="binBankCountry" class="form-control" type="text"
                                    value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="binBankPhone">bin_bank_phone</label>
                            <div>
                                <input name="binBankPhone" id="binBankPhone" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cardHash">card_hash*</label>
                            <div>
                                <input name="cardHash" id="cardHash" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avs">avs</label>
                            <div>
                                <select id="avs" name="avs" class="form-control chosen-select">
                                    <option value=""> Select AVS Code</option>

                                    <option value="A"> A</option>
                                    <option value="B"> B</option>
                                    <option value="C"> C</option>
                                    <option value="D"> D</option>
                                    <option value="E"> E</option>
                                    <option value="G"> G</option>
                                    <option value="I"> I</option>
                                    <option value="M"> M</option>
                                    <option value="N"> N</option>
                                    <option value="P"> P</option>
                                    <option value="R"> R</option>
                                    <option value="S"> S</option>
                                    <option value="U"> U</option>
                                    <option value="W"> W</option>
                                    <option value="X"> X</option>
                                    <option value="Y"> Y</option>
                                    <option value="Z"> Z</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cvv">cvv</label>
                            <div>
                                <select id="cvv" name="cvv" class="form-control chosen-select">
                                    <option value=""> Select CVV Code</option>

                                    <option value="I"> I</option>
                                    <option value="M"> M</option>
                                    <option value="N"> N</option>
                                    <option value="P"> P</option>
                                    <option value="S"> S</option>
                                    <option value="U"> U</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="" style="color: #717f86;">Shipping Details</h3>

                        <div class="form-group">
                            <label for="shipAddress">ship_addr</label>
                            <div>
                                <input name="shipAddress" id="shipAddress" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="shipCity">ship_city</label>
                            <div>
                                <input name="shipCity" id="shipCity" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="shipZIPCode">ship_zip_code</label>
                            <div>
                                <input name="shipZIPCode" id="shipZIPCode" class="form-control" type="text" value="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="shipState">ship_state</label>
                            <div>
                                <input name="shipState" id="shipState" class="form-control" type="text" value="" />
                            </div>
                        </div>
                        <input type="hidden" name="duration" value="14">
                        <input type="hidden" name="payment" value="free">

                        <div class="form-group">
                            <label for="shipCountry">ship_country</label>
                            <div>
                                <select id="shipCountry" name="country" class="form-control chosen-select">
                                    <option value=""> Select Country...</option>

                                    <option value="AF"> Afghanistan</option>
                                    <option value="AL"> Albania</option>
                                    <option value="DZ"> Algeria</option>
                                    <option value="AS"> American Samoa</option>
                                    <option value="AD"> Andorra</option>
                                    <option value="AO"> Angola</option>
                                    <option value="AI"> Anguilla</option>
                                    <option value="AQ"> Antarctica</option>
                                    <option value="AG"> Antigua and Barbuda</option>
                                    <option value="AR"> Argentina</option>
                                    <option value="AM"> Armenia</option>
                                    <option value="AW"> Aruba</option>
                                    <option value="AU"> Australia</option>
                                    <option value="AT"> Austria</option>
                                    <option value="AZ"> Azerbaijan</option>
                                    <option value="BS"> Bahamas</option>
                                    <option value="BH"> Bahrain</option>
                                    <option value="BD"> Bangladesh</option>
                                    <option value="BB"> Barbados</option>
                                    <option value="BY"> Belarus</option>
                                    <option value="BE"> Belgium</option>
                                    <option value="BZ"> Belize</option>
                                    <option value="BJ"> Benin</option>
                                    <option value="BM"> Bermuda</option>
                                    <option value="BT"> Bhutan</option>
                                    <option value="BO"> Bolivia</option>
                                    <option value="BA"> Bosnia and Herzegovina</option>
                                    <option value="BW"> Botswana</option>
                                    <option value="BV"> Bouvet Island</option>
                                    <option value="BR"> Brazil</option>
                                    <option value="IO"> British Indian Ocean Territory</option>
                                    <option value="BN"> Brunei Darussalam</option>
                                    <option value="BG"> Bulgaria</option>
                                    <option value="BF"> Burkina Faso</option>
                                    <option value="BI"> Burundi</option>
                                    <option value="KH"> Cambodia</option>
                                    <option value="CM"> Cameroon</option>
                                    <option value="CA"> Canada</option>
                                    <option value="CV"> Cape Verde</option>
                                    <option value="KY"> Cayman Islands</option>
                                    <option value="CF"> Central African Republic</option>
                                    <option value="TD"> Chad</option>
                                    <option value="CL"> Chile</option>
                                    <option value="CN"> China</option>
                                    <option value="CX"> Christmas Island</option>
                                    <option value="CC"> Cocos (Keeling) Islands</option>
                                    <option value="CO"> Colombia</option>
                                    <option value="KM"> Comoros</option>
                                    <option value="CG"> Congo</option>
                                    <option value="CK"> Cook Islands</option>
                                    <option value="CR"> Costa Rica</option>
                                    <option value="CI"> Cote D'Ivoire</option>
                                    <option value="HR"> Croatia</option>
                                    <option value="CU"> Cuba</option>
                                    <option value="CY"> Cyprus</option>
                                    <option value="CZ"> Czech Republic</option>
                                    <option value="CD"> Democratic Republic of Congo</option>
                                    <option value="DK"> Denmark</option>
                                    <option value="DJ"> Djibouti</option>
                                    <option value="DM"> Dominica</option>
                                    <option value="DO"> Dominican Republic</option>
                                    <option value="TP"> East Timor</option>
                                    <option value="EC"> Ecuador</option>
                                    <option value="EG"> Egypt</option>
                                    <option value="SV"> El Salvador</option>
                                    <option value="GQ"> Equatorial Guinea</option>
                                    <option value="ER"> Eritrea</option>
                                    <option value="EE"> Estonia</option>
                                    <option value="ET"> Ethiopia</option>
                                    <option value="FK"> Falkland Islands (Malvinas)</option>
                                    <option value="FO"> Faroe Islands</option>
                                    <option value="FJ"> Fiji</option>
                                    <option value="FI"> Finland</option>
                                    <option value="FR"> France</option>
                                    <option value="FX"> France, Metropolitan</option>
                                    <option value="GF"> French Guiana</option>
                                    <option value="PF"> French Polynesia</option>
                                    <option value="TF"> French Southern Territories</option>
                                    <option value="GA"> Gabon</option>
                                    <option value="GM"> Gambia</option>
                                    <option value="GE"> Georgia</option>
                                    <option value="DE"> Germany</option>
                                    <option value="GH"> Ghana</option>
                                    <option value="GI"> Gibraltar</option>
                                    <option value="GR"> Greece</option>
                                    <option value="GL"> Greenland</option>
                                    <option value="GD"> Grenada</option>
                                    <option value="GP"> Guadeloupe</option>
                                    <option value="GU"> Guam</option>
                                    <option value="GT"> Guatemala</option>
                                    <option value="GN"> Guinea</option>
                                    <option value="GW"> Guinea-bissau</option>
                                    <option value="GY"> Guyana</option>
                                    <option value="HT"> Haiti</option>
                                    <option value="HM"> Heard and Mc Donald Islands</option>
                                    <option value="HN"> Honduras</option>
                                    <option value="HK"> Hong Kong</option>
                                    <option value="HU"> Hungary</option>
                                    <option value="IS"> Iceland</option>
                                    <option value="IN"> India</option>
                                    <option value="ID"> Indonesia</option>
                                    <option value="IR"> Iran (Islamic Republic of)</option>
                                    <option value="IQ"> Iraq</option>
                                    <option value="IE"> Ireland</option>
                                    <option value="IL"> Israel</option>
                                    <option value="IT"> Italy</option>
                                    <option value="JM"> Jamaica</option>
                                    <option value="JP"> Japan</option>
                                    <option value="JO"> Jordan</option>
                                    <option value="KZ"> Kazakhstan</option>
                                    <option value="KE"> Kenya</option>
                                    <option value="KI"> Kiribati</option>
                                    <option value="KR"> Korea, Republic of</option>
                                    <option value="KW"> Kuwait</option>
                                    <option value="KG"> Kyrgyzstan</option>
                                    <option value="LA"> Lao People's Democratic Republic</option>
                                    <option value="LV"> Latvia</option>
                                    <option value="LB"> Lebanon</option>
                                    <option value="LS"> Lesotho</option>
                                    <option value="LR"> Liberia</option>
                                    <option value="LY"> Libyan Arab Jamahiriya</option>
                                    <option value="LI"> Liechtenstein</option>
                                    <option value="LT"> Lithuania</option>
                                    <option value="LU"> Luxembourg</option>
                                    <option value="MO"> Macau</option>
                                    <option value="MK"> Macedonia</option>
                                    <option value="MG"> Madagascar</option>
                                    <option value="MW"> Malawi</option>
                                    <option value="MY"> Malaysia</option>
                                    <option value="MV"> Maldives</option>
                                    <option value="ML"> Mali</option>
                                    <option value="MT"> Malta</option>
                                    <option value="MH"> Marshall Islands</option>
                                    <option value="MQ"> Martinique</option>
                                    <option value="MR"> Mauritania</option>
                                    <option value="MU"> Mauritius</option>
                                    <option value="YT"> Mayotte</option>
                                    <option value="MX"> Mexico</option>
                                    <option value="FM"> Micronesia, Federated States of</option>
                                    <option value="MD"> Moldova, Republic of</option>
                                    <option value="MC"> Monaco</option>
                                    <option value="MN"> Mongolia</option>
                                    <option value="MS"> Montserrat</option>
                                    <option value="MA"> Morocco</option>
                                    <option value="MZ"> Mozambique</option>
                                    <option value="MM"> Myanmar</option>
                                    <option value="NA"> Namibia</option>
                                    <option value="NR"> Nauru</option>
                                    <option value="NP"> Nepal</option>
                                    <option value="NL"> Netherlands</option>
                                    <option value="AN"> Netherlands Antilles</option>
                                    <option value="NC"> New Caledonia</option>
                                    <option value="NZ"> New Zealand</option>
                                    <option value="NI"> Nicaragua</option>
                                    <option value="NE"> Niger</option>
                                    <option value="NG"> Nigeria</option>
                                    <option value="NU"> Niue</option>
                                    <option value="NF"> Norfolk Island</option>
                                    <option value="KP"> North Korea</option>
                                    <option value="MP"> Northern Mariana Islands</option>
                                    <option value="NO"> Norway</option>
                                    <option value="OM"> Oman</option>
                                    <option value="PK"> Pakistan</option>
                                    <option value="PW"> Palau</option>
                                    <option value="PA"> Panama</option>
                                    <option value="PG"> Papua New Guinea</option>
                                    <option value="PY"> Paraguay</option>
                                    <option value="PE"> Peru</option>
                                    <option value="PH"> Philippines</option>
                                    <option value="PN"> Pitcairn</option>
                                    <option value="PL"> Poland</option>
                                    <option value="PT"> Portugal</option>
                                    <option value="PR"> Puerto Rico</option>
                                    <option value="QA"> Qatar</option>
                                    <option value="RE"> Reunion</option>
                                    <option value="RO"> Romania</option>
                                    <option value="RU"> Russian Federation</option>
                                    <option value="RW"> Rwanda</option>
                                    <option value="KN"> Saint Kitts and Nevis</option>
                                    <option value="LC"> Saint Lucia</option>
                                    <option value="VC"> Saint Vincent and the Grenadines</option>
                                    <option value="WS"> Samoa</option>
                                    <option value="SM"> San Marino</option>
                                    <option value="ST"> Sao Tome and Principe</option>
                                    <option value="SA"> Saudi Arabia</option>
                                    <option value="SN"> Senegal</option>
                                    <option value="SC"> Seychelles</option>
                                    <option value="SL"> Sierra Leone</option>
                                    <option value="SG"> Singapore</option>
                                    <option value="SK"> Slovak Republic</option>
                                    <option value="SI"> Slovenia</option>
                                    <option value="SB"> Solomon Islands</option>
                                    <option value="SO"> Somalia</option>
                                    <option value="ZA"> South Africa</option>
                                    <option value="GS"> South Georgia And The South Sandwich Islands</option>
                                    <option value="ES"> Spain</option>
                                    <option value="LK"> Sri Lanka</option>
                                    <option value="SH"> St. Helena</option>
                                    <option value="PM"> St. Pierre and Miquelon</option>
                                    <option value="SD"> Sudan</option>
                                    <option value="SR"> Suriname</option>
                                    <option value="SJ"> Svalbard and Jan Mayen Islands</option>
                                    <option value="SZ"> Swaziland</option>
                                    <option value="SE"> Sweden</option>
                                    <option value="CH"> Switzerland</option>
                                    <option value="SY"> Syrian Arab Republic</option>
                                    <option value="TW"> Taiwan</option>
                                    <option value="TJ"> Tajikistan</option>
                                    <option value="TZ"> Tanzania, United Republic of</option>
                                    <option value="TH"> Thailand</option>
                                    <option value="TG"> Togo</option>
                                    <option value="TK"> Tokelau</option>
                                    <option value="TO"> Tonga</option>
                                    <option value="TT"> Trinidad and Tobago</option>
                                    <option value="TN"> Tunisia</option>
                                    <option value="TR"> Turkey</option>
                                    <option value="TM"> Turkmenistan</option>
                                    <option value="TC"> Turks and Caicos Islands</option>
                                    <option value="TV"> Tuvalu</option>
                                    <option value="UG"> Uganda</option>
                                    <option value="UA"> Ukraine</option>
                                    <option value="AE"> United Arab Emirates</option>
                                    <option value="GB"> United Kingdom</option>
                                    <option value="US"> United States</option>
                                    <option value="UM"> United States Minor Outlying Islands</option>
                                    <option value="UY"> Uruguay</option>
                                    <option value="UZ"> Uzbekistan</option>
                                    <option value="VU"> Vanuatu</option>
                                    <option value="VA"> Vatican City State (Holy See)</option>
                                    <option value="VE"> Venezuela</option>
                                    <option value="VN"> Viet Nam</option>
                                    <option value="VG"> Virgin Islands (British)</option>
                                    <option value="VI"> Virgin Islands (U.S.)</option>
                                    <option value="WF"> Wallis and Futuna Islands</option>
                                    <option value="EH"> Western Sahara</option>
                                    <option value="YE"> Yemen</option>
                                    <option value="YU"> Yugoslavia</option>
                                    <option value="ZM"> Zambia</option>
                                    <option value="ZW"> Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="note note-info">
                    * Input value must be hashed using <strong><a href="hash_help.html">online hash generator</a></strong>
                    SHA1-64K function.<br>
                    Please visit <strong><a href="help_document.html">Developer API Reference</a></strong> for detailed
                    explanation on each input field.
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="submit" class="btn btn-primary" value="Query">
                </div>

            </form>
        </div>
    </section>

@section('js')
    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    username: {
                        required: true
                    },
                    f_name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phn: {
                        required: true,
                        digits: true,
                        minlength: 13,
                    },
                    country: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $("#spin").show();
                    $("#demoForm").css({
                        'opacity':'.4'
                    });
                    $.ajax({
                        url: "{{ route('user.store') }}",
                        method: "POST",
                        data: $('#form').serialize(),
                        success: function(res) {
                            $("#spin").hide();
                            window.location.reload();
                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successfull.',
                                text: 'Verification required.Please check you email!'
                            })
                        },
                        error: function() {
                            $("#spin").hide();
                            Swal.fire({
                                icon: 'error',
                                title: 'Email already taken',
                                text: 'Input unique email address.'
                            })
                        }
                    })
                }
            });

        });

    </script>
@endsection
@endsection
