<div class="container">
  <h1>Shipping</h1>
  <p>Please enter your shipping details.</p>
  <hr />  
  <form method='post' onSubmit="return checkrequired(this)" action='?page=<?php echo $type ?>' enctype='multipart/form-data'>
  <div class="form">

  <div class="fields fields--2">
    <label class="field">
      <span class="field__label" for="firstname">First name</span>
      <input class="field__input" type="text" id="requiredfirstname" name="requiredfirstname" />
    </label>
    <label class="field">
      <span class="field__label" for="lastname">Last name</span>
      <input class="field__input" type="text" id="requiredlastname" name="requiredlastname" />
    </label>
  </div>
  <label class="field">
    <span class="field__label" for="address">Address</span>
    <input class="field__input" type="text" id="requiredaddress" name="requiredaddress" />
  </label>
  <label class="field">
    <span class="field__label" for="country">Country</span>
    <select class="field__input" id="requiredcountry" name="requiredcountry">
       <option value=""></option>
       <option value="Afganistan">Afghanistan</option>
       <option value="Albania">Albania</option>
       <option value="Algeria">Algeria</option>
       <option value="American Samoa">American Samoa</option>
       <option value="Andorra">Andorra</option>
       <option value="Angola">Angola</option>
       <option value="Anguilla">Anguilla</option>
       <option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
       <option value="Bonaire">Bonaire</option>
       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
       <option value="Botswana">Botswana</option>
       <option value="Brazil">Brazil</option>
       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
       <option value="Brunei">Brunei</option>
       <option value="Bulgaria">Bulgaria</option>
       <option value="Burkina Faso">Burkina Faso</option>
       <option value="Burundi">Burundi</option>
       <option value="Cambodia">Cambodia</option>
       <option value="Cameroon">Cameroon</option>
       <option value="Canada">Canada</option>
       <option value="Canary Islands">Canary Islands</option>
       <option value="Cape Verde">Cape Verde</option>
       <option value="Cayman Islands">Cayman Islands</option>
       <option value="Central African Republic">Central African Republic</option>
       <option value="Chad">Chad</option>
       <option value="Channel Islands">Channel Islands</option>
       <option value="Chile">Chile</option>
       <option value="China">China</option>
       <option value="Christmas Island">Christmas Island</option>
       <option value="Cocos Island">Cocos Island</option>
       <option value="Colombia">Colombia</option>
       <option value="Comoros">Comoros</option>
       <option value="Congo">Congo</option>
       <option value="Cook Islands">Cook Islands</option>
       <option value="Costa Rica">Costa Rica</option>
       <option value="Cote DIvoire">Cote DIvoire</option>
       <option value="Croatia">Croatia</option>
       <option value="Cuba">Cuba</option>
       <option value="Curaco">Curacao</option>
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
       <option value="Falkland Islands">Falkland Islands</option>
       <option value="Faroe Islands">Faroe Islands</option>
       <option value="Fiji">Fiji</option>
       <option value="Finland">Finland</option>
       <option value="France">France</option>
       <option value="French Guiana">French Guiana</option>
       <option value="French Polynesia">French Polynesia</option>
       <option value="French Southern Ter">French Southern Ter</option>
       <option value="Gabon">Gabon</option>
       <option value="Gambia">Gambia</option>
       <option value="Georgia">Georgia</option>
       <option value="Germany">Germany</option>
       <option value="Ghana">Ghana</option>
       <option value="Gibraltar">Gibraltar</option>
       <option value="Great Britain">Great Britain</option>
       <option value="Greece">Greece</option>
       <option value="Greenland">Greenland</option>
       <option value="Grenada">Grenada</option>
       <option value="Guadeloupe">Guadeloupe</option>
       <option value="Guam">Guam</option>
       <option value="Guatemala">Guatemala</option>
       <option value="Guinea">Guinea</option>
       <option value="Guyana">Guyana</option>
       <option value="Haiti">Haiti</option>
       <option value="Hawaii">Hawaii</option>
       <option value="Honduras">Honduras</option>
       <option value="Hong Kong">Hong Kong</option>
       <option value="Hungary">Hungary</option>
       <option value="Iceland">Iceland</option>
       <option value="Indonesia">Indonesia</option>
       <option value="India">India</option>
       <option value="Iran">Iran</option>
       <option value="Iraq">Iraq</option>
       <option value="Ireland">Ireland</option>
       <option value="Isle of Man">Isle of Man</option>
       <option value="Israel">Israel</option>
       <option value="Italy">Italy</option>
       <option value="Jamaica">Jamaica</option>
       <option value="Japan">Japan</option>
       <option value="Jordan">Jordan</option>
       <option value="Kazakhstan">Kazakhstan</option>
       <option value="Kenya">Kenya</option>
       <option value="Kiribati">Kiribati</option>
       <option value="Korea North">Korea North</option>
       <option value="Korea Sout">Korea South</option>
       <option value="Kuwait">Kuwait</option>
       <option value="Kyrgyzstan">Kyrgyzstan</option>
       <option value="Laos">Laos</option>
       <option value="Latvia">Latvia</option>
       <option value="Lebanon">Lebanon</option>
       <option value="Lesotho">Lesotho</option>
       <option value="Liberia">Liberia</option>
       <option value="Libya">Libya</option>
       <option value="Liechtenstein">Liechtenstein</option>
       <option value="Lithuania">Lithuania</option>
       <option value="Luxembourg">Luxembourg</option>
       <option value="Macau">Macau</option>
       <option value="Macedonia">Macedonia</option>
       <option value="Madagascar">Madagascar</option>
       <option value="Malaysia">Malaysia</option>
       <option value="Malawi">Malawi</option>
       <option value="Maldives">Maldives</option>
       <option value="Mali">Mali</option>
       <option value="Malta">Malta</option>
       <option value="Marshall Islands">Marshall Islands</option>
       <option value="Martinique">Martinique</option>
       <option value="Mauritania">Mauritania</option>
       <option value="Mauritius">Mauritius</option>
       <option value="Mayotte">Mayotte</option>
       <option value="Mexico">Mexico</option>
       <option value="Midway Islands">Midway Islands</option>
       <option value="Moldova">Moldova</option>
       <option value="Monaco">Monaco</option>
       <option value="Mongolia">Mongolia</option>
       <option value="Montserrat">Montserrat</option>
       <option value="Morocco">Morocco</option>
       <option value="Mozambique">Mozambique</option>
       <option value="Myanmar">Myanmar</option>
       <option value="Nambia">Nambia</option>
       <option value="Nauru">Nauru</option>
       <option value="Nepal">Nepal</option>
       <option value="Netherland Antilles">Netherland Antilles</option>
       <option value="Netherlands">Netherlands (Holland, Europe)</option>
       <option value="Nevis">Nevis</option>
       <option value="New Caledonia">New Caledonia</option>
       <option value="New Zealand">New Zealand</option>
       <option value="Nicaragua">Nicaragua</option>
       <option value="Niger">Niger</option>
       <option value="Nigeria">Nigeria</option>
       <option value="Niue">Niue</option>
       <option value="Norfolk Island">Norfolk Island</option>
       <option value="Norway">Norway</option>
       <option value="Oman">Oman</option>
       <option value="Pakistan">Pakistan</option>
       <option value="Palau Island">Palau Island</option>
       <option value="Palestine">Palestine</option>
       <option value="Panama">Panama</option>
       <option value="Papua New Guinea">Papua New Guinea</option>
       <option value="Paraguay">Paraguay</option>
       <option value="Peru">Peru</option>
       <option value="Phillipines">Philippines</option>
       <option value="Pitcairn Island">Pitcairn Island</option>
       <option value="Poland">Poland</option>
       <option value="Portugal">Portugal</option>
       <option value="Puerto Rico">Puerto Rico</option>
       <option value="Qatar">Qatar</option>
       <option value="Republic of Montenegro">Republic of Montenegro</option>
       <option value="Republic of Serbia">Republic of Serbia</option>
       <option value="Reunion">Reunion</option>
       <option value="Romania">Romania</option>
       <option value="Russia">Russia</option>
       <option value="Rwanda">Rwanda</option>
       <option value="St Barthelemy">St Barthelemy</option>
       <option value="St Eustatius">St Eustatius</option>
       <option value="St Helena">St Helena</option>
       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
       <option value="St Lucia">St Lucia</option>
       <option value="St Maarten">St Maarten</option>
       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
       <option value="Saipan">Saipan</option>
       <option value="Samoa">Samoa</option>
       <option value="Samoa American">Samoa American</option>
       <option value="San Marino">San Marino</option>
       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
       <option value="Saudi Arabia">Saudi Arabia</option>
       <option value="Senegal">Senegal</option>
       <option value="Seychelles">Seychelles</option>
       <option value="Sierra Leone">Sierra Leone</option>
       <option value="Singapore">Singapore</option>
       <option value="Slovakia">Slovakia</option>
       <option value="Slovenia">Slovenia</option>
       <option value="Solomon Islands">Solomon Islands</option>
       <option value="Somalia">Somalia</option>
       <option value="South Africa">South Africa</option>
       <option value="Spain">Spain</option>
       <option value="Sri Lanka">Sri Lanka</option>
       <option value="Sudan">Sudan</option>
       <option value="Suriname">Suriname</option>
       <option value="Swaziland">Swaziland</option>
       <option value="Sweden">Sweden</option>
       <option value="Switzerland">Switzerland</option>
       <option value="Syria">Syria</option>
       <option value="Tahiti">Tahiti</option>
       <option value="Taiwan">Taiwan</option>
       <option value="Tajikistan">Tajikistan</option>
       <option value="Tanzania">Tanzania</option>
       <option value="Thailand">Thailand</option>
       <option value="Togo">Togo</option>
       <option value="Tokelau">Tokelau</option>
       <option value="Tonga">Tonga</option>
       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
       <option value="Tunisia">Tunisia</option>
       <option value="Turkey">Turkey</option>
       <option value="Turkmenistan">Turkmenistan</option>
       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
       <option value="Tuvalu">Tuvalu</option>
       <option value="Uganda">Uganda</option>
       <option value="United Kingdom">United Kingdom</option>
       <option value="Ukraine">Ukraine</option>
       <option value="United Arab Erimates">United Arab Emirates</option>
       <option value="USA">United States of America</option>
       <option value="Uraguay">Uruguay</option>
       <option value="Uzbekistan">Uzbekistan</option>
       <option value="Vanuatu">Vanuatu</option>
       <option value="Vatican City State">Vatican City State</option>
       <option value="Venezuela">Venezuela</option>
       <option value="Vietnam">Vietnam</option>
       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
       <option value="Wake Island">Wake Island</option>
       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
       <option value="Yemen">Yemen</option>
       <option value="Zaire">Zaire</option>
       <option value="Zambia">Zambia</option>
       <option value="Zimbabwe">Zimbabwe</option>
    </select>
  </label>
  <div class="fields fields--3">
    <label class="field">
      <span class="field__label" for="zipcode">Zip code</span>
      <input class="field__input" type="text" id="requiredzipcode" name="requiredzipcode"/>
    </label>
    <label class="field">
      <span class="field__label" for="city">City</span>
      <input class="field__input" type="text" id="requiredcity" name="requiredcity"/>
    </label>
    <label class="field">
      <span class="field__label" for="state">State</span>
      <select class="field__input" id="requiredstate" name="requiredstate">
	<option value=""></option>
	<option value="AL">AL</option>
	<option value="AK">AK</option>
	<option value="AR">AR</option>	
	<option value="AZ">AZ</option>
	<option value="CA">CA</option>
	<option value="CO">CO</option>
	<option value="CT">CT</option>
	<option value="DC">DC</option>
	<option value="DE">DE</option>
	<option value="FL">FL</option>
	<option value="GA">GA</option>
	<option value="HI">HI</option>
	<option value="IA">IA</option>	
	<option value="ID">ID</option>
	<option value="IL">IL</option>
	<option value="IN">IN</option>
	<option value="KS">KS</option>
	<option value="KY">KY</option>
	<option value="LA">LA</option>
	<option value="MA">MA</option>
	<option value="MD">MD</option>
	<option value="ME">ME</option>
	<option value="MI">MI</option>
	<option value="MN">MN</option>
	<option value="MO">MO</option>	
	<option value="MS">MS</option>
	<option value="MT">MT</option>
	<option value="NC">NC</option>	
	<option value="NE">NE</option>
	<option value="NH">NH</option>
	<option value="NJ">NJ</option>
	<option value="NM">NM</option>			
	<option value="NV">NV</option>
	<option value="NY">NY</option>
	<option value="ND">ND</option>
	<option value="OH">OH</option>
	<option value="OK">OK</option>
	<option value="OR">OR</option>
	<option value="PA">PA</option>
	<option value="RI">RI</option>
	<option value="SC">SC</option>
	<option value="SD">SD</option>
	<option value="TN">TN</option>
	<option value="TX">TX</option>
	<option value="UT">UT</option>
	<option value="VT">VT</option>
	<option value="VA">VA</option>
	<option value="WA">WA</option>
	<option value="WI">WI</option>	
	<option value="WV">WV</option>
	<option value="WY">WY</option>
	<option value="AS">AS</option>
	<option value="GU">GU</option>
	<option value="MP">MP</option>
	<option value="PR">PR</option>
	<option value="UM">UM</option>
	<option value="VI">VI</option>
	<option value="AA">AA</option>
	<option value="AP">AP</option>
	<option value="AE">AE</option>	
      </select>
    </label>
  </div>

  <?php       

    if($merchant == "cashapp"){echo '<label class="field"><span class="field__label" for="'.$merchant.'">'.$merchant.' ID</span><input class="field__input" type="text" id="required'.$merchant.'" name="required'.$merchant.'" /></label>';}
    if($merchant == "zelle"){echo '<label class="field"><span class="field__label" for="'.$merchant.'">'.$merchant.' Phone#</span><input class="field__input" type="text" id="required'.$merchant.'" name="required'.$merchant.'" /></label>';}

  ?>

  <input type="hidden" id="post2" name="post2" value="complete" >
  </div>

  <hr>

<?php
      echo '<textarea class="field__input" id="prereview" name="prereview" rows="10" cols="100" style="border:white" class="txtinput" readonly="readonly">';
      for ($i = 0; $i < count($items); $i++) {
        if(strlen($items[$i])>1){
          echo $items[$i]."\r\n";
          $list1 .= $items[$i].", ";
          $list2 .= $items[$i]."\r\n";
        }else{break;}
      }
      echo '</textarea><br><textarea class="field__input" id="prenote" name="prenote" rows="2" cols="100" style="border:white" class="txtinput" maxlength="300" readonly="readonly">Note:'.$_POST['note'].'</textarea><br>';
      $total_items = count($items)-2;
      $price = explode("$", $items[$total_items]); 

      //Get Order#
      $order_number = explode(": ", $items[1]);

      echo "<center>";
      if($merchant == "cashapp"){echo 'Send payment to '.$cashapp.'<br>For Note Add Your Order ID#: '.$order_number[1];}
      if($merchant == "zelle"){echo 'Send payment to '.$author.' '.$zelle.'<br>For Memo Add Your Order ID#: '.$order_number[1];}
      echo "</center>";

?>

  <br><button type="submit" class="button">Continue</button>
  </form>
</div>

<style>

:root {
  --color-gray: #737888;
  --color-lighter-gray: #e3e5ed;
  --color-light-gray: #f7f7fa;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

html {
  font-family: "Inter", sans-serif;
  font-size: 14px;
  box-sizing: border-box;
}

@supports (font-variation-settings: normal) {
  html {
    font-family: "Inter var", sans-serif;
  }
}

body {
  margin: 0;
}

h1 {
  margin-bottom: 1rem;
}

p {
  color: var(--color-gray);
}

hr {
  height: 1px;
  width: 100%;
  background-color: var(--color-light-gray);
  border: 0;
  margin: 2rem 0;
}

.container {
  max-width: 40rem;
  margin: 0 auto;
  height: 100%;
}

.form {
  display: grid;
  grid-gap: 1rem;
}

.field {
  width: 100%;
  display: flex;
  flex-direction: column;
  border: 1px solid var(--color-lighter-gray);
  padding: 0.5rem;
  border-radius: 0.25rem;
}

.field__label {
  color: var(--color-gray);
  font-size: 0.6rem;
  font-weight: 300;
  text-transform: uppercase;
  margin-bottom: 0.25rem;
}

.field__input {
  padding: 0;
  margin: 0;
  border: 0;
  outline: 0;
  font-weight: bold;
  font-size: 1rem;
  width: 100%;
  -webkit-appearance: none;
  appearance: none;
  background-color: transparent;
}
.field:focus-within {
  border-color: #000;
}

.fields {
  display: grid;
  grid-gap: 1rem;
}
.fields--2 {
  grid-template-columns: 1fr 1fr;
}
.fields--3 {
  grid-template-columns: 1fr 1fr 1fr;
}

.button {
  background-color: #000;
  text-transform: uppercase;
  font-size: 0.8rem;
  font-weight: 600;
  display: block;
  color: #fff;
  width: 100%;
  padding: 1rem;
  border-radius: 0.25rem;
  border: 0;
  cursor: pointer;
  outline: 0;
}
.button:focus-visible {
  background-color: #333;
}


</style>

<script>

<!-- Original: wsabstract.com -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function checkrequired(which) {

var pass=true;
if (document.images) {
for (i=0;i<which.length;i++) {
var tempobj=which.elements[i];
if (tempobj.name.substring(0,8)=="required") {
if (((tempobj.type=="text"||tempobj.type=="textarea")&&
tempobj.value=='')||(tempobj.type.toString().charAt(0)=="s"&&
tempobj.selectedIndex==0)) {
pass=false;
break;
         }
      }
   }
}
if (!pass) {
shortFieldName=tempobj.name.substring(8,30).toUpperCase();
alert("Please make sure the "+shortFieldName+" field was properly completed.");
return false;
}
else
return true;
}
//  End -->

</script>