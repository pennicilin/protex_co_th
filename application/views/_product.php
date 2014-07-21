<div id="main-box">
	<div class="left-box">

	<?php 

		if(count($this->uri->segment_array()) === 3){

	
	// Display product detail
		 echo $this->product->load_category_products($model);

		}elseif(count($this->uri->segment_array()) === 2){

			echo $this->product->load_section_categories($model);
		}
	?>
	<!-- End display product detail -->
	</div>

	<div class="right-box"></div>
</div>
	