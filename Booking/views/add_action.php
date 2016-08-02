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
            <div class="row" style="width:600;background:#38c0df;border:2px #38c0df solid;border-radius:10px">
                <form class="form-horizontal" align="center" id="from">
                    <a class="list-group-item active">
                        <h3><strong>新增活動</strong></h3>
                    </a>
                    <div class="form-group" >
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>活動名稱</strong></h4></label>
                        <div class="col-sm-8">
                            <input  class="form-control" id="action_name" placeholder="公司聚餐" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>活動總人數</strong></h4></label>
                        <div class="col-sm-8">
                            <input  class="form-control" id="action_count" placeholder="100" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>是否可攜伴</strong></h4></label>
                        <div class="col-sm-8">
                            <input  class="form-control" id="action_get" placeholder="請填是或否" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>開始時間</strong></h4></label>
                        <div class="col-sm-8">
                            <input  id="start_time_y" placeholder="2016"/><h5 style="color:#fff"><strong>年</strong></h5>
                            <input  id="start_time_m" placeholder="07"/><h5 style="color:#fff"><strong>月</strong></h5>
                            <input  id="start_time_d" placeholder="18"/><h5 style="color:#fff"><strong>日</strong></h5>
                            <input  id="start_time_h" placeholder="15"/><h5 style="color:#fff"><strong>時</strong></h5>
                            <input  id="start_time_n" placeholder="30"/><h5 style="color:#fff"><strong>分</strong></h5>
                            <input  id="start_time_s" placeholder="00"/><h5 style="color:#fff"><strong>秒</strong></h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>結束時間</strong></h4></label>
                        <div class="col-sm-8">
                            <input  id="end_time_y" placeholder="2016"/><h5 style="color:#fff"><strong>年</strong></h5>
                            <input  id="end_time_m" placeholder="07"/><h5 style="color:#fff"><strong>月</strong></h5>
                            <input  id="end_time_d" placeholder="18"/><h5 style="color:#fff"><strong>日</strong></h5>
                            <input  id="end_time_h" placeholder="15"/><h5 style="color:#fff"><strong>時</strong></h5>
                            <input  id="end_time_n" placeholder="30"/><h5 style="color:#fff"><strong>分</strong></h5>
                            <input  id="end_time_s" placeholder="00"/><h5 style="color:#fff"><strong>秒</strong></h5>
                        </div>
                    </div>
                    <div id="debug"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input id="creative" style="background:#d11141" type="button" class="btn btn-success btn-lg" value="建立活動" />
                        </div>
                    </div>
                    
                </form>
                <script>
                $(document).ready(function(){
                    $("#creative").on("click",function(){
                        $("#debug").html('<h3 style="color:#d11141"><strong>檢查中......</strong></h3>');
                        $.post("<?php echo $root;?>add_action/insert_action",{
                            action_name:$("#action_name").val(),
                            action_count:$("#action_count").val(),
                            action_get:$("#action_get").val(),
                            start_time_y:$("#start_time_y").val(),
                            start_time_m:$("#start_time_m").val(),
                            start_time_d:$("#start_time_d").val(),
                            start_time_h:$("#start_time_h").val(),
                            start_time_n:$("#start_time_n").val(),
                            start_time_s:$("#start_time_s").val(),
                            end_time_y:$("#end_time_y").val(),
                            end_time_m:$("#end_time_m").val(),
                            end_time_d:$("#end_time_d").val(),
                            end_time_h:$("#end_time_h").val(),
                            end_time_n:$("#end_time_n").val(),
                            end_time_s:$("#end_time_s").val()
                        },function(data){
                            $("#debug").html("");
                            $("#debug").append(data);
                        })
                    })
                });
                </script>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Core js -->
    <script src="<?php echo $root;?>views/js/bootstrap.js"></script>
</body>
</html>