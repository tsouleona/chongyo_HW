<html lang="en">
<?php 
    $connect = new connect_db();
    $root = $connect->db();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Booking</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $root;?>views/css/bootstrap.css" rel="stylesheet">
    
    <!-- Jquery-->
    <script src="<?php echo $root;?>views/jquery/jquery.js"></script>
</head>
<body>
    <br>
    <br>
    <br>
    <div class="row" align="center">
        <div class="container">
            <div class="list-group" style="width:400">
                <a href="<?php echo $root;?>index" class="list-group-item active">
                    <h3><strong>活動報名系統</strong></h3>
                </a>
                <a href="<?php echo $root;?>add_action/add" class="list-group-item"><h4><strong>新增活動</strong></h4></a>
                <a href="<?php echo $root;?>join_action/together" class="list-group-item"><h4><strong>參加活動</strong></h4></a>
                
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Core js -->
    <link href="<?php echo $root;?>views/js/bootstrap.js" rel="stylesheet">
</body>
</html>