<?php include('config.php');

    if(isset($_POST['submit'])){
        extract($_POST);
        $q = "INSERT INTO user_detail(fname,lname) VALUES ('$fname','$lname')";

        if (mysqli_query($conn, $q)) {
            // echo " created successfully";
            header('location:experience.php');
        } 
    }
?>

<html>
<head>
<title>personal-info</title>
<link rel="stylesheet" href="css/inspact.css">
</head>
<body style="height: 1324px;">
<table align="center">
	<tbody><tr><td>
		<table width="1000" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr class="top_menu_top">
					<td colspan="3" align="right" style="font-weight: bold; padding-bottom: 8px;">

						<!--<a href="top_terms.php" target="_blank">Terms and Conditions</a>
					&nbsp;|&nbsp;-->
						<a href="#" target="_blank">Help</a>
						&nbsp;|&nbsp;

						<a href="#" target="_blank">Statistics 2019</a>
						&nbsp;|&nbsp;
						<a href="#">Contact Us</a>
						&nbsp;|&nbsp;
						<a href="#">Log out</a>
					</td>
				</tr>
				<tr>
					<td class="logotd" valign="top" style="padding-bottom: 8px;"><a href="translator.php"><img src="img/logo-dark.png" style="height:35px;"/></a></td>
					<td width="30px" style="padding-bottom: 8px;">&nbsp;</td>
					<td class="medium" valign="middle" style="line-height: 1.2; padding-bottom: 8px;">
						<div style="text-align: center; padding-bottom: 4px; font-weight: bold; color: #000077; padding-left: 34%;">
							"One of the most professional agencies I've worked with.<br>Correct, pay on time, nice contacts."
						</div>
						<div class="small" style="text-align: right; padding-top: 2px;">
							 <a href="#" target="#"><b>more references</b></a>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
        <table width="1000" border="0" cellpadding="0" cellspacing="0"
			<tbody>
				<tr>
					<td class="nav_bar_holder">
						 <table align="right" border=0 cellpadding=0 cellspacing=0>
                    <tr>
                        <td class="main_selected_tab">
                            <a class=" main_selected_tab " href="personal-info.php">Personal Info</a>
                        </td>
                        <td width=5>&nbsp;</td>
                        <td class="main_greyed_tab">
                            <a class="main_inactive_tab" href="experience.php">Experience</a>
                        </td>
                        <td width=5>&nbsp;</td>
                        <td class="main_greyed_tab">
                            <a class="main_inactive_tab" href="tools-skills.php">Tools & Skills</a>
                        </td>
                        <td width=5>&nbsp;</td>
                        <td class="main_greyed_tab">
                            <a class="main_inactive_tab" href="languages.php">Languages</a>
                        </td>
                        <td width=5>&nbsp;</td>
                        <td class="main_greyed_tab">
                            <a class="main_inactive_tab" href="my-jobs.php">My Jobs</a>
                        </td>
                        <td width=5>&nbsp;</td>
                        <td class="main_greyed_tab">
                            <a class="main_inactive_tab" href="payment.php">Payment</a>
                        </td>
                        <td width=5>&nbsp;</td>
                        <td class="main_greyed_tab">
                            <a class="main_inactive_tab" href="options.php">Options</a>
                        </td>
                    </tr>
                </table>
					</td>
				</tr>
			</tbody>
		</table>
    

    <table width="1000" border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
        <tbody><tr><td class="id_bar_holder">
                <table width="1000" valign="bottom" border="0" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="idbar" valign="bottom" style="color: #003366;"><b>Welcome user!</b></td>
                        <td>
                            <table align="right" border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td style="text-align:right" class="idbar" valign="bottom"><b>Progress</b> 1/4 (10 mins remaining ...)</td>                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
        </td></tr>
    </tbody></table>
        <!-- top-exp -->
    <form  action="personal-info.php" method="post" enctype="multipart/form-data">
        <input type="text" value="" name="" style="display:none">
        <table width="1000" border="0" cellpadding="0" cellspacing="0">
            <tbody>
				<tr>
				<td>
                    <h1>Personal Information <span><a style="font-size:12px;text-decoration:none;font-weight:normal;" href="#" target="">[?]</a></span></h1>
                </td>
                <td style="text-align: right; vertical-align: top;">
                    <input type="submit" style="font-weight: bold;" name="submit" value="Save &amp; Continue >>">               
				</td>
				</tr>
			</tbody>
		</table>

        
        <div class="section">
            <h2>Account details</h2>
            <table width="990" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr><td>
                        <table border="0" cellpadding="2" cellspacing="0">
                            <tbody><tr>
                                <td width="250">First Name:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                                <td><input type="text" size="30" name="fname" value=""> </td>
                            </tr>
                            <tr>
                                <td>Last Name:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                                <td><input type="text" size="30" name="lname" value=""></td>
                            </tr>
                            <!-- <tr>
                                <td>Password:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                                <td><input type="password" size="30" name="password" value=""> </td>
                            </tr> -->
                            <!-- <tr>
                                <td>Confirm Password:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                                <td><input type="password" size="30" name="confirm_pass" value=""></td>
                            </tr> -->

                            <tr>
                                <td>Date of Birth:<font color="#FF0000" name="birth_date">&nbsp;<b>*</b></font></td>
                                <td><select name="day">
                                        <option value="">
                                            </option><option value="01">01
											</option><option value="02">02
											</option><option value="03">03
											</option><option value="04">04
											</option><option value="05">05
											</option><option value="06">06
											</option><option value="07">07
											</option><option value="08">08
											</option><option value="09">09
											</option><option value="10">10
											</option><option value="11">11
											</option><option value="12">12
											</option><option value="13">13
											</option><option value="14">14
											</option><option value="15">15
											</option><option value="16">16
											</option><option value="17">17
											</option><option value="18">18
											</option><option value="19">19
											</option><option value="20">20
											</option><option value="21">21
											</option><option value="22">22
											</option><option value="23">23
											</option><option value="24">24
											</option><option value="25">25
											</option><option value="26">26
											</option><option value="27">27
											</option><option value="28">28
											</option><option value="29">29
											</option><option value="30">30
											</option><option value="31">31
										</option>
									</select>
										<select name="month">
											<option value="">
                                            </option><option value="01">Jan
											</option><option value="02">Feb
											</option><option value="03">Mar
											</option><option value="04">Apr
											</option><option value="05">May
											</option><option value="06">Jun
											</option><option value="07">Jul
											</option><option value="08">Aug
											</option><option value="09">Sep
											</option><option value="10">Oct
											</option><option value="11">Nov
											</option><option value="12">Dec
											</option>
										</select>
                                    <input type="text" name="year" size="4" maxlength="4" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>City of Birth:</td>
                                <td>
                                    <input type="text" name="city_birth" size="30" value="">
                                </td>
                            </tr>

                        </tbody></table>
                    </td>
                    <td width="50">&nbsp;</td>
                    <td valign="top" style="padding-top: 4px;">
                        <img border="1" bordercolor="black" src="top_images/noPhoto.jpg?rand=YIPCApQz">
                    </td>
                    <td width="20">&nbsp;</td>
                </tr>
            </tbody></table>

            <table border="0" cellpadding="2" cellspacing="0">
                <tbody><tr><td width="250">Country of Birth<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td>
                                                    <select name="birth_country">
                                <option value="" selected="">                                    </option><option value="Afghanistan">Afghanistan
</option><option value="Albania">Albania
</option><option value="Algeria">Algeria
</option><option value="American Samoa">American Samoa
</option><option value="Andorra">Andorra
</option><option value="Angola">Angola
</option><option value="Anguilla">Anguilla
</option><option value="Antarctica">Antarctica
</option><option value="Antigua and Barbuda">Antigua and Barbuda
</option><option value="Argentina">Argentina
</option><option value="Armenia">Armenia
</option><option value="Aruba">Aruba
</option><option value="Australia">Australia
</option><option value="Austria">Austria
</option><option value="Azerbaijan">Azerbaijan
</option><option value="Bahamas">Bahamas
</option><option value="Bahrain">Bahrain
</option><option value="Bangladesh">Bangladesh
</option><option value="Barbados">Barbados
</option><option value="Belarus">Belarus
</option><option value="Belgium">Belgium
</option><option value="Belize">Belize
</option><option value="Benin">Benin
</option><option value="Bermuda">Bermuda
</option><option value="Bhutan">Bhutan
</option><option value="Bolivia">Bolivia
</option><option value="Bosnia-Herseg">Bosnia and Herzegovina
</option><option value="Botswana">Botswana
</option><option value="Bouvet Island">Bouvet Island
</option><option value="Brazil">Brazil
</option><option value="British Indian Ocean Territory">British Ocean Territory
</option><option value="Brunei Darussalam">Brunei Darussalam
</option><option value="Bulgaria">Bulgaria
</option><option value="Burkina Faso">Burkina Faso
</option><option value="Burundi">Burundi
</option><option value="Cambodia">Cambodia
</option><option value="Cameroon">Cameroon
</option><option value="Canada">Canada
</option><option value="Cape Verde">Cape Verde
</option><option value="Cayman Islands">Cayman Islands
</option><option value="Central African Republic">Central African Republic
</option><option value="Chad">Chad
</option><option value="Chile">Chile
</option><option value="China">China
</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
</option><option value="Colombia">Colombia
</option><option value="Comoros">Comoros
</option><option value="Congo">Congo
</option><option value="Cook Islands">Cook Islands
</option><option value="Costa Rica">Costa Rica
</option><option value="Cote DIvoire (Ivory Coast)">Cote d'Ivoire
</option><option value="Croatia">Croatia
</option><option value="Cuba">Cuba
</option><option value="Cyprus">Cyprus
</option><option value="Czech Republic">Czech Republic
</option><option value="Denmark">Denmark
</option><option value="Djibouti">Djibouti
</option><option value="Dominica">Dominica
</option><option value="Dominican Republic">Dominican Republic
</option><option value="East Timor">East Timor
</option><option value="Ecuador">Ecuador
</option><option value="Egypt">Egypt
</option><option value="El Salvador">El Salvador
</option><option value="Equatorial Guinea">Equatorial Guinea
</option><option value="Eritrea">Eritrea
</option><option value="Estonia">Estonia
</option><option value="Ethiopia">Ethiopia
</option><option value="Falkland-Malvinas">Falkland Islands (Malvinas)
</option><option value="Faroe Islands">Faroe Islands
</option><option value="Fiji">Fiji
</option><option value="Finland">Finland
</option><option value="France">France
</option><option value="French Guiana">French Guiana
</option><option value="French Pacific Islands (French Polynesia)">French Polynesia
</option><option value="French Southern Territories">French Southern Territories
</option><option value="Gabon">Gabon
</option><option value="Gambia">Gambia
</option><option value="Georgia">Georgia
</option><option value="Germany">Germany
</option><option value="Ghana">Ghana
</option><option value="Gibraltar">Gibraltar
</option><option value="Greece">Greece
</option><option value="Greenland">Greenland
</option><option value="Grenada">Grenada
</option><option value="Guadeloupe">Guadeloupe
</option><option value="Guam">Guam
</option><option value="Guatemala">Guatemala
</option><option value="Guernsey">Guernsey
</option><option value="Guinea">Guinea
</option><option value="Guinea-Bissau">Guinea-Bissau
</option><option value="Guyana">Guyana
</option><option value="Haiti">Haiti
</option><option value="Heard and McDonald Islands">Heard Island and McDonald Islands
</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)
</option><option value="Honduras">Honduras
</option><option value="Hong Kong">Hong Kong
</option><option value="Hungary">Hungary
</option><option value="Iceland">Iceland
</option><option value="India">India
</option><option value="Indonesia">Indonesia
</option><option value="Iran">Iran (Islamic Republic of)
</option><option value="Iraq">Iraq
</option><option value="Ireland">Ireland
</option><option value="Israel">Israel
</option><option value="Italy">Italy
</option><option value="Jamaica">Jamaica
</option><option value="Japan">Japan
</option><option value="Jordan">Jordan
</option><option value="Kazachstan">Kazakhstan
</option><option value="Kenya">Kenya
</option><option value="Kiribati">Kiribati
</option><option value="North Korea">Korea (Democratic People's Republic of)
</option><option value="Korea, Republic of">Korea (Republic of)
</option><option value="Kuwait">Kuwait
</option><option value="Kyrgyzstan">Kyrgyzstan
</option><option value="Laos">Lao People's Democratic Republic
</option><option value="Latvia">Latvia
</option><option value="Lebanon">Lebanon
</option><option value="Lesotho">Lesotho
</option><option value="Liberia">Liberia
</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
</option><option value="Liechtenstein">Liechtenstein
</option><option value="Lithuania">Lithuania
</option><option value="Luxembourg">Luxembourg
</option><option value="Macau">Macau
</option><option value="Macedonia">Macedonia
</option><option value="Madagascar">Madagascar
</option><option value="Malawi">Malawi
</option><option value="Malaysia">Malaysia
</option><option value="Maldives (Maldive Islands)">Maldives
</option><option value="Mali">Mali
</option><option value="Malta">Malta
</option><option value="Marshall Islands">Marshall Islands
</option><option value="Martinique">Martinique
</option><option value="Mauritania">Mauritania
</option><option value="Mauritius">Mauritius
</option><option value="Mayotte">Mayotte
</option><option value="Mexico">Mexico
</option><option value="Micronesia (Federated States of)">Micronesia (Federated States of)
</option><option value="Moldova">Moldova, Republic of
</option><option value="Monaco">Monaco
</option><option value="Mongolia">Mongolia
</option><option value="Montenegro">Montenegro
</option><option value="Montserrat">Montserrat
</option><option value="Morocco">Morocco
</option><option value="Mozambique">Mozambique
</option><option value="Myanmar">Myanmar
</option><option value="Namibia">Namibia
</option><option value="Nauru">Nauru
</option><option value="Nepal">Nepal
</option><option value="Netherlands">Netherlands
</option><option value="Netherlands Antilles">Netherlands Antilles
</option><option value="New Caledonia">New Caledonia
</option><option value="New Zealand">New Zealand
</option><option value="Nicaragua">Nicaragua
</option><option value="Niger">Niger
</option><option value="Nigeria">Nigeria
</option><option value="Niue">Niue
</option><option value="Norfolk Island">Norfolk Island
</option><option value="Northern Mariana Islands">Northern Mariana Islands
</option><option value="Norway">Norway
</option><option value="Oman">Oman
</option><option value="Pakistan">Pakistan
</option><option value="Palau">Palau
</option><option value="Panama">Panama
</option><option value="Papua New Guinea">Papua New Guinea
</option><option value="Paraguay">Paraguay
</option><option value="Peru">Peru
</option><option value="Philippines">Philippines
</option><option value="Pitcairn Islands">Pitcairn
</option><option value="Poland">Poland
</option><option value="Portugal">Portugal
</option><option value="Puerto Rico">Puerto Rico
</option><option value="Qatar">Qatar
</option><option value="Reunion">Reunion
</option><option value="Romania">Romania
</option><option value="Russian Federation">Russian Federation
</option><option value="Rwanda">Rwanda
</option><option value="Saint Helena">Saint Helena
</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis
</option><option value="Saint Lucia">Saint Lucia
</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
</option><option value="Samoa">Samoa
</option><option value="San Marino">San Marino
</option><option value="Sao Tome and Principe">Sao Tome and Principe
</option><option value="Saudi Arabia">Saudi Arabia
</option><option value="Senegal">Senegal
</option><option value="Serbia">Serbia
</option><option value="Seychelles">Seychelles
</option><option value="Sierra Leone">Sierra Leone
</option><option value="Singapore">Singapore
</option><option value="Slovakia">Slovakia
</option><option value="Slovenia">Slovenia
</option><option value="Solomon Islands">Solomon Islands
</option><option value="Somalia">Somalia
</option><option value="South Africa">South Africa
</option><option value="South Georgia and the South Sandwich Island">South Georgia and the South Sandwich Island
</option><option value="Spain">Spain
</option><option value="Sri Lanka">Sri Lanka
</option><option value="Sudan">Sudan
</option><option value="Suriname">Suriname
</option><option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands
</option><option value="Swaziland">Swaziland
</option><option value="Sweden">Sweden
</option><option value="Switzerland">Switzerland
</option><option value="Syria">Syrian Arab Republic
</option><option value="Taiwan">Taiwan
</option><option value="Tajikistan">Tajikistan
</option><option value="Tanzania">Tanzania, United Republic of
</option><option value="Thailand">Thailand
</option><option value="The Democratic Republic of the Congo">The Democratic Republic of the Congo
</option><option value="Togo">Togo
</option><option value="Tokelau">Tokelau
</option><option value="Tonga">Tonga
</option><option value="Trinidad and Tobago">Trinidad and Tobago
</option><option value="Tunisia">Tunisia
</option><option value="Turkey">Turkey
</option><option value="Turkmenistan">Turkmenistan
</option><option value="Turks and Caicos Islands">Turks and Caicos Islands
</option><option value="Tuvalu">Tuvalu
</option><option value="Uganda">Uganda
</option><option value="Ukraine">Ukraine
</option><option value="United Arab Emirates">United Arab Emirates
</option><option value="United Kingdom">United Kingdom
</option><option value="United States">United States
</option><option value="United States Minor Outlying Islands">United States Minor Outlying Islands
</option><option value="Uruguay">Uruguay
</option><option value="Uzbekistan">Uzbekistan
</option><option value="Vanuatu">Vanuatu
</option><option value="Venezuela">Venezuela
</option><option value="Viet Nam">Viet Nam
</option><option value="Virgin Islands (British)">Virgin Islands, British
</option><option value="Virgin Islands (American)">Virgin Islands, U.S.
</option><option value="Wallis and Futuna Islands">Wallis and Futuna Islands
</option><option value="Western Sahara">Western Sahara
</option><option value="Yemen">Yemen
</option><option value="Zaire">Zaire
</option><option value="Zambia">Zambia
</option><option value="Zimbabwe">Zimbabwe
                                </option><option value="other">Other
                            </option></select>
                                            </td>
                </tr>

                <tr>
                    <td>Native Language <span><a style="font-size:12px;text-decoration:none;font-weight:normal;" href="top_help.php#native_language" target="top_help">[?]</a></span><font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td>
                                                    <select name="native_lang">
                                <option value="" selected="">                                    </option><option value="Afrikaans">Afrikaans
</option><option value="Albanian">Albanian
</option><option value="Amharic">Amharic
</option><option value="Antigua and Barbuda Creole English">Antigua and Barbuda Creole English
</option><option value="Arabic">Arabic
</option><option value="Armenian">Armenian
</option><option value="Assamese">Assamese
</option><option value="Azerbaijani">Azerbaijani
</option><option value="Bahamas Creole English">Bahamas Creole English
</option><option value="Bajan">Bajan
</option><option value="Basque">Basque (Euskera)
</option><option value="Bielarus">Belarusian
</option><option value="Bemba">Bemba
</option><option value="Bengali">Bengali
</option><option value="Bislama">Bislama
</option><option value="Bosnian">Bosnian
</option><option value="Breton">Breton
</option><option value="Bulgarian">Bulgarian
</option><option value="Burmese">Burmese
</option><option value="Catalan">Catalan
</option><option value="Catalan Valencia">Catalan Valencian
</option><option value="Cebuano">Cebuano
</option><option value="Chamorro">Chamorro
</option><option value="Cherokee">Cherokee
</option><option value="Chinese">Chinese Simplified
</option><option value="Classical Greek">Classical Greek
</option><option value="Comorian Ngazidja">Comorian, Ngazidja
</option><option value="Crioulo Upper Guinea">Crioulo, Upper Guinea
</option><option value="Croatian">Croatian
</option><option value="Czech">Czech
</option><option value="Danish">Danish
</option><option value="Dari">Dari
</option><option value="Dutch">Dutch
</option><option value="Flemish">Dutch (Belgium)
</option><option value="Dzongkha">Dzongkha
</option><option value="English Australia">English (Australia)
</option><option value="English Canada">English (Canada)
</option><option value="English">English (GB)
</option><option value="English US">English (USA)
</option><option value="Esperanto">Esperanto
</option><option value="Estonian">Estonian
</option><option value="Fanagalo">Fanagalo
</option><option value="Faroese">Faroese
</option><option value="Persian">Farsi
</option><option value="Fijian">Fijian
</option><option value="Filipino">Filipino
</option><option value="Finnish">Finnish
</option><option value="Quebecois">French (Canada)
</option><option value="French">French (France)
</option><option value="Galician">Galician
</option><option value="Georgian">Georgian
</option><option value="German">German
</option><option value="Swiss German">German (Switzerland)
</option><option value="Greek">Greek
</option><option value="Grenadian Creole English">Grenadian Creole English
</option><option value="Gujarati">Gujarati
</option><option value="Guyanese Creole English">Guyanese Creole English
</option><option value="Haitian Creole French">Haitian Creole French
</option><option value="Hausa">Hausa
</option><option value="Hawaiian">Hawaiian
</option><option value="Hebrew">Hebrew
</option><option value="Hiligaynon">Hiligaynon
</option><option value="Hindi">Hindi
</option><option value="Hungarian">Hungarian
</option><option value="Icelandic">Icelandic
</option><option value="Igbo">Igbo
</option><option value="Ilokano">Ilokano
</option><option value="Indonesian">Indonesian
</option><option value="Inuktitut Greenlandic">Inuktitut, Greenlandic
</option><option value="Irish Gaelic">Irish Gaelic
</option><option value="Italian">Italian
</option><option value="Swiss Italian">Italian (Switzerland)
</option><option value="Jamaican Creole English">Jamaican Creole English
</option><option value="Japanese">Japanese
</option><option value="Javanese">Javanese
</option><option value="Kabuverdianu">Kabuverdianu
</option><option value="Kannada">Kannada
</option><option value="Kazakh">Kazakh
</option><option value="Khmer">Khmer
</option><option value="Kiche">Kiche
</option><option value="Kinyarwanda">Kinyarwanda
</option><option value="Kiribati">Kiribati
</option><option value="Kirundi">Kirundi
</option><option value="Konkani">Konkani
</option><option value="Korean">Korean
</option><option value="Kurdish">Kurdish Kurmanji (Latin)
</option><option value="Kurdish Sorani">Kurdish Sorani (Arabic)
</option><option value="Kyrgyz">Kyrgyz
</option><option value="Lao">Lao
</option><option value="Latin">Latin
</option><option value="Latvian">Latvian
</option><option value="Lingala">Lingala
</option><option value="Lithuanian">Lithuanian
</option><option value="Luxembourgish">Luxembourgish
</option><option value="Macedonian">Macedonian
</option><option value="Malagasy">Malagasy
</option><option value="Malay">Malay
</option><option value="Malayalam">Malayalam
</option><option value="Maldivian">Maldivian
</option><option value="Maltese">Maltese
</option><option value="Maori">Maori
</option><option value="Marathi">Marathi
</option><option value="Marshallese">Marshallese
</option><option value="Mende">Mende
</option><option value="Mongolian">Mongolian
</option><option value="Montenegrin">Montenegrin
</option><option value="Morisyen">Morisyen
</option><option value="Ndebele">Ndebele
</option><option value="Nepali">Nepali
</option><option value="Niuean">Niuean
</option><option value="Northern Sotho">Northern Sotho
</option><option value="Norwegian Bokmal">Norwegian Bokmal
</option><option value="Norwegian Nynorsk">Norwegian Nynorsk
</option><option value="Nyanja">Nyanja
</option><option value="Odia">Odia
</option><option value="Palauan">Palauan
</option><option value="Pashto">Pashto
</option><option value="Pijin">Pijin
</option><option value="Polish">Polish
</option><option value="Portuguese Brazil">Portuguese (Brazil)
</option><option value="Portuguese">Portuguese (Portugal)
</option><option value="Panjabi">Punjabi
</option><option value="Quechua">Quechua
</option><option value="Romanian">Romanian
</option><option value="Russian">Russian
</option><option value="Saint Lucian Creole French">Saint Lucian Creole French
</option><option value="Samoan">Samoan
</option><option value="Sango">Sango
</option><option value="Scots Gaelic">Scots Gaelic
</option><option value="Serbian">Serbian
</option><option value="Seselwa Creole French">Seselwa Creole French
</option><option value="Sesotho">Sesotho
</option><option value="Setswana">Setswana
</option><option value="Shona">Shona
</option><option value="Sindhi">Sindhi
</option><option value="Sinhala">Sinhala
</option><option value="Slovak">Slovak
</option><option value="Slovenian">Slovenian
</option><option value="Somali">Somali
</option><option value="Sotho Southern">Sotho, Southern
</option><option value="Spanish Argentina">Spanish (Argentina)
</option><option value="Spanish Latin America">Spanish (Latin America)
</option><option value="Spanish Mexico">Spanish (Mexico)
</option><option value="Spanish">Spanish (Spain)
</option><option value="Spanish US">Spanish (US)
</option><option value="Sranan Tongo">Sranan Tongo
</option><option value="Swahili">Swahili
</option><option value="Swedish">Swedish
</option><option value="Tagalog">Tagalog
</option><option value="Tahitian">Tahitian
</option><option value="Tajik">Tajik
</option><option value="Tamil">Tamil
</option><option value="Tatar">Tatar
</option><option value="Telugu">Telugu
</option><option value="Tetum">Tetum
</option><option value="Thai">Thai
</option><option value="Tibetan">Tibetan
</option><option value="Tigrinya">Tigrinya
</option><option value="Tok Pisin">Tok Pisin
</option><option value="Tokelauan">Tokelauan
</option><option value="Tongan">Tongan
</option><option value="Chinese Traditional Hong Kong">Traditional Chinese (Hong Kong)
</option><option value="Chinese Traditional">Traditional Chinese (Taiwan)
</option><option value="Tshiluba">Tshiluba
</option><option value="Tsonga">Tsonga
</option><option value="Tswana">Tswana
</option><option value="Turkish">Turkish
</option><option value="Turkmen">Turkmen
</option><option value="Tuvaluan">Tuvaluan
</option><option value="Ukrainian">Ukrainian
</option><option value="Pakistani">Urdu
</option><option value="Uyghur">Uyghur
</option><option value="Uzbek">Uzbek
</option><option value="Vietnamese">Vietnamese
</option><option value="Vincentian Creole English">Vincentian Creole English
</option><option value="Virgin Islands Creole English">Virgin Islands Creole English
</option><option value="Wallisian">Wallisian
</option><option value="Welsh">Welsh
</option><option value="Wolof">Wolof
</option><option value="Xhosa">Xhosa
</option><option value="Yoruba">Yoruba
</option><option value="Zulu">Zulu
                            </option></select>
                            &nbsp;&nbsp;<a style="text-decoration:none;" href="" target="" title="Multilingual? Sorry, just one native language for now ...">[?]</a>
                                            </td>
                </tr>

                <tr>
                    <td>Choose your profile picture</td>
                    <td>
                        <input name="userpicfile" type="file" size="30">
                    </td>
                </tr>
            </tbody></table>
        </div>

        <div class="section">
            <h2>Contact details</h2>
            <table border="0" cellpadding="2" cellspacing="0">
                <tbody><tr>
                    <td width="250">Email:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><input type="text" name="email" size="60" value=""> </td>
                </tr>
                <tr>
                    <td>Confirm Email:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><input type="text" name="confirm_email" size="60" value=""> </td>
                </tr>
               
                <tr>
                    <td>Mobile:</td>
                    <td>
                        <input name="mobile" type="text" size="20" maxlength="20" value="">&nbsp;&nbsp;

                        <!--<a href="top_help.php#mobile" target="top_help" title="In this format please: +39-348-1234567">[?]</a>--><i>Format: +39-348-1234567</i>
                    </td>
                </tr>
                <tr>
                    <td>Telephone: <font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><input type="text" name="tel1" size="20" value="">
                        <!--&nbsp;&nbsp;When can we reach you?&nbsp;&nbsp;
	<select NAME="time1">
		<option value="NEVER" SELECTED >		<option VALUE=0>All day<option VALUE=1>Morning<option VALUE=2>Evening</select>--></td>
                </tr>
                <tr>
                    <td>Address Line 1:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><input type="text" name="adr1" size="70" value=""> </td>
                </tr>
                <tr>
                    <td>Address Line 2:</td>
                    <td><input type="text" name="adr2" size="70" value=""> </td>
                </tr>
                <tr>
                    <td>City:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><input type="text" name="city" size="40" value=""> </td>
                </tr>
                <tr>
                    <td>Province/State:</td>
                    <td><input type="text" name="state" size="40" value=""> </td>
                </tr>
                <tr>
                    <td>Postal Code:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><input type="text" name="zip" size="10" value=""> </td>
                </tr>
                <tr>
                    <td>Time Zone:</td>
                    <td><select name="utc">
                            <!-- <option value=""></option><option value="-12">(GMT -12:00 hours) Eniwetok, Kwajalein
</option><option value="-11">(GMT -11:00 hours) Midway Island, Samoa
</option><option value="-10">(GMT -10:00 hours) Hawaii
</option><option value="-9">(GMT -9:00 hours) Alaska
</option><option value="-8">(GMT -8:00 hours) Pacific Time (US &amp; Canada)
</option><option value="-7">(GMT -7:00 hours) Mountain Time (US &amp; Canada)
</option><option value="-6">(GMT -6:00 hours) Central Time (US &amp; Canada), Mexico City
</option><option value="-5">(GMT -5:00 hours) Eastern Time (US &amp; Canada), Bogota
</option><option value="-4">(GMT -4:00 hours) Atlantic Time (Canada), Caracas
</option><option value="-3.5">(GMT -3:30 hours) Newfoundland
</option><option value="-3">(GMT -3:00 hours) Brazil, Buenos Aires, Georgetown
</option><option value="-2">(GMT -2:00 hours) Mid-Atlantic
</option><option value="-1">(GMT -1:00 hours) Azores, Cape Verde Islands
</option><option value="0">(GMT) Western Europe Time, London, Lisbon
</option><option value="+1">(GMT +1:00 hours) CET(Central Europe Time), Rome, Brussels, Paris
</option><option value="+2">(GMT +2:00 hours) EET(Eastern Europe Time), South Africa
</option><option value="+3">(GMT +3:00 hours) Baghdad, Riyadh, Moscow, St. Petersburg
</option><option value="+3.5">(GMT +3:30 hours) Tehran
</option><option value="+4">(GMT +4:00 hours) Abu Dhabi, Muscat, Baku, Tbilisi
</option><option value="+4.5">(GMT +4:30 hours) Kabul
</option><option value="+5">(GMT +5:00 hours) Ekaterinburg, Islamabad, Karachi, Tashkent
</option><option value="+5.5">(GMT +5:30 hours) Bombay, Calcutta, Madras, New Delhi
</option><option value="+6">(GMT +6:00 hours) Almaty, Dhaka, Colombo
</option><option value="+7">(GMT +7:00 hours) Bangkok, Hanoi, Jakarta
</option><option value="+8">(GMT +8:00 hours) Beijing, Perth, Singapore, Hong Kong
</option><option value="+9">(GMT +9:00 hours) Tokyo, Seoul, Osaka, Sapporo, Yakutsk
</option><option value="+9.5">(GMT +9:30 hours) Adelaide, Darwin
</option><option value="+10">(GMT +10:00 hours) AEST (Australian Eastern Standard), Guam
</option><option value="+11">(GMT +11:00 hours) Magadan, Solomon Islands, New Caledonia
</option><option value="+12">(GMT +12:00 hours) Auckland, Wellington, Fiji, Kamchatka
                        </option></select> -->
                    </td>
                </tr>
                <tr>
                    <td>Country:<font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td><select name="country" id="country">
                            <option value="" selected="">                                </option><option value="Afghanistan">Afghanistan
</option><option value="Albania">Albania
</option><option value="Algeria">Algeria
</option><option value="American Samoa">American Samoa
</option><option value="Andorra">Andorra
</option><option value="Angola">Angola
</option><option value="Anguilla">Anguilla
</option><option value="Antarctica">Antarctica
</option><option value="Antigua and Barbuda">Antigua and Barbuda
</option><option value="Argentina">Argentina
</option><option value="Armenia">Armenia
</option><option value="Aruba">Aruba
</option><option value="Australia">Australia
</option><option value="Austria">Austria
</option><option value="Azerbaijan">Azerbaijan
</option><option value="Bahamas">Bahamas
</option><option value="Bahrain">Bahrain
</option><option value="Bangladesh">Bangladesh
</option><option value="Barbados">Barbados
</option><option value="Belarus">Belarus
</option><option value="Belgium">Belgium
</option><option value="Belize">Belize
</option><option value="Benin">Benin
</option><option value="Bermuda">Bermuda
</option><option value="Bhutan">Bhutan
</option><option value="Bolivia">Bolivia
</option><option value="Bosnia-Herseg">Bosnia and Herzegovina
</option><option value="Botswana">Botswana
</option><option value="Bouvet Island">Bouvet Island
</option><option value="Brazil">Brazil
</option><option value="British Indian Ocean Territory">British Ocean Territory
</option><option value="Brunei Darussalam">Brunei Darussalam
</option><option value="Bulgaria">Bulgaria
</option><option value="Burkina Faso">Burkina Faso
</option><option value="Burundi">Burundi
</option><option value="Cambodia">Cambodia
</option><option value="Cameroon">Cameroon
</option><option value="Canada">Canada
</option><option value="Cape Verde">Cape Verde
</option><option value="Cayman Islands">Cayman Islands
</option><option value="Central African Republic">Central African Republic
</option><option value="Chad">Chad
</option><option value="Chile">Chile
</option><option value="China">China
</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
</option><option value="Colombia">Colombia
</option><option value="Comoros">Comoros
</option><option value="Congo">Congo
</option><option value="Cook Islands">Cook Islands
</option><option value="Costa Rica">Costa Rica
</option><option value="Cote DIvoire (Ivory Coast)">Cote d'Ivoire
</option><option value="Croatia">Croatia
</option><option value="Cuba">Cuba
</option><option value="Cyprus">Cyprus
</option><option value="Czech Republic">Czech Republic
</option><option value="Denmark">Denmark
</option><option value="Djibouti">Djibouti
</option><option value="Dominica">Dominica
</option><option value="Dominican Republic">Dominican Republic
</option><option value="East Timor">East Timor
</option><option value="Ecuador">Ecuador
</option><option value="Egypt">Egypt
</option><option value="El Salvador">El Salvador
</option><option value="Equatorial Guinea">Equatorial Guinea
</option><option value="Eritrea">Eritrea
</option><option value="Estonia">Estonia
</option><option value="Ethiopia">Ethiopia
</option><option value="Falkland-Malvinas">Falkland Islands (Malvinas)
</option><option value="Faroe Islands">Faroe Islands
</option><option value="Fiji">Fiji
</option><option value="Finland">Finland
</option><option value="France">France
</option><option value="French Guiana">French Guiana
</option><option value="French Pacific Islands (French Polynesia)">French Polynesia
</option><option value="French Southern Territories">French Southern Territories
</option><option value="Gabon">Gabon
</option><option value="Gambia">Gambia
</option><option value="Georgia">Georgia
</option><option value="Germany">Germany
</option><option value="Ghana">Ghana
</option><option value="Gibraltar">Gibraltar
</option><option value="Greece">Greece
</option><option value="Greenland">Greenland
</option><option value="Grenada">Grenada
</option><option value="Guadeloupe">Guadeloupe
</option><option value="Guam">Guam
</option><option value="Guatemala">Guatemala
</option><option value="Guernsey">Guernsey
</option><option value="Guinea">Guinea
</option><option value="Guinea-Bissau">Guinea-Bissau
</option><option value="Guyana">Guyana
</option><option value="Haiti">Haiti
</option><option value="Heard and McDonald Islands">Heard Island and McDonald Islands
</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)
</option><option value="Honduras">Honduras
</option><option value="Hong Kong">Hong Kong
</option><option value="Hungary">Hungary
</option><option value="Iceland">Iceland
</option><option value="India">India
</option><option value="Indonesia">Indonesia
</option><option value="Iran">Iran (Islamic Republic of)
</option><option value="Iraq">Iraq
</option><option value="Ireland">Ireland
</option><option value="Israel">Israel
</option><option value="Italy">Italy
</option><option value="Jamaica">Jamaica
</option><option value="Japan">Japan
</option><option value="Jordan">Jordan
</option><option value="Kazachstan">Kazakhstan
</option><option value="Kenya">Kenya
</option><option value="Kiribati">Kiribati
</option><option value="North Korea">Korea (Democratic People's Republic of)
</option><option value="Korea, Republic of">Korea (Republic of)
</option><option value="Kuwait">Kuwait
</option><option value="Kyrgyzstan">Kyrgyzstan
</option><option value="Laos">Lao People's Democratic Republic
</option><option value="Latvia">Latvia
</option><option value="Lebanon">Lebanon
</option><option value="Lesotho">Lesotho
</option><option value="Liberia">Liberia
</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
</option><option value="Liechtenstein">Liechtenstein
</option><option value="Lithuania">Lithuania
</option><option value="Luxembourg">Luxembourg
</option><option value="Macau">Macau
</option><option value="Macedonia">Macedonia
</option><option value="Madagascar">Madagascar
</option><option value="Malawi">Malawi
</option><option value="Malaysia">Malaysia
</option><option value="Maldives (Maldive Islands)">Maldives
</option><option value="Mali">Mali
</option><option value="Malta">Malta
</option><option value="Marshall Islands">Marshall Islands
</option><option value="Martinique">Martinique
</option><option value="Mauritania">Mauritania
</option><option value="Mauritius">Mauritius
</option><option value="Mayotte">Mayotte
</option><option value="Mexico">Mexico
</option><option value="Micronesia (Federated States of)">Micronesia (Federated States of)
</option><option value="Moldova">Moldova, Republic of
</option><option value="Monaco">Monaco
</option><option value="Mongolia">Mongolia
</option><option value="Montenegro">Montenegro
</option><option value="Montserrat">Montserrat
</option><option value="Morocco">Morocco
</option><option value="Mozambique">Mozambique
</option><option value="Myanmar">Myanmar
</option><option value="Namibia">Namibia
</option><option value="Nauru">Nauru
</option><option value="Nepal">Nepal
</option><option value="Netherlands">Netherlands
</option><option value="Netherlands Antilles">Netherlands Antilles
</option><option value="New Caledonia">New Caledonia
</option><option value="New Zealand">New Zealand
</option><option value="Nicaragua">Nicaragua
</option><option value="Niger">Niger
</option><option value="Nigeria">Nigeria
</option><option value="Niue">Niue
</option><option value="Norfolk Island">Norfolk Island
</option><option value="Northern Mariana Islands">Northern Mariana Islands
</option><option value="Norway">Norway
</option><option value="Oman">Oman
</option><option value="Pakistan">Pakistan
</option><option value="Palau">Palau
</option><option value="Panama">Panama
</option><option value="Papua New Guinea">Papua New Guinea
</option><option value="Paraguay">Paraguay
</option><option value="Peru">Peru
</option><option value="Philippines">Philippines
</option><option value="Pitcairn Islands">Pitcairn
</option><option value="Poland">Poland
</option><option value="Portugal">Portugal
</option><option value="Puerto Rico">Puerto Rico
</option><option value="Qatar">Qatar
</option><option value="Reunion">Reunion
</option><option value="Romania">Romania
</option><option value="Russian Federation">Russian Federation
</option><option value="Rwanda">Rwanda
</option><option value="Saint Helena">Saint Helena
</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis
</option><option value="Saint Lucia">Saint Lucia
</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon
</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
</option><option value="Samoa">Samoa
</option><option value="San Marino">San Marino
</option><option value="Sao Tome and Principe">Sao Tome and Principe
</option><option value="Saudi Arabia">Saudi Arabia
</option><option value="Senegal">Senegal
</option><option value="Serbia">Serbia
</option><option value="Seychelles">Seychelles
</option><option value="Sierra Leone">Sierra Leone
</option><option value="Singapore">Singapore
</option><option value="Slovakia">Slovakia
</option><option value="Slovenia">Slovenia
</option><option value="Solomon Islands">Solomon Islands
</option><option value="Somalia">Somalia
</option><option value="South Africa">South Africa
</option><option value="South Georgia and the South Sandwich Island">South Georgia and the South Sandwich Island
</option><option value="Spain">Spain
</option><option value="Sri Lanka">Sri Lanka
</option><option value="Sudan">Sudan
</option><option value="Suriname">Suriname
</option><option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands
</option><option value="Swaziland">Swaziland
</option><option value="Sweden">Sweden
</option><option value="Switzerland">Switzerland
</option><option value="Syria">Syrian Arab Republic
</option><option value="Taiwan">Taiwan
</option><option value="Tajikistan">Tajikistan
</option><option value="Tanzania">Tanzania, United Republic of
</option><option value="Thailand">Thailand
</option><option value="The Democratic Republic of the Congo">The Democratic Republic of the Congo
</option><option value="Togo">Togo
</option><option value="Tokelau">Tokelau
</option><option value="Tonga">Tonga
</option><option value="Trinidad and Tobago">Trinidad and Tobago
</option><option value="Tunisia">Tunisia
</option><option value="Turkey">Turkey
</option><option value="Turkmenistan">Turkmenistan
</option><option value="Turks and Caicos Islands">Turks and Caicos Islands
</option><option value="Tuvalu">Tuvalu
</option><option value="Uganda">Uganda
</option><option value="Ukraine">Ukraine
</option><option value="United Arab Emirates">United Arab Emirates
</option><option value="United Kingdom">United Kingdom
</option><option value="United States">United States
</option><option value="United States Minor Outlying Islands">United States Minor Outlying Islands
</option><option value="Uruguay">Uruguay
</option><option value="Uzbekistan">Uzbekistan
</option><option value="Vanuatu">Vanuatu
</option><option value="Venezuela">Venezuela
</option><option value="Viet Nam">Viet Nam
</option><option value="Virgin Islands (British)">Virgin Islands, British
</option><option value="Virgin Islands (American)">Virgin Islands, U.S.
</option><option value="Wallis and Futuna Islands">Wallis and Futuna Islands
</option><option value="Western Sahara">Western Sahara
</option><option value="Yemen">Yemen
</option><option value="Zaire">Zaire
</option><option value="Zambia">Zambia
</option><option value="Zimbabwe">Zimbabwe
                        </option></select></td>
                </tr>
            </tbody></table>
        </div>

        <!-- se country not UE => display: none -->
                <div class="section" id="tax_details">
            <h2>Tax details &nbsp;&nbsp; <a style="font-size:12px;text-decoration:none;font-weight:normal;" href="" target="">[?]</a></h2>
            <table border="0" cellpadding="2" cellspacing="0">
                <tbody><tr>
                </tr><tr>
                    <td style="width: 25%;">Do you have a VAT identification number <span><a style="font-size:12px;text-decoration:none;font-weight:normal;" href="top_help.php#vat_number" target="top_help" title="">[?]</a></span><font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td>
                        <input type="radio" name="haveVAT" value="1">
                        <label for="haveVAT">Yes</label>
                        <input type="radio" name="haveVAT" value="2" checked="">
                        <label for="haveVAT">No</label>
                    </td>
                    <td>
                    </td><td id="vat_description" style="display:none">&nbsp;&nbsp;VAT Number:</td>
                    <td id="vat_input" style="display:none"><input type="text" size="20" maxlength="16" name="vat_code" value="">
                    </td>
                </tr>

                <tr id="fiscal_code_row">
                    <td>Tax ID (Fiscal Code):<font color="#FF0000">&nbsp;<b>*</b></font>&nbsp;&nbsp;</td>
                    <td><input type="text" size="20" maxlength="16" name="fiscal_code" value="">
                </td></tr>


                <tr id="fiscal_row" style="display:none">
                    <td>Tax Status: <font color="#FF0000">&nbsp;<b>*</b></font></td>
                    <td colspan="4">
                        <select name="fiscal" style="font-size: 10px; width: 80%;">
                            <option value="1">Italian company</option><option value="2">Freelancer in Italy with VAT number (IVA+INPS-RA su imponibile+inps)</option><option value="3">Freelancer in Italy without VAT number (-20% RA - collab.occas.sotto i 5000,00 euro)</option><option value="4">Freelancer or company outside EU with VAT number</option><option value="21">Operazione effettuata in regime fiscale forfettario ai sensi dell'art. 1, cc. da 54 a 89 L. 190/2014, non soggetta a IVA né a ritenuta d'acconto (art. 1 co. 67, L. 190/2014 e succ. mod. int., art. 1 c. 54 e seg, come modificato dalla L.145/2018) [SI cassa/INPS al 4%]</option><option value="22">Operazione effettuata in regime fiscale forfettario ai sensi dell'art. 1, cc. da 54 a 89 L. 190/2014, non soggetta a IVA né a ritenuta d'acconto (art. 1 co. 67, L. 190/2014 e succ. mod. int., art. 1 c. 54 e seg, come modificato dalla L.145/2018) [NO cassa/INPS al 4%]</option><option value="31">Operazione soggetta al regime dei diritti d'autore L.633/41 e successive integrazioni. Operazione esente IVA art. 3, c.4, lett. A, DPR 633/72 e successive modifiche</option><option value="99">Freelancer in Italy with VAT number and CNPA 4% (e.g. lawyers)</option><option value="180">Freelancer in Italy with VAT (Regime dei minimi con cassa previdenziale al 4%) &gt; 2012</option><option value="170">Italian company with VAT number (No IVA, no INPS, no RA, regime fiscale di vantaggio per l'imprenditoria giovanile ai sensi dell'art.1, comma 96-117, legge 244/2007 come modificato dall'articolo 27, DL 98/2011)</option><option value="0" selected="">                        </option><option value="10">no vat, EU</option></select>
                        &nbsp;&nbsp;<a style="text-decoration:none;" href="" target="">[?]</a>
                    </td>
                </tr>
                <tr>

            </tr></tbody></table>
        </div>

        <table width="1000" border="0" cellpadding="0" cellspacing="0">
            <tbody>
				<tr>
					<td style="text-align: right; vertical-align: top;">
						<input type="submit" style="font-weight: bold;" name="submit" value="Save &amp; Continue >>">        
					</td>
				</tr>
			</tbody>
		</table>
    </form>
    </td>
	</tr>
		<tr><td style="padding-top: 15px;"></td></tr>
	</tbody>
	</table>
	<div class="tc">
	 <small><a href="#">General Terms and Conditions for Translators</a></small>
	</div>
</body>
</html>

