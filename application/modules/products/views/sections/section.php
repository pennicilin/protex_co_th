		<div id="main-box">
			<div class="left-box">
				<h2>ผลิตภัณฑ์</h2>
					<div id="<?php echo $content_id; ?>"><?php echo $model->product_category->get()->description ?></div>
					<div id="img-<?php echo $main_id; ?>" style="text-align: center">

					<!-- Loop categories in this section -->
					<?php

						foreach($model->product_category->publish()->get() as $category){

							echo anchor('/products/'.$model->uri.'/'.$category->uri, 
								"<span class='producttooltip'>".$category->name." <div class='arrow'></div></span>".
								img(array(

								'src'=>'images/products/'.$model->uri.'/'.$category->uri.'/'.$category->image_name,

								'width'=>'100', 'style'=>'padding-top: 0px; padding-bottom: 0px;'

							)), array("class"=>"tooltip") );
						}
					?>
						<!-- <a href="#"><img src="../images/men.png" width="719" height="285"></a> -->
					<!-- End loop categories in this section -->

					</div>
				</div>
			<div class="right-box"></div>
		</div>
	