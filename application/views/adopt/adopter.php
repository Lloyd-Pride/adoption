<div class="row">
    <!-- ============================================================== -->
    <!-- validation form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">Application For Adoption</h2>
            <hr>
        </div>
        <div class="card">
            <h5 class="card-header"> Adoption Application </h5>
            <div class="card-body">
            <?php
                    if(isset($class) && $class != '')
					{
                        echo '<div class="alert alert-'.$class.'" role="alert">You application has been submitted</div>';
					}
                    $attributes = array('class' => 'needs-validation', 'novalidate'=>'', 'id'=>'form_id', 'onsubmit'=>'javascript:return validate(\'form_id\', \'email\', \'contact_num\', \'first_name\', \'last_name\');');
                    echo form_open_multipart('adopt/adopter', $attributes); 
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
                           <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email" name="email"  value="" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your email address.
                                </div>
                            </div>
                        </div>

                        <!--div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Identity Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Identity Number" name="id_num" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please enter valid Identity Number.
                            </div>
                        </div-->

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Contact Number" name="contact_num" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                    Please enter your valid Contact number.
                            </div>
                        </div>

                        <!--div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Alt Contact Number</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Alternate Contact Number" name="contact_num2" value="">
                        </div-->

                    </div>

                    <div class="form-row">
                        <!--div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom03">City</label>
                            <input type="text" name="city" class="form-control" id="validationCustom03" placeholder="City" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom04">State</label>
                            <input type="text" name="state" class="form-control" id="validationCustom04" placeholder="State" required>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom05">Street</label>
                            <input type="text" name="street" class="form-control" id="validationCustom05" placeholder="Street" required>
                            <div class="invalid-feedback">
                                Please provide a valid street.
                            </div>
                        </div-->

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <br><br><br>
                            <h2 class="card-header text-center"> Attachments </h2>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom03">Identity Document</label>
                            <input type="file" class="form-control" name="id_doc" required id="validationCustom03" placeholder="City">
                            <div class="invalid-feedback">
                                Please provide a valid ID Document.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom04">Proof of Payment (< 3 months)</label>
                            <input type="file" class="form-control" name="payment" id="validationCustom04" placeholder="State" required>
                            <div class="invalid-feedback">
                                Please provide a valid Payslip of less than 3 months.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom05">Proof of Residence</label>
                            <input type="file" class="form-control" name="residence" id="validationCustom05" placeholder="Street" required>
                            <div class="invalid-feedback">
                                Please provide a valid Proof of Residence.
                            </div><br />
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="alert alert-primary mt-15" role="alert">
                                <h4 class="alert-heading text-center">Below are child to be adopted information!</h4>
                                <p>Please select all the fields to clearly describe child's specifics, in order to select the ideal child for your lovely home. For legitimate purposes and to speed up the adoption process, please make sure you have uploaded the required documents. (certified ID, payslip and proof or residence)</p>
                                <hr>
                                <p class="mb-0 text-center">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom03">Gender</label>
                            <select required="" name="gender" class="form-control">
                                <option></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a gender.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom04">Race</label>
                            <select required="" name="race" class="form-control">
                                <option></option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Colored">Coloured</option>
                                <option value="Indian">Indian</option>
                                <option value="Asian">Asian</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a race.
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label class="mt-3 mb-1"for="validationCustom05">Age Group</label>
                            <select required="" name="age" class="form-control">
                                <option></option>
                                <option value="newborn">Newborn</option>
                                <option value="infant">Infant</option>
                                <option value="toodler">Toodler</option>
                                <option value="preschool">Preschool</option>
                                <option value="teenage">Teenage</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide the age group.
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" name="terms" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end validation form -->
    <!-- ============================================================== -->
</div>

<!--                                 <select required="" class="form-control select2">
                                    <option>Select</option>

                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    
                                 </select> -->