<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header" id="top">
        <h2 class="pageheader-title">Generate Report on Biological Parent's</h2>
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
                    <input type="hidden" name="type" value="biological">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
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
                    <div class="form-group row  text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0 ml-3">
                            <button type="submit" onclick="submitForm();" name="command" value="Search" class="btn btn-space btn-dark">Generate Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->

<script type="text/javascript">
    
function submitForm()
{
    alert('The report about a list of biological parents will be printed shortly!');
}

</script>