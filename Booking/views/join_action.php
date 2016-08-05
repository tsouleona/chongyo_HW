<html lang="en">
<?php
date_default_timezone_set("Asia/Taipei");
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
    <?php //$row = $data[0];
          
    ?>
<!--顯示活動時間、名稱、網址、人數-->
    <div class="row" align="center">
        <div class="container">
                <div id="action_all"><h2 style="color:#417dd4"><strong>請稍後，將為您服務</strong></h2></div>
                <script>
                    $.ajax({
                        url:'<?php echo $root;?>join_action/getInfo',
                        datatype:'html',
                        success:function(data){
                            $("#action_all").html(data);
                        }
                    })
                </script>
                
            <a style="color:#FFF" href="<?php echo $root;?>index"><button class="btn btn-success btn-lg">回首頁</button></a>
        </div>
    </div>
    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>