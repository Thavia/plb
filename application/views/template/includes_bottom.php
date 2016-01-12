<script src="<?php echo base_url();?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/assets/jquery-cookie/jquery.cookie.js"></script>

<!--Calendar-->
<script src="<?php echo base_url();?>assets/admin/assets/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/assets/ckeditor/ckeditor.js"></script>


<!--Template Scripting-->
<script src="<?php echo base_url();?>assets/admin/js/memento.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/memento-demo-codes.js"></script>





<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.filters').change(function(){
            jQuery('#filter_form').submit();
        });
    });

    jQuery(document).ready(function(){


        $('#editor').summernote({

            height: 300,
            minHeight: null,             // set minimum height of editor
            maxHeight: null,           // set maximum height of editor
            focus: true

        });


    });


</script>