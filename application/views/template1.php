<?php include_once(APPPATH . 'views/_init.php') ?> 

<div class="main">

	<?php include_once(APPPATH . 'views/_header.php')//echo $header ?>
	<!-- end of header div --> 
	<div id="container">
		<div id="slider">
				
				
				<ul class="bxslider">
				<?php
					if(isset($model)){
						
						$slider_model = $model['slider_model'];
						//exit();
						$model = $model['model'];
						
						foreach($slider_model as $slider){
							
							echo "<li>". anchor($slider->linkto, img(array("src" => "images/".$slider->image_name, 'width' => 1900))) . "</li>";
							
						}
					}
				?>
					
				</ul>
    
		</div>
        <!-- end of slider div --> 
		<div id="sub-content">
			<div id="box1">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=270&amp;height=220&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=202609959891767" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:290px;" allowTransparency="true"></iframe>
			</div>
			
			<!-- Start index article -->

			<div id="box2">
             
             <?php echo anchor($model->image1_linkto, img(array("src"=>"images/".$model->image1_name, "width"=>"424", "height"=>"163", "style"=>"position: relative; top: -28px;")));?>

         	</div>
			<div id="box3">
             
				<?php echo anchor($model->image2_linkto, img(array("src"=>"images/".$model->image2_name, "width"=>"421", "height"=>"159", "style"=>"position: relative; top: -24px;")));?>
             
			</div>	

			<!-- End index article -->		
		</div>

	
	<!-- end of container div --> 

	</div>
	
	<?php include_once(APPPATH . 'views/_footer.php')//echo $header ?>
</div>
</body>

</html>