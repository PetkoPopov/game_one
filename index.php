<?php
session_start();
if(empty($_GET)){
    $_SESSION['cond']['seven_ltr']=0;
       $_SESSION['cond']['three_ltr']=0;
}
$seven=$_SESSION['cond']['seven_ltr'];
    $three=$_SESSION['cond']['three_ltr'];

    //$seven=$_SESSION['cond']['seven_ltr'];
   // $three=$_SESSION['cond']['three_ltr'];
    $arr_names=[
        1=>'seven_ltr',
        2=>"fill_out_seven",
        3=>'refill_to_left' ,
        4=>'three_ltr',
        5=>"fill_out_three",
        6=>'refill_to_right'
    ];
    
    if(isset($_GET))
    {
        foreach($_GET as $k=>$v)
        {
            foreach($arr_names as $key=>$val)
            {
              
                if($v==$key)
                {
                 echo $get=$_GET[$k];
                 break;
                }
            }
        }
    }else{
        $get=0;
    }
     //print_r($_GET);
     if($get==1)
     {
         $seven=7;
     }
     elseif($get==2)
     {
         $seven=0;
     }
     elseif($get==3)//от 3 към седем
     {
         $seven_help=7-$seven;
         $seven=($seven+$three);
         if($seven>7)
         {
             $seven=7;
         }
         $three=$three-$seven_help;
         if($three<0)
         {
             $three=0;
         }
     }
     elseif($get==4)
     {
         $three=3;
     }
     elseif($get==5)
     {
         $three=0;
     }
     elseif($get==6)//от седмица към тройка 
     {
//         echo'OK';
//         echo $seven;
//         echo'<br/>';
//         echo $three;die;
         $three_help=$three;
         $three=$three+$seven;
         if($three>3)
         {
             $three=3;
         }
         $seven=$seven-(3-$three_help);
         if($seven<0)
         {
      
             $seven=0;
         }
     }
       
    
    $_SESSION['cond']['seven_ltr']=$seven;
    $_SESSION['cond']['three_ltr']=$three;
    ?>
<center><div><h1> Отлейте 5 литра </h1></div></center>
<body style='background-color: #ff9933'>
<form><center><table border=''>
            <tr>
                <th></th>
                <th>7_лтр_съд</th>
                 <th>refill</th>
                  <th>3_лтр_съд</th>
                  <th></th>
                
            </tr>
        <tr>
            <td></td>
            <td><button name='seven_ltr'value=1 style='width:75px;height:120px; background-color:<?php 
            
            if($seven>5){
                echo  " #3333ff";
            }          
            ?>'>напълни</button></td> 
             <td></td> 
              <td></td> 
              <td></td>
        </tr>
        <tr>
            <td></td>
            <td><button name='seven_ltr' value=1 style='width:75px;height:120px; background-color:<?php 
            if($seven>3){
                echo  " #3333ff";
            }          
            ?> '><?='кликни за да пълниш'?></button></td>
            <td><button name='refill_to_right' value=6 style="background:#33ff00">====></button></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
            <td><button name="fill_out_seven" value=2 style="background:#33ff00"><=излей</button></td>
        <td><button name='seven_ltr' value=1 style='width:75px;height:120px; background-color: <?php 
            if($seven>0){
                echo  " #3333ff";
            }          
            ?>'><?=$seven.'_ltr';?></button></td>
         <td><button name='refill_to_left' value=3 style="background:#33ff00"><====</button></td>
          <td><button name='three_ltr' value=4 style='width:75px;height:120px; background-color: <?php if($three>0){
                echo  " #3333ff";
            }          
            ?>'><?php echo $three.'_ltr';?></button></td>
          <td><button name="fill_out_three" value=5 style="background:#33ff00">излей=></button></td>
        </tr>
       
        </table></center>
    
    <?php
       if($seven==5)
       {
       echo '<center ><button name="go_further" style="background-color: #33ccff">ПОЗДРАВЛЕНИЯ мини нататък </button></center>';//бутон след проверката 
       }
       ?>
</form>
    
    <?php
    
    if(isset($_GET['go_further']))
    {
        header('location: game_2.php');
    }
    
    
    
    
    ?></body>
    
  