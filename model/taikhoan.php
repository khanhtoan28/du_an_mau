<?php
    function load_all_taikhoan(){
        $sql="SELECT * from taikhoan order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
    function add_taikhoan($email, $user, $pass){
        $sql="INSERT INTO `taikhoan`(`user`, `pass`, `email`) VALUES('$user','$pass','$email')";
        pdo_execute($sql);
    }
    function checkuser($user, $pass){
        $sql= "SELECT * from taikhoan where user='".$user."' AND pass='".$pass."'";
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function checkemail($email){
        $sql= "SELECT * from taikhoan where email='".$email."'";
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function  update_taikhoan($id, $user, $pass, $email, $address, $tel){
        $sql="UPDATE taikhoan set user='".$user."', pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
        pdo_execute($sql);
    }
?>