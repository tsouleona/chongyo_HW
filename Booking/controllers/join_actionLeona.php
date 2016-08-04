<?php 
class join_actionLeona extends Controller{
        
//-----------------------------------回首頁-------------------------------------------------------------
        function together(){
            $row = $this->join_select();
            $this->view("join_action",Array($row));
            
        }
        function join_view(){
            $ID = $_GET['ID'];
            $row = $this->join_select_view($ID);
            $row2 = $this->join_select_front($ID);
            $this->view("join_view",Array($row,$row2));
            
        }
        
        function join_select(){
            $join = $this->model("join_action");
            $row = $join->select_action();
            return $row;
        }
        function join_select_view($ID){
            $join = $this->model("join_action");
            $row = $join->select_action_view($ID);
            return $row;
        }
        function join_select_front($ID)
        {
            $join = $this->model("join_action");
            $row = $join->select_view_front($ID);
            return $row;
        }
        
        function check_member(){
            if($_POST['mem_number']=="" || $_POST['action_ID']=="" || $_POST['front_get']=="")
            {
                $this->error("尚未輸入完整");
                exit;
            }
            if($_POST['front_get'] > $_POST['count'])
            {
                $this->error("可攜帶人數超過");
                exit;
            }
            $join = $this->model("join_action");
            
            $op = $join->select_member($_POST['mem_number']);//檢查有沒有個人
            
            if($op != NULL)
            {
                $op2 = $join->select_front($_POST['mem_number'],$_POST['action_ID']);//檢查有沒有在活動名單內
                if($op2=='ok')
                {
                    
                    $op3 = $join->update_action($_POST['front_get'],$_POST['action_ID']);//看人數
                    if($op3 =='more')
                    {
                        $this->error("超過人數限制");
                        exit;
                    }
                    
                    if($op3 == 'ok')
                    {
                        $op4 = $join->insert_front($_POST,$op);//加入活動
                        if($op4 == 'ok')
                        {
                            $this->success($_POST['mem_number']."申請成功");
                            exit;
                        }
                    }
                        
                    
                }
                
                else{
                    $this->error("已加入該活動名單");
                    exit;
                }
                
            }
            else
            {
                $this->error("查無此人");
                exit;
            }
                
            
        }
        public function error($error){
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            
            $this->point($a);
        }
        public function success($success){
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            
            $this->point($a);
        }
        public function point($a)
        {
            $this ->view("point",Array($a));
        }
}

?>