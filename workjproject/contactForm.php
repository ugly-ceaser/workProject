<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom css -->
    <link rel="stylesheet/less" type="text/css" href="assets/css/style.less">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Logo -->
    <link rel="shortcut icon" href="assets/img/logo/UBS_Logo_Semibold.svg" type="image/x-icon">






    <!-- linkk jquery -->
    <script src="assets/js/jquery.js" defer></script>

    <script>
        function disableSubmit() {
            document.getElementById("submit").disabled = true;
        }

        function activateButton(element) {

            if(element.checked) {
                document.getElementById("submit").disabled = false;
            }
            else  {
                document.getElementById("submit").disabled = true;
            }

        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Link custom css -->

    <script src="assets/js/main.js" defer></script>

    <title>GLOBAL TRADE PROFESSIONAL ALLIANCE</title>

</head>

<body  onload="disableSubmit()">
<!-- End of header section -->
<?php include 'header.php'?>
<!-- End of header section -->



 <div class="container">
     <h1>
         Get In Touch
     </h1>


     <div class="row mb-2 mt-2">
         <div class="col-md-9 mb-3">
             <h3>Your Request</h3>
         </div>

         <div class="col-md-3">

         </div>
     </div>


     <div class="col-md-8 mt-5  ">
             <label>
                 How can we help you?
                 <span class="text-danger"> *</span>

             </label>
             <div class="input-group">
                 <select class="form-select  mt-2" id="inputGroupSelect04" aria-label="Example select with button addon">
                     <option selected>Choose...</option>
                     <option value="cryptocurrencyInvestment">Cryptocurrency Investment</option>
                     <option value="assetManagement">Asset Management</option>
                     <option value="realEstateManagement">Real Estate Management</option>
                     <option value="oilServices">Oil Services</option>
                     <option value="taskManagement">Task Management</option>
                 </select>

             </div>

     </div>

     <div class="col-md-8 mt-5 " >
         <label>
             I have over EUR 1m (or equivalent) to invest
             <span class="text-danger"> *</span>



         </label>
         <div class="input-group">
             <select class="form-select  mt-2" id="inputGroupSelect04" aria-label="Example select with button addon">
                 <option selected>Please Select one</option>
                 <option value="yes">Yes</option>
                 <option value="no">No</option>

             </select>

         </div>

     </div>

     <div class="col-md-8 mt-5">
         <label for="exampleFormControlTextarea1" class="form-label"> Please specify your request
             <span class="text-danger"> *</span>

         </label>
         <textarea class="form-control  mt-2"  rows="3"></textarea>
     </div>

     <h3 class="mt-4">
         Your Details
     </h3>

     <h4 class="mt-3">
         Gender
     </h4>
     <div class="form-check mt-2">
         <input class="form-check-input" type="radio" name="gender"  value="male" checked>
         <label class="form-check-label" >
             Male
         </label>
     </div>
     <div class="form-check mt-2">
         <input class="form-check-input" type="radio" name="gender" value="female" checked>
         <label class="form-check-label">
             Female
         </label>
     </div>

     <div class="form-group mt-5">
         <label for="firstname">Firstname
             <span class="text-danger"> *</span>
         </label>
         <input type="text" class="form-control mt-2" name="firstname" id="firstname">
     </div>



    <div class="form-group mt-5">
        <label for="lastname">Lastname

            <span class="text-danger"> *</span>
        </label>
        <input type="text" name="lastname" id="lastname" class="form-control mt-2">
    </div>




    <div class="form-group mt-5">
        <label for="email">
            Email
            <span class="text-danger"> *</span>
        </label>
        <input type="email" name="email" id="email" class="form-control  mt-2">
    </div>




    <div class="form-group mt-5">
        <label for="address">Telephone
            <span class="text-danger"> *</span>
        </label>
        <input type="tel" name="address" id="address" class="form-control  mt-2">
    </div>



     <div class="form-group mt-5 ">
         <label>
            Country/Region<span class="text-danger"> *</span>
         </label>

             <select class="form-select  mt-2" id="inputGroupSelect04" aria-label="Example select with button addon">

                     <option value="Afghanistan">Afghanistan</option>
                     <option value="Åland Islands">Åland Islands</option>
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
                     <option value="Congo">Congo</option>
                     <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                     <option value="Cook Islands">Cook Islands</option>
                     <option value="Costa Rica">Costa Rica</option>
                     <option value="Cote D'ivoire">Cote D'ivoire</option>
                     <option value="Croatia">Croatia</option>
                     <option value="Cuba">Cuba</option>
                     <option value="Cyprus">Cyprus</option>
                     <option value="Czech Republic">Czech Republic</option>
                     <option value="Denmark">Denmark</option>
                     <option value="Djibouti">Djibouti</option>
                     <option value="Dominica">Dominica</option>
                     <option value="Dominican Republic">Dominican Republic</option>
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
                     <option value="Guernsey">Guernsey</option>
                     <option value="Guinea">Guinea</option>
                     <option value="Guinea-bissau">Guinea-bissau</option>
                     <option value="Guyana">Guyana</option>
                     <option value="Haiti">Haiti</option>
                     <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                     <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                     <option value="Honduras">Honduras</option>
                     <option value="Hong Kong">Hong Kong</option>
                     <option value="Hungary">Hungary</option>
                     <option value="Iceland">Iceland</option>
                     <option value="India">India</option>
                     <option value="Indonesia">Indonesia</option>
                     <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                     <option value="Iraq">Iraq</option>
                     <option value="Ireland">Ireland</option>
                     <option value="Isle of Man">Isle of Man</option>
                     <option value="Israel">Israel</option>
                     <option value="Italy">Italy</option>
                     <option value="Jamaica">Jamaica</option>
                     <option value="Japan">Japan</option>
                     <option value="Jersey">Jersey</option>
                     <option value="Jordan">Jordan</option>
                     <option value="Kazakhstan">Kazakhstan</option>
                     <option value="Kenya">Kenya</option>
                     <option value="Kiribati">Kiribati</option>
                     <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                     <option value="Korea, Republic of">Korea, Republic of</option>
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
                     <option value="Macao">Macao</option>
                     <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
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
                     <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
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
                     <option value="Saint Helena">Saint Helena</option>
                     <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                     <option value="Saint Lucia">Saint Lucia</option>
                     <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                     <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
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
                     <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                     <option value="Spain">Spain</option>
                     <option value="Sri Lanka">Sri Lanka</option>
                     <option value="Sudan">Sudan</option>
                     <option value="Suriname">Suriname</option>
                     <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                     <option value="Swaziland">Swaziland</option>
                     <option value="Sweden">Sweden</option>
                     <option value="Switzerland">Switzerland</option>
                     <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                     <option value="Taiwan">Taiwan</option>
                     <option value="Tajikistan">Tajikistan</option>
                     <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                     <option value="Thailand">Thailand</option>
                     <option value="Timor-leste">Timor-leste</option>
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
                     <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                     <option value="Uruguay">Uruguay</option>
                     <option value="Uzbekistan">Uzbekistan</option>
                     <option value="Vanuatu">Vanuatu</option>
                     <option value="Venezuela">Venezuela</option>
                     <option value="Viet Nam">Viet Nam</option>
                     <option value="Virgin Islands, British">Virgin Islands, British</option>
                     <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                     <option value="Wallis and Futuna">Wallis and Futuna</option>
                     <option value="Western Sahara">Western Sahara</option>
                     <option value="Yemen">Yemen</option>
                     <option value="Zambia">Zambia</option>
                     <option value="Zimbabwe">Zimbabwe</option>

             </select>

         </div>

     <div class="form-group mt-5" >
     <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)">
         I Agree Terms & Coditions
     <br><br>

     <input type="submit" name="submit" id="submit" class="btn btn-secondary btn-sm">
     </div>



 </div>



<!-- footer section -->
<?php include 'footer.php' ?>
<!-- End of footer section -->




</body>
</html>


