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

    <br><br><br>
    <?php $row = $data[0];
          $row2 = $data[1];

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
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;活動內容</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;剩餘名額</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;報名人數</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;參與與否</font></strong></h4>
                    </td>
                    
                </thead>
                    
                    <tr>
                        <td align="center">
                           <h4><?php echo $row[0]['action_datetime'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[0]['action_name'];?></h4>
                        </td>
                        <td align="center">
                           <h4><?php echo $row[0]['action_data'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[0]['action_count'];?></h4>
                        </td>
                        <td align="center">
                            <h4><?php echo $row[0]['action_total'] - $row[0]['action_count'];?></h4>
                        </td>
                        <td align="center">
                            <?php if($row[0]['action_count']==0){?>
                            <button disabled="disabled" data-toggle="modal" data-target="#mymodal<?php echo $row[0]['action_ID']?>"  class="btn btn-primary"><h4>參加</h4></button>
                            <?php }?>
                            <?php if($row[0]['action_count']!=0){?>
                            <button data-toggle="modal" data-target="#mymodal<?php echo $row[0]['action_ID']?>"  class="btn btn-primary"><h4>參加</h4></button>
                            <?php }?>
                        </td>
                    </tr>
                            
            </table>

            <!--參加活動modal-->
                <div class="modal fade" id="mymodal<?php echo $row[0]['action_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <form id="form1">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="myModalLabel" style="color:#38c0df"><strong>參加活動申請</strong></h3>
                                </div>
                                <div class="modal-body">
                                    
                                    <h4 style="color:#217385"><strong>輸入編號</strong><input type="text" id="mem_number<?php echo $row[0]['action_ID']?>" /></h4>
                                    <h4 style="color:#217385"><strong>最多可攜伴人數為</strong></h4><input readonly id="count<?php echo $row[0]['action_ID']?>" value="<?php echo $row[0]['action_get'];?>" />
                                    <h4 style="color:#217385"><strong>輸入攜伴人數</strong><input type="number" min="0" max="<?php echo $row[0]['action_get'];?>" name="front_get" id="front_get<?php echo $row[0]['action_ID']?>" /></h4>
                                    <div id="danger<?php echo $row[0]['action_ID']?>"></div>
                                </div>
                                <div class="modal-footer">
            
                                    <input type="button"  class="btn btn-primary" onclick="check(<?php echo $row[0]['action_ID']?>)" value="確認" />
                                </div>
                            </div>
                        </form>
                        <script>
                            function check(num){
                                $("#danger"+num).html('<h4 style="color:red"><strong>檢查中......</strong></h4>');
                                $.post("<?php echo $root;?>join_action/check_member",{
                                    mem_number:$("#mem_number"+num).val(),
                                    action_ID:num,
                                    count:$("#count"+num).val(),
                                    front_get:$("#front_get"+num).val()
                                    
                                },function(data){
                                    $("#danger"+num).html("");
                                    $("#danger"+num).append(data);
                                })
                                
                                    
                                
                            }
                        </script>
                    </div>
                </div><!--model end-->
                <a style="color:#FFF" href="<?php echo $root;?>join_action/together"><button class="btn btn-success btn-lg">回活動列</button></a>
                <a style="color:#FFF" href="<?php echo $root;?>index"><button class="btn btn-success btn-lg">回首頁</button></a>
        </div>
    </div>

    
    <!--顯示參加的人-->
    <hr style="border:2px #38c0df solid;">
    <div class="row" align="center">
        <div class="container" style="width:500">
            <table class="table table-hover">
                
                <h3 style="color:#38c0df"><strong>參加名單</strong></h3>
                <thead>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp;編號</font></strong></h4>
                    </td>
                    <?php if($_SESSION['username']!=NULL){?>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;姓名</font></strong></h4>
                    </td>
                    <td align="center">
                       <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;攜伴人數</font></strong></h4>
                    </td>
                    <?php }?>
                    
                </thead>
                    <?php $x=count($row2);
                        for($i=0;$i<$x;$i++)
                        {
                    ?>
                    <tr>
                        <td align="center">
                           <h4><?php echo $row2[$i]['mem_number'];?></h4>
                        </td>
                        <?php if($_SESSION['username']!=NULL){?>
                            <td align="center">
                                <h4><?php echo $row2[$i]['mem_name'];?></h4>
                            </td>
                            <td align="center">
                                <h4><?php echo $row2[$i]['mem_number_get'];?></h4>
                            </td>
                        <?php }?>
                    </tr>
                    <?php }?>
                            
            </table>
        </div>
    </div>

    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>