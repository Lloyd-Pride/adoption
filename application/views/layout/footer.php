<?php $sBaseUrl = base_url(); ?> 

           <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!--div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/libs/js/dashboard-ecommerce.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/vendor/parsley/parsley.js"></script>
    
    <!-- Datatables-->
    <!-- Required datatable js-->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/buttons.bootstrap4.min.js"></script>

    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?php echo $sBaseUrl.'assets'; ?>/plugins/datatables/dataTables.scroller.min.js"></script>


    <script>
    $('#form').parsley();


$(document).ready(function()
{
    $('#id_num').change(function(){
        var idNumber = $(this).val();
        var Year = idNumber.substring(0, 2);
        var Month = idNumber.substring(2, 4);
        var Day = idNumber.substring(4, 6);
        var gender = idNumber.charAt(6);

        var cutoff = (new Date()).getFullYear() - 2000
        var dob = (Year > cutoff ? '19' : '20') + Year + '-' + Month + '-' + Day;
        
        let dateVal = document.getElementById('dob');
        let genderVal = document.getElementById('gender');
        

        $('#dob').val(dob);
        dateVal.setAttribute("value", dob);
        if(gender >= 5 )
        {
            $('#gender').val('Male');
            genderVal.setAttribute("value", "Male");
        }
        else{    
            $('#gender').val('Female');
            genderVal.setAttribute("value", "Female");
        }

        //alert(dob);
        
    });

}); 


    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

function validate(form_id, email, contact_num, first_name, last_name){

    var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;
    var letters = /^[A-Za-z]+$/;
    var address = document.forms[form_id].elements[email].value;

    var contactNum = /^[0-9]+$/;
    var contactNumber =  document.forms[form_id].elements[contact_num].value;

    var firstName = document.forms[form_id].elements[first_name].value;
    var lastName = document.forms[form_id].elements[last_name].value;

    /*var idNum = /^\+?(0|[1-9]\d*)$/;
    var idNumber =  document.forms[form_id].elements[id_num].value;*/

    if(reg.test(address) == false){
        alert('Invalid Email Address. Please enter a valid one.');
        document.forms[form_id].elements[email].focus();
        return false;
    }

    if(contactNum.test(contactNumber) == false) //contactNumber.length > 12
    {
        alert('Invalid Contact Number. Please enter a valid one.');
        document.forms[form_id].elements[contact_num].focus();
        return false;
    }
    else if(contactNumber.length < 0 || contactNumber.length > 12 )
    {
        alert('Valid Contact Number must consist at least 10 digits.');
        document.forms[form_id].elements[contact_num].focus();
        return false;
    }

    if(firstName.trim() == "")
    {
       alert('You cannot have empty characters for a first name.');
        document.forms[form_id].elements[first_name].focus();
        return false; 
    }
    else if(!letters.test(firstName) || !isNaN(firstName))
    {
        alert('You cannot have Numbers or Expressions as your first name.');
        document.forms[form_id].elements[first_name].focus();
        return false;        
    }
    
    if(lastName.trim() == "")
    {
       alert('You cannot have empty characters for a last name.');
        document.forms[form_id].elements[last_name].focus();
        return false; 
    }
    else if(!letters.test(lastName) || !isNaN(lastName))
    {
        alert('You cannot have Numbers or Expressions as your last name.');
        document.forms[form_id].elements[last_name].focus();
        return false;        
    }
}


    </script>
    
</body>
 
</html>