<div class="row">
    <!-- ============================================================== -->
    <!-- validation form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <?php if(!$this->session->userdata('user_id')): ?>
                <div class="btn-group float-right m-t-25">
                    <a href="/adoption/users/login" class="btn btn-secondary">Login Page</a>                    
                </div>
            <?php endif; ?>
            <h2 class="pageheader-title">Registration Page</h2>
            <hr>
        </div>
        <div class="card">
            <h5 class="card-header">Registration Form</h5>
            <div class="register-form"> </div>
            <div class="card-body">
            <?php
                echo validation_errors();
                $attributes = array("class"=>"needs-validation", "novalidate" => ""); 
                echo form_open('users/register', $attributes);
            ?>    
                <!--form class="needs-validation" novalidate-->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom01">First name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="first_name" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last_name" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Email</label>
                           <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email" name="email"  value="" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your email address.
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Identity Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Identity Number" name="id_num" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Contact Number" name="contact_num" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Alt Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Alternate Contact Number" name="contact_num2" value="">
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Password</label>
                            <input type="password" class="form-control" id="validationCustom02" placeholder="Password"  name="password" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Confirm Password</label>
                            <input type="password" class="form-control" id="validationCustom02" placeholder="Confirm Password" name="password2" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Username</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Username" name="username" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Relationship Status</label>
                            <select required="" id="relation" onchange="myFunction();" name="relationship" class="form-control">
                                <option></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                            <div class="valid-feedback">
                                Username is for login purposes, please remember it!
                            </div><br>
                        </div>
                    </div>

                   <div id="spouse_details" style="display: none;">

                    <input type="hidden" id="married" name="married" value="1">
                    <div class="alert alert-dark text-center" role="alert">Please Enter Spouse's details</div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom01">Spouse's First name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="spouse_first_name" value="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Spouse's Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="spouse_last_name" value="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Spouse's Email</label>
                           <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email" name="spouse_email"  value="" aria-describedby="inputGroupPrepend">
                                <div class="invalid-feedback">
                                    Please enter your email address.
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Spouse's ID Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Identity Number" name="spouse_id_num" value="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Spouse's Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Contact Number" name="spouse_contact_num" value="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Alt Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Alternate Contact Number" name="spouse_contact_num2" value="">
                        </div>
                    </div>

                    </div>


                    <div class="form-row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom03">City</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" >
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom04">State</label>
                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" >
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom05">Street</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Street" >
                            <div class="invalid-feedback">
                                Please provide a valid street.
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </div>

 <!-- ########################################### AGENCY FORM ################################################# -->




                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

   




    <!-- ============================================================== -->
    <!-- end validation form -->
    <!-- ============================================================== -->
</div>


<script type="text/javascript">
  

function myFunction() 
{
    
    console.log('hey');
    var x = document.getElementById("relation").attr("value");
    console.log(x);

    /*if (x.style.display === "none") 
    {
        x.style.display = "block";
    } 
    else 
    {
        x.style.display = "none";
    }*/
}

</script>