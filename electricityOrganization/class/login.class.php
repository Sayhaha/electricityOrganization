<?php

    header("content-type:text/html; charset=utf8");
    require_once("DbConnect.class.php");
    class User
    {
        private $conn;

        //1. 构造函数：创建数据库连接
        public function __construct(){
            $db =new DbConnect();
            $db->db_connect();
            $this->conn = $db->conn;
        }

        //2.验证登陆
        public function Login($name,$password){
            if(!empty($name)){
        $result = mysqli_query($this->conn,"SELECT * FROM admin WHERE userName = '$name'");
        if (mysqli_num_rows($result) < 1) echo "<script language=javascript>alert('该用户不存在~');history.back();</script>";
        else {
            if(!empty($password)){
                    
            $result_arr = mysqli_fetch_assoc($result);
            if ($result_arr['userPsw'] != $password) echo "<script language=javascript>alert('密码错误！');history.back();</script>";
            else {
                session_start();
                $_SESSION['userId'] = $result_arr['userId'];
                echo "<script language=javascript>alert('登陆成功！');location.href='admin_show.php';</script>";
            }
    }
        else echo "<script language=javascript>alert('请输入密码~');history.back();</script>";
    }
        mysqli_close($this->conn);
}
    else echo "<script language=javascript>alert('请输入用户名~');history.back();</script>";
}

}
?>