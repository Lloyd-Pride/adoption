<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">Profile Page</h2>
            <hr>
        </div>
        <div class="card">
               
        <?php  
            echo '<h5 class="card-header">About: '.$aChild['name'].' '.$aChild['surname'].' </h5>
            <div class="card-body">';
                $dob = date("d/m/Y", $aChild['dob']);
                $sUrl = site_url();
                $status = (isset($aChild['approved']) && $aChild['approved'] != '') ? "Approved" : "Not Approved";

                $bio = (isset($aChild['bio']) && $aChild['bio'] != '') ? $aChild['bio'] : 'No additional information was given.';
                echo form_open('admin/children/id/'.$aChild['id']);
                echo'<center>
                    <img src="'.$sUrl.'/assets/imgs/'. $aChild['image'] .'" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
                    <h2 class="media-heading">'.$aChild['name'].' '.$aChild['surname'].'</h2>
                    </center>
                    <hr>'; 

                $ext = explode(".", $aChild['certificate']);
                $idIcon = (end($ext) == 'doc' || end($ext) == 'docx') ? 'fas fa-file-word  facebook-color' : 'fas fa-file-pdf';


                echo '<table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th colspan="4">Child\'s Details</th> 
                        </tr>
                    </thead>
                    <tbody>
                         <tr>
                            <th>Date of Birth:</th>
                            <td>'.$dob.'</td>
                            <th>Gender:</th>
                            <td>'. $aChild['gender'].'</td>
                        </tr>
                        <tr>
                            <th>Race</th>
                            <td colspan="">'.$aChild['race'].'</td>
                            <th>Status</th>
                            <td colspan="">'.$status.'</td>
                        </tr>
                        <tr  rowspan="2">
                            <th>Biography</th>
                            <td colspan="3">'.$bio.'</td>
                        </tr>
                        <tr  rowspan="2">
                            <th>Documents</th>
                            <td colspan="3">
                            <ul class="mb-0 list-unstyled">
                                <li class="mb-1">
                                    <a href="'.$sUrl.'admin/downloadChild/'.$aChild['id'].'"><i class="'.$idIcon.' mr-1"></i>certificate</a>
                                </li>
                            </ul>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4" >
                                <input type="submit" name="command" value="back" class="btn btn-dark btn-xs">&nbsp;';
                                if($aChild['approved'] != 1)
                            echo '<input type="submit" name="command" value="approve" class="btn btn-success btn-xs">&nbsp;';

                            echo '<input type="submit" name="command" value="delete" class="btn btn-danger btn-xs">&nbsp;';

                echo '      </td>
                        </tr>
                    </tbody>
                </table>';
        ?>

            </form>
            </div>
        </div>
    </div>
</div>