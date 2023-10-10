<?php
    include "model/pdo.php";
    include "model/sanpham.php";
    include 'model/danhmuc.php';
    include "global.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";
    include "view/header.php";

    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            
            case "sanpham":
                if(isset($_POST['keyword']) && $_POST['keyword'] != 0){
                    $kyw = $_POST['keyword'];
                }else{
                    $kyw = '';
                }
                if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                    $iddm = $_GET['iddm'];
                }else{
                    $iddm = 0;
                }

                $dssp = loadall_sanpham($kyw,$iddm);
                include "view/sanpham.php";
                break;
            case "sanphamct":
                if(isset($_POST['guibinhluan'])){
                    insert_binhluan($_POST['idpro'], $_POST['noidung']);
                }
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $sp = loadone_sanpham($_GET['idsp']);
                    $sp_cung_loai = loadsp_cung_loai($_GET['idsp'], $sp['iddm']);
                    $binh_luan = load_binh_luan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }
                break;
            case "dangky":
                
                if(isset($_POST['dangky'])){
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "đăng ký thành công";
                }   
                include "view/login/dangky.php";
                break;
            case "dangnhap":
                if(isset($_POST['dangnhap'])){
                    $loginMess = dangnhap($_POST['user'], $_POST['pass']);
                    include "view/home.php";
                }
                break;
            case "dangxuat":
                dangxuat();
                include "view/home.php";
                break;
            case "quenmk":
                if(isset($_POST['guiemail'])){
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);
                }
                include "view/login/quenmmk.php";
                break;
        }   
    }else{
        include "view/home.php";
    }

   
    include "view/footer.php";
?>

        
