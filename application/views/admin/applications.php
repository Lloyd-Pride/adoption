<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">List of Applications</h2>
            <hr>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Applications.</h5>
				<?php
					$param = (isset($param)) ? ' are '.ucfirst($param): ' needs to be Approved/Rejected';
				
					echo '<p>Below is a list of Applications that '.$param.'.</p>';
				?>
            </div>
            <div class="card-body">

            <?php
                $sBaseUrl = site_url();
				
                if(is_array($aApplications) && !empty($aApplications))
                {
                    echo '<div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                </tr>
                            </thead>
                            <tbody>';

                            foreach($aApplications as $aApp)
                            {
                                $sView = '<a href="'.$sBaseUrl.'admin/viewapplication/id/'.$aApp['id'].'" class="btn btn-primary btn-xs">view</a>';

                                echo '<tr>
                                        <td>'.$sView.'</td>
                                        <td>'.$aApp['applicantName'].'</td>
                                        <td>'.$aApp['applicantSurname'].'</td>
                                        <td>'.$aApp['applicantEmail'].'</td>
                                        <td>'.$aApp['applicantContact'].'</td>
                                     </tr>';
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
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>