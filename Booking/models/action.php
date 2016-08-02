<?php 
    class action extends connect_two{
        
        function select_ac($date){
            $cmd = "SELECT `action_ID` FROM `action` WHERE `action_ID` LIKE '%$date%' ORDER BY `action_ID`;";
            $row = $this->connect_getdata($cmd);
            $one="001";
            //圖片編號若不為第一筆則從當天的最後一筆+1
            if($row[0]['action_ID'] == NULL)
            {
                $ans = $date.$one;
                
            }
            //圖片編號若不為第一筆則從當天的最後一筆+1
            else{
                $ans = substr($row[0]['action_ID'],8,3);
                $ans = (int)($ans) + 1;
                $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                $ans = $date.$ans;
            }
            return $ans;
        }
        function insert_ac($action,$ans){
            $start = $action['start_time_y']."-".$action['start_time_m']."-".$action['start_time_d']." ".$action['start_time_h'].":".$action['start_time_n'].":".$action['start_time_s'];
            $end = $action['end_time_y']."-".$action['end_time_m']."-".$action['end_time_d']." ".$action['end_time_h'].":".$action['end_time_n'].":".$action['end_time_s'];
            
            $cmd = "INSERT INTO `action` (`action_ID`,`action_name`,`action_count`,`action_get`,`action_start`,`action_end`)
            VALUES('".$ans."','".$action['action_name']."','".$action['action_count']."','".$action['action_get']."',
            '".$start."','".$end."');";
            $this->connect_getdata($cmd);
            
            return "YES";
        }
        
    }

?>