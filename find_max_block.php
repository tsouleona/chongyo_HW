<?php
    header("Content-Type:text/html; charset=utf-8");
    
    $origin = array(
        array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
        array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
        array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
        array(1, 1, 1, 0, 1, 0, 0, 0, 0, 0),
        array(1, 0, 0, 1, 1, 0, 1, 1, 1, 0),
        array(1, 0, 0, 1, 1, 0, 1, 1, 1, 1),
        array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0)
    );
    echo "原始--------------------------<br>";
    
    for($i=0;$i<count($origin);$i++)
    {
        for($j=0;$j<count($origin[$i]);$j++)
        {
            
            echo $origin[$i][$j]." ";
            if($j==9)
            {
                echo "<br>";
            }
        }
    }
    //把位置存成一維陣列
    $data_all = array();
    for($i=0;$i<count($origin);$i++)
    {
        for($j=0;$j<count($origin[$i]);$j++)
        {
            if($origin[$i][$j] == 1)
            {
                $data_all[]= $i.$j;
            }
        }
    }
    
    $j = 0;
    $array[0][] =  $data_all[0];
    
    for($i=1;$i<count($data_all);$i++){
        $x = $data_all[$i];
        foreach($array as $key => $number){
            foreach($number as $value){
                $num = $x-$value;
                if($num==10 || $num==1){
                    if($data_all[$i]!="a"){
                        $array[$key][] =  $x;
                        $data_all[$i] = "a";
                    }
                }
            }
        }
        if($data_all[$i]!="a"){
             $j++; //不同組，開新陣列
             $array[$j][] =  $data_all[$i];
             
        }
    }
    //檢查陣列跟陣列之間有沒有相鄰
    for($i=0;$i<=$j;$i++){
        for($h=0;$h<count($array[$i]);$h++)
        {
            for($p=$i + 1;$p<=$j;$p++)
            {
                for($q=0;$q<count($array[$p]);$q++)
                {
                    $num =  $array[$i][$h] - $array[$p][$q]; //array - copy
                    if($num == 1 || $num == 10 || $num == -1 || $num == -10)
                    {
                        if($array[$p][$q]!="z" && $array[$p][$q]%10!=0 && $array[$p][$q]%10!=9){
                            $array[$i][] = $array[$p][$q];
                            $array[$p][$q] = "z";
                            
                        }
                    }
                }
                
            }
            
        }
        if(in_array("z",$array[$i]))
            {
                $array[$i]=array();
            }
    }
    echo "<br>比對後的陣列------------------------------------------<br>";
     //跑結果
    foreach($array as $key)
    {
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }
    echo "<br>比對長度後------------------------------------------<br>";
    //比對長度，排大小
    for($i=0;$i<count($array);$i++)
    {
        $count[$i] = count($array[$i]);

    }
    for($i=0;$i<count($count)- 1;$i++)
    {
        for($j=$i + 1;$j<count($count);$j++)
        {
            if($count[$j]>$count[$i])
            {
                $tmp = $count[$j];
                $count[$j] = $count[$i];
                $count[$i] = $tmp;
                
                $tmp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $tmp;
                
            }
        }
    }
    //跑結果
    foreach($array as $key)
    {
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }
    
    echo "<br>結果------------------------------------------<br>";
    //先全部給0
    for($i=0;$i<10;$i++)
    {
        for($j=0;$j<10;$j++)
        {
            $origin[$i][$j]=0;
        }
    }
    //檢查有幾個陣列一樣大
    $k=1;
    for($i=1;$i<count($count);$i++)
    {
        if($count[0]==$count[$i]){
            $k++;
        }
    }
    //把紀錄的位置給1
    for($t=0;$t<$k;$t++)
    {
        for($i=0;$i<count($array[$t]);$i++)
        {
            
            $x = substr($array[$t][$i],0,1);
            $y = substr($array[$t][$i],1,1);
            $origin[$x][$y] = 1;
        }
    }
    
    //跑結果
    foreach($origin as $key)
    {
        foreach($key as $value){
          echo $value." ";
        }
        echo "<br>";
    }

?>