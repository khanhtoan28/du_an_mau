<?php
function add_danhmuc($tenloai){
    $sql="INSERT INTO danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id){
    $sql="DELETE from danhmuc where id=".$id;
    pdo_execute($sql);
}

function load_all_danhmuc(){
    $sql="SELECT * from danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function load_one_danhmuc($id){
    $sql= "SELECT * from danhmuc where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($tenloai, $id){
    $sql="UPDATE danhmuc set name='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}
?>