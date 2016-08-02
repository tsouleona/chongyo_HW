<?php 
class add_actionLeona extends Controller{
        
//-----------------------------------回首頁-------------------------------------------------------------
        function add(){
           
            $this->view("add_action");
            
        }
        function insert_action(){
            if($_POST['action_name']=="" || $_POST['action_count']=="" || $_POST['action_get']=="" ||
                $_POST['start_time_y']=="" || $_POST['start_time_m']=="" || $_POST['start_time_d']=="" || 
                $_POST['start_time_h']=="" || $_POST['start_time_n']=="" || $_POST['start_time_s']=="" ||
                $_POST['end_time_y']=="" || $_POST['end_time_m']=="" || $_POST['end_time_s']=="" || 
                $_POST['end_time_h']=="" || $_POST['end_time_n']=="" || $_POST['end_time_s']=="")
            {
                $this->error("尚未輸入完整");
                exit;
            }
            if($this ->compare_number($_POST['action_count'])=='NO' ||$_POST['start_time_y']=="NO" || 
                $this ->compare_number($_POST['start_time_m'])=="NO" || $this ->compare_number($_POST['start_time_d'])=="NO" || 
                $this ->compare_number($_POST['start_time_h'])=="NO" || $this ->compare_number($_POST['start_time_n'])=="NO" || 
                $this ->compare_number($_POST['start_time_s'])=="NO" ||$this ->compare_number($_POST['end_time_y'])=="NO" || 
                $this ->compare_number($_POST['end_time_m'])=="NO" || $this ->compare_number($_POST['end_time_d'])=="NO" || 
                $this ->compare_number($_POST['end_time_h'])=="NO" || $this ->compare_number($_POST['end_time_n'])=="NO" || 
                $this ->compare_number($_POST['end_time_s'])=="NO")
            {
                $this->error("時間與人數要輸入整數");
                exit;
            }
            
            $action = $this->model("action");
            
            $date = date("Ymd");
            $ans = $action->select_ac($date);
            
            $op2 = $action->insert_ac($_POST,$date,$ans);
            
            if($op2 == "YES")
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