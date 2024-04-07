<?php
function add_binhluan($noidung, $iduser, $idpro, $ngaybinhluan){
    $sql="INSERT INTO binhluan(noidung, iduser, idpro, ngaybinhluan) values('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
    pdo_execute($sql);
}
function load_all_binhluan($idpro){
    $sql="SELECT * from binhluan where 1";
    if($idpro>0) $sql.=" AND idpro='".$idpro."'";
    $sql.=" order by id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
?>