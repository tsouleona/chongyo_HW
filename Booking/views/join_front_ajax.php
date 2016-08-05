
<?php $row2 = $data[0];?>
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