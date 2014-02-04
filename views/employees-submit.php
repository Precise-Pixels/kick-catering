<?php
    if($_SESSION['status'] != 'loggedin') {
        $_SESSION['status'] = 'notloggedin';
        header('location: login');
    }
?>

<section class="l-grey">
    <div class="section-padding align-centre">

        <h1>Employees Submit</h1>

        <?php
        require_once('php/RecruitmentPlatform.php');
        $recruitment_platform = new RecruitmentPlatform();

        if($_POST) {
            $name             = $_POST['name'];
            $address_line_1   = $_POST['address_line_1'];
            $address_line_2   = $_POST['address_line_2'];
            $address_city     = $_POST['address_city'];
            $address_county   = $_POST['address_county'];
            $address_postcode = $_POST['address_postcode'];
            $address_country  = $_POST['address_country'];
            $email            = $_POST['email'];
            $telephone        = $_POST['telephone'];
            $category         = $_POST['category'];
            $location         = $_POST['location'];

            if( !empty($name) &&
                !empty($address_line_1) &&
                !empty($address_city) &&
                !empty($address_county) &&
                !empty($address_postcode) &&
                !empty($address_country) &&
                !empty($email) &&
                !empty($telephone) &&
                !empty($_FILES['cv']) &&
                !empty($category) &&
                !empty($location) ) {
                $response = $recruitment_platform->employees_submit($name, $address_line_1, $address_line_2, $address_city, $address_county, $address_postcode, $address_country, $email, $telephone, $category, $location);
                echo $response;
            } else {
                echo '<p class="full error">Please fill out all the fields.</p>';
            }
        }
        ?>

        <form enctype="multipart/form-data" method="post" class="half">
            <table>
                <tr><td colspan="2"><h2>Personal Information</h2></td></tr>

                <tr><td><label for="name">Full Name:</label></td></tr>
                <tr><td><input type="text" name="name" required autofocus/></td></tr>

                <tr><td><label for="address_line_1">Address Line 1:</label></td></tr>
                <tr><td><input type="text" name="address_line_1" required/></td></tr>

                <tr><td><label for="address_line_2">Address Line 2 <small>optional</small>:</label></td></tr>
                <tr><td><input type="text" name="address_line_2"/></td></tr>

                <tr><td><label for="address_city">Town/City:</label></td></tr>
                <tr><td><input type="text" name="address_city" required/></td></tr>

                <tr><td><label for="address_county">County:</label></td></tr>
                <tr><td><input type="text" name="address_county" required/></td></tr>

                <tr><td><label for="address_postcode">Postcode:</label></td></tr>
                <tr><td><input type="text" name="address_postcode" required/></td></tr>

                <tr><td><label for="address_country">Country:</label></td></tr>
                <tr>
                    <td>
                        <select name="address_country" required>
                            <option value="">--</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas, The</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, Democratic Republic of</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="HR">Croatia</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica, Commonwealth of</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="TL">East Timor</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia, The</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and the McDonald Islands</option>
                            <option value="VA">Holy See</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IE">Ireland, Republic of</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="CI">Ivory Coast (Côte D'ivoire)</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao, People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Reunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, US</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </td>
                </tr>

                <tr><td><label for="email">Email:</label></td></tr>
                <tr><td><input type="email" name="email" required/></td></tr>

                <tr><td><label for="telephone">Telephone:</label></td></tr>
                <tr><td><input type="tel" name="telephone" required/></td></tr>

                <tr><td><label for="cv">CV Upload: <small>Max file size: 2MB, Accepted file types: .doc, .docx, .pdf, .txt, .rtf, .jpg, .png</small></label></td></tr>
                <tr><td><input type="file" name="cv" class="btn" required/></td></tr>

                <tr><td colspan="2"><h2>Looking For</h2></td></tr>

                <tr><td><label for="category">Category of the job:</label></td></tr>
                <tr>
                    <td>
                        <select name="category" required>
                            <option value="">--</option>
                            <option value="chef-de-partie">Chef De Partie</option>
                            <option value="commis-chef">Commis Chef</option>
                            <option value="cooks">Cooks</option>
                            <option value="head-chef">Head Chef</option>
                            <option value="demi-chef-de-partie">Demi Chef de Partie</option>
                            <option value="pastry-chef">Pastry Chef</option>
                            <option value="kitchen-porter">Kitchen Porter</option>
                            <option value="sous-chef">Sous Chef</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>

                <tr><td><label for="location">Location:</label></td></tr>
                <tr>
                    <td>
                        <input type="radio" name="location" id="uk" value="uk" required checked/> <label for="uk">UK</label>
                        <input type="radio" name="location" id="europe" value="europe" required/> <label for="europe">Europe</label>
                    </td>
                </tr>

                <tr><td><input type="submit" value="SUBMIT" class="btn"/></td></tr>
            </table>
        </form>

        <p class="half">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, porro, ex maiores amet dolore cum vitae aut quos! Architecto, et illo vel facilis repellendus inventore labore explicabo assumenda exercitationem sit.</p>

    </div>
</section>