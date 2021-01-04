
@extends('layouts.seller')

@section('title')
Create Service | 
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 1263.84px;">


    <!-- Main content -->
    
<section class="content">
    <div class="row">
      <div class="col-xs-12">

    <div class="row clearfix">
        <form action="https://efcontact.com/seller/properties" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="MwVumBGd1AmmcCpc9yrfr8T3LIvkqsH17Rma8c2H">        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="box box-default">
                <div class="body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Service Title</label>
                            <input type="text" name="title" class="form-control" value="">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="city">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option value="" disabled="" selected="">Category</option>
                                                                <option value="16">Agriculture and food</option>
                                                                <option value="19">Animals and pets</option>
                                                                <option value="20">Babies and kids</option>
                                                                <option value="2">Business</option>
                                                                <option value="17">Commercial equipment and tools</option>
                                                                <option value="4">Electronics</option>
                                                                <option value="15">Electronics</option>
                                                                <option value="12">Fashion</option>
                                                                <option value="1">Handy work</option>
                                                                <option value="11">Health and beauty</option>
                                                                <option value="21">Jobs</option>
                                                                <option value="6">Medical</option>
                                                                <option value="3">Property</option>
                                                                <option value="18">Repair and construction</option>
                                                                <option value="14">Seeking work-cv</option>
                                                                <option value="22">Services</option>
                                                                <option value="13">Sport, art and outdoors</option>
                                                                <option value="5">Vehicles</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SubCategory</label>
                            <select class="form-control select2" style="width: 100%;" name="sub_category_id">
                                <option value="" disabled="" selected="">SubCategory</option>
                                                                <option value="16">Anti Poison</option>
                                                                <option value="9">Asthmatic Drugs</option>
                                                                <option value="5">Baker</option>
                                                                <option value="2">Barber</option>
                                                                <option value="7">Caterer </option>
                                                                <option value="6">Cobbler </option>
                                                                <option value="10">Cough Syrup</option>
                                                                <option value="11">Cream &amp; Ointments</option>
                                                                <option value="13">Deworming Drugs</option>
                                                                <option value="8">Hair dresser</option>
                                                                <option value="3">Mechanic</option>
                                                                <option value="12">Multi-Vitamins</option>
                                                                <option value="4">Plumber</option>
                                                                <option value="14">Sex Enhancement</option>
                                                                <option value="15">Surgicals</option>
                                                                <option value="1">Tailor</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control select2" style="width: 100%;" name="country">
                                <option value="" disabled="" selected="">Country</option>
                                <option value="Nigeria">Nigeria</option>
                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American Samoa">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola">Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antarctica">Antarctica</option>
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
                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
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
                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                                                <option value="Republic of Congo">Republic of Congo</option>
                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
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
                                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>
                                                                <option value="France, Metropolitan">France, Metropolitan</option>
                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="French Southern Territories">French Southern Territories</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia">Gambia</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Guernsey">Guernsey</option>
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
                                                                <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hong Kong">Hong Kong</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="India">India</option>
                                                                <option value="Isle of Man">Isle of Man</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Israel">Israel</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Ivory Coast">Ivory Coast</option>
                                                                <option value="Jersey">Jersey</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>
                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                                <option value="Kosovo">Kosovo</option>
                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>
                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macau">Macau</option>
                                                                <option value="North Macedonia">North Macedonia</option>
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
                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montenegro">Montenegro</option>
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
                                                                <option value="Palestine">Palestine</option>
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
                                                                <option value="Russian Federation">Russian Federation</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>
                                                                <option value="Serbia">Serbia</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>
                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="South Georgia South Sandwich Islands">South Georgia South Sandwich Islands</option>
                                                                <option value="South Sudan">South Sudan</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="St. Helena">St. Helena</option>
                                                                <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                                <option value="Sudan">Sudan</option>
                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                <option value="Taiwan">Taiwan</option>
                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>
                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                <option value="Tuvalu">Tuvalu</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>
                                                                <option value="United States minor outlying islands">United States minor outlying islands</option>
                                                                <option value="Uruguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Vatican City State">Vatican City State</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Vietnam">Vietnam</option>
                                                                <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                                <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                                <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                                <option value="Western Sahara">Western Sahara</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">State</label>
                            <select class="form-control select2" style="width: 100%;" name="country">
                                <option value="" disabled="" selected="">State</option>
                                                                <option value="Abia">Abia</option>
                                                                <option value="Adamawa ">Adamawa </option>
                                                                <option value="Akwa Ibom ">Akwa Ibom </option>
                                                                <option value="Anambra">Anambra</option>
                                                                <option value="Bauchi">Bauchi</option>
                                                                <option value="Bayelsa">Bayelsa</option>
                                                                <option value="Benue ">Benue </option>
                                                                <option value="Borno ">Borno </option>
                                                                <option value="Cross River ">Cross River </option>
                                                                <option value="Delta ">Delta </option>
                                                                <option value="Ebonyi">Ebonyi</option>
                                                                <option value="Edo ">Edo </option>
                                                                <option value="Ekiti ">Ekiti </option>
                                                                <option value="Enugu">Enugu</option>
                                                                <option value="FCT">FCT</option>
                                                                <option value="Gombe">Gombe</option>
                                                                <option value="Imo">Imo</option>
                                                                <option value="Jigawa ">Jigawa </option>
                                                                <option value="Kaduna ">Kaduna </option>
                                                                <option value="Kano ">Kano </option>
                                                                <option value="Katsina ">Katsina </option>
                                                                <option value="Kebbi ">Kebbi </option>
                                                                <option value="Kogi ">Kogi </option>
                                                                <option value="Kwara ">Kwara </option>
                                                                <option value="Lagos ">Lagos </option>
                                                                <option value="Nasarawa ">Nasarawa </option>
                                                                <option value="Niger ">Niger </option>
                                                                <option value="Ogun ">Ogun </option>
                                                                <option value="Ondo ">Ondo </option>
                                                                <option value="Osun ">Osun </option>
                                                                <option value="Oyo ">Oyo </option>
                                                                <option value="Plateau ">Plateau </option>
                                                                <option value="Rivers ">Rivers </option>
                                                                <option value="Sokoto ">Sokoto </option>
                                                                <option value="Taraba ">Taraba </option>
                                                                <option value="Yobe ">Yobe </option>
                                                                <option value="Zamfara ">Zamfara </option>
                                                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="Plo4 block 2 wuse abuja">

                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <input type="checkbox" id="featured" name="featured" class="filled-in">
                        <label for="featured">Featured</label>
                    </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    </div>

                    <div class="form-group" style="visibility: hidden">
                        <label for=""></label>
                        <textarea name="nearby" class="form-control"></textarea>
                    </div>


                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image1</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image" type="file">

                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image2</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image2" type="file">
                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image3</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image3" type="file">
                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image4</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image4" type="file">
                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image5</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image5" type="file">
                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image6</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image6" type="file">
                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image7</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image7" type="file">
                </div>

            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Upload Image8</h3>
                </div>
                <div class="body">
                    <input class="form-control" name="image8" type="file">
                </div>

            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="body">
                        <h5><strong>Features</strong></h5>
                        <div class="form-group demo-checkbox">
                                                            <input type="checkbox" id="features-2" name="features[]" class="filled-in chk-col-indigo" value="2">
                                <label for="features-2">baker</label>
                                                            <input type="checkbox" id="features-1" name="features[]" class="filled-in chk-col-indigo" value="1">
                                <label for="features-1">carpenter </label>
                                                            <input type="checkbox" id="features-3" name="features[]" class="filled-in chk-col-indigo" value="3">
                                <label for="features-3">shoe maker</label>
                                                    </div>
                    <h5><strong>Google Map</strong></h5>
                    <div class="clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Latitude</label>
                                <input type="text" name="location_latitude" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Longitude</label>
                                <input type="text" name="location_longitude" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>


            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Property Video</h3>
                </div>
                <div class="body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="video">
                            <label class="form-label">Video</label>
                        </div>
                        <div class="help-info">Youtube Link</div>
                    </div>

                </div>
            </div>

            <div class="box box-default">
                <div class="body">
                    
                    <a href="https://efcontact.com/seller/properties" class="btn btn-danger btn-lg m-t-15 waves-effect">
                        <i class="fa fa-arrow-left"></i>
                        <span>BACK</span>
                    </a>

                    <button type="submit" class="btn btn-primary btn-lg m-t-15 waves-effect">
                        <i class="fa fa-save"></i>
                        <span>Submit</span>
                    </button>

                </div>
            </div>

        </div>
        
    </div></form>

</div>
<!-- /.row -->
</div></div></section>


    <!-- /.content -->
  </div>

@endsection




<!-- place below the html form -->
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_cb0fc910bb9fd127519794aa4128be0fd2c354d4',
      email: 'customer@email.com',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>