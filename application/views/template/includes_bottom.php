<script src="<?php echo base_url();?>assets/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/assets/jquery-cookie/jquery.cookie.js"></script>

<!--Calendar-->
<script src="<?php echo base_url();?>assets/admin/assets/jquery-ui/jquery-ui.min.js"></script>


<!--Template Scripting-->
<script src="<?php echo base_url();?>assets/admin/js/memento.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/memento-demo-codes.js"></script>

<!--Chart-->
<script src="<?php echo base_url();?>assets/js/jquery.easypiechart.min.js"></script>

<!-- Select 2 -->
<link href="<?php echo base_url();?>assets/js/select2/select2.css" rel="stylesheet" />
<script src="<?php echo base_url();?>assets/js/select2/select2.js"></script>


<script type="text/javascript">

    jQuery(document).ready(function(){


        $('#editor').summernote({

            height: 300,
            minHeight: null,             // set minimum height of editor
            maxHeight: null,          // set maximum height of editor
            focus: true,
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }

        });
        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);//You can append as many data as you want. Check mozilla docs for this
            $.ajax({
                data: data,
                type: "POST",
                url: '<?php echo site_url('admin/utilitarios/upload')?>',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }

    });

    $.fn.serializeObject = function()
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

</script>

