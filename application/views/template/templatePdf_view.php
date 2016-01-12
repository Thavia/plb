<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo (isset($title))?$title:'WS Buffet';?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<?php 
$style = 'font-size:13px;font-family:"Open Sans";';
$CI = get_instance();
$curr_lang  = $CI->uri->segment(1);
if($curr_lang=='ar' || $curr_lang=='fa' || $curr_lang=='he' || $curr_lang=='ur')
{
    $style = 'margin-right:250px;margin-left:0;';
?>
<body dir="rtl">
<?php 
}else{
?>
<body>
<?php 
}
?>
<div class="container" id="main-container">
               <div id="main-content" style="<?php echo $style;?>">


        	<?php if(isset($content))echo $content;?>
                   </div>
    </div>
    <?php include 'includes_bottom.php';?>
</body>
</html>