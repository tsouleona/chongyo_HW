<?php 
    class action extends connect{

//**搜尋編號並編號**//
        function select_ac($date){
            $array = array('%'.$date.'%');
            $cmd = "SELECT `action_ID` FROM `action` WHERE `action_ID` LIKE ?  ORDER BY `action_ID` DESC LIMIT 0,1;";
            $row = $this->connect_getdata($cmd,$array);
            
            $one="001";
            //編號若不為第一筆則從當天的最後一筆+1
            if($row[0]['action_ID'] == NULL)
            {
                $ans = $date.$one;
                
            }
            //片編號若不為第一筆則從當天的最後一筆+1
            else{
                $ans = substr($row[0]['action_ID'],8,3);
                $ans = (int)($ans) + 1;
                $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                $ans = $date.$ans;
            } 
            return $ans;
        }
//**新增活動**//
        function insert_ac($action,$ans){
            $date = $action['date']." ".$action['time'];
            $start = $action['start_date']." ".$action['start_time'];
            $end = $action['end_date']." ".$action['end_time'];
            
            $array = array($ans,$action['action_name'],$date,$action['action_data'],$action['action_count'],$action['action_count'],$action['action_get'],$start,$end);
            $cmd = "INSERT INTO `action` (`action_ID`,`action_name`,`action_datetime`,`action_data`,`action_total`,`action_count`,`action_get`,`action_start`,`action_end`)
            VALUES(?,?,?,?,?,?,?,?,?);";
            
            $this->connect_mysql($cmd,$array);
            $this->dbgo = NULL; 
            return "YES";
        }
//**搜尋全部活動**//
        function select_action(){
            $array = array();
            $cmd = "SELECT * FROM `action`";
            $row = $this->connect_getdata($cmd,$array);
            $this->dbgo = NULL; 
            return $row;
        }
//**搜尋單一活動**//
        function select_action_view($ID){
            $array = array($ID);
            $cmd = "SELECT * FROM `action` WHERE `action_ID`=?";
            $row = $this->connect_getdata($cmd,$array);
            $this->dbgo = NULL; 
            return $row;
        }
//**搜尋攜伴人數**//
        function select_action_get($ID){
            $array = array($ID);
            $cmd = "SELECT `action_get` FROM `action` WHERE `action_ID`=?";
            $row = $this->connect_getdata($cmd,$array);
            $this->dbgo = NULL; 
            return $row[0]['action_get'];
        }

        //**搜尋活動的參與人數**//
        function select_action_ID($ID)
        {
            $array = array($ID);
            $cmd = "SELECT `action_count` FROM `action` WHERE `action_ID`=?;";
            $this->dbgo = NULL; 
            return $row = $this->connect_getdata($cmd,$array);
        }
//**更新人數**//
        function update_action($get,$ID){
            $count = 1 ;
            $count = $count + (int)$get;
            $row = $this-> select_action_ID($ID);//找剩餘人數
            $count = (int)($row[0]['action_count']) - $count;
            if($count < 0)
            {
                return 'more';
            }
            else{
                $array = array($count,$ID);
                $cmd = "UPDATE `action` SET `action_count`=? WHERE `action_ID`=?;";
                $this->connect_mysql($cmd,$array);
                return 'ok';
            }   
        }
        
    }

?>