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

           // echo '<pre>'; print_r($parent); die;

            echo '<h5 class="card-header">About: '.$parent['first_name'].' '.$parent['last_name'].' </h5>
            <div class="card-body">';
                $sUrl = site_url();
                $registerDate =  $parent['register_date'];
                
                echo form_open('admin/view/id/'.$parent['id']);
                echo'<center>
                    <img src="'.$sUrl.'/assets/imgs/'. $parent['profile_pic'] .'" name="aboutme" width="140" height="140" border="0" class="rounded-circle"></a>
                    <h2 class="media-heading">'.$parent['first_name'].' '.$parent['last_name'].'</h2>
                    </center>
                    <hr>'; 

                echo '<table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th colspan="4">User\'s Details</th> 
                        </tr>
                    </thead>
                    <tbody>
                         <tr>
                            <th>First Name:</th>
                            <td>'.$parent['first_name'].'</td>
                            <th>Surname</th>
                            <td>'. $parent['last_name'].'</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td colspan="">'.$parent['email'].'</td>
                            <th>Contact No.</th>
                            <td>'. $parent['contact_num'].'</td>
                        </tr>
                        <tr  rowspan="2">
                            <th>Date of Registry</th>
                            <td colspan="3">'.$registerDate.'</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4" >
                                <input type="submit" name="command" value="back" class="btn btn-dark btn-xs">&nbsp;';

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