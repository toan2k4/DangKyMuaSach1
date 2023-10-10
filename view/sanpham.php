<main class="catalog  mb ">

   <div class="boxleft">
      

      <div class="items">
         <?php
         foreach ($dssp as $sp) {
            extract($sp);
            $hinh = $img_path . $img;
            $link = "index.php?act=sanphamct&idsp=$id";
            echo '<div class="box_items">
               <div class="box_items_img">
                  <img src="' . $hinh . '" alt="">
                  <div class="add" href="">ADD TO CART</div>
               </div>
                <a class="item_name" href="' . $link . '">' . $name . '</a>
                <p class="price">' . $price . '</p>
               </div>';
        } ?>
        
      </div>
   </div>
   <?php
   include_once "view/boxright.php";
   ?>

</main>