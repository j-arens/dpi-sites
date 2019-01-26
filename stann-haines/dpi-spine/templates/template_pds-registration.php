<?php 
/**
* Template Name: PDS Registration Form
*/
get_template_part('partials/page-header');
?>
<section class="content-container content-container--blue">
  <article class="page-article">
<!-- Accrisoft Freedom v/11 Apr 7, 2017 --><script type="text/javascript">
//<![CDATA[
function Validator(form) {
  var obj;
  var errorMsg=''; 
  var REGEX_EMAIL = /^[a-z0-9&.+_-]+@(([a-z0-9\._-]+\.+[a-z]{2,})|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))$|^"[a-z0-9&.+_' -]+@(([a-z0-9\._-]+\.+[a-z]{2,})|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))"$/i;
  obj = document.getElementById('IDFormField_Email_0'); if (obj != null) { if (obj.value == '' || (obj.value != '' && !REGEX_EMAIL.test(obj.value))) { errorMsg += "Please enter your email address.\n"; } }
  obj = document.getElementById('IDFormField_firstNameHoH_0'); if (obj != null) { if (obj.value == '') { errorMsg += "Please enter Head of Household\'s first name.\n"; } }
  obj = document.getElementById('IDFormField_lastNameHoH_0'); if (obj != null) { if (obj.value == '') { errorMsg += "Please enter Head of Household\'s last name\n"; } }
  obj = document.getElementById('IDFormField_address_0'); if (obj != null) { if (obj.value == '') { errorMsg += "Address required\n"; } }
  obj = document.getElementById('IDFormField_city_0'); if (obj != null) { if (obj.value == '') { errorMsg += "City required.\n"; } }
  obj = document.getElementById('IDFormField_state_0'); if (obj != null) { if (obj.value == '') { errorMsg += "state required\n"; } }
  obj = document.getElementById('IDFormField_zip_0'); if (obj != null) { if (obj.value == '') { errorMsg += "zip required\n"; } }
  if( errorMsg !='' ){ alert(errorMsg); return false;}
return true;
}
//]]>
</script>
    <h1>St Ann Registration Form</h1>

<form id="form" name="form" method="post" action="index.php" onsubmit="return  Validator(this)">
<table>
<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        <p>**Fields are required.</p>
<p>&nbsp;</p>    </td>
</tr>

    
    <tr><td><div class="formtextRequired">**Email</div></td><td><input type="text" id="IDFormField_Email_0" name="formField_Email" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Family Information - Head of House (HoH)</h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleHoH_0" name="formField_titleHoH"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtextRequired">**First Name</div></td><td><input type="text" id="IDFormField_firstNameHoH_0" name="formField_firstNameHoH" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtextRequired">**Last Name</div></td><td><input type="text" id="IDFormField_lastNameHoH_0" name="formField_lastNameHoH" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixHOH_0" name="formField_suffixHOH"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtextRequired">**Address</div></td><td><input type="text" id="IDFormField_address_0" name="formField_address" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtextRequired">**City</div></td><td><input type="text" id="IDFormField_city_0" name="formField_city" value="Haines City" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtextRequired">**State</div></td><td><input type="text" id="IDFormField_state_0" name="formField_state" value="FL" size="10"   /></td></tr>
    
    

    
    <tr><td><div class="formtextRequired">**Zip</div></td><td><input type="text" id="IDFormField_zip_0" name="formField_zip" value="" size="10"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Phone</div></td><td><input type="text" id="IDFormField_phone_0" name="formField_phone" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Cell Phone</div></td><td><input type="text" id="IDFormField_cellPhone_0" name="formField_cellPhone" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Language spoken at home</div></td><td><input type="text" id="IDFormField_language_0" name="formField_language" value="English" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Years in this Parish</div></td><td><input type="text" id="IDFormField_inParish_0" name="formField_inParish" value="" size="10"   /></td></tr>
    
    

    <tr><td><div class="formtext">FamilyResidence</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_familyResidence_0_1" name="formField_familyResidence" value="familyResidence"    />&nbsp;Tenant</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_familyResidence_0_2" name="formField_familyResidence" value="familyResidence"    />&nbsp;Owner</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Second Residence</h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

    
    <tr><td><div class="formtext">Second Address</div></td><td><input type="text" id="IDFormField_address2nd_0" name="formField_address2nd" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">City</div></td><td><input type="text" id="IDFormField_city2nd_0" name="formField_city2nd" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">State</div></td><td><input type="text" id="IDFormField_state2nd_0" name="formField_state2nd" value="" size="10"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Zip</div></td><td><input type="text" id="IDFormField_zip2nd_0" name="formField_zip2nd" value="" size="10"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Phone</div></td><td><input type="text" id="IDFormField_phone2nd_0" name="formField_phone2nd" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Date in FL - From</div></td><td><input type="text" id="IDFormField_dateFLfrom_0" name="formField_dateFLfrom" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Date in FL - To</div></td><td><input type="text" id="IDFormField_dateFLto_0" name="formField_dateFLto" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Head of House <span style="font-size: 12pt;"> (continued) <br />(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

    
    <tr><td><div class="formtext">Maiden Name</div></td><td><input type="text" id="IDFormField_maidenNameHoH_0" name="formField_maidenNameHoH" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusHoH_0" name="formField_statusHoH"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionHoH_0" name="formField_religionHoH" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryHoH_0" name="formField_birthCountryHoH" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeHoH_0" name="formField_schOccupHomeHoH" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateHoH_0" name="formField_birthDateHoH" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderHoH_0_1" name="formField_genderHoH" value="genderHoH"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderHoH_0_2" name="formField_genderHoH" value="genderHoH"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismHoH_0_1" name="formField_baptismHoH" value="baptismHoH"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismHoH_0_2" name="formField_baptismHoH" value="baptismHoH"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionHoH_0_1" name="formField_forstCommunionHoH" value="firstCommReconHoH"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionHoH_0_2" name="formField_forstCommunionHoH" value="firstCommReconHoH"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationHoH_0_1" name="formField_confirmationHoH" value="confirmationHoH"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationHoH_0_2" name="formField_confirmationHoH" value="confirmationHoH"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massHoH_0" name="formField_massHoH" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyHoH_0" name="formField_societyHoH" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Spouse<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleSpouse_0" name="formField_titleSpouse"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameSpouse_0" name="formField_firstNameSpouse" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameSpouse_0" name="formField_lastNameSpouse" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixSpouse_0" name="formField_suffixSpouse"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Maiden Name</div></td><td><input type="text" id="IDFormField_maidenNameSpouse_0" name="formField_maidenNameSpouse" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusSpouse_0" name="formField_statusSpouse"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionSpouse_0" name="formField_religionSpouse" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountrySpouse_0" name="formField_birthCountrySpouse" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeSpouse_0" name="formField_schOccupHomeSpouse" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateSpouse_0" name="formField_birthDateSpouse" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderSpouse_0_1" name="formField_genderSpouse" value="genderSpouse"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderSpouse_0_2" name="formField_genderSpouse" value="genderSpouse"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismSpouse_0_1" name="formField_baptismSpouse" value="baptismSpouse"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismSpouse_0_2" name="formField_baptismSpouse" value="baptismSpouse"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionSpouse_0_1" name="formField_forstCommunionSpouse" value="firstCommReconSpouse"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionSpouse_0_2" name="formField_forstCommunionSpouse" value="firstCommReconSpouse"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationSpouse_0_1" name="formField_confirmationSpouse" value="confirmationSpouse"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationSpouse_0_2" name="formField_confirmationSpouse" value="confirmationSpouse"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massSpouse_0" name="formField_massSpouse" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societySpouse_0" name="formField_societySpouse" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Child #1<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleChild1_0" name="formField_titleChild1"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameChild1_0" name="formField_firstNameChild1" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameChild1_0" name="formField_lastNameChild1" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixChild1_0" name="formField_suffixChild1"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Nickname</div></td><td><input type="text" id="IDFormField_nicknameChild1_0" name="formField_nicknameChild1" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Relationship (Son, Daughter, etc)</div></td><td><input type="text" id="IDFormField_relationshipChild1_0" name="formField_relationshipChild1" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusChild1_0" name="formField_statusChild1"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionChild1_0" name="formField_religionChild1" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryChild1_0" name="formField_birthCountryChild1" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeChild1_0" name="formField_schOccupHomeChild1" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateChild1_0" name="formField_birthDateChild1" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild1_0_1" name="formField_genderChild1" value="genderChild1"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild1_0_2" name="formField_genderChild1" value="genderChild1"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild1_0_1" name="formField_baptismChild1" value="baptismChild1"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild1_0_2" name="formField_baptismChild1" value="baptismChild1"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild1_0_1" name="formField_forstCommunionChild1" value="firstCommReconChild1"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild1_0_2" name="formField_forstCommunionChild1" value="firstCommReconChild1"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild1_0_1" name="formField_confirmationChild1" value="confirmationChild1"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild1_0_2" name="formField_confirmationChild1" value="confirmationChild1"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massChild1_0" name="formField_massChild1" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyChild1_0" name="formField_societyChild1" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Child #2<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleChild2_0" name="formField_titleChild2"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameChild2_0" name="formField_firstNameChild2" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameChild2_0" name="formField_lastNameChild2" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixChild2_0" name="formField_suffixChild2"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Nickname</div></td><td><input type="text" id="IDFormField_nicknameChild2_0" name="formField_nicknameChild2" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Relationship (Son, Daughter, etc)</div></td><td><input type="text" id="IDFormField_relationshipChild2_0" name="formField_relationshipChild2" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusChild2_0" name="formField_statusChild2"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryChild2_0" name="formField_birthCountryChild2" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionChild2_0" name="formField_religionChild2" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeChild2_0" name="formField_schOccupHomeChild2" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateChild2_0" name="formField_birthDateChild2" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild2_0_1" name="formField_genderChild2" value="genderChild2"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild2_0_2" name="formField_genderChild2" value="genderChild2"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild2_0_1" name="formField_baptismChild2" value="baptismChild2"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild2_0_2" name="formField_baptismChild2" value="baptismChild2"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild2_0_1" name="formField_forstCommunionChild2" value="firstCommReconChild2"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild2_0_2" name="formField_forstCommunionChild2" value="firstCommReconChild2"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild2_0_1" name="formField_confirmationChild2" value="confirmationChild2"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild2_0_2" name="formField_confirmationChild2" value="confirmationChild2"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massChild2_0" name="formField_massChild2" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyChild2_0" name="formField_societyChild2" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Child #3<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleChild3_0" name="formField_titleChild3"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameChild3_0" name="formField_firstNameChild3" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameChild3_0" name="formField_lastNameChild3" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixChild3_0" name="formField_suffixChild3"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Nickname</div></td><td><input type="text" id="IDFormField_nicknameChild3_0" name="formField_nicknameChild3" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Relationship (Son, Daughter, etc)</div></td><td><input type="text" id="IDFormField_relationshipChild3_0" name="formField_relationshipChild3" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusChild3_0" name="formField_statusChild3"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryChild3_0" name="formField_birthCountryChild3" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionChild3_0" name="formField_religionChild3" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeChild3_0" name="formField_schOccupHomeChild3" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateChild3_0" name="formField_birthDateChild3" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild3_0_1" name="formField_genderChild3" value="genderChild3"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild3_0_2" name="formField_genderChild3" value="genderChild3"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild3_0_1" name="formField_baptismChild3" value="baptismChild3"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild3_0_2" name="formField_baptismChild3" value="baptismChild3"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild3_0_1" name="formField_forstCommunionChild3" value="firstCommReconChild3"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild3_0_2" name="formField_forstCommunionChild3" value="firstCommReconChild3"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild3_0_1" name="formField_confirmationChild3" value="confirmationChild3"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild3_0_2" name="formField_confirmationChild3" value="confirmationChild3"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massChild3_0" name="formField_massChild3" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyChild3_0" name="formField_societyChild3" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Child #4<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleChild4_0" name="formField_titleChild4"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameChild4_0" name="formField_firstNameChild4" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameChild4_0" name="formField_lastNameChild4" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixChild4_0" name="formField_suffixChild4"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Nickname</div></td><td><input type="text" id="IDFormField_nicknameChild4_0" name="formField_nicknameChild4" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Relationship (Son, Daughter, etc)</div></td><td><input type="text" id="IDFormField_relationshipChild4_0" name="formField_relationshipChild4" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusChild4_0" name="formField_statusChild4"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryChild4_0" name="formField_birthCountryChild4" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionChild4_0" name="formField_religionChild4" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeChild4_0" name="formField_schOccupHomeChild4" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateChild4_0" name="formField_birthDateChild4" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild4_0_1" name="formField_genderChild4" value="genderChild4"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild4_0_2" name="formField_genderChild4" value="genderChild4"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild4_0_1" name="formField_baptismChild4" value="baptismChild4"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild4_0_2" name="formField_baptismChild4" value="baptismChild4"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild4_0_1" name="formField_forstCommunionChild4" value="firstCommReconChild4"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild4_0_2" name="formField_forstCommunionChild4" value="firstCommReconChild4"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild4_0_1" name="formField_confirmationChild4" value="confirmationChild4"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild4_0_2" name="formField_confirmationChild4" value="confirmationChild4"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massChild4_0" name="formField_massChild4" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyChild4_0" name="formField_societyChild4" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Child #5<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleChild5_0" name="formField_titleChild5"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameChild5_0" name="formField_firstNameChild5" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameChild5_0" name="formField_lastNameChild5" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixChild5_0" name="formField_suffixChild5"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Nickname</div></td><td><input type="text" id="IDFormField_nicknameChild5_0" name="formField_nicknameChild5" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Relationship (Son, Daughter, etc)</div></td><td><input type="text" id="IDFormField_relationshipChild5_0" name="formField_relationshipChild5" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusChild5_0" name="formField_statusChild5"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryChild5_0" name="formField_birthCountryChild5" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionChild5_0" name="formField_religionChild5" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeChild5_0" name="formField_schOccupHomeChild5" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateChild5_0" name="formField_birthDateChild5" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild5_0_1" name="formField_genderChild5" value="genderChild5"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild5_0_2" name="formField_genderChild5" value="genderChild5"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild5_0_1" name="formField_baptismChild5" value="baptismChild5"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild5_0_2" name="formField_baptismChild5" value="baptismChild5"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild5_0_1" name="formField_forstCommunionChild5" value="firstCommReconChild5"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild5_0_2" name="formField_forstCommunionChild5" value="firstCommReconChild5"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild5_0_1" name="formField_confirmationChild5" value="confirmationChild5"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild5_0_2" name="formField_confirmationChild5" value="confirmationChild5"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massChild5_0" name="formField_massChild5" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyChild5_0" name="formField_societyChild5" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Child #6<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleChild6_0" name="formField_titleChild6"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameChild6_0" name="formField_firstNameChild6" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameChild6_0" name="formField_lastNameChild6" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixChild6_0" name="formField_suffixChild6"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Nickname</div></td><td><input type="text" id="IDFormField_nicknameChild6_0" name="formField_nicknameChild6" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Relationship (Son, Daughter, etc)</div></td><td><input type="text" id="IDFormField_relationshipChild6_0" name="formField_relationshipChild6" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusChild6_0" name="formField_statusChild6"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryChild6_0" name="formField_birthCountryChild6" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionChild6_0" name="formField_religionChild6" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeChild6_0" name="formField_schOccupHomeChild6" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateChild6_0" name="formField_birthDateChild6" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild6_0_1" name="formField_genderChild6" value="genderChild6"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderChild6_0_2" name="formField_genderChild6" value="genderChild6"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild6_0_1" name="formField_baptismChild6" value="baptismChild6"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismChild6_0_2" name="formField_baptismChild6" value="baptismChild6"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild6_0_1" name="formField_forstCommunionChild6" value="firstCommReconChild6"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionChild6_0_2" name="formField_forstCommunionChild6" value="firstCommReconChild6"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild6_0_1" name="formField_confirmationChild6" value="confirmationChild6"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationChild6_0_2" name="formField_confirmationChild6" value="confirmationChild6"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massChild6_0" name="formField_massChild6" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyChild6_0" name="formField_societyChild6" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2" style="
                text-align:center;        " >   
        <h5>Member Information - Other<br /> <span style="font-size: 12pt;">(Complete as applicable)</span></h5>    </td>
</tr>

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

 
    <tr>
        <td>
            <div class="formtext">Title</div>
        </td>
        <td>
            <select id="IDFormField_titleOther_0" name="formField_titleOther"  >
            <option value=""  selected="selected" ></option>
<option value="Mr"    >Mr</option>
<option value="Mrs"    >Mrs</option>
<option value="Miss"    >Miss</option>
<option value="Ms"    >Ms</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">First Name</div></td><td><input type="text" id="IDFormField_firstNameOther_0" name="formField_firstNameOther" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Last Name</div></td><td><input type="text" id="IDFormField_lastNameOther_0" name="formField_lastNameOther" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Suffix</div>
        </td>
        <td>
            <select id="IDFormField_suffixOther_0" name="formField_suffixOther"  >
            <option value=""  selected="selected" ></option>
<option value="Sr"    >Sr</option>
<option value="Jr"    >Jr</option>
<option value="III"    >III</option>
<option value="IV"    >IV</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Relationship (Parent,Grandparent, etc)</div></td><td><input type="text" id="IDFormField_relationshipOther_0" name="formField_relationshipOther" value="" size="40"   /></td></tr>
    
    

 
    <tr>
        <td>
            <div class="formtext">Status</div>
        </td>
        <td>
            <select id="IDFormField_statusOther_0" name="formField_statusOther"  >
            <option value=""  selected="selected" ></option>
<option value="Married"    >Married</option>
<option value="Single"    >Single</option>
<option value="Divorced"    >Divorced</option>
            </select>
        </td>
    </tr>    
    
    

    
    <tr><td><div class="formtext">Birth Country</div></td><td><input type="text" id="IDFormField_birthCountryOther_0" name="formField_birthCountryOther" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Religion</div></td><td><input type="text" id="IDFormField_religionOther_0" name="formField_religionOther" value="Catholic" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">School, Occupation, Homebound</div></td><td><input type="text" id="IDFormField_schOccupHomeOther_0" name="formField_schOccupHomeOther" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Birth Date</div></td><td><input type="text" id="IDFormField_birthDateOther_0" name="formField_birthDateOther" value="" size="40"   /></td></tr>
    
    

    <tr><td><div class="formtext">Gender</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderOther_0_1" name="formField_genderOther" value="genderOther"    />&nbsp;Male</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_genderOther_0_2" name="formField_genderOther" value="genderOther"    />&nbsp;Female</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Baptism</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismOther_0_1" name="formField_baptismOther" value="baptismOther"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_baptismOther_0_2" name="formField_baptismOther" value="baptismOther"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">First Communion/Reconciliation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionOther_0_1" name="formField_forstCommunionOther" value="firstCommReconOther"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_forstCommunionOther_0_2" name="formField_forstCommunionOther" value="firstCommReconOther"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    <tr><td><div class="formtext">Confirmation</div></td><td>
    
     
	<table border="0" width="100%"><tr>        
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationOther_0_1" name="formField_confirmationOther" value="confirmationOther"    />&nbsp;Yes</td>
            
	<td style="white-space: nowrap" ><input type="radio" id="IDFormField_confirmationOther_0_2" name="formField_confirmationOther" value="confirmationOther"    />&nbsp;No</td>
    		</tr><tr>
			        	<td colspan="2">&nbsp;</td>
        	</tr></table>
	</td></tr>

    
    <tr><td><div class="formtext">Mass Attendance</div></td><td><input type="text" id="IDFormField_massOther_0" name="formField_massOther" value="" size="40"   /></td></tr>
    
    

    
    <tr><td><div class="formtext">Church Society</div></td><td><input type="text" id="IDFormField_societyOther_0" name="formField_societyOther" value="" size="40"   /></td></tr>
    
    

<tr>
    <td colspan="2" style="
        text-align:left;                " >   
        &nbsp;    </td>
</tr>

<tr>
    <td colspan="2"><div class="simpleAntiSpam"><div style="text-align:center;margin:6px;max-width:400px"><p><strong>Before submitting this form, please click on the link below to move the contents of box "A" into box "B" leaving the first box empty.</strong></p><p><span style="float:left;padding-left:40px">A: <input type="text" name="nospamA" id="nospamA" size="10" value="b4f47301263a" /></span><span style="float:right;padding-right:40px">B: <input type="text" name="nospamB" id="nospamB" size="10" value="" /></span><span><a href="javascript:void(0)" onclick="var a=document.getElementById('nospamA'); var b=document.getElementById('nospamB'); if (a&&b&&a.value!='') { b.value=a.value; a.value=''; } return false;" id="nospamLink" style="font-weight:bold">Click to Move</a></span></p><br style="clear:both" /><p style="color: red" id="nospamResponse">&nbsp;</p></div></div></td>
</tr>


</table><div style="padding-top:20px;text-align:center">    
        
            <span><input type="submit" name="submit" alt="Submit" value="Submit" /></span>
        
</div>
<div style="display:none"><input type="hidden" name="hash" value="725578db928e6894d70d5b08cc4a2683" />
<input type="hidden" name="csrfToken" value="672c8abf55f2ec5cf2a967219e584457" />
<input type="hidden" name="edit_id" value="" />
<input type="hidden" name="module" value="" />
<input type="hidden" name="src" value="forms" />
<input type="hidden" name="srctype" value="process" />
<input type="hidden" name="id" value="St%20Ann%20Registration" />
<input type="hidden" name="fs_id" value="St%20Ann%20Registration" />
</div></form>
  </article>
</section>