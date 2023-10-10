<main class="catalog  mb ">

  <?php 
    extract($sp);
  ?>
  <div class="boxleft">
    <div class="  mb">
      <div class="box_title"><?= $name?></div>
      <div class="box_content">
        <?php 
        $linkimg = $img_path.$img;
          echo '<img src="'.$linkimg.'" width="300">';
          echo '<p>'.$mota.'</p>'
        ?>
      </div>
    </div>

    <div class="mb">
      <div class="box_title">BÌNH LUẬN</div>
      <div class="box_content2  product_portfolio binhluan ">
        <table>
          <?php foreach($binh_luan as $value){
            extract($value);
            echo '<tr>
                    <td>'.$noidung.'</td>
                    <td>'.$user.'</td>
                    <td>'.date("d-m-Y", strtotime($ngaybinhluan)).'</td>
                  </tr>';
          }?>
          <!-- <tr>
            <td>Sản phẩm quá đẹp</td>
            <td>Nguyễn Thành A</td>
            <td>20/10/2022</td>
          </tr> -->
        </table>
      </div>
      <div class="box_search">
        <form action="index.php?act=sanphamct&idsp=<?= $id?>" method="POST">
          <input type="hidden" name="idpro" value="<?= $id?>">
          <input type="text" name="noidung"  >
          <input type="submit" name="guibinhluan" value="Gửi bình luận">
        </form>
      </div>

    </div>

    <div class=" mb">
      <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
      <div class="box_content">
        <?php foreach($sp_cung_loai as $value):?>
          <li>
            <a href="index.php?act=sanphamct&idsp=<?= $value['id']?>">
              <?= $value['name']?>
            </a>
          </li>
        <?php endforeach;?>
        <!-- <li><a href="">Sản phẩm 1</a></li>
        <li><a href="">Sản phẩm 1</a></li>
        <li><a href="">Sản phẩm 1</a></li>
        <li><a href="">Sản phẩm 1</a></li> -->
      </div>
    </div>
  </div>
<?php
    include "view/boxright.php";
?>

</main>