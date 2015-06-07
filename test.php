<?php 
    if(isset($_POST['submit']))
    {
        echo "string";
        login();
        if(login()=="true")
        {
            header('location:index2.html');
        }
    }

    function login(){
        $username=$_POST['username'];
        $password=$_POST['password'];

        mysql_connect("localhost","root","");
        mysql_select_db("upt");
        $result=mysql_query("select * from admin where username ='$username' and password = '$password'");
        $list = null;
        while($data = mysql_fetch_object($result)){
            $list[] = $data;
        }
        if($list==null)
        {
            return "false";       
        }
        else
        {
            return "true";
        }
    }
?>