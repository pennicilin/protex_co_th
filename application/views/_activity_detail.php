<div id="activity-main">

<?php
	// echo $model; exit();
	if($this->uri->segment(1) == 'contents'){

		// exit();
		if($model->section->get()->uri == 'health'){

			// exit();
			$class_prefix = "article";
		}else{

			$class_prefix = "activity";
		}

	}else{

		$class_prefix = "activity";
	}

?>
<div id="<?php echo $class_prefix; ?>-details">
				<!-- <div id="slider">

						<ul class="bxslider">
							<li><a href="#"><img src="<?php echo base_url();?>images/activity/a1.jpg"></a></li>

						</ul>


			
				</div> -->

				<?php

					// echo $model->category->get()->section->get()->uri;
					// echo $this->uri->segment(1);

					// var_dump($this->content);
				// echo $model;
					if($this->uri->segment(1) == 'contents'){

						
						if($model == "Section"){


							if($model->uri == "aboutus"){

									// echo 'test';
									echo anchor(

											'http://www.colgate.co.th/app/Colgate/TH/TH/Corp/History/1806.cvsp
',

img('images/'.$model->article->get()->image_name),

array('target'=>'_blank')

										);
								}



							}elseif($model == "Category"){

								if($model->section->get()->uri == "news-activities"){

									$this->content->display('one_image');
								}

							}elseif($model == "Article"){

								if($model->category->get()->section->get()->uri == "news-activities"){

									$this->content->display('one_image');


								}


							}else{


								show_error(ERROR_404_MESSAGE, 404);
							}
							
							echo $this->content->get_latest_article($model);



					}/*elseif($this->uri->segment(1) == 'products'){



						// $this->product->library_src = $library_src;
						$this->product->load_category_products($model);


					}*/

					

				?>
			</div>
	</div>