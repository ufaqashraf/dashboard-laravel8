
@extends('layouts.backend.app')
<style>
    .sign-wrapper{
        height: 7rem;
        border: dashed 1.5px blue;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100% !important;
        cursor: pointer;
        display: inline-flex;
        background-image: url({{asset('/pen.png')}});
    }
    .avatar-wrapper{
        height: 7rem;
        border: dashed 1.5px blue;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100% !important;
        cursor: pointer;
        display: inline-flex;
        background-image: url({{asset('/avatar.png')}});
    }

    .loading-spin{
        position: absolute;
        z-index: 9999;
        left: 55%;
        top: 25%;
        display: none;
    }
    .loading-spin img{
        height: 60%;
        width: 55%;
    }
</style>
@section('content')

    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <h4>Device Information form</h4>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="loading-spin" id="spin">
                    <img src="{{ asset('/loading.gif') }}" alt="">
                </div>
                <div id="deviceForm" class="card col-12" style="position: relative;">
                    <div class="card-header" style="background: #007bff">
                        <h3 class="card-title" style="color: #fff">Device Info</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form id="info" class="row">
                            @csrf
                            <div class="form-group col-md-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Form Number</label>
                                <input name="form_id" id="form_id" type="text" class="form-control"
                                    placeholder="Enter form number" readonly/>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">First Name</label>
                                <input name="f_name" type="text" class="form-control"
                                    placeholder="Enter first name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Last Name</label>
                                <input name="l_name" type="text" class="form-control"
                                    placeholder="Enter last name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Street</label>
                                <input name="street" type="text" class="form-control"
                                    placeholder="Enter street" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">City</label>
                                <input name="city" type="text" class="form-control"
                                    placeholder="Enter city" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Post Code</label>
                                <input name="post_code" type="text" class="form-control"
                                    placeholder="Enter post code"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Country</label>
                                <select name="country" class="form-control">
                                    <option value="" selected="selected" hidden>Select Country</option>
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
                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
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
                                    <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
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
                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
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
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Tel Number[Include country code]*</label>
                                <input name="tel_num" type="text" class="form-control"
                                    placeholder="Ex: +44-0000000" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Email</label>
                                <input name="email" type="email" class="form-control"
                                    placeholder="Enter email" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">No</label>
                                <input name="no" type="text" class="form-control"
                                    placeholder="Enter no" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Device Name</label>
                                <input name="device_name" type="text" class="form-control"
                                    placeholder="Enter device name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Device Serial Number</label>
                                <input name="serial_num" type="text" class="form-control"
                                    placeholder="Enter serial number" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Type</label>
                                <input name="type" type="text" class="form-control"
                                    placeholder="Enter type" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Assigned</label>
                                <input name="assigned" type="text" class="form-control"
                                    placeholder="Enter assigned" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Status</label>
                                <input name="status" type="text" class="form-control"
                                    placeholder="Enter status" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">User Location</label>
                                <input name="user_location" type="text" class="form-control"
                                    placeholder="Enter use location" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">User Position</label>
                                <input name="user_position" type="text" class="form-control"
                                    placeholder="Enter user position" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Dept</label>
                                <input name="dept" type="text" class="form-control"
                                    placeholder="Enter dept" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Device Encription</label>
                                <input name="device_encription" type="text" class="form-control"
                                    placeholder="Enter device encription" />
                            </div>
                            <div style="display: inline-flex" class="col-md-4">
                                <div class="form-group" style="width:70%">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Anti Virus</label>
                                    <select onchange="getVal(this.value)" name="antivirus_id" class="form-control">
                                        <option value="" selected="selected" hidden>Select Antivirus</option>
                                        @foreach ($viruses as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="width: 20%;margin-left:35px;margin-top:25px;">
                                    <img style="display: none" src="" id="virus-img" width="50" height="50"/>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Date Assigned</label>
                                <input name="date_assigned" type="date" class="form-control"
                                    placeholder="Enter date assigned" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Date Returned</label>
                                <input name="date_returned" type="date" class="form-control"
                                    placeholder="Enter date returned" />
                            </div>

                            <div class="col-md-6" style="display: inline-flex;">
                                <label style="margin-right: 30px;" for="image" class="col-form-label">Staff Signature</label>
                                <div class="form-group">
                                    <div class="sign-wrapper">
                                        <input id="sign" type="file" class="form-control logo-input" name="sign">
                                        <img src="" id="sign-img" class="img-wrapper"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6" style="display: inline-flex;">
                                <label style="margin-right: 30px;" for="image" class="col-form-label">Staff Photo</label>
                                <div class="form-group">
                                    <div class="avatar-wrapper">
                                        <input id="avatar" type="file" class="form-control logo-input" name="avatar">
                                        <img src="" id="avatar-img" class="img-wrapper"/>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@section('js')

<script>
    window.onload =(()=>{

        var data = Math.floor(100000 + Math.random() * 900000);
        $("#form_id").val(data);
    });

    function imageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#avatar-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function getVal(val){
        $.ajax({
            url: "{{route('get.virus')}}",
            method: "POST",
            data: {
                '_token':"{{csrf_token()}}",
                'val':val
            },
            success: function(res){
                $("#virus-img").show();
                $("#virus-img").attr('src',"{{asset('/images')}}/"+res.data.logo);
            }
        })
    }

    function signUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#sign-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function() {
        imageUrl(this);
    });

    $("#sign").change(function() {
        signUrl(this);
    });

    $(document).ready(function () {
        $('#info').validate({
            rules: {
                name: {
                    required: true
                },
                address: {
                    required: true
                },
                staff_id: {
                    required: true
                },
                tel_num: {
                    required: true
                },
                no: {
                    required: true
                },
                email: {
                    required: true
                },
                device_name: {
                    required: true
                },
                serial_num: {
                    required: true
                },
                type: {
                    required: true
                },
                assigned: {
                    required: true
                },
                status: {
                    required: true
                },
                user_location: {
                    required: true
                },
                user_position: {
                    required: true
                },
                dept: {
                    required: true
                },
                device_encription: {
                    required: true
                },
                anti_virus: {
                    required: true
                },
                date_assigned: {
                    required: true
                },
                date_returned: {
                    required: true
                },
                stuff_image: {
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
                $("#deviceForm").css({
                    'opacity':'.4'
                });
                $.ajax({
                    url: "{{route('device.store')}}",
                    method: "POST",
                    data: new FormData(document.getElementById("info")),
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
                            title: 'Device upload successfull.'
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
