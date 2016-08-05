<?php $row2 = $data[0];?>

<table class="table table-hover">
                
    <h3 style="color:#38c0df"><strong>可參加活動的名單</strong></h3>
    <thead>
        <td align="center">
           <h4><strong><font color="#38c0df"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>&nbsp;編號</font></strong></h4>
        </td>
        
    </thead>
        <?php $x=count($row2);
            for($i=0;$i<$x;$i++)
            {
        ?>
        <tr>
            <td align="center">
               <h4><?php echo $row2[$i]['mem_number'];?></h4>
            </td>
           
        </tr>
        <?php }?>
                
</table>