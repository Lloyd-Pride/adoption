<?php ?>

<div class="row">
    <!-- ============================================================== -->
    <!-- sales  -->
    <!-- ============================================================== -->

    <?php

        $aChildrenAge = array('newborn' => 0, 'infants' => 0, 'toddler' => 0, 'preschool' => 0,'teenagers' => 0,);
        foreach($aChildren as $aChild)
        {
			//echo '<pre>'.count($aChildren); print_r($aChildren); die;
            $dob = date("Y/m/d", $aChild['dob']);
            $today = date("Y/m/d");
            $oAge = date_diff(date_create($dob), date_create($today));

           // echo '<pre>hello'; print_r($oAge); echo '</pre>';

          /*/  if($oAge->y <= 19)
            {
                if($oAge->y >= 5 && $oAge->y <= 13)
                    $aChildrenAge['preschool']++;

                else if($oAge->y == 1 && $oAge->m < 3)
                    $aChildrenAge['infants']++;

                else if($oAge->y >= 1 && $oAge->y <= 4)
                    $aChildrenAge['toddler']++;

                else if($oAge->y == 0 && $oAge->m <= 12)
                    $aChildrenAge['newborn']++;
				 else if($oAge->y >= 13)
                    $aChildrenAge['teenagers']++;
            }*/

            if($oAge->y == 0 && $oAge->m <= 2) //(0mo - 2mo)
                $aChildrenAge['newborn']++;

            elseif ($oAge->m >= 2 && $oAge->y <= 1) //(2mo - 1yr)
                $aChildrenAge['infants']++;
            
            elseif ($oAge->y >= 1 && $oAge->y <= 4) //(1yr - 4yrs)
                $aChildrenAge['toddler']++;
            
            elseif ($oAge->y >= 5 && $oAge->y <= 12) //(5yrs - 12yrs)
                $aChildrenAge['preschool']++;
            
            else if($oAge->y >= 13) //(13yrs - 19yrs)
                $aChildrenAge['teenagers']++;

        }
    ?>
        
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">NewBorn</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?php echo $aChildrenAge['newborn']; ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    <span class="ml-1"><small class="text-muted">(0mo - 2mo)</small></span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end sales  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- new customer  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Infants</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?php echo $aChildrenAge['infants']; ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    <span class="ml-1"><small class="text-muted">(2mo - 1yr)</small></span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end new customer  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- visitor  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Toddler</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?php echo $aChildrenAge['toddler']; ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    <span class="ml-1"><small class="text-muted">(1yr - 4yrs)</small></span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end visitor  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- total orders  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Preschool</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?php echo $aChildrenAge['preschool']; ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                    <span class="ml-1"><small class="text-muted">(5yrs - 12yrs)</small></span>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end visitor  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Adolescent  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Teenagers</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1"><?php echo $aChildrenAge['teenagers']; ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                    <span class="ml-1"><small class="text-muted">(13yrs - 19yrs)</small></span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end total orders  -->
    <!-- ============================================================== -->

</div>