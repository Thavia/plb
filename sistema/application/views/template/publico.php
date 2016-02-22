<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>WS Student Center| <?php echo (isset($title))?$title:'Admin panel';?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes_top.php';?>
</head>

<body>
     <div class="container" id="main-container">

        <div id="main-content">
        	<?php if(isset($content))echo $content;?>
           <?php include 'footer.php';?>
        </div>
    </div>
    <?php include 'includes_bottom.php';?>
</body>
</html>
