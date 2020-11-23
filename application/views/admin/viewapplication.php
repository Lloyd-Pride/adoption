<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">Application Details</h2>
            <hr>
        </div>
        <div class="card">
            <h5 class="card-header">Application Details</h5>
            <div class="card-body">
            <?php  
                $sUrl = site_url();

                if( $aApplication['is_approve'] == -1 ) 
                    echo '<div class="alert alert-danger" role="alert">This Application was rejected.</div>';
                else if( $aApplication['is_approve'] == 1 ) 
                    echo '<div class="alert alert-success" role="alert">This Application was approved.</div>';

                echo form_open('admin/applicationReview/id/'.$aApplication['id']);
            ?> 
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th colspan="4">Applicant's Details</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $aUser['first_name']; ?></td>
                            <th>Surname</th>
                            <td><?php echo $aUser['last_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <td><?php echo $aUser['contact_num']; ?></td>
                            <th>Email</th>
                            <td><?php echo $aUser['email']; ?></td>
                        </tr>
                        <thead>
                            <tr class="table-primary">
                                <th colspan="4">Child's Details</th> 
                            </tr>
                        </thead>
                        <tr>
                            <th>Baby Race</th>
                            <td><?php echo $aApplication['babyRace']; ?></td>
                            <th>Baby Gender:</th>
                            <td><?php echo $aApplication['babyGender']; ?></td>
                        </tr>
                        <tr>
                            <th>Age Group</th>
                            <td><?php echo $aApplication['babyAge']; ?></td>
                            <th>Application Date</th>
                            <td><?php echo $aApplication['application_date']; ?></td>
                        </tr>

                    </tbody>
                </table>
        <?php 
        if( $aApplication['is_approve'] == 0 && $this->session->userdata('user_id') == 1)
        {
           echo '<center>
                    <br/><br/>
                    <input type="submit" name="command" value="Approve" class="btn btn-success">
                    <input type="submit" name="command" value="Reject" class="btn btn-danger">
                </center>';
        }
        ?>
            </form>
            </div>
        </div>
    </div>
</div>

