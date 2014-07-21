<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content
{
  protected 	$ci;

	private $no_article_message = 'No more article.';

	private $no_data_entry_message = 'No data entry.';

	private $default_display = TRUE;

	private $default_list_item = TRUE;

	private $list_format = '';

	private $display_format = '';

	private $folder = 'images';



	public function __construct($params=NULL)
	{
        $this->ci =& get_instance();

       	// $this->ci->load->helper('text');
	}

	public function display($value='')
	{
		# code...

		if($value != ''){

			$this->default_display = FALSE;

			$this->display_format = $value;

		}
	}

	public function lists($value='')
	{
		# code...

		if($value != ''){

			$this->default_list_item = FALSE;

			$this->list_format = $value;

		}
	}

	public function folder($value='')
	{
		# code...

		if($value != ''){


			$this->folder = $value;

		}
	}

	

	public function get_articles_in_category($model=NULL)
	{
		# code...
		# 
		if($model != NULL){

			return $this->ci->load->view('contents/articles_in_category', array('model' => $model), TRUE);

		}else{

			show_error("No model.", 403);
		}


	}
	public function get_more_article_lists($model=NULL)
	{
		# code...
		$result = "";
		// $model = $params['model'];
		if($model == "Category" || $model == "Article"){
		

			// $skip = TRUE;

			if($model == "Category"){

				$result_count = $model->article->publish()->get()->result_count();

				// echo $result_count;
				
				$section = $model->section->get()->uri;
				$category = $model->uri;

				$Article = $model->article->get();

				$category_name = $model->name;

			}elseif($model == "Article"){

				
				$section = $model->category_section_uri;
				$category = $model->category_uri;


				$Category = new Category();

				// Retrieve Category related to the Article
				$Category->include_related_count($model, 'count')

				->where_related($model)->get();
				
				// Count the Article related to Category
				$result_count = $Category->count;

				// Set $Article variable
				$Article = $Category->article->publish()->get();

				$category_name = $model->category_name;

			}

			$result = "<h2>". $category_name ."</h2>";

			if($result_count > 1){
				

					$result .= "<ul>";
					
					$list_item = "";

					// echo $this->folder;

					foreach($Article as $article){
							
						if($this->default_list_item){

							$list_item = $article->title;

							$anchor = '<a href="'.base_url().'contents/'.$section.'/'.$category.'/'.$article->slug.'">'.$list_item.'</a>';
							

						}elseif($this->list_format == "thumb"){

							$list_item = img($this->folder .'/'. $article->thumb_name);

							$anchor = '<a style="background: none !important;" href="'.base_url().'contents/'.$section.'/'.$category.'/'.$article->slug.'">'.$list_item.'</a>';
						}

						$result .= '<li>'.$anchor.'</li>';


					}

					$result .= "</ul></div>";


			}else{

				$result .= $this->no_article_message;

			}

		}

		return $result;
	}




	public function get_latest_article($model=NULL)
	{
		# code...

		$result = "";
		if($model == "Section"){

			// If Section menu is a static page
			if($model->article->get()->result_count() == 1){

				// display article 

				$result .= $model->article->get()->detail;



			}else{


				foreach($model->category->order_by('sort')->get() as $category){

					$result .= $category->name . '<br>';

				}
			}

		}elseif($model == "Category" || $model == "Article"){

			if($model == "Category"){

				// $result .= 'test';exit();
				$result_count = $model->article->publish()->get()->result_count();
				$latest_article = $model->article->publish()->get();

			}elseif ($model == "Article") {
				# code...
				// $result .= 'test';exit();
				$result_count = $model->result_count();
				$latest_article = $model;
				
				// print_r($model); exit();


			}

			if($result_count > 0){


				if($this->default_display == TRUE){

					// $result .= "<style>.line-art{ margin: 0 0 0 100px; }</style>";
					$result .= "<h2>".$latest_article->title."</h2>";

					$img = '';

					if($latest_article->image_name != '' || $latest_article->image_name != NULL){

						$image_propery = array(

							'src' => 'images/article/'.$latest_article->image_name,
							'align' => 'left',
							'style' => "margin-right: 20px; margin-top: 15px;"

						);

						$img = img($image_propery);
					}
					
					$result .= $img."<p>" . str_replace('images', base_url().'images', $latest_article->detail). "</p>";

					// echo $result; exit();

					// $result .=   $img."<p>" . $result . "</p>";

				}else{


					// echo $this->display_format;
					if($this->display_format == 'one_image'){

						
						$result .= img('images/activity/'.$latest_article->image_name);


					}

					// echo 'result-> '.$result;

				}

			}else{

				$result .= $this->no_data_entry_message;
			}

		}

		return $result;
	}
}

/* End of file contents.php */
/* Location: ./application/modules/contents/libraries/contents.php */
