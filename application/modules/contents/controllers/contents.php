<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		include_once(APPPATH.'modules/products/models/product_section.php');
		include_once(APPPATH.'modules/products/models/product_category.php');
		include_once(APPPATH.'modules/products/models/product_item.php');

		$this->index($this->uri->segment_array());
		$this->load->library('content');
		
		
	}

	

	public function index($uri=array())
	{
		# code...
		// echo count($uri);

		


		if(count($uri) === 1 && $uri[1] === "contents"){

			// echo 'home';
			
			$model = new Index();
			$slider_model = new Slider();
			
			
			$slider_model->get();

			$model->get();

			$this->display('template1', array('model' => array('model'=>$model, 'slider_model'=>$slider_model), 'breadcrumb'=> "", 'article_header'=> ""));

		}elseif($this->is_section_uri_only($uri)){

			
			$model = $this->read('Section', $uri);

			$breadcrumb = $this->get_breadcrumb($model);

			$this->display('template2', array('model'=> $model, 'breadcrumb'=> $breadcrumb, 'article_header'=> $model->name));


		}elseif($this->is_category_uri($uri)){

			

			$model = $this->read('Category', $uri);

			/*header('content-type: text/plain;');
			var_dump($model); exit();*/
			$breadcrumb = $this->get_breadcrumb($model);

			$this->display('template2', array('model'=> $model, 'breadcrumb'=> $breadcrumb, 'article_header'=> $model->name));

		}elseif($this->is_article_uri($uri)){

			$model = $this->read('Article', $uri);

			// var_dump($model); exit();
			// print_r($model);exit();
			$breadcrumb = $this->get_breadcrumb($model);

			// print_r(array('model' => $model, 'breadcrumb' => $breadcrumb)); exit();

			// $model = $this->read('Article', $uri);
			$data = array(

			'model'=> $model,

			 'breadcrumb'=> $breadcrumb,

			  'article_header'=> $model->title

			  );


			$this->display('template2', $data );

		}else{

			show_error(ERROR_404_MESSAGE, 404);
		}

		// exit();
	}


	




	private function get_breadcrumb($model=NULL)
	{
		# code...

		if($model!==NULL){

			if($model == 'Article'){

				// $model->clear();
				// header('content-type:text/html; charset=utf8;');

				// print_r($model->include_related('category/section')->get());

				// $last = $model->title;

				/*$model->include_related('category')

				->include_related('category/section')->get();*/

				$breadcrumb = "<li>". $model->category_section_name ." ></li>";
				$breadcrumb .= "<li>". $model->category_name . " ></li>";
				$breadcrumb .= "<li>". $model->title . "</li>";
				
				return $breadcrumb;

			}elseif($model == 'Category'){

				
				$breadcrumb = "<li>". $model->section->get()->name . " ></li>";
				$breadcrumb .= "<li>". $model->name ."</li>";

				return $breadcrumb;

			}elseif($model == 'Section'){

				$breadcrumb = "<li>". $model->name ."</li>";
				// $breadcrumb .= "<li>". $model->category->get()->name . " ></li>";

				return $breadcrumb;
			}

			// exit();

		}
	}

	private function display($template='', $params=array('model'=>'', 'breadcrumb'=> '', 'article_header'=> ''))
	{
		# code...

		ob_start();

			$this->load->view($template, array(

					'model' => $params['model'],

					'breadcrumb' => $params['breadcrumb'],

					'article_header' => $params['article_header']

				));

		ob_flush();

		exit();
	}





	private function is_article_uri($uri=array())
	{
		# code...


		$Article = new Article();

		if($Article->get_where(array('slug' => $uri[4]))->result_count() < 1){

			return false;
		}else{

			return true;
		}

		// exit();
	}


	private function is_category_uri($uri=array())
	{
		# code...

		// echo count($uri); exit();

		$Category = new Category();

		if(count($uri) != 3) return false;
		// echo $Category->get_where(array('uri' => $uri[3]))->result_count(); exit();
		if($Category->get_where(array('uri' => $uri[3]))->result_count() < 1 || count($uri) != 3){

			return false;
		}else{

			return true;
		}

		// exit();
	}



	/*private function read_article($uri=array())
	{
		# code...
		// echo 'test';
		$Article = new Article();

		$Article->get_where(array('slug' => $uri[2]));

		return $Article;

	}*/


	private function read($model=NULL, $uri=array())
	{
		# code...
		// echo 'test';
		$uri_field = ""; $offset=0;

		if($model == "Article"){

			$uri_field = "slug";
			$offset = 4;

			// echo $uri[$offset];

		}elseif($model == "Category"){

			$uri_field = "uri";
			$offset = 3;

		}elseif($model == "Section"){

			$uri_field = "uri";
			$offset = 2;

		}

		if($model != "Article"){

			$model = new $model();

			$model->get_where(array($uri_field => $uri[$offset]));

			return $model;

		}else{

			// exit();
			$model = new Article();

			$model->include_related('category')->where_related('category', 'uri', $uri[3])
			->include_related('category/section')
			->where_related('category/section', 'uri', $uri[2])
			->get_where(array('slug' => $uri[4]));

			/*header('content-type: text/plain;');
			print_r($uri);
			print_r($model);exit();*/
			return $model;
		}

	}


	private function is_section_uri_only($uri=array())
	{
		# code...

		if(count($uri) === 2){

			// echo $uri[2];
			$Section = new Section();

			$Section->get_where(array('uri' => $uri[2]));
			
			// echo $Section->result_count();
			if($Section->result_count() < 1){

				return false;

			}else{

				return true;
			}

			// return true;
		}else{

			return false;
		}
	}


	/*private function read_section($uri=array())
	{
		# code...


		// Feed all informations in section

			$Section = new Section();
			// $Category = new Category();
			// $Section->where()->get();

			// echo $uri[2];
			$Section->include_related('category')

			->include_related('category/article')
			->get_where(array('uri' => $uri[2]));

			// var_dump($section);

			return $Section;
			
	}*/

}

/* End of file contents.php */
/* Location: ./application/modules/contents/controllers/contents.php */