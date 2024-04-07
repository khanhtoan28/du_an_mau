<?php
function add_sanpham($tensp, $giasp, $hinh, $mota, $iddm){
    $sql="INSERT INTO sanpham(name, price, img, mota, iddm) values('$tensp', '$giasp', '$hinh', '$mota', '$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id){
    $sql="DELETE from sanpham where id=".$id;
    pdo_execute($sql);
}
function load_all_sanpham_top10(){
    $sql="SELECT * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_all_sanpham_home(){
    $sql="SELECT * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_all_sanpham($kyw="", $iddm=0){
    $sql="SELECT * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm = '".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($iddm){
    if($iddm>0){
        $sql= "SELECT * from danhmuc where id=".$iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
    }else{
        return "";
    }

}

function load_one_sanpham($id){
    $sql= "SELECT * from sanpham where id=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id, $iddm){
    $sql= "SELECT * from sanpham where iddm=".$iddm." AND id <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function  update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh){
    if($hinh!="")
        $sql="UPDATE sanpham set iddm='".$iddm."', name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."', where id=".$id;
    else
        $sql="UPDATE sanpham set iddm='".$iddm."', name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
    pdo_execute($sql);
}
?>