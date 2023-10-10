<div class="row2">
  <div class="row2 font_title">
    <h1>THÊM MỚI DANH MUC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10">
        <label>Tên danh mục </label> <br>
        <input type="text" name="tendm" placeholder="nhập tên danh mục">
      </div>
      
      <div class="row mb10 ">
        <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
      <?php 
        if(isset($thanhcong) && ($thanhcong != '')){
          echo $thanhcong;
        }
      ?>
    </form>
  </div>
</div>