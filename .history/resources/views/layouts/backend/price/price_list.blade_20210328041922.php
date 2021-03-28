@extends('layouts.backend.app')
<style>
    .loading-spin {
        position: absolute;
        z-index: 9999;
        left: 21%;
        top: 37%;
        display: none;
    }

    .loading-spin img {
        height: 100px;
        width: 100px;
    }

    .stripe {
        position: relative;
        width: 48%;
        float: left;
        margin-right: 48px;
    }

    .paypal {
        position: relative;
        width: 48%;
    }

</style>
@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if ($data->type == 'super_admin')
                    <div class="row mb-2">
                        <div id="disableDiv" style="padding: 5px;
                                            background-color: white;
                                            border: 1px solid #ddd;
                                            box-shadow: 1px 1px #ddd;
                                            border-radius: 5px;display: inline-flex;">
                            <button onclick="createPlan()" type="button" style="padding: 10px;" class="btn btn-primary">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                    style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                                            font-weight: 700;
                                            margin-bottom: 0px;">Add Price Plan
                            </p>
                        </div>
                    </div>
                @else
                    <div class="row mb-2">
                        <div id="disableDiv" style="padding: 5px;
                                            background-color: white;
                                            border: 1px solid #ddd;
                                            box-shadow: 1px 1px #ddd;
                                            border-radius: 5px;display: inline-flex;">
                            <button onclick="upgradePlan()" type="button" style="padding: 10px;" class="btn btn-primary">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"></i>
                            </button>
                            <p style="margin-left: 5px;
                                            font-weight: 700;
                                            margin-bottom: 0px;">Upgrade Plan
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="loading-spin" id="spin">
                        <img src="{{ asset('/loading.gif') }}" alt="">
                    </div>
                    <div id="planForm" class="card" style="display: none;width: 50% !important;position: relative;">
                        <div class="card-header" style="background: #007bff">
                            <h3 class="card-title" style="color: #fff">Plan Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="plan-add" class="row">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Currency Id</label>
                                    <select name="currency" class="form-control">
                                        <option value="" selected="selected" hidden>Select Currency</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's
                                            Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying
                                            Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Monthly Charge</label>
                                    <input name="monthly" type="number" class="form-control"
                                        placeholder="Enter monthly charge" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Quarterly Charge</label>
                                    <input name="quarterly" type="number" class="form-control"
                                        placeholder="Enter quarterly charge" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Annually Charge</label>
                                    <input name="annually" type="number" class="form-control"
                                        placeholder="Enter annually charge" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">User Limit</label>
                                    <input name="user_limit" type="number" class="form-control"
                                        placeholder="Enter user limit" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Plan Rules</label>
                                    <input name="rules" type="number" class="form-control"
                                        placeholder="Enter per plan rules" />
                                </div>
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="planEditForm" class="card" style="display: none;width: 50% !important;position:relative;">
                        <div class="card-header" style="background: #28a745">
                            <h3 class="card-title" style="color: #fff">Update Price Plan Info</h3>
                            <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                <span style="color: #fff" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="plan-edit" class="row">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Name</label>
                                    <input id="name" name="edit_name" type="text" class="form-control"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Currency Id</label>
                                    <select id="currency" name="edit_currency" class="form-control">
                                        <option id="test" value="" selected="selected" hidden></option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's
                                            Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying
                                            Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Monthly Charge</label>
                                    <input id="monthly" name="edit_monthly" type="text" class="form-control"
                                        placeholder="Enter monthly charge" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Quarterly Charge</label>
                                    <input id="quarterly" name="edit_quarterly" type="text" class="form-control"
                                        placeholder="Enter quarterly charge" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Annually Charge</label>
                                    <input id="annually" name="edit_annually" type="text" class="form-control"
                                        placeholder="Enter annually charge" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">User Limit</label>
                                    <input id="user_limit" name="edit_user_limit" type="text" class="form-control"
                                        placeholder="Enter user limit" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Plan Rules Amount</label>
                                    <input id="rules" name="edit_rules" type="number" class="form-control"
                                        placeholder="Enter per plan rules" />
                                </div>
                                <input type="hidden" id="slug" name="slug">
                                <div class="form-group" style="width: 100%">
                                    <button type="submit" style="width: 100%;" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="plan_table" class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Price Plan List</h3>
                            @if ($data->type == 'user')
                                @if ($data->payment == 'free')
                                    <div style="float: right;width:40%">
                                        <h3 class="card-title">Your Current Plan 15 day trial.You have remain
                                            <span class="badge badge-dark">{{ $data->duration }} days only</span>
                                        </h3>
                                    </div>
                                @else
                                    <div style="float: right;width:26%">
                                        <h3 class="card-title">Your Current Plan
                                            <span class="badge badge-success">{{ optional($data->get_plan)->name }}</span>
                                            <span class="badge badge-dark">{{ $data->duration }}</span>
                                        </h3>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SI #</th>
                                        <th>Name</th>
                                        <th>Corrency</th>
                                        <th>Monthly</th>
                                        <th>Quarterly</th>
                                        <th>Annually</th>
                                        <th>Rules</th>
                                        <th>User limit</th>
                                        @if ($data->type == 'super_admin')
                                            <th>Status</th>
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($plans as $plan)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $plan->name }}</td>
                                            <td>{{ $plan->currency }}</td>
                                            <td>{{ $plan->quarterly }}</td>
                                            <td>{{ $plan->monthly }}</td>
                                            <td>{{ $plan->annually }}</td>
                                            <td>{{ $plan->rules }}</td>
                                            <td>{{ $plan->user_limit }}</td>
                                            @if ($data->type == 'super_admin')

                                                <td>
                                                    @if ($plan->status == 0)
                                                        <span style="cursor: pointer;"
                                                            onclick="changeStatus({{ $plan->id }})"
                                                            class="badge badge-danger">Inactive</span>
                                                    @else
                                                        <span style="cursor: pointer;"
                                                            onclick="changeStatus({{ $plan->id }})"
                                                            class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button onclick="editPlan({{ $plan }})"
                                                        class="btn btn-dark btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button onclick="deletePlan(`{{ $plan->slug }}`)"
                                                        class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="paymentForm" class="col-md-12" style="display: none;">

                        <div class="card stripe">
                            <div class="card-header" style="background: #007bff">
                                <h3 class="card-title" style="color: #fff">Select Payment Gateway <button type="button"
                                        onclick="stripeVisible()" class="btn btn-success">Stripe </button> or <button
                                        type="button" onclick="paypalVisible()" class="btn btn-dark"> Paypal</button></h3>
                                <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                                    <span style="color: #fff" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body" id="stripeForm" style="display: none;">
                                <form role="form" action="{{ route('stripe.post') }}" method="post"
                                    class="require-validation" data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                    @csrf
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-6 form-group required'>
                                            <label class='control-label'>Name Card</label>
                                            <input name="c_name" placeholder="enter card name" class='form-control' size='4'
                                                type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-6 form-group required'>
                                            <label class='control-label'>Card Number</label>
                                            <input name="c_number" placeholder="card number" autocomplete='off'
                                                class='form-control card-number' size='20' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label>
                                            <input name="cvc" autocomplete='off' class='form-control card-cvc'
                                                placeholder='ex. 311' size='4' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label>
                                            <input name="month" class='form-control card-expiry-month' placeholder='MM'
                                                size='2' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label>
                                            <input name="year" class='form-control card-expiry-year' placeholder='YYYY'
                                                size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='form-group col-md-12'>
                                            <label class='control-label'>Package Name</label>
                                            <input id="pack" name="package" placeholder="enter card name"
                                                class='form-control' readonly>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label class='control-label'>Package Duration</label>
                                            <input id="pack_dur" name="duration" placeholder="enter card name"
                                                class='form-control' readonly>
                                        </div>
                                        <div class='form-group col-md-12'>
                                            <label class='control-label'>Package Price</label>
                                            <input id="pack_price" type="number" name="price" placeholder="enter card name"
                                                class='form-control' readonly>
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body" id="paypalForm" style="display: none;">
                                <form class="form-horizontal" method="POST" role="form"
                                    action="{{ route('paypal.post') }}">
                                    @csrf
                                    <div class='form-group col-md-12'>
                                        <label class='control-label'>Package Name</label>
                                        <input id="p_pack" name="package" placeholder="enter card name" class='form-control'
                                            readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label class='control-label'>Package Duration</label>
                                        <input id="p_pack_dur" name="duration" placeholder="enter duration"
                                            class='form-control' readonly>
                                    </div>
                                    <div class='form-group col-md-12'>
                                        <label class='control-label'>Package Price</label>
                                        <input id="p_pack_price" name="amount" class='form-control' readonly>
                                    </div>

                                    {{-- <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                        <label for="amount" class="col-md-4 control-label">Enter Amount</label>
                                        
                                        <div class="col-md-12">
                                            <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
            
                                            @if ($errors->has('amount'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Pay With Paypal
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="up-plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upgrade Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Select Plan</label>
                        <select id="price_plan" name="price_plan" class="form-control">
                            <option value="" selected="selected" hidden>Select price plan</option>
                            @foreach ($plans as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Plan Duration</label>
                        <select id="duration" name="duration" class="form-control">
                            <option value="" selected="selected" hidden>Select price plan duration</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Annually">Annually</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="upgrade()">Upgrade</button>
                </div>
            </div>
        </div>
    </div>







@section('js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.jqueryui.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.jqueryui.css" />

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.jqueryui.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.jqueryui.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.js"></script>

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
        </script
        <script type="text/javascript">
        $(document).ready(function() {
            $('#example3').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                dom: "Bfrtip",
                buttons: ["excel", "pdf", "print", "excelHtml5"]
            });
        });

    </script>

    <!-- DataTables-CSS -->
    
    <script>
        function createPlan() {
            $("#plan_table").hide();
            $("#planForm").show();
            $("#planEditForm").hide();
            $("#paymentForm").hide();
        }

        function closeForm() {
            $("#plan_table").show();
            $("#planForm").hide();
            $("#planEditForm").hide();
            $("#paymentForm").hide();
        }

        function editPlan(plan) {
            $("#name").val(plan.name);
            $("#slug").val(plan.slug);
            $("#test").val(plan.currency);
            $("#test").text(plan.currency);
            $("#monthly").val(plan.monthly);
            $("#quarterly").val(plan.quarterly);
            $("#annually").val(plan.annually);
            $("#rules").val(plan.rules);
            $("#user_limit").val(plan.user_limit);
            $("#plan_table").hide();
            $("#planForm").hide();
            $("#planEditForm").show();
            $("#paymentForm").hide();
        }

        $(document).ready(function() {
            $('#plan-add').validate({
                rules: {
                    name: {
                        required: true
                    },
                    currency: {
                        required: true
                    },
                    monthly: {
                        required: true
                    },
                    quarterly: {
                        required: true
                    },
                    annually: {
                        required: true
                    },
                    rules: {
                        required: true
                    },
                    user_limit: {
                        required: true
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $("#spin").show();
                    $("#planForm").css({
                        'opacity': '.4'
                    });
                    $.ajax({
                        url: "{{ route('plan.store') }}",
                        method: "POST",
                        data: new FormData(document.getElementById("plan-add")),
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
                                title: 'Price plan upload successfull.'
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

        $(document).ready(function() {
            $('#plan-edit').validate({
                rules: {
                    edit_name: {
                        required: true
                    },
                    edit_currency: {
                        required: true
                    },
                    edit_monthly: {
                        required: true
                    },
                    edit_quarterly: {
                        required: true
                    },
                    edit_annually: {
                        required: true
                    },
                    edit_rules: {
                        required: true
                    },
                    edit_user_limit: {
                        required: true
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $("#spin").show();
                    $("#planEditForm").css({
                        'opacity': '.4'
                    });
                    $.ajax({
                        url: "{{ route('plan.update') }}",
                        method: "POST",
                        data: new FormData(document.getElementById("plan-edit")),
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
                                title: 'Price plan update successfull.'
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

        function deletePlan(slug) {
            $.ajax({
                url: "{{ route('plan.delete') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'slug': slug
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Price plan delete successfull.'
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

        function changeStatus(id) {
            $.ajax({
                url: "{{ route('plan.status') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Price Plan Active successfull.'
                    })
                },
                error: function() {
                    window.location.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Price Plan De-Active successfull.'
                    })
                }
            })
        }

        function upgradePlan() {
            $("#up-plan").modal('show');
        }

        function upgrade() {
            $.ajax({
                url: "{{ route('get.plan') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': $("#price_plan").val(),
                    'duration': $("#duration").val()
                },
                success: function(res) {
                    $("#pack").val(res.data.name);
                    $("#pack_dur").val($("#duration").val());
                    if (res.data.monthly) {
                        $("#pack_price").val(res.data.monthly);
                    } else if (res.data.quarterly) {
                        $("#pack_price").val(res.data.quarterly);
                    } else if (res.data.annually) {
                        $("#pack_price").val(res.data.annually);
                    }
                    $("#p_pack").val(res.data.name);
                    $("#p_pack_dur").val($("#duration").val());
                    if (res.data.monthly) {
                        $("#p_pack_price").val(res.data.monthly);
                    } else if (res.data.quarterly) {
                        $("#p_pack_price").val(res.data.quarterly);
                    } else if (res.data.annually) {
                        $("#p_pack_price").val(res.data.annually);
                    }
                    $("#up-plan").modal('hide');
                    $("#plan_table").hide();
                    $("#planForm").hide();
                    $("#planEditForm").hide();
                    $("#paymentForm").show();
                },
                error: function() {

                }
            })
        }

        function stripeVisible() {
            $("#stripeForm").show();
            $("#paypalForm").hide();
            $("#stripeForm").find(":input").prop("disabled", false);
            $("#paypalForm").find(":input").prop("disabled", true);
        }

        function paypalVisible() {
            $("#stripeForm").find(":input").prop("disabled", true);
            $("#paypalForm").find(":input").prop("disabled", false);
            $("#stripeForm").hide();
            $("#paypalForm").show()
        }

    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                        'input[type=file]', 'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });

    </script>


@endsection
@endsection
