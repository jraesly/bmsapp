<?php
$cid=(int) $req_params['1'];
$cl=findOne('accounts',$cid);
$ocountry = $cl['country'];
$cstatus=$cl['status'];
$selected = ' selected="selected"';
notify();
?><div class="row">
    <div class="span10 offset1">

      <form name="update" method="post" action="<?php echo 'update.account-profile.php?__account='.$cid ; ?>" class="form-horizontal well">
        <fieldset>
          <legend><?php echo $_L['editClientInfo'];?>#<?php echo $cid; ?></legend>
          <div class="control-group">
            <label class="control-label" for="fname"><?php echo $_L['accountName'];?></label>
            <div class="controls">
              <input name="name" type="text" class="input-xlarge" id="name" value="<?php echo $cl['name']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="company"><?php echo $_L['companyName'];?></label>
            <div class="controls">
              <input type="text" name="company" class="input-xlarge" id="company" value="<?php echo $cl['company']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email"><?php echo $_L['email'];?></label>
            <div class="controls">
              <input type="text" name="email" class="input-xlarge" id="email" value="<?php echo $cl['email']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password"><?php echo $_L['password'];?></label>
            <div class="controls">
              <input type="text" name="password" class="input-xlarge" id="password" value="--Click To Edit--" onblur="if (this.value == '') {this.value = '--Click To Edit--';}"
 onfocus="if (this.value == '--Click To Edit--') {this.value = '';}">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="address1"><?php echo $_L['addressLine2'];?></label>
            <div class="controls">
              <input type="text" name="address1" class="input-xlarge" id="address1" value="<?php echo $cl['address1']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="address2"><?php echo $_L['addressLine1'];?></label>
            <div class="controls">
              <input type="text" name="address2" class="input-xlarge" id="address2" value="<?php echo $cl['address2']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="city"><?php echo $_L['city'];?></label>
            <div class="controls">
              <input type="text" name="city" class="input-xlarge" id="city" value="<?php echo $cl['city']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="state"><?php echo $_L['state'];?>/<?php echo $_L['region'] ?></label>
            <div class="controls">
              <input type="text" name="state" class="input-xlarge" id="state" value="<?php echo $cl['state']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="postcode"><?php echo $_L['postCode'];?></label>
            <div class="controls">
              <input type="text" name="postcode" class="input-xlarge" id="postcode" value="<?php echo $cl['postcode']; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="country"><?php echo $_L['country'];?></label>
            <div class="controls">
              <select name="country" class="chzn-select" id="country" style="width:250px;" tabindex="2" data-placeholder="Choose a Country...">
              <option value="" selected="selected"><?php echo $_L['choosecountry']; ?></option> 
	<option value="AF"<?php if ($ocountry == 'AF'){ echo $selected; } ?>>Afghanistan</option>
	<option value="AX"<?php if ($ocountry == 'AX'){ echo $selected; } ?>>Aland Islands</option>
	<option value="AL"<?php if ($ocountry == 'AL'){ echo $selected; } ?>>Albania</option>
	<option value="DZ"<?php if ($ocountry == 'DZ'){ echo $selected; } ?>>Algeria</option>
	<option value="AS"<?php if ($ocountry == 'AS'){ echo $selected; } ?>>American Samoa</option>
	<option value="AD"<?php if ($ocountry == 'AD'){ echo $selected; } ?>>Andorra</option>
	<option value="AO"<?php if ($ocountry == 'AO'){ echo $selected; } ?>>Angola</option>
	<option value="AI"<?php if ($ocountry == 'AI'){ echo $selected; } ?>>Anguilla</option>
	<option value="AQ"<?php if ($ocountry == 'AQ'){ echo $selected; } ?>>Antarctica</option>
	<option value="AG"<?php if ($ocountry == 'AG'){ echo $selected; } ?>>Antigua And Barbuda</option>
	<option value="AR"<?php if ($ocountry == 'AR'){ echo $selected; } ?>>Argentina</option>
	<option value="AM"<?php if ($ocountry == 'AM'){ echo $selected; } ?>>Armenia</option>
	<option value="AW"<?php if ($ocountry == 'AW'){ echo $selected; } ?>>Aruba</option>
	<option value="AU"<?php if ($ocountry == 'AU'){ echo $selected; } ?>>Australia</option>
	<option value="AT"<?php if ($ocountry == 'AT'){ echo $selected; } ?>>Austria</option>
	<option value="AZ"<?php if ($ocountry == 'AZ'){ echo $selected; } ?>>Azerbaijan</option>
	<option value="BS"<?php if ($ocountry == 'BS'){ echo $selected; } ?>>Bahamas</option>
	<option value="BH"<?php if ($ocountry == 'BH'){ echo $selected; } ?>>Bahrain</option>
	<option value="BD"<?php if ($ocountry == 'BD'){ echo $selected; } ?>>Bangladesh</option>
	<option value="BB"<?php if ($ocountry == 'BB'){ echo $selected; } ?>>Barbados</option>
	<option value="BY"<?php if ($ocountry == 'BY'){ echo $selected; } ?>>Belarus</option>
	<option value="BE"<?php if ($ocountry == 'BE'){ echo $selected; } ?>>Belgium</option>
	<option value="BZ"<?php if ($ocountry == 'BZ'){ echo $selected; } ?>>Belize</option>
	<option value="BJ"<?php if ($ocountry == 'BJ'){ echo $selected; } ?>>Benin</option>
	<option value="BM"<?php if ($ocountry == 'BM'){ echo $selected; } ?>>Bermuda</option>
	<option value="BT"<?php if ($ocountry == 'BT'){ echo $selected; } ?>>Bhutan</option>
	<option value="BO"<?php if ($ocountry == 'BO'){ echo $selected; } ?>>Bolivia</option>
	<option value="BA"<?php if ($ocountry == 'BA'){ echo $selected; } ?>>Bosnia And Herzegovina</option>
	<option value="BW"<?php if ($ocountry == 'BW'){ echo $selected; } ?>>Botswana</option>
	<option value="BV"<?php if ($ocountry == 'BV'){ echo $selected; } ?>>Bouvet Island</option>
	<option value="BR"<?php if ($ocountry == 'BR'){ echo $selected; } ?>>Brazil</option>
	<option value="IO"<?php if ($ocountry == 'IO'){ echo $selected; } ?>>British Indian Ocean Territory</option>
	<option value="BN"<?php if ($ocountry == 'BN'){ echo $selected; } ?>>Brunei Darussalam</option>
	<option value="BG"<?php if ($ocountry == 'BG'){ echo $selected; } ?>>Bulgaria</option>
	<option value="BF"<?php if ($ocountry == 'BF'){ echo $selected; } ?>>Burkina Faso</option>
	<option value="BI"<?php if ($ocountry == 'BI'){ echo $selected; } ?>>Burundi</option>
	<option value="KH"<?php if ($ocountry == 'KH'){ echo $selected; } ?>>Cambodia</option>
	<option value="CM"<?php if ($ocountry == 'CM'){ echo $selected; } ?>>Cameroon</option>
	<option value="CA"<?php if ($ocountry == 'CA'){ echo $selected; } ?>>Canada</option>
	<option value="CV"<?php if ($ocountry == 'CV'){ echo $selected; } ?>>Cape Verde</option>
	<option value="KY"<?php if ($ocountry == 'KY'){ echo $selected; } ?>>Cayman Islands</option>
	<option value="CF"<?php if ($ocountry == 'CF'){ echo $selected; } ?>>Central African Republic</option>
	<option value="TD"<?php if ($ocountry == 'TD'){ echo $selected; } ?>>Chad</option>
	<option value="CL"<?php if ($ocountry == 'CL'){ echo $selected; } ?>>Chile</option>
	<option value="CN"<?php if ($ocountry == 'CN'){ echo $selected; } ?>>China</option>
	<option value="CX"<?php if ($ocountry == 'CX'){ echo $selected; } ?>>Christmas Island</option>
	<option value="CC"<?php if ($ocountry == 'CC'){ echo $selected; } ?>>Cocos (Keeling) Islands</option>
	<option value="CO"<?php if ($ocountry == 'CO'){ echo $selected; } ?>>Colombia</option>
	<option value="KM"<?php if ($ocountry == 'KM'){ echo $selected; } ?>>Comoros</option>
	<option value="CG"<?php if ($ocountry == 'CG'){ echo $selected; } ?>>Congo</option>
	<option value="CD"<?php if ($ocountry == 'CD'){ echo $selected; } ?>>Congo, Democratic Republic</option>
	<option value="CK"<?php if ($ocountry == 'CK'){ echo $selected; } ?>>Cook Islands</option>
	<option value="CR"<?php if ($ocountry == 'CR'){ echo $selected; } ?>>Costa Rica</option>
	<option value="CI"<?php if ($ocountry == 'CI'){ echo $selected; } ?>>Cote D'Ivoire</option>
	<option value="HR"<?php if ($ocountry == 'HR'){ echo $selected; } ?>>Croatia</option>
	<option value="CU"<?php if ($ocountry == 'CU'){ echo $selected; } ?>>Cuba</option>
	<option value="CY"<?php if ($ocountry == 'CY'){ echo $selected; } ?>>Cyprus</option>
	<option value="CZ"<?php if ($ocountry == 'CZ'){ echo $selected; } ?>>Czech Republic</option>
	<option value="DK"<?php if ($ocountry == 'DK'){ echo $selected; } ?>>Denmark</option>
	<option value="DJ"<?php if ($ocountry == 'DJ'){ echo $selected; } ?>>Djibouti</option>
	<option value="DM"<?php if ($ocountry == 'DM'){ echo $selected; } ?>>Dominica</option>
	<option value="DO"<?php if ($ocountry == 'DO'){ echo $selected; } ?>>Dominican Republic</option>
	<option value="EC"<?php if ($ocountry == 'EC'){ echo $selected; } ?>>Ecuador</option>
	<option value="EG"<?php if ($ocountry == 'EG'){ echo $selected; } ?>>Egypt</option>
	<option value="SV"<?php if ($ocountry == 'SV'){ echo $selected; } ?>>El Salvador</option>
	<option value="GQ"<?php if ($ocountry == 'GQ'){ echo $selected; } ?>>Equatorial Guinea</option>
	<option value="ER"<?php if ($ocountry == 'ER'){ echo $selected; } ?>>Eritrea</option>
	<option value="EE"<?php if ($ocountry == 'EE'){ echo $selected; } ?>>Estonia</option>
	<option value="ET"<?php if ($ocountry == 'ET'){ echo $selected; } ?>>Ethiopia</option>
	<option value="FK"<?php if ($ocountry == 'FK'){ echo $selected; } ?>>Falkland Islands (Malvinas)</option>
	<option value="FO"<?php if ($ocountry == 'FO'){ echo $selected; } ?>>Faroe Islands</option>
	<option value="FJ"<?php if ($ocountry == 'FJ'){ echo $selected; } ?>>Fiji</option>
	<option value="FI"<?php if ($ocountry == 'FI'){ echo $selected; } ?>>Finland</option>
	<option value="FR"<?php if ($ocountry == 'FR'){ echo $selected; } ?>>France</option>
	<option value="GF"<?php if ($ocountry == 'GF'){ echo $selected; } ?>>French Guiana</option>
	<option value="PF"<?php if ($ocountry == 'PF'){ echo $selected; } ?>>French Polynesia</option>
	<option value="TF"<?php if ($ocountry == 'TF'){ echo $selected; } ?>>French Southern Territories</option>
	<option value="GA"<?php if ($ocountry == 'GA'){ echo $selected; } ?>>Gabon</option>
	<option value="GM"<?php if ($ocountry == 'GM'){ echo $selected; } ?>>Gambia</option>
	<option value="GE"<?php if ($ocountry == 'GE'){ echo $selected; } ?>>Georgia</option>
	<option value="DE"<?php if ($ocountry == 'DE'){ echo $selected; } ?>>Germany</option>
	<option value="GH"<?php if ($ocountry == 'GH'){ echo $selected; } ?>>Ghana</option>
	<option value="GI"<?php if ($ocountry == 'GI'){ echo $selected; } ?>>Gibraltar</option>
	<option value="GR"<?php if ($ocountry == 'GR'){ echo $selected; } ?>>Greece</option>
	<option value="GL"<?php if ($ocountry == 'GL'){ echo $selected; } ?>>Greenland</option>
	<option value="GD"<?php if ($ocountry == 'GD'){ echo $selected; } ?>>Grenada</option>
	<option value="GP"<?php if ($ocountry == 'GP'){ echo $selected; } ?>>Guadeloupe</option>
	<option value="GU"<?php if ($ocountry == 'GU'){ echo $selected; } ?>>Guam</option>
	<option value="GT"<?php if ($ocountry == 'GT'){ echo $selected; } ?>>Guatemala</option>
	<option value="GG"<?php if ($ocountry == 'GG'){ echo $selected; } ?>>Guernsey</option>
	<option value="GN"<?php if ($ocountry == 'GN'){ echo $selected; } ?>>Guinea</option>
	<option value="GW"<?php if ($ocountry == 'GW'){ echo $selected; } ?>>Guinea-Bissau</option>
	<option value="GY"<?php if ($ocountry == 'GY'){ echo $selected; } ?>>Guyana</option>
	<option value="HT"<?php if ($ocountry == 'HT'){ echo $selected; } ?>>Haiti</option>
	<option value="HM"<?php if ($ocountry == 'HM'){ echo $selected; } ?>>Heard Island & Mcdonald Islands</option>
	<option value="VA"<?php if ($ocountry == 'VA'){ echo $selected; } ?>>Holy See (Vatican City State)</option>
	<option value="HN"<?php if ($ocountry == 'HN'){ echo $selected; } ?>>Honduras</option>
	<option value="HK"<?php if ($ocountry == 'HK'){ echo $selected; } ?>>Hong Kong</option>
	<option value="HU"<?php if ($ocountry == 'HU'){ echo $selected; } ?>>Hungary</option>
	<option value="IS"<?php if ($ocountry == 'IS'){ echo $selected; } ?>>Iceland</option>
	<option value="IN"<?php if ($ocountry == 'IN'){ echo $selected; } ?>>India</option>
	<option value="ID"<?php if ($ocountry == 'ID'){ echo $selected; } ?>>Indonesia</option>
	<option value="IR"<?php if ($ocountry == 'IR'){ echo $selected; } ?>>Iran, Islamic Republic Of</option>
	<option value="IQ"<?php if ($ocountry == 'IQ'){ echo $selected; } ?>>Iraq</option>
	<option value="IE"<?php if ($ocountry == 'IE'){ echo $selected; } ?>>Ireland</option>
	<option value="IM"<?php if ($ocountry == 'IM'){ echo $selected; } ?>>Isle Of Man</option>
	<option value="IL"<?php if ($ocountry == 'IL'){ echo $selected; } ?>>Israel</option>
	<option value="IT"<?php if ($ocountry == 'IT'){ echo $selected; } ?>>Italy</option>
	<option value="JM"<?php if ($ocountry == 'JM'){ echo $selected; } ?>>Jamaica</option>
	<option value="JP"<?php if ($ocountry == 'JP'){ echo $selected; } ?>>Japan</option>
	<option value="JE"<?php if ($ocountry == 'JE'){ echo $selected; } ?>>Jersey</option>
	<option value="JO"<?php if ($ocountry == 'JO'){ echo $selected; } ?>>Jordan</option>
	<option value="KZ"<?php if ($ocountry == 'KZ'){ echo $selected; } ?>>Kazakhstan</option>
	<option value="KE"<?php if ($ocountry == 'KE'){ echo $selected; } ?>>Kenya</option>
	<option value="KI"<?php if ($ocountry == 'KI'){ echo $selected; } ?>>Kiribati</option>
	<option value="KR"<?php if ($ocountry == 'KR'){ echo $selected; } ?>>Korea</option>
	<option value="KW"<?php if ($ocountry == 'KW'){ echo $selected; } ?>>Kuwait</option>
	<option value="KG"<?php if ($ocountry == 'KG'){ echo $selected; } ?>>Kyrgyzstan</option>
	<option value="LA"<?php if ($ocountry == 'LA'){ echo $selected; } ?>>Lao People's Democratic Republic</option>
	<option value="LV"<?php if ($ocountry == 'LV'){ echo $selected; } ?>>Latvia</option>
	<option value="LB"<?php if ($ocountry == 'LB'){ echo $selected; } ?>>Lebanon</option>
	<option value="LS"<?php if ($ocountry == 'LS'){ echo $selected; } ?>>Lesotho</option>
	<option value="LR"<?php if ($ocountry == 'LR'){ echo $selected; } ?>>Liberia</option>
	<option value="LY"<?php if ($ocountry == 'LY'){ echo $selected; } ?>>Libyan Arab Jamahiriya</option>
	<option value="LI"<?php if ($ocountry == 'LI'){ echo $selected; } ?>>Liechtenstein</option>
	<option value="LT"<?php if ($ocountry == 'LT'){ echo $selected; } ?>>Lithuania</option>
	<option value="LU"<?php if ($ocountry == 'LU'){ echo $selected; } ?>>Luxembourg</option>
	<option value="MO"<?php if ($ocountry == 'MO'){ echo $selected; } ?>>Macao</option>
	<option value="MK"<?php if ($ocountry == 'MK'){ echo $selected; } ?>>Macedonia</option>
	<option value="MG"<?php if ($ocountry == 'MG'){ echo $selected; } ?>>Madagascar</option>
	<option value="MW"<?php if ($ocountry == 'MW'){ echo $selected; } ?>>Malawi</option>
	<option value="MY"<?php if ($ocountry == 'MY'){ echo $selected; } ?>>Malaysia</option>
	<option value="MV"<?php if ($ocountry == 'MV'){ echo $selected; } ?>>Maldives</option>
	<option value="ML"<?php if ($ocountry == 'ML'){ echo $selected; } ?>>Mali</option>
	<option value="MT"<?php if ($ocountry == 'MT'){ echo $selected; } ?>>Malta</option>
	<option value="MH"<?php if ($ocountry == 'MH'){ echo $selected; } ?>>Marshall Islands</option>
	<option value="MQ"<?php if ($ocountry == 'MQ'){ echo $selected; } ?>>Martinique</option>
	<option value="MR"<?php if ($ocountry == 'MR'){ echo $selected; } ?>>Mauritania</option>
	<option value="MU"<?php if ($ocountry == 'MU'){ echo $selected; } ?>>Mauritius</option>
	<option value="YT"<?php if ($ocountry == 'YT'){ echo $selected; } ?>>Mayotte</option>
	<option value="MX"<?php if ($ocountry == 'MX'){ echo $selected; } ?>>Mexico</option>
	<option value="FM"<?php if ($ocountry == 'FM'){ echo $selected; } ?>>Micronesia, Federated States Of</option>
	<option value="MD"<?php if ($ocountry == 'MD'){ echo $selected; } ?>>Moldova</option>
	<option value="MC"<?php if ($ocountry == 'MC'){ echo $selected; } ?>>Monaco</option>
	<option value="MN"<?php if ($ocountry == 'MN'){ echo $selected; } ?>>Mongolia</option>
	<option value="ME"<?php if ($ocountry == 'ME'){ echo $selected; } ?>>Montenegro</option>
	<option value="MS"<?php if ($ocountry == 'MS'){ echo $selected; } ?>>Montserrat</option>
	<option value="MA"<?php if ($ocountry == 'MA'){ echo $selected; } ?>>Morocco</option>
	<option value="MZ"<?php if ($ocountry == 'MZ'){ echo $selected; } ?>>Mozambique</option>
	<option value="MM"<?php if ($ocountry == 'MM'){ echo $selected; } ?>>Myanmar</option>
	<option value="NA"<?php if ($ocountry == 'NA'){ echo $selected; } ?>>Namibia</option>
	<option value="NR"<?php if ($ocountry == 'NR'){ echo $selected; } ?>>Nauru</option>
	<option value="NP"<?php if ($ocountry == 'NP'){ echo $selected; } ?>>Nepal</option>
	<option value="NL"<?php if ($ocountry == 'NL'){ echo $selected; } ?>>Netherlands</option>
	<option value="AN"<?php if ($ocountry == 'AN'){ echo $selected; } ?>>Netherlands Antilles</option>
	<option value="NC"<?php if ($ocountry == 'NC'){ echo $selected; } ?>>New Caledonia</option>
	<option value="NZ"<?php if ($ocountry == 'NZ'){ echo $selected; } ?>>New Zealand</option>
	<option value="NI"<?php if ($ocountry == 'NI'){ echo $selected; } ?>>Nicaragua</option>
	<option value="NE"<?php if ($ocountry == 'NE'){ echo $selected; } ?>>Niger</option>
	<option value="NG"<?php if ($ocountry == 'NG'){ echo $selected; } ?>>Nigeria</option>
	<option value="NU"<?php if ($ocountry == 'NU'){ echo $selected; } ?>>Niue</option>
	<option value="NF"<?php if ($ocountry == 'NF'){ echo $selected; } ?>>Norfolk Island</option>
	<option value="MP"<?php if ($ocountry == 'MP'){ echo $selected; } ?>>Northern Mariana Islands</option>
	<option value="NO"<?php if ($ocountry == 'NO'){ echo $selected; } ?>>Norway</option>
	<option value="OM"<?php if ($ocountry == 'OM'){ echo $selected; } ?>>Oman</option>
	<option value="PK"<?php if ($ocountry == 'PK'){ echo $selected; } ?>>Pakistan</option>
	<option value="PW"<?php if ($ocountry == 'PW'){ echo $selected; } ?>>Palau</option>
	<option value="PS"<?php if ($ocountry == 'PS'){ echo $selected; } ?>>Palestinian Territory, Occupied</option>
	<option value="PA"<?php if ($ocountry == 'PA'){ echo $selected; } ?>>Panama</option>
	<option value="PG"<?php if ($ocountry == 'PG'){ echo $selected; } ?>>Papua New Guinea</option>
	<option value="PY"<?php if ($ocountry == 'PY'){ echo $selected; } ?>>Paraguay</option>
	<option value="PE"<?php if ($ocountry == 'PE'){ echo $selected; } ?>>Peru</option>
	<option value="PH"<?php if ($ocountry == 'PH'){ echo $selected; } ?>>Philippines</option>
	<option value="PN"<?php if ($ocountry == 'PN'){ echo $selected; } ?>>Pitcairn</option>
	<option value="PL"<?php if ($ocountry == 'PL'){ echo $selected; } ?>>Poland</option>
	<option value="PT"<?php if ($ocountry == 'PT'){ echo $selected; } ?>>Portugal</option>
	<option value="PR"<?php if ($ocountry == 'PR'){ echo $selected; } ?>>Puerto Rico</option>
	<option value="QA"<?php if ($ocountry == 'QA'){ echo $selected; } ?>>Qatar</option>
	<option value="RE"<?php if ($ocountry == 'RE'){ echo $selected; } ?>>Reunion</option>
	<option value="RO"<?php if ($ocountry == 'RO'){ echo $selected; } ?>>Romania</option>
	<option value="RU"<?php if ($ocountry == 'RU'){ echo $selected; } ?>>Russian Federation</option>
	<option value="RW"<?php if ($ocountry == 'RW'){ echo $selected; } ?>>Rwanda</option>
	<option value="BL"<?php if ($ocountry == 'BL'){ echo $selected; } ?>>Saint Barthelemy</option>
	<option value="SH"<?php if ($ocountry == 'SH'){ echo $selected; } ?>>Saint Helena</option>
	<option value="KN"<?php if ($ocountry == 'KN'){ echo $selected; } ?>>Saint Kitts And Nevis</option>
	<option value="LC"<?php if ($ocountry == 'LC'){ echo $selected; } ?>>Saint Lucia</option>
	<option value="MF"<?php if ($ocountry == 'MF'){ echo $selected; } ?>>Saint Martin</option>
	<option value="PM"<?php if ($ocountry == 'PM'){ echo $selected; } ?>>Saint Pierre And Miquelon</option>
	<option value="VC"<?php if ($ocountry == 'VC'){ echo $selected; } ?>>Saint Vincent And Grenadines</option>
	<option value="WS"<?php if ($ocountry == 'WS'){ echo $selected; } ?>>Samoa</option>
	<option value="SM"<?php if ($ocountry == 'SM'){ echo $selected; } ?>>San Marino</option>
	<option value="ST"<?php if ($ocountry == 'ST'){ echo $selected; } ?>>Sao Tome And Principe</option>
	<option value="SA"<?php if ($ocountry == 'SA'){ echo $selected; } ?>>Saudi Arabia</option>
	<option value="SN"<?php if ($ocountry == 'SN'){ echo $selected; } ?>>Senegal</option>
	<option value="RS"<?php if ($ocountry == 'RS'){ echo $selected; } ?>>Serbia</option>
	<option value="SC"<?php if ($ocountry == 'SC'){ echo $selected; } ?>>Seychelles</option>
	<option value="SL"<?php if ($ocountry == 'SL'){ echo $selected; } ?>>Sierra Leone</option>
	<option value="SG"<?php if ($ocountry == 'SG'){ echo $selected; } ?>>Singapore</option>
	<option value="SK"<?php if ($ocountry == 'SK'){ echo $selected; } ?>>Slovakia</option>
	<option value="SI"<?php if ($ocountry == 'SI'){ echo $selected; } ?>>Slovenia</option>
	<option value="SB"<?php if ($ocountry == 'SB'){ echo $selected; } ?>>Solomon Islands</option>
	<option value="SO"<?php if ($ocountry == 'SO'){ echo $selected; } ?>>Somalia</option>
	<option value="ZA"<?php if ($ocountry == 'ZA'){ echo $selected; } ?>>South Africa</option>
	<option value="GS"<?php if ($ocountry == 'GS'){ echo $selected; } ?>>South Georgia And Sandwich Isl.</option>
	<option value="ES"<?php if ($ocountry == 'ES'){ echo $selected; } ?>>Spain</option>
	<option value="LK"<?php if ($ocountry == 'LK'){ echo $selected; } ?>>Sri Lanka</option>
	<option value="SD"<?php if ($ocountry == 'SD'){ echo $selected; } ?>>Sudan</option>
	<option value="SR"<?php if ($ocountry == 'SR'){ echo $selected; } ?>>Suriname</option>
	<option value="SJ"<?php if ($ocountry == 'SJ'){ echo $selected; } ?>>Svalbard And Jan Mayen</option>
	<option value="SZ"<?php if ($ocountry == 'SZ'){ echo $selected; } ?>>Swaziland</option>
	<option value="SE"<?php if ($ocountry == 'SE'){ echo $selected; } ?>>Sweden</option>
	<option value="CH"<?php if ($ocountry == 'CH'){ echo $selected; } ?>>Switzerland</option>
	<option value="SY"<?php if ($ocountry == 'SY'){ echo $selected; } ?>>Syrian Arab Republic</option>
	<option value="TW"<?php if ($ocountry == 'TW'){ echo $selected; } ?>>Taiwan</option>
	<option value="TJ"<?php if ($ocountry == 'TJ'){ echo $selected; } ?>>Tajikistan</option>
	<option value="TZ"<?php if ($ocountry == 'TZ'){ echo $selected; } ?>>Tanzania</option>
	<option value="TH"<?php if ($ocountry == 'TH'){ echo $selected; } ?>>Thailand</option>
	<option value="TL"<?php if ($ocountry == 'TL'){ echo $selected; } ?>>Timor-Leste</option>
	<option value="TG"<?php if ($ocountry == 'TG'){ echo $selected; } ?>>Togo</option>
	<option value="TK"<?php if ($ocountry == 'TK'){ echo $selected; } ?>>Tokelau</option>
	<option value="TO"<?php if ($ocountry == 'TO'){ echo $selected; } ?>>Tonga</option>
	<option value="TT"<?php if ($ocountry == 'TT'){ echo $selected; } ?>>Trinidad And Tobago</option>
	<option value="TN"<?php if ($ocountry == 'TN'){ echo $selected; } ?>>Tunisia</option>
	<option value="TR"<?php if ($ocountry == 'TR'){ echo $selected; } ?>>Turkey</option>
	<option value="TM"<?php if ($ocountry == 'TM'){ echo $selected; } ?>>Turkmenistan</option>
	<option value="TC"<?php if ($ocountry == 'TC'){ echo $selected; } ?>>Turks And Caicos Islands</option>
	<option value="TV"<?php if ($ocountry == 'TV'){ echo $selected; } ?>>Tuvalu</option>
	<option value="UG"<?php if ($ocountry == 'UG'){ echo $selected; } ?>>Uganda</option>
	<option value="UA"<?php if ($ocountry == 'UA'){ echo $selected; } ?>>Ukraine</option>
	<option value="AE"<?php if ($ocountry == 'AE'){ echo $selected; } ?>>United Arab Emirates</option>
	<option value="GB"<?php if ($ocountry == 'GB'){ echo $selected; } ?>>United Kingdom</option>
	<option value="US"<?php if ($ocountry == 'US'){ echo $selected; } ?>>United States</option>
	<option value="UM"<?php if ($ocountry == 'UM'){ echo $selected; } ?>>United States Outlying Islands</option>
	<option value="UY"<?php if ($ocountry == 'UY'){ echo $selected; } ?>>Uruguay</option>
	<option value="UZ"<?php if ($ocountry == 'UZ'){ echo $selected; } ?>>Uzbekistan</option>
	<option value="VU"<?php if ($ocountry == 'VU'){ echo $selected; } ?>>Vanuatu</option>
	<option value="VE"<?php if ($ocountry == 'VE'){ echo $selected; } ?>>Venezuela</option>
	<option value="VN"<?php if ($ocountry == 'VN'){ echo $selected; } ?>>Viet Nam</option>
	<option value="VG"<?php if ($ocountry == 'VG'){ echo $selected; } ?>>Virgin Islands, British</option>
	<option value="VI"<?php if ($ocountry == 'VI'){ echo $selected; } ?>>Virgin Islands, U.S.</option>
	<option value="WF"<?php if ($ocountry == 'WF'){ echo $selected; } ?>>Wallis And Futuna</option>
	<option value="EH"<?php if ($ocountry == 'EH'){ echo $selected; } ?>>Western Sahara</option>
	<option value="YE"<?php if ($ocountry == 'YE'){ echo $selected; } ?>>Yemen</option>
	<option value="ZM"<?php if ($ocountry == 'ZM'){ echo $selected; } ?>>Zambia</option>
	<option value="ZW"<?php if ($ocountry == 'ZW'){ echo $selected; } ?>>Zimbabwe</option>
</select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="phone"><?php echo $_L['phoneNumber'];?></label>
            <div class="controls">
              <input type="text" name="phone" class="input-xlarge" id="phone" value="<?php echo $cl['phone']; ?>">
            </div>
          </div>




          <div class="control-group">
            <label class="control-label" for="status"><?php echo $_L['status'];?></label>
            <div class="controls">
              <select name="status" >
                    <option value="Active" <?php if ($cstatus == 'Active'){ echo $selected; } ?>>Active</option>
                    <option value="Inactive" <?php if ($cstatus == 'Inactive'){ echo $selected; } ?>>Inactive</option>
                    <option value="Closed" <?php if ($cstatus == 'Closed'){ echo $selected; } ?>>Closed</option>
</select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="phone"><?php echo $_L['clientGroup'];?></label>
            <div class="controls">
              <select name="gid">
  <?php
		  $accgroups = ORM::for_table('accgroups')->find_many();
		  $groupid = $cl['groupid'];
		  if ($groupid=='0'){
			 echo  '<option value="0" selected="selected">None</option> ';
		  }
		  else {
			 echo  '<option value="0">None</option> ';
		  }

foreach ($accgroups as $accgroup) {
	$gid = $accgroup['id'];
    $name = $accgroup['groupname'];
	$xthis ='';
	if ($groupid=="$gid"){
		$xthis = 'selected="selected"';
	}
	echo "<option value=\"$gid\" $xthis>$name</option>";
}

		  ?>
</select>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo $_L['saveChanges'];?></button>
            <button type="reset" class="btn"><?php echo $_L['cancel'];?></button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>