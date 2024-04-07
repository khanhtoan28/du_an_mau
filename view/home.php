<div class="row mb">
      <div class="boxtrai mr">
        <div class="row">
          <div class="banner">
            <!-- Slideshow container -->
            <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
            <img src="./view/images/logo.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
            <img src="./view/images/anhlogo5.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
            <img src="./view/images/anhlogo3.png" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <?php
          $i=0;
          foreach($spnew as $sp){
            extract($sp);
            $linksp = "index.php?act=sanphamct?idsp=" .$id;
            $hinh=$img_path.$img;
            if(($i==2)||($i==5)||($i==8)){
              $mr="";
            }else{
              $mr="mr";
            }
            echo '<div class="boxsanpham '.$mr.'">
                    <div class="row img"><a href="'.$linksp.'"><img src="'.$hinh.'" alt="">
                    </a></div>
                    <p>$'.$price.'</p>
                    <a href="'.$linksp.'">'.$name.'</a>
                  </div>';
                  $i+=1;
                }
          ?>

      </div>
    </div>
    <div class="boxphai">
        <?php 
        include "boxright.php";
        ?>
        </div>
      </div>