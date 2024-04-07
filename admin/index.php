<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "header.php";
//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        /* ------------ DANH MỤC------------- */
        case 'adddm':
            //kiểm tra người dùng có click vào nút add khong
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tenloai = $_POST['tenloai'];
                add_danhmuc($tenloai);
                $thongbao="Thêm thành công";
            }
            include "danhmuc/add.php";
            break;


        case 'listdm':
            $listdanhmuc = load_all_danhmuc();
            include "danhmuc/list.php";
            break;
        

        case 'xoadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = load_all_danhmuc();
            include "danhmuc/list.php";
            break;


        case 'suadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $dm = load_one_danhmuc($_GET['id']);
            }

            include "danhmuc/update.php";
            break;


        case 'updatedm':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($tenloai, $id);
                $thongbao="Cập nhập thành công";
            }
            $listdanhmuc =  load_all_danhmuc();
            include "danhmuc/list.php";
            break;


            /* -------------- SẢN PHẨM ----------------*/

            case 'addsp':
                //kiểm tra người dùng có click vào nút add khong
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
                    if(move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){
                    }else{
                    }
                    add_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thongbao="Thêm thành công";
                }
                $listdanhmuc = load_all_danhmuc();
                include "sanpham/add.php";
                break;
    
    
            case 'listsp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw=$_POST['kyw'];
                    $iddm=$_POST['iddm'];        
                }else{
                    $kyw='';
                    $iddm=0;
                }
                $listdanhmuc = load_all_danhmuc();
                $listsanpham = load_all_sanpham($kyw, $iddm);
                include "sanpham/list.php";
                break;
            
    
            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
                $listsanpham = load_all_sanpham();
                include "sanpham/list.php";
                break;
    
    
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham = load_one_sanpham($_GET['id']);
                }
                $listdanhmuc = load_all_danhmuc();
                include "sanpham/update.php";
                break;
    
    
            case 'updatesp':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir="../upload/";
                    $target_file=$target_dir . basename($_FILES["hinh"]["name"]);
                    if(move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){
                    }else{
                    }
                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                    $thongbao="Cập nhập thành công";
                }
                $listdanhmuc = load_all_danhmuc();
                $listsanpham =  load_all_sanpham();
                include "sanpham/list.php";
                break;

            case 'dskh':
                $listtaikhoan = load_all_taikhoan();
                include "taikhoan/list.php";
                break;
            case 'dsbl':
                $listbinhluan = load_all_binhluan(0);
                include "binhluan/list.php";
                break;
        default:
            include "home.php";
            break;
    }
}else{
    include "home.php";
}

include "footer.php";
?>