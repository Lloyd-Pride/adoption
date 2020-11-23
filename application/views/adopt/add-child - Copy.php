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
                if(isset($class) && $class != '') 
                    echo '<div class="alert alert-'.$class.'" role="alert">'.$message.'</div>';
           
                $attributes = array('data-parsley-validate' => '', 'id' => 'validationform', 'novalidate'=>'');
                echo form_open_multipart('adopt/addchild', $attributes);

                $name = (isset($aChild['name']) && $aChild['name'] != '') ? $aChild['name'] : '';
                $surname = (isset($aChild['surname']) && $aChild['surname'] != '') ? $aChild['surname'] : '';
                $dob = (isset($aChild['dob']) && $aChild['dob'] != '') ? date('Y-m-d',$aChild['dob']) : '';
                $gender = (isset($aChild['gender']) && $aChild['gender'] != '') ? $aChild['gender'] : '';
                $idNum = (isset($aChild['id_num']) && $aChild['id_num'] != '') ? $aChild['id_num'] : '';
                $bio = (isset($aChild['bio']) && $aChild['bio'] != '') ? $aChild['bio'] : '';
                $race = (isset($aChild['race']) && $aChild['race'] != '') ? $aChild['race'] : '';
                $command = (isset($aChild['name']) && $aChild['name'] != '') ? 'Update' : 'Submit';

                 
                echo'<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Child\'s Name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required="" value="'.$name.'" name="name" placeholder="Child\'s name" class="form-control">
                        </div>
                    </div>';
                    
                echo '<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Child\'s Surname</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required="" value="'.$surname.'" name="surname" placeholder="Child\'s surname" class="form-control">
                        </div>
                    </div>';

                    $input = (!empty($dob)) ? 'text' : 'date';    

                echo '<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Of Birth</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="'.$input.'" required="" value="'.$dob.'" name="dob" placeholder="Date Of Birth" class="form-control">
                        </div>
                    </div>';
                
                echo '<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Identity Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required="" value="'.$idNum.'" name="id_num" data-parsley-minlength="13" placeholder="Identity Number" class="form-control">
                        </div>
                    </div>';

                echo '<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Gender</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select required="" value="'.$gender.'" name="gender" class="form-control">
                                <option value="'.$gender.'">'.$gender.'</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>';

                echo '<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Race</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select required="" name="race" class="form-control">
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
                            <input type="file" name="certificate" required class="form-control">
                        </div>
                    </div>'; 

                echo '<div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Picture of a child <br><small class="text-muted">(optional)</small> </label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" name="userfile" placeholder="Type something" class="form-control">
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

                echo '<div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" name="command" value="'.$command.'" class="btn btn-space btn-primary">Submit</button>
                            <button class="btn btn-space btn-secondary">Cancel</button>
                        </div>
                    </div>';
            ?>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->
</div>

