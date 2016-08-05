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
<!--新增員工-->
    <?php $row = $data[0];
          
          
    ?>
    <br>
    <br>
    <br>
    <div class="row" align="center">
        <div class="container">
            <div class="row" style="width:600;background:#38c0df;border:2px #38c0df solid;border-radius:10px">
                <form class="form-horizontal" align="center" id="from">
                    <a class="list-group-item active">
                        <h3><strong><?php echo $row[0]['action_name'];?></strong></h3>
                    </a>
                    
                    <div class="form-group" >
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>員工編號</strong></h4></label>
                        <div class="col-sm-8">
                            <input  class="form-control" id="mem_number" />
                        </div>
                    </div>
                    <div id="debug"></div>
                    <?php if($row[0]['action_count']==0){?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input onclick="creative(<?php echo $row[0]['action_ID'];?>)" style="background:#d11141" type="button" disabled="disabled" class="btn btn-success btn-lg" value="新增員工" />
                            
                        </div>
                    </div>
                    <?php }?>
                    <?php if($row[0]['action_count']!=0){?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input onclick="creative(<?php echo $row[0]['action_ID'];?>)" style="background:#d11141" type="button" class="btn btn-success btn-lg" value="新增員工" />
                            
                        </div>
                    </div>
                    <?php }?>
                </form>
<!--判斷有沒有輸入正確-->
                <script>
                    function creative(num){
                        $("#debug").html('<h3 style="color:#d11141"><strong>檢查中......</strong></h3>');
                        $.post("<?php echo $root;?>join_action/insert_can_join",{
                            mem_number:$("#mem_number").val(),
                            action_ID:num
                        },function(data){
                            $("#debug").html("");
                            $("#debug").html(data);
                        });
                    }
                
                </script>
            </div>
            <br><br>
            <button class="btn btn-success btn-lg"><a style="color:#FFF" href="<?php echo $root;?>join_action/together">回活動列</a></button>
            <button class="btn btn-success btn-lg"><a style="color:#FFF" href="<?php echo $root;?>index">回首頁</a></button>
        </div>
    </div>
<!--顯示加入的名單-->
    <hr style="border:2px #38c0df solid;">
    <div class="row" align="center">
        <div class="container" style="width:500">
            <div id="can_join_list"><h2 style="color:#417dd4"><strong>請稍後，將為您服務</strong></h2></div>
            <script>
            var poll = function(){
                $.ajax({
                    url:'<?php echo $root;?>join_action/getCanJoinList',
                    type:'POST',
                    data:{ID:<?php echo $row[0]['action_ID'];?>},
                    datatype:'html',
                    success:function(data){
                        $("#can_join_list").html(data);
                    }
                    
                });
            }
            setInterval(poll, 2000);
            </script>
        </div>
    </div>
    
    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>