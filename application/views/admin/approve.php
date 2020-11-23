<div class="row">
    <!-- ============================================================== -->
    <!-- data table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">List of Children to Approve</h2>
            <hr>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Children enlisted for adoption.</h5>
                <!--p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p-->
            </div>
            <div class="card-body">

            <?php
                $sBaseUrl = site_url();
                if(is_array($aChildren) && !empty($aChildren))
                {
                    echo '<div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name & Surname</th>
                                    <th>Race</th>
                                    <th>Age</th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>';

                            foreach($aChildren as $aChild)
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
                                        <td>'.$sEdit.' '.$sView.'</td>
                                        <td>'.$aChild['name'].' '.$aChild['surname'].'</td>
                                        <td>'.$aChild['race'].'</td>
                                        <td>'.$age.'</td>
                                        <td>'.$dob.'</td>
                                        <td>'.$aChild['gender'].'</td>
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