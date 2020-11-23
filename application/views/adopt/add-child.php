<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>


<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <?php echo validation_errors(); ?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">Enroll a child for Adoption</h2>
            <hr>
        </div>
        <div class="card">
            <h5 class="card-header">Enlisiting Child A For Adoption</h5>
            <div class="card-body">
            <?php
            //'onsubmit'=>'javascript:return validateEmail(\'validationform\', \'email\', \'contact_num\', \'first_name\', \'last_name\', \'name\', \'surname\', \'id_num\');'
                if(isset($class) && $class != '') 
                    echo '<div class="alert alert-'.$class.'" role="alert">'.$message.'</div>';
           
                $attributes = array('data-parsley-validate' => '', 'id' => 'validationform', 'novalidate'=>'', 
                'onsubmit'=>'javascript:return validateEmail(\'validationform\', \'email\', \'contact_num\', \'first_name\', \'last_name\', \'name\', \'surname\', \'id_num\');' );
                echo form_open_multipart('adopt/addchild', $attributes);

                $name = (isset($aChild['name']) && $aChild['name'] != '') ? $aChild['name'] : '';
                $surname = (isset($aChild['surname']) && $aChild['surname'] != '') ? $aChild['surname'] : '';
                $dob = (isset($aChild['dob']) && $aChild['dob'] != '') ? date('Y-m-d',$aChild['dob']) : '';
                $gender = (isset($aChild['gender']) && $aChild['gender'] != '') ? $aChild['gender'] : '';
                $idNum = (isset($aChild['id_num']) && $aChild['id_num'] != '') ? $aChild['id_num'] : '';
                $bio = (isset($aChild['bio']) && $aChild['bio'] != '') ? $aChild['bio'] : '';
                $race = (isset($aChild['race']) && $aChild['race'] != '') ? $aChild['race'] : '';
                $command = (isset($aChild['name']) && $aChild['name'] != '') ? 'Update' : 'Submit';
            

                $firstname = (isset($aParent['name']) && $aParent['name'] != '') ? $aParent['name'] : '';
                $lastname = (isset($aParent['surname']) && $aParent['surname'] != '') ? $aParent['surname'] : '';
                $email = (isset($aParent['email']) && $aParent['email'] != '') ? $aParent['email'] : '';
                $contact = (isset($aParent['contact']) && $aParent['contact'] != '') ? $aParent['contact'] : '';
            
 
    echo '<div class="tab">
        <h2 class="text-center">Biological Parent\'s details</h2>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">First Name</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="first_name" oninput="this.className = \'\'" value="'.$firstname.'" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last_name" oninput="this.className = \'\'" value="'.$lastname.'" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">Contacts No.</label>
            <div class="col-12 col-sm-8 col-lg-6">
               <input type="text" class="form-control" id="validationCustom02" placeholder="Contact Number" name="contact_num" oninput="this.className = \'\'" value="'.$contact.'" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
            <div class="col-12 col-sm-8 col-lg-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email" name="email" oninput="this.className = \'\'" value="'.$email.'" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please enter your email address.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab">
        <h2 class="text-center">Child\'s details</h2>';
            
            echo'<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Child\'s Name</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" oninput="this.className = \'\'" value="'.$name.'" name="name" placeholder="Child\'s name" class="form-control">
                    </div>
                </div>';
                
            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Child\'s Surname</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required="" value="'.$surname.'"  oninput="this.className = \'\'"  name="surname" placeholder="Child\'s surname" class="form-control">
                    </div>
                </div>';
            
            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Identity Number</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" required=""  oninput="this.className = \'\'"  value="'.$idNum.'" name="id_num" id="id_num" data-parsley-minlength="13" placeholder="Identity Number" class="form-control">
                    </div>
                </div>';
            $input = (!empty($dob)) ? 'text' : 'date';    

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Of Birth</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="'.$input.'" value="'.$dob.'" name="dob" id="dob"  oninput="this.className = \'\'"  placeholder="Date Of Birth" disabled class="form-control">
                    </div>
                </div>';

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select required="" value="'.$gender.'" id="gender" disabled oninput="this.className = \'\'"  name="gender" class="form-control">
                            <option value="'.$gender.'">'.$gender.'</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>';

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Race</label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <select required="" name="race" oninput="this.className = \'\'" class="form-control">
                            <option value="'.$race.'">'.$race.'</option>
                            <option value="Black">Black</option>
                            <option value="White">White</option>
                            <option value="Colored">Coloured</option>
                            <option value="Indian">Indian</option>
                            <option value="Asian">Asian</option>
                        </select>
                    </div>
                </div>';

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Birth Certificate <br><small class="text-muted">(pdf, docx, doc)</small> </label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="file" name="id_doc" required class="form-control">
                    </div>
                </div>'; 

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Picture of a child <br><small class="text-muted">(optional)</small> </label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <input type="file" name="userfile" accept="image/*" class="form-control">
                    </div>
                </div>';                   

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Biography of a child <br><small class="text-muted">(optional)</small> </label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <textarea name="bio" placeholder="A summirized child\'s description" class="form-control">'.$bio.'</textarea>
                    </div>
                </div>';

            echo '<div class="form-group row">
                    <label class="col-12 col-sm-3 col-form-label text-sm-right"></label>
                    <div class="col-12 col-sm-8 col-lg-6">
                        <div class="form-check">
                            <input class="form-check-input"  name="terms" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                </div>';
            echo '<div class="form-group row text-center">
                        <div class="col-12 col-sm-12 col-lg-12 offset-sm-1 offset-lg-0">
                            <button type="submit" name="command" value="'.$command.'" class="btn btn-space btn-primary">Submit</button>
                        </div>
                    </div>';
                    // onclick="validateEmail(\'validationform\', \'email\', \'contact_num\', \'first_name\', \'last_name\', \'name\', \'surname\', \'id_num\');"
            ?>
  </div>
  
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" name="command" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>

                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->
</div>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").style.display = "none";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        document.getElementById("nextBtn").style.display = "inline";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function validateEmail(form_id, email, contact_num, first_name, last_name, name, surname, id_num){

    var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
    var letters = /^[A-Za-z]+$/;
    var address = document.forms[form_id].elements[email].value;

    var contactNum = /^[0-9]+$/;
    var contactNumber =  document.forms[form_id].elements[contact_num].value;

    var firstName = document.forms[form_id].elements[first_name].value;
    var lastName = document.forms[form_id].elements[last_name].value;

    var childName = document.forms[form_id].elements[name].value;
    var childSurname = document.forms[form_id].elements[surname].value;

    var idNum = /^[0-9]*$/; // /^\+?([1-9]\d*)$/;
    var idNumber =  document.forms[form_id].elements[id_num].value;

    if(reg.test(address) == false){
        alert('Invalid Email Address. Please enter a valid one.');
        document.forms[form_id].elements[email].focus();
        return false;
    }

    if(contactNum.test(contactNumber) == false) //contactNumber.length > 12
    {
        alert('Invalid Contact Number. Please enter a valid one.');
        document.forms[form_id].elements[contact_num].focus();
        return false;
    }
    else if(contactNumber.length <= 8 || contactNumber.length > 12 )
    {
        alert('Valid Contact Number must consist at least 10 digits.');
        document.forms[form_id].elements[contact_num].focus();
        return false;
    }

    //alert(letters.test(firstName));
    if(firstName.trim() == "")
    {
       alert('You cannot have empty characters for a first name.');
        document.forms[form_id].elements[first_name].focus();
        return false; 
    }
    else if(!letters.test(firstName) || !isNaN(firstName))
    {
        alert('You cannot have Numbers or Expressions as your first name.');
        document.forms[form_id].elements[first_name].focus();
        return false;        
    }
    
    if(lastName.trim() == "")
    {
       alert('You cannot have empty characters for a last name.');
        document.forms[form_id].elements[last_name].focus();
        return false; 
    }
    else if(!letters.test(lastName) || !isNaN(lastName))
    {
        alert('You cannot have Numbers or Expressions as your last name.');
        document.forms[form_id].elements[last_name].focus();
        return false;        
    }

    // Child validation data
    if(childName.trim() == "")
    {
       alert('You cannot have empty characters for child\'s name.');
        document.forms[form_id].elements[name].focus();
        return false; 
    }
    else if(!letters.test(childName) || !isNaN(childName))
    {
        alert('You cannot have Numbers or Expressions as a child\'s name.');
        document.forms[form_id].elements[name].focus();
        return false;        
    }
    
    if(childSurname.trim() == "")
    {
       alert('You cannot have empty characters for child\'s surname.');
        document.forms[form_id].elements[surname].focus();
        return false; 
    }
    else if(!letters.test(childSurname) || !isNaN(childSurname))
    {
        alert('You cannot have Numbers or Expressions as a child\'s surname.');
        document.forms[form_id].elements[surname].focus();
        return false;        
    }    

    if(idNum.test(idNumber) == false) //contactNumber.length > 12
    {
        alert('Invalid ID Number. Please enter a valid one.');
        document.forms[form_id].elements[id_num].focus();
        return false;
    }
    else if(idNumber.length < 0 || idNumber.length >= 14 )
    {
        alert('Valid ID Number must consist 13 digits.');
        document.forms[form_id].elements[id_num].focus();
        return false;
    }

}

$('#id_num').change(function(){
    var idNum = $(this).val();
        alert(idNum);
});

$(document).ready(function()
{
    alert('here');

}); 

/*
function getDob(idNumber) {
   var Year = idNumber.substring(0, 2);
   var Month = idNumber.substring(2, 4)
   var Day = idNumber.substring(4, 6)
   
   var cutoff = (new Date()).getFullYear() - 2000
   
   var dob = (Year > cutoff ? '19' : '20') + Year + '/' + Month + '/' + Day;
   
   return dob;
}

var now = new Date();

var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);

var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

$('#datePicker').val(today);*/


</script>
