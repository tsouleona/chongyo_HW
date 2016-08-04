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
    <?php $row = $data[0];
          
    ?>
    <div class="row" align="center">
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp;活動時間</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;活動名稱</font></strong></h4>
                    </td>
                    <td align="center" style="width:80">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;活動網址</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;剩餘人數</font></strong></h4>
                    </td>
                    <?php if($_SESSION['username']!=NULL){?>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;新增人員</font></strong></h4>
                    </td>
                    <?php }?>
                    
                </thead>
                <?php $x=count($row);
                    $now_time = date("Y-m-d H:i:s");
                    for($j=0;$j<$x;$j++){
                        
                        if($row[$j]['action_start'] < $now_time && $row[$j]['action_end'] > $now_time)
                        {
                ?>
                    
                            <tr>
                                <td align="center">
                                   <h4><?php echo $row[$j]['action_datetime'];?></h4>
                                </td>
                            
                                <td align="center">
                                    <h4><?php echo $row[$j]['action_name'];?></h4>
                                </td>
                                <td align="center" style="width:80">
                                    <a href="<?php echo $root;?>join_action/join_view?ID=<?php echo $row[$j]['action_ID'];?>">https://lab1-srt459vn.c9users.io<?php echo $root;?>join_action/join_view?ID=<?php echo $row[$j]['action_ID'];?></a>
                                </td>
                                <td align="center">
                                    <h4><?php echo $row[$j]['action_count'];?></h4>
                                </td>
                                <?php if($_SESSION['username']!=NULL){?>
                                <td align="center">
                                    <a href="<?php echo $root;?>join_action/join_mem?ID=<?php echo $row[$j]['action_ID'];?>"><button class="btn btn-primary btn-lg">新增</button></a>
                                </td>
                                <?php }?>
                            </tr>
                        <?php }?>
                            
                <?php }?>
            </table>
            <a style="color:#FFF" href="<?php echo $root;?>index"><button class="btn btn-success btn-lg">回首頁</button></a>
        </div>
    </div>
    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>