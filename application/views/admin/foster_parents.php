<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">List of Foster Parents</h2>
            <hr>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">List of Registered Foster Parents</h5>
                <!--p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p-->
            </div>
            <div class="card-body">

            <?php
                $sBaseUrl = site_url();
                if( isset($aAdoptors) && is_array($aAdoptors) && !empty($aAdoptors))
                {
                    echo '<div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name & Surname</th>
                                    <th>Email</th>
                                    <th>Cell Number</th> 
                                </tr>
                            </thead>
                            <tbody>';       
    
                            foreach($aAdoptors as $aAdoptor)
                            {
                                $sView = '<a href="'.$sBaseUrl.'admin/view/id/'.$aAdoptor['id'].'/foster" class="btn btn-primary btn-xs">view</a>';
                                echo '<tr>
                                        <td>'.$sView.'</td>
                                        <td>'.$aAdoptor['name'].' '.$aAdoptor['surname'].'</td>
                                        <td>'.$aAdoptor['email'].'</td>
                                        <td>'.$aAdoptor['contact'].'</td>
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

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end data table  -->
    <!-- ============================================================== -->
</div>