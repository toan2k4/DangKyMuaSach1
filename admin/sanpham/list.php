<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="index.php?act=listsp" method="post">
                    <input type="text" name="keyw">
                    <select name="iddm" id="">
                        <option value="0" selected>Tất cả</option>
                        <?php 
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                        ?>
                        <input type="submit" value="GO" name="clickOK">
                    </select>
                </form>
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>LƯỢT XEM</th>
                        <th></th>
                        
                    </tr>
                    <?php 
                        foreach($listsanpham as $sanpham){
                            extract($sanpham);
                            $hard_delete = "index.php?act=hard_delete&idsp=".$id;
                            $soft_delete = "index.php?act=soft_delete&idsp=".$id;
                            $suasp = "index.php?act=suasp&idsp=".$id;
                            $hinhpath = "../upload/".$img;
                            if(is_file($hinhpath)){
                                $hinhpath = '<img src="'.$hinhpath.'" alt="" width="100px" height="100px">';
                            }else{
                                $hinhpath = "not file img!";
                            }
                            echo '<tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td>'.$id.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$price.'</td>
                                    <td>'.$hinhpath.'</td>
                                    <td>'.$luotxem.'</td>
                                    <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a>
                                    <a href="'.$hard_delete.'"><input type="button" value="Xóa cứng" onclick="return confirm(\'bạn có chắc chắn muốn xóa\')"></a> 
                                    <a href="'.$soft_delete.'"><input type="button" value="Xóa mềm" onclick="return confirm(\'bạn có chắc chắn muốn xóa\')"></a> 
                                </tr>';
                        }
                    ?>
                    
                  
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>




</div>