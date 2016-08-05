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
<!--顯示該活動細項-->
    <div class="row" align="center">
        <div class="container">
            <div id="view_one"><h2 style="color:#417dd4"><strong>請稍後，將為您服務</strong></h2></div>
            <script>
            
            var poll = function(){
                $.ajax({
                    url:'<?php echo $root;?>join_action/getActionOne',
                    type:'POST',
                    data: {ID: <?php echo $_GET['ID'];?>},
                    datatype:'html',
                    success:function(data){
                        $("#view_one").html(data);
                    }
                });
                
            }
            setInterval(poll, 2000);
            </script>
<!--參加活動modal-->
                <div class="modal fade" id="mymodal<?php echo $_GET['ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <form id="form1">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="myModalLabel" style="color:#38c0df"><strong>參加活動申請</strong></h3>
                                </div>
                                <div class="modal-body">
                                    
                                    <h4 style="color:#217385"><strong>輸入編號</strong><input type="text" id="mem_number<?php echo $_GET['ID'];?>" /></h4>
                                    <h4 style="color:#217385"><strong>輸入攜伴人數</strong><input type="number" min="0" max="<?php echo $row[0]['action_get'];?>" name="front_get" id="front_get<?php echo $_GET['ID'];?>" /></h4>
                                    <div id="danger<?php echo $_GET['ID'];?>"></div>
                                </div>
                                <div class="modal-footer">
            
                                    <input type="button"  class="btn btn-primary" onclick="check(<?php echo $_GET['ID'];?>)" value="確認" />
                                </div>
                            </div>
                        </form>
                        <script>
                            function check(num){
                                $("#danger"+num).html('<h4 style="color:red"><strong>檢查中......</strong></h4>');
                                $.post(
                                    "<?php echo $root;?>join_action/check_member",
                                    {
                                        mem_number:$("#mem_number"+num).val(),
                                        action_ID:num,
                                        count:$("#count"+num).val(),
                                        front_get:$("#front_get"+num).val()
                                        
                                    },
                                    function(data){
                                        $("#danger"+num).html("");
                                        $("#danger"+num).append(data);
                                    }
                                
                                );    
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
            <div id="front_list"><h2 style="color:#417dd4"><strong>請稍後，將為您服務</strong></h2></div>
            <script>
            
            var poll = function(){
               $.ajax({
                    url:'<?php echo $root;?>join_action/getFrontList',
                    type:'POST',
                    data: {ID: <?php echo $_GET['ID'];?>},
                    datatype:'html',
                    success:function(data2){
                        $("#front_list").html(data2);
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