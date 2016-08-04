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
<!--新增活動-->
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
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>活動時間</strong></h4></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="date"/>
                            <input type="time" class="form-control" id="time"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>活動內容</strong></h4></label>
                        <div class="col-sm-8">
                            <textarea row="5" class="form-control" id="action_data" placeholder="在哪裡舉辦....." /></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>活動人數限制</strong></h4></label>
                        <div class="col-sm-8">
                            <input  class="form-control" id="action_count" placeholder="100" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>可攜伴人數</strong></h4></label>
                        <div class="col-sm-8">
                            <input  class="form-control" id="action_get" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>報名開始時間</strong></h4></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="start_date"/>
                            <input type="time" class="form-control" id="start_time"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"><h4 style="color:#fff"><strong>報名結束時間</strong></h4></label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="end_date"/>
                            <input type="time" class="form-control" id="end_time"/>
                        </div>
                    </div>
                    <div id="debug"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input id="creative" style="background:#d11141" type="button" class="btn btn-success btn-lg" value="建立活動" />
                            <button class="btn btn-success btn-lg"><a style="color:#FFF" href="<?php echo $root;?>index">回首頁</a></button>
                        </div>
                    </div>
                    
                </form>
<!--判斷有沒有輸入正確-->
                <script>
                $(document).ready(function(){
                    $("#creative").on("click",function(){
                        $("#debug").html('<h3 style="color:#d11141"><strong>檢查中......</strong></h3>');
                        $.post("<?php echo $root;?>add_action/insert_action",{
                            action_name:$("#action_name").val(),
                            action_count:$("#action_count").val(),
                            action_data:$("#action_data").val(),
                            action_get:$("#action_get").val(),
                            date:$("#date").val(),
                            time:$("#time").val(),
                            start_date:$("#start_date").val(),
                            start_time:$("#start_time").val(),
                            end_date:$("#end_date").val(),
                            end_time:$("#end_time").val(),
                        },function(data){
                            $("#debug").html("");
                            $("#debug").html(data);
                        })
                    })
                });
                </script>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Core js -->
    
</body>
</html>