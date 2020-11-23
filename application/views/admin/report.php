<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header" id="top">
        <h2 class="pageheader-title">Generate Report on Children</h2>
        <hr>
    </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Report</h5>
                <p>Use the parameters below to filter the report, and/or just generate the report without specifying any parameters.</p>
            </div>
            <div class="card-body">
            <?php
              //  if(isset($aData)){ echo '<pre>';print_r($aData); echo '</pre>';}
                
                echo validation_errors();
                $attributes = array("class"=>"needs-validation", "novalidate" => ""); 
                echo form_open('admin/report', $attributes);
            ?>    
                <!--form class="needs-validation" novalidate-->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <input type="hidden" name="type" value="children">
                            <label class="mt-3 mb-1"for="validationCustom01">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="first_name" value="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1"for="validationCustom02">Surname</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last_name" value="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Gender</label>
                            <select name="gender" class="form-control">
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <label class="mt-3 mb-1" for="validationCustom02">Race</label>
                            <select name="race" class="form-control">
                                <option value=""></option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                                <option value="Colored">Coloured</option>
                                <option value="Indian">Indian</option>
                                <option value="Asian">Asian</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group row  text-right">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0 ml-3">
                                <button type="submit" onclick="submitForm();" name="command" value="Search" class="btn btn-space btn-dark">Generate Report</button>
                            </div>
                        </div>
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->


<?php $aPost = $this->input->post();
if(isset($aPost['command'] ) ): ?>
<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">List of Children</h5>
                <p>The report below is generated with fields provided above.</p>
            </div>
            <div class="card-body">
             <?php
                $sBaseUrl = site_url();
                $iCount = 1;
                if(isset($aData) && is_array($aData))
                {
                    echo '<div class="table-responsive">
                        <div class="dt-buttons btn-group">
                            <button type="submit" name="command" value="print"  class="btn btn-secondary btn-sm" tabindex="0" aria-controls="datatable-buttons" type="button">
                                <span style="color:white;">Generate Report</span>
                            </button>
                        </div>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name & Surname</th>
                                    <th>Race</th>
                                    <th>Age</th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>';

                            foreach($aData as $aChild)
                            {
                                $dob = date("Y/m/d", $aChild['dob']);
                                $today = date("Y/m/d");
                                $oAge = date_diff(date_create($dob), date_create($today));
                                
                                if($oAge->y == 1)
                                    $age = $oAge->y.' year';
                                else if($oAge->y > 1)
                                    $age = $oAge->y.' years';
                                else if($oAge->y == 0 && $oAge->m <= 1)
                                {
                                    if($oAge->m == 1) 
                                        $age = $oAge->m.' month';
                                    else if($oAge->d <= 1) 
                                        $age = $oAge->d.' day';
                                    else
                                        $age = $oAge->d.' days';
                                }
                                else if($oAge->y == 0 && $oAge->m > 1)
                                    $age = $oAge->m.' months';

                                $sEdit = '<a href="'.$sBaseUrl.'adopt/addchild/id/'.$aChild['id'].'" class="btn btn-success btn-xs">edit</a>';
                                $sView = '<a href="'.$sBaseUrl.'admin/childprofile/id/'.$aChild['id'].'" class="btn btn-primary btn-xs">view</a>';

                                echo '<tr>
                                        <td>'.$iCount.'</td>
                                        <td>'.$aChild['name'].' '.$aChild['surname'].'</td>
                                        <td>'.$aChild['race'].'</td>
                                        <td>'.$age.'</td>
                                        <td>'.$dob.'</td>
                                        <td>'.$aChild['gender'].'</td>
                                     </tr>';
                                     $iCount++;
                            }
                                
                        echo '</tbody>
                        </table>
                    </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger" role="alert">No record was found!</div>';
                }
            ?>
            </form>
            </div>
        </div>
    </div>
<?php endif; ?>
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>   

<script type="text/javascript">
    
function submitForm()
{
    alert('You report has been generated!!!');
}

</script>