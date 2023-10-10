<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "header.php";
    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case "listdm":
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case "listsp":
                if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                    $keyw = $_POST['keyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $keyw = '';
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw, $iddm);
                include "sanpham/list.php";
                break;
            case "addsp":
                if(isset($_POST['themmoi']) && $_POST['themmoi']){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];

                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = '../upload/';
                    $target_file = $target_dir.basename($hinh);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
                        // echo "thành công";
                    }else{
                        // echo " không thành công";
                    }

                    insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm);
                    $thanhcong = "add sản phẩm thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;
            case "bieudo":
                include "bieudo.php";
                break;
            case "suasp":
                if(isset($_GET['idsp']) && ($_GET['idsp'] > 0)){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case "updatesp":
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $iddm = $_POST['iddm'];
                    $id = $_POST['id'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];

                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
                        echo "thanh công";
                    }else{
                        echo "lỗi";
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham('',0);
                include "sanpham/list.php";
                break;
            case "hard_delete":
                if(isset($_GET['idsp'])){
                    hard_delete($_GET['idsp']);
                }
                $listsanpham = loadall_sanpham('', 0);
                include "sanpham/list.php";
                break;
            case "soft_delete":
                if(isset($_GET['idsp'])){
                    soft_delete($_GET['idsp']);;
                }
                $listsanpham = loadall_sanpham();
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/list.php";
                break;
        }
    } else {
        include "home.php";
    }
    include "footer.php";
?>