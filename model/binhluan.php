<?php 
    function load_binh_luan($idsp){
        $sql = "SELECT binhluan.noidung, binhluan.ngaybinhluan, taikhoan.user FROM binhluan 
                LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id 
                LEFT JOIN sanpham ON binhluan.idpro = sanpham.id 
                WHERE sanpham.id = $idsp;
            ";
        $result = pdo_query($sql);
        return $result;
    }

    function insert_binhluan($idpro, $noidung){
        $date = date('Y-m-d');
        $sql = "INSERT INTO binhluan( noidung, iduser, idpro, ngaybinhluan) 
                VALUES ('$noidung','2','$idpro','$date')";
        pdo_execute($sql);
    }
?>