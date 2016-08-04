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
    <div class="row" align="center" >
        <div class="container">
            <div class="list-group" style="width:600;border:2px #38c0df solid;border-radius:10px">
                <a href="<?php echo $root;?>index" class="list-group-item active">
                    <h3><strong>活動報名系統</strong></h3>
                </a>
                <?php if($_SESSION['username'] != NULL){?>
                <a href="<?php echo $root;?>add_action/add" class="list-group-item"><h4><strong>新增活動</strong></h4></a>
                <?php }?>
                <?php if($_SESSION['username'] == NULL){?>
                <a  class="list-group-item"><h4><strong>新增活動</strong></h4></a>
                <?php }?>
                <a href="<?php echo $root;?>join_action/together" class="list-group-item"><h4><strong>參加活動</strong></h4></a>
                <?php if($_SESSION['username'] == NULL){?>
                <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#mymodal">管理員登錄</button>
                <?php }?>
                <?php if($_SESSION['username'] != NULL){?>
                <a href="<?php echo $root;?>index/logout" class="list-group-item"><h4><strong>管理員登出</strong></h4></a>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- 登錄modal-->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="index/login_in" method="POST" id="form1">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel" style="color:#38c0df"><strong>管理員登錄</strong></h3>
                    </div>
                    <div class="modal-body">
                        
                        <h4 style="color:#217385"><strong>帳號</strong><input type="text" name="username" id="username" /></h4>
                        
                        <h4 style="color:#217385"><strong>密碼</strong><input  type="password" name="password" id="password"/></h4>
                        <div id="danger"></div>
                    </div>
                    <div class="modal-footer">

                        <input type="button"  class="btn btn-primary" name="login" id="login" value="確認" />
                    </div>
                </div>
            </form>
            <script>
                $("#login").on("click",function(){
                    if($("#username").val()=="" || $("#password").val()=="")
                    {
                        $("#danger").html('<h4 style="color:red"><strong>尚未輸入完整</strong></h4>');
                    }
                    else{
                        $.post("<?php echo $root;?>index/login",{
                            username:$("#username").val(),
                            password:$("#password").val()
                        },function(data){
                            //alert(data);
                            window.location="<?php echo $root;?>index"
                        })
                    }
                        
                    
                })    
            </script>
        </div>
    </div><!--model end-->
    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js" ></script>
</body>
</html>