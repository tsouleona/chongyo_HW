<?php $row = $data[0];
      $row3 = $data[1];

?>
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
<!--如果剩餘人數為零或還未輸入可參加員工，不能按參加-->
            <td align="center">
                <?php if($row[0]['action_count']==0 ||$row3==NULL){?>
                <button disabled="disabled" data-toggle="modal" data-target="#mymodal<?php echo $row[0]['action_ID']?>"  class="btn btn-primary"><h4>參加</h4></button>
                <?php }?>
                <?php if($row[0]['action_count']!=0 && $row3!=NULL){?>
                <button data-toggle="modal" data-target="#mymodal<?php echo $row[0]['action_ID']?>"  class="btn btn-primary"><h4>參加</h4></button>
                <?php }?>
            </td>
        </tr>
                
</table>