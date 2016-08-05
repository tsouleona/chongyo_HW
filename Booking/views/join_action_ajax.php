<meta charset="utf-8">


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
        <!--管理員可以新增可參加員工-->
        <?php if($_SESSION['username']!=NULL){?>
        <td align="center">
            <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>&nbsp;新增員工</font></strong></h4>
        </td>
        <?php }?>

    </thead>
    <?php 
    $row = $data[0];
    $x=count($row);
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
                    <a href="<?php echo $root;?>join_view?ID=<?php echo $row[$j]['action_ID'];?>">https://lab1-srt459vn.c9users.io<?php echo $root;?>join_view?ID=<?php echo $row[$j]['action_ID'];?></a>
                </td>
                <td align="center">
                    <h4><?php echo $row[$j]['action_count'];?></h4>
                </td>
                <!--管理員可以新增可參加員工-->
                <?php if($_SESSION['username']!=NULL){?>
                <td align="center">
                    <a href="<?php echo $root;?>join_mem?ID=<?php echo $row[$j]['action_ID'];?>"><button class="btn btn-primary btn-lg">新增</button></a>
                </td>
                <?php }?>
            </tr>
        <?php }?>
    <?php }?>
</table>