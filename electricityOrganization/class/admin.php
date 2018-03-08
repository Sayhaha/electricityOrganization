<?php

    header("content-type:text/html; charset=utf8");
    require_once("DbConnect.class.php");

    class Admin{
        private $conn;

        //1. 构造函数：创建数据库连接
        public function __construct(){
            $db =new DbConnect();
            $db->db_connect();
            $this->conn = $db->conn;
        }

       //2. add()函数用于数据添加
       public function add($dorBui,$roomNo,$eleRem,$date){
            if(empty($eleRem)||empty($dorBui)||empty($roomNo)||empty($date)||$dorBui==-1)
                echo "<script>alert('请确保信息输入完整~');history.back();</script>";
            else {
            if(!is_numeric($eleRem)) echo "<script>alert('电费不是数字！');history.back();</script>";
            else{
                mysqli_query($this->conn,"INSERT INTO elec_data(eleRem,dorBui,roomNo,Dat) VALUES ('$eleRem','$dorBui','$roomNo','$date')");
                $result = mysqli_query($this->conn,"SELECT * FROM elec_data WHERE dorBui='$dorBui' AND roomNo='$roomNo'");
                $result_arr = mysqli_fetch_assoc($result);
                 $dorId = $result_arr['dorId'];
                 echo "<script language=javascript>alert('数据添加成功！');location.href='admin_manager.php?dorId=$dorId';</script>";
            }
            mysqli_close($this->conn);
         }
        }
        
      //3. show()函数用于数据显示
       public function show(){
           $result=mysqli_query($this->conn,"SELECT * FROM elec_data");
               for($i=0; $i<mysqli_num_rows($result); $i++){
                   $result_arr = mysqli_fetch_assoc($result);
                   $dorBui = $result_arr['dorBui'];
                   $roomNo = $result_arr['roomNo'];
                   $eleRem = $result_arr['eleRem'];
                   $date = $result_arr['Dat'];
                   $dorId = $result_arr['dorId'];
                   ?>
                   <tr>
                    
                        <td align="center"><?php echo "$dorBui"; ?></td> 
                        <td align="center"><?php echo "$roomNo"; ?></td>
                        <td align="center"><?php echo "$eleRem"; ?></td>
                        <td align="center"><?php echo "$date"; ?></td>
          <td>
          <a href="modify_information.php?dorId=<?php echo "$dorId"; ?>" onclick="
          <script language=javascript> function(){var top = document.documentElement.scrollTop; COOKIE['Top']= Top} </script>">
          修改
          </a>
          <a href="dele_data.php?dorId=<?php echo "$dorId"; ?>" onclick="return confirm('是否删除？');">
          
          删除</a></td>           
                   </tr>
        <?php
               }
           mysqli_close($this->conn);
       }
        

        //4. modify()函数修改收入记录
       public function modify($dorId,$dorBui,$roomNo,$eleRem,$date){
          if(empty($roomNo)){
             echo "<script language=javascript>alert('宿舍号为空！');location.href='modify_information.php?dorId=$dorId';</script>";
          }
          else if(empty($dorBui)){
             echo "<script language=javascript>alert('宿舍楼为空！');location.href='modify_information.php?dorId=$dorId';</script>";
          }
          else if(empty($date)){
             echo "<script language=javascript>alert('时间为空！');location.href='modify_information.php?dorId=$dorId';</script>";
          }
          else if(!is_numeric($eleRem)) echo "<script>alert('电量不是数字！');location.href='modify_information.php?dorId=$dorId';</script>";
          else{
          mysqli_query($this->conn,"UPDATE elec_data SET roomNo='$roomNo', eleRem='$eleRem', Dat='$date' WHERE dorId='$dorId'");
          echo "<script language=javascript>alert('修改成功！');location.href='admin_show.php';window.scrollto( COOKIE['Top'])</script>";
          mysqli_close($this->conn);
        }
        }


        //5. 数据查询函数
        public function date_query($dorBui, $roomNo){
            if(!empty($dorBui)){
        $result = mysqli_query($this->conn,"SELECT * FROM elec_data WHERE dorBui='$dorBui'");
        if (mysqli_num_rows($result) < 1) echo "<script language=javascript>alert('宿舍楼名错误');history.back();</script>";
        else {
            if(!empty($roomNo)){
            for($i=0; $i<mysqli_num_rows($result); $i++){
            $result_arr = mysqli_fetch_assoc($result);
            if ($result_arr['roomNo'] == $roomNo) {
                 $sum = mysqli_query($this->conn,"SELECT * FROM elec_data WHERE dorBui='$dorBui' AND roomNo='$roomNo'");
                $sum_arr = mysqli_fetch_assoc($sum);
                $dorId = $result_arr['dorId'];
                ?>
                <script language=javascript >location.href="query.php?dorId=<?php echo "$dorId"; ?>";</script>
                <?php
            }
        }
                echo "<script language=javascript>alert('宿舍号错误！');history.back();</script>";       
    }
        else echo "<script language=javascript>alert('请先输入信息');history.back();</script>";
    }
        mysqli_close($this->conn);
}
    else echo "<script language=javascript>alert('请先输入信息');history.back();</script>";
        }

        //6. 前台数据展示函数
        public function show_data($dorId){
           $result=mysqli_query($this->conn,"SELECT * FROM elec_data WHERE dorId='$dorId'");
                   $result_arr = mysqli_fetch_assoc($result);
                   $dorBui = $result_arr['dorBui'];
                   $roomNo = $result_arr['roomNo'];
                   $eleRem = $result_arr['eleRem'];
                   $date = $result_arr['Dat'];
                   ?>
                   <tr>
                    
                        <td align="center"><?php echo "$dorBui"; ?></td> 
                        <td align="center"><?php echo "$roomNo"; ?></td>
                        <td align="center"><?php echo "$eleRem"; ?></td>
                        <td align="center"><?php echo "$date"; ?></td>
                   </tr>
        <?php
           mysqli_close($this->conn);
       }


       //7. 数据删除函数
       public function DeleInc($dorId){
          mysqli_query($this->conn,"DELETE FROM elec_data WHERE dorId='$dorId'");
          echo "<script language=javascript>alert('删除成功！');location.href='admin_show.php';</script>";
          mysqli_close($this->conn);
        }

        //8. 赋值函数
        public function assignment($dorId){
          $result=mysqli_query($this->conn,"SELECT * from elec_data where dorId='$dorId'");
          $result_arr = mysqli_fetch_array($result);
          return $result_arr;
        }

    }
?>