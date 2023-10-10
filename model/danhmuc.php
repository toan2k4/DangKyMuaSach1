<?php 
    function loadall_danhmuc(){
        $sql = "SELECT * FROM danhmuc ORDER BY id desc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }

    function load_ten_dm($iddm){
        $sql = "SELECT * FROM danhmuc WHERE id =".$iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }
?>