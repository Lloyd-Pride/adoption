
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header" id="top">
            <h2 class="pageheader-title">Gallery of Available Children</h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p><hr>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->


<div class="row">
    <?php if(is_array($aChildren) && !empty($aChildren)): ?>
	    <?php foreach($aChildren as $aChild): ?>	
			<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
			    <!-- .card -->
			    <div class="card card-figure has-hoverable">
			        <!-- .card-figure -->
			        <figure class="figure">
			            <img class="img-fluid" src="../assets/imgs/<?php echo $aChild['image']; ?>" alt="Card image cap">
			            <!-- .figure-caption -->
			            <figcaption class="figure-caption">
			                <h6 class="figure-title"> <?php echo $aChild['name'].' '.$aChild['surname']; ?> </h6>
			                <p class="text-muted mb-0"> <?php echo $aChild['bio']; ?> </p>
			            </figcaption>
			            <!-- /.figure-caption -->
			        </figure>
			        <!-- /.card-figure -->
			    </div>
			    <!-- /.card -->
			</div>
		<?php endforeach; ?>

		<?php else: ?>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="alert alert-danger" role="alert">No record was found!</div>
			</div>
	<?php endif; ?>
</div>


