<?php
use Noneslad\Tools\WebTools;

use Noneslad\Entity\article;

  //$article = new article();
 
 ?>
                
 <main id="main" class="tg-main-section tg-haslayout tg-bgwhite">
      <div class="container">
        <div class="row">
          <div id="tg-towcolumns" class="tg-haslayout">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="tg-content" class="tg-content tg-blog-list tg-overflowhidden">
	
	<?php
  //die($_SESSION["langue"]);
  
   if($_SESSION["langue"]=="1"){ 
      $langue="getfr";
   } else{ 
      $langue="geten";
    }
  foreach (\Noneslad\Controllers\articleController::$langue() as $article) {
?>    
 <article class="tg-post" style="height: 250px;">
    <figure class="tg-post-img tg-haslayout">
         <p style="color: #fff;">  <?php if($_SESSION["langue"]==1){
        /* Condition si Français */
      echo substr($article["date"],8,2)."/".substr($article["date"],5,2)."/".substr($article["date"],0,4); 
  }else{
      echo $article["date"];
} ?>

   </p>           
       </figure>
                  <div class="tg-post-data tg-haslayout">
                    
                    
                      <h3 style="color: #000;"><?php echo $article['titre']; ?></h3>
                     
                     
                      <p style="margin-left:20px; width: 100%;"><?php echo $article['text']; ?></p>
                   
                  </div>
                </article>          
       
    <?php }?>


           
             </div>
            </div>
          </div>
        </div>
      </div>
    </main>
        
      