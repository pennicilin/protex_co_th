<div id="right-panel">
			

<?php 
	
	// $this->load->library('content');
	if($this->uri->segment(1) == 'contents'){

		if($model == "Section"){


			}elseif($model == "Category"){

				if($model->section->get()->uri == "news-activities"){

					$this->content->lists('thumb');
					$this->content->folder('images/activity');
				}

			}elseif($model == "Article"){

				if($model->category->get()->section->get()->uri == "news-activities"){

					$this->content->lists('thumb');
					$this->content->folder('images/activity');
				}


			}else{


				show_error(ERROR_404_MESSAGE, 404);
			}


			echo $this->content->get_more_article_lists($model);




	}elseif($this->uri->segment(1) == 'products'){


		// Load library Content from Contents Module.
		// 
		$this->load->library('contents/content');
		
		// Load related article 	
		// echo $model;
		// 
		if(count($this->uri->segment_array()) === 2){

			$model = $model->product_category->get()->category->get();

			echo $this->content->get_articles_in_category($model);

		}elseif(count($this->uri->segment_array()) === 3){

			$model = $model->category->get();

			echo $this->product->get_section_category_lists();

		}


	}

?>

<!-- <li><a><img src=" . base_url() . "images/activity-1.jpg" width="272" height="128"></a></li>
				<li><a><img src=" . base_url() . "images/activity-2.jpg" width="272" height="128"></a></li> -->
			
			