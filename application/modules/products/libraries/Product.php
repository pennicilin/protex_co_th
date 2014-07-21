<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product
{
  protected 	$ci;

	private $no_article_message = 'No more article.';

	private $no_data_entry_message = 'No data entry.';

	private $default_display = TRUE;

	private $default_list_item = TRUE;

	private $list_format = '';

	private $display_format = '';

	private $folder = 'images';

	public $library_src = '';



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



	


	public function get_section_category_lists($model=NULL)
	{
		# code...
		$result = "";
		// $model = $params['model'];

		$model = new Product_section();

		$model->get();

		// $this->product->lists('');


		if($model == "Product_section"){
		

			// $skip = TRUE;
			// echo $model->result_count(); exit();
			foreach($model as $section){

				$section_uri = $section->uri;
				
				$style="";

				$a_class="";

				if($section->uri == "men"){

					$style = "style='color: #0B3861;'";
					$a_class = "men";
				}
				
				$result .= "<h2 ".$style.">ผลิตภัณฑ์ ". $section->name ."</h2>";

				if($section->product_category->publish()->get()->result_count() > 0){
					

						$result .= "<ul>";
						
						$list_item = "";


						// echo $this->folder;

						foreach($section->product_category->publish()->get() as $category){
								
							$category_uri = $category->uri;

							if($this->default_list_item){

								$list_item = $category->name;

							}elseif($this->list_format == "thumb"){

								$list_item = img($this->folder .'/'. $category->thumb_name);
							}

							$result .= '<li><a class="'.$a_class.'" href="'.base_url().'products/'.$section_uri.'/'.$category_uri.'">'.$list_item.'</a></li>';


						}

						$result .= "</ul>";


				}else{

					$result .= $this->no_article_message;

				}

			}


			$result .= "</div>";

			

		}

		return $result;
	}


	public function load_category_products($model=NULL)
	{
		# code...

		# Config Product library here







		$this->ci->load->view('categories/category_products', array('model'=>$model));


	}





	public function load_section_categories($model=NULL)
	{
		# code...

		$data = array(

				'model' => $model,
				'content_id' => "content-".$this->ci->uri->segment(2),
				'main_id' => $this->ci->uri->segment(2)

			);
		$this->ci->load->view('sections/section', $data);

	}



	public function load_category_product_details($params=array(), $JSON=FALSE)
	{
		# code...
		# 
		# 

		$model = new Product_category();

		 $model->include_related('product_section')

		 ->where_related('product_section', 'uri', $params['section'])
		 ->get_where(array('uri' => $params['category']));

		 
		 foreach($model->product_item->publish()->get() as $item){
		 	
		 	$newitem_arr['p-'.$item->id] = array(

		 			'name' => $item->name,
		 			'category_name' => $model->name,
		 			'desc' => $item->description,
		 			'image_name' => $item->image_name,
		 			'section' => $model->product_section->get()->uri,
		 			'category' => $model->uri,

		 		);

		 	

		 }

		 if($JSON){

		 	 return json_encode($newitem_arr);
		 }else{

		 	return $newitem_arr;
		 }

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
				$result_count = $model->article->get()->result_count();
				$latest_article = $model->article->get();

			}elseif ($model == "Article") {
				# code...
				// $result .= 'test';exit();
				$result_count = $model->result_count();
				$latest_article = $model;
				
				// print_r($model); exit();
			}

			if($result_count > 0){


				if($this->default_display == TRUE){

					$result .= "<strong>".$latest_article->title."</strong>";

					$image_propery = array(

							'src' => 'images/article/'.$latest_article->image_name,
							'align' => 'left',
							'style' => "margin-right: 20px; margin-top: 15px;"

						);
					$result .= "<p>" . img($image_propery) . $latest_article->detail . "</p>";

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
