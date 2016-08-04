<?php 
class add_actionLeona extends Controller{
        
//-----------------------------------回首頁-------------------------------------------------------------
        function add(){
           
            $this->view("add_action");
            
        }
        function insert_action(){
            if($_POST['action_name']=="" || $_POST['action_count']=="" || $_POST['action_get']=="" ||
                $_POST['time']=="" || $_POST['date']=="" || $_POST['start_time']=="" || 
                $_POST['start_date']=="" || $_POST['end_time']=="" || $_POST['end_date']=="" ||
                $_POST['action_data']=="")
            {
                $this->error("尚未輸入完整");
                exit;
            }
            if($this->compare_number($_POST['action_get'])=="NO")
            {
                $this->error("攜伴的欄位請填數字");
                exit;
            }
            $action = $this->model("action");
            $join = $this->model("join_action");
            
            $date = date("Ymd");
            $ans = $action->select_ac($date);
            
            $op = $action->insert_ac($_POST,$ans);
            
            if($op == "YES")
            {
                $this->success("成功建立");
                exit;
            }
        }
        
        public function compare_number($tmp){
            if(!preg_match("/^([0-9]+)$/",$tmp))
            {
                return "NO";
            }
            
        }
        public function error($error){
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            $b='';
            $this->point($a,$b);
        }
        public function success($success){
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            $b='';
            $this->point($a,$b);
        }
        public function point($a,$b)
        {
            $this ->view("point",Array($a,$b));
        }
        
}
?>