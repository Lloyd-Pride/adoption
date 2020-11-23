<style>
input[type="file"]{
	display: block;
	width: 225px;
	margin-left: 15px;
	margin-top: 15px;
}
label{
	color: white;
	height: 60px;
	width: 150px;
	background-color: #f5af09;
	position: absolute;
	margin: auto;
	top: 100px;
	bottom: 100px;
	left: 0;
	right: 0;
	font-size: 20px;
	display: flex;
	justify-content: center;
	align-items: center;

}

</style>	

<div class="row">
	<!-- ============================================================== -->
	<!-- profile -->
	<!-- ============================================================== -->
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="page-header" id="top">
	            <h2 class="pageheader-title">User Profile</h2>
	            <hr>
	     </div>
	</div>
	<div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
		<!-- ============================================================== -->
		<!-- card profile -->
		<!-- ============================================================== -->
		<?php
			$sUrl = site_url();
			$sProfilePic = (isset($aUser['profile_pic']) && $aUser['profile_pic'] != '') ? $aUser['profile_pic'] : 'noimage.jpg';
		?>
		
		<div class="card">
			<div class="card-body">
				<div class="user-avatar text-center d-block">
					<img src="<?php echo $sUrl; ?>/assets/imgs/<?php echo $sProfilePic; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
				</div>
				<div class="text-center">
					<h2 class="font-24 mb-0"><?php echo $aUser['first_name'].' '.$aUser['last_name']; ?></h2>
				</div>
				<div class="text-center" style="">
					<?php echo form_open_multipart('admin/userprofile'); ?>
					<input type="file" id="file" name="userfile" class="btn btn-primary mb-0" accept="image/*">
					<input type="submit" id="btn" name="profile" class="btn btn-primary mt-3" >
					<input type="submit" id="btn" name="command" value="Remove DP" class="btn btn-danger mt-3" >
					<!--label for="file">upload a photo</label-->
					</form>
				</div>
			</div>
			<div class="card-body border-top">
				<h3 class="font-16">Contact Information</h3>
				<div class="">
					<ul class="list-unstyled mb-0">
					<li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $aUser['email']; ?></li>
					<li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><?php echo $aUser['contact_num']; ?></li>
				</ul>
				</div>
			</div>
			<div class="card-body border-top">
				<h3 class="font-16">Documents</h3>
				<div class="">
					<ul class="mb-0 list-unstyled">
					<?php
						$sUrl = site_url();
						foreach($aApplications as $aApp)	
						{
							$ext = explode(".", $aApp['applicantIdDoc']);
							$idIcon = (end($ext) == 'doc' || end($ext) == 'docx') ? 'fas fa-file-word  facebook-color' : 'fas fa-file-pdf';
							//
							$ext = explode(".", $aApp['applicantPayslip']);
							$slipIcon = (end($ext) == 'doc' || end($ext) == 'docx') ? 'fas fa-file-word  facebook-color' : 'fas fa-file-pdf';

							$ext = explode(".", $aApp['applicantRes']);
							$resIcon = (end($ext) == 'doc' || end($ext) == 'docx') ? 'fas fa-file-word  facebook-color' : 'fas fa-file-pdf';

							if(isset($aApp['applicantIdDoc']) && $aApp['applicantIdDoc'] != 'Blank.docx' )
								echo '<li class="mb-1"><a href="'.$sUrl.'admin/download/'.$aApp['id'].'/userid/'.$aUser['id'].'/id"><i class="'.$idIcon.' mr-1"></i>Identity Document</a></li>';

							if(isset($aApp['applicantPayslip']) && $aApp['applicantPayslip'] != 'Blank.docx' )
								echo '<li class="mb-1"><a href="'.$sUrl.'admin/download/'.$aApp['id'].'/userid/'.$aUser['id'].'/slip"><i class="'.$slipIcon.' mr-1"></i>Proof of Payment</a></li>';

							if(isset($aApp['applicantRes']) && $aApp['applicantRes'] != 'Blank.docx' )
								echo '<li class="mb-1"><a href="'.$sUrl.'admin/download/'.$aApp['id'].'/userid/'.$aUser['id'].'"><i class="'.$resIcon.' mr-1"></i>Proof of Residence</a></li>';
						}
					?>
				</ul>
				</div>
			</div>
			
		</div>
		<!-- ============================================================== -->
		<!-- end card profile -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- campaign data -->
	<!-- ============================================================== -->
	<div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
		<!-- ============================================================== -->
		<!-- campaign tab one -->
		<!-- ============================================================== -->
		<div class="influence-profile-content pills-regular">
			<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Personal Info</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Applications</a>
				</li>
			</ul>	
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
					<div class="card">
						<h5 class="card-header">Personal Information</h5>
						<div class="card-body">
							<div class="review-block">
								<?php

								echo '<table class="table table-bordered">
									<tr class="table-primary">
                                        <th scope="row">Name(s)</th>
                                            <td>'.$aUser['first_name'].'</td>
                                        <th scope="row">Surname</th>        
                                            <td>'.$aUser['last_name'].'</td>
                                    </tr>
									<tr class="table-primary">
                                        <th scope="row">Email</th>
                                            <td>'.$aUser['email'].'</td>
                                        <th scope="row">Contact No:</th>        
                                            <td>'.$aUser['contact_num'].'</td>
                                    </tr>
									<tr class="table-primary">
                                        <th scope="row">Username</th>
                                            <td>'.$aUser['username'].'</td>
                                        <th scope="row">Registration Date:</th>        
                                            <td>'.$aUser['register_date'].'</td>
                                    </tr>
								</table>';
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
					<div class="card">
						<h5 class="card-header">Applications</h5>
						<div class="card-body">
							<div class="review-block">
							<?php
								$sBaseUrl = site_url();
								foreach($aApplications as $ikey => $aApp)	
								{
									//echo '<pre>'; print_r($aApp); die;
									echo '<p class="review-text font-italic m-0"> 
										Appl No: '.($ikey + 1).' <i><a href="'.$sBaseUrl.'admin/viewapplication/id/'.$aApp['id'].'" style="color:red;">(view application)</a></i> A Child\'s specifications are, '.$aApp['babyRace'].', '.$aApp['babyGender'].' and must fall within the age group of '.$aApp['babyAge'].'\'s</p><br/>';
								} 
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
