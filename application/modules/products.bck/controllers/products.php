<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	private $product_title = "ผลิตภัณฑ์";


	public function __construct()
	{
		parent::__construct();
		
		include_once(APPPATH.'modules/contents/models/section.php');
		include_once(APPPATH.'modules/contents/models/category.php');
		include_once(APPPATH.'modules/contents/models/article.php');

		$this->load->library('product');
		$this->load->library('javascript');
		// $this->load->library('jquery');
		// echo "version-> ".CI_VERSION; exit();
		$uri = $this->uri->segment_array();

		if(count($uri) === 1 && $uri[1] == 'products') redirect('products/family');

		$this->index($this->uri->segment_array());
		
		

		// exit();
	}


	public function index($uri=array())
	{
		

		// $this->$uri[2](); exit();

		

		if(count($uri) === 2){



			if(!$model = $this->is_section_uri_only($uri)){

			// echo 'test';
				show_error(ERROR_404_MESSAGE, 404);

			}else{


					$breadcrumb = $this->get_breadcrumb($model);
			}



		}elseif(count($uri) === 3){


			if($uri[1] == 'products' && $this->input->is_ajax_request()){

				 // Load products in category in JSON Format
				 // 

				 echo $this->product->load_category_product_details(array('section' => $uri[2], 'category'=>$uri[3]), TRUE); // Set TRUE to get in JSON format

				 exit();
			}

			if(!$model = $this->is_category_uri($uri)){

				// echo 'test';
				show_error(ERROR_404_MESSAGE, 404);

			}else{


					$breadcrumb = $this->get_breadcrumb($model);
			}




		}elseif(count($uri) === 4){






		}

		
		$this->display('template2', array('model'=> $model, 'breadcrumb'=> $breadcrumb, 'article_header'=> $model->name));

	}




	private function display($template='', $params=array('model'=>'', 'breadcrumb'=> '', 'article_header'=> ''))
	{
		# code...

		ob_start();

			$this->load->view($template, array(

					'model' => $params['model'],

					'breadcrumb' => $params['breadcrumb'],

					'article_header' => $params['article_header'],

					'library_src' => $this->javascript->external(),

					'script_head' => $this->javascript->compile()

				));

		ob_flush();

		exit();
	}





	private function insertdata()
	{
		# code...



		$data = array(


				array(



					'name' => 'สูตรสปอร์ต', 'uri' => 'sport',
					'description' => 'ชาร์จพลังความสดชื่นทุกครั้งหลังการอาบน้ำ ด้วยกลิ่นหอมแบบแมนๆ และความหอมของซีตรัส ให้คุณรู้สึกสะอาดสดชื่นมั่นใจ ยาวนาน
พร้อมสำหรับทุกกิจกรรมและความท้าทาย',
					'image_name' => 'sport.png'


				),

				array(
					
					'name' => 'สูตรเอนเนอจี้', 'uri' => 'energy',
					'description' => 'คืนพลังความสดชื่นทุกครั้งหลังการอาบน้ำ ด้วยความหอมนุ่มลึก
ในแบบแมนๆ ให้คุณรู้สึกสดชื่น มั่นใจ ยาวนาน',
					'image_name' => 'energy.png'

				),

				/*array(

					'name' => 'สูตร Charcoal Bar', 'uri' => 'charcoal-bar',
					'description' => 'คืนพลังความสดชื่นทุกครั้งหลังการอาบน้ำ ด้วยความหอมนุ่มลึก
ในแบบแมนๆ ให้คุณรู้สึกสดชื่น มั่นใจ ยาวนาน',
					'image_name' => 'charcoal-bar.png'

				),

				array(

					'name' => 'สูตร Charcoal Bar ', 'uri' => 'charcoal-bar',
					'description' => 'Waiting',
					'image_name' => 'charcoal-bar.png'


				),

				array(

					'name' => 'สูตรเฮลตี้ไวท์', 'uri' => 'healthywhite',
					'description' => 'พร้อมโยเกิร์ตโปรตีน 1 ขั้นตอนเพื่อผิวแลดูกระจ่างใสสุขภาพดี',
					'image_name' => 'healthywhite.png'


				),

				array(

					'name' => 'สูตรไอซ์ซี่ คูล ', 'uri' => 'icycool',
					'description' => 'เหนือกว่าเย็น ยังมีเย็นสุดขั้ว',
					'image_name' => 'icycool.png'


				),

				array(

					'name' => 'สูตรเฮลตี้ไวท์', 'uri' => 'healthwhite',
					'description' => 'เย็นสดชื่น พร้อมโยเกิร์ตโปรตีน 1 ขั้นตอนเพื่อผิวแลดูขาวเนียนสุขภาพดี',
					'image_name' => 'healthwhite.png'


				),

				array(

					'name' => 'ดับเบิลดีเฟนซ์', 'uri' => 'double-defence',
					'description' => 'Waiting',
					'image_name' => 'double-defence.png'


				)*/



			);

/*		$data = array(

				'description' => '<span class="font-bold"> สบู่ก้อน ปกป้องทุกคนในครอบครัวด้วยสบู่โพรเทคส์</span> ที่มีประสิทธิภาพลดการสะสมของแบคทีเรีย<br>และผ่านการทดสอบทางการแพทย์ผิวหนังสหรัฐอเมริกา เพื่อสุขภาพอนามัยที่ดีทั้งครอบครัว'

			);*/

		$category = new Product_category(8);

		/*$category->description = $data['description'];

		$category->save(); exit();*/



		$item = new Product_item();

		foreach($data as $insert_data){

			$item->clear();
			// $item->from_array();
			$item->name = $insert_data['name'];
			$item->description = $insert_data['description'];
			$item->image_name = $insert_data['image_name'];
			$item->uri = $insert_data['uri'];
			$item->save();

			$category->save($item);
		}

		


	}


	private function is_section_uri_only($uri=array())
	{
		# code...

		if(count($uri) === 2){

			// echo $uri[2];
			$Section = new Product_section();

			$Section->get_where(array('uri' => $uri[2]));
			
			// echo $Section->result_count();
			if($Section->result_count() < 1){

				return false;

			}else{

				return $Section;
			}

			// return true;
		}else{

			return false;
		}
	}

	private function is_category_uri($uri=array())
	{
		# code...

		if(count($uri) === 3){

			// echo $uri[2];
			$Category = new Product_category();

			$Category->include_related('product_section')

			// ->where_related('product_section', 'uri', $uri)
			->where_related('product_section', 'uri', $uri[2])

			->get_where(array('uri' => $uri[3]));
			
			// echo $Section->result_count();
			if($Category->result_count() < 1){

				return false;

			}else{

				return $Category;
			}

			// return true;
		}else{

			return false;
		}
	}

	



	private function get_breadcrumb($model=NULL)
	{
		# code...

		if($model!==NULL){

			$breadcrumb = "<li>".$this->product_title." ></li>";

			if($model == 'Product_item'){



				$breadcrumb .= "<li>". $model->product_category_product_section_name ." ></li>";
				$breadcrumb .= "<li>". $model->product_category_name . " ></li>";
				$breadcrumb .= "<li>". $model->name . "</li>";
				
				return $breadcrumb;

			}elseif($model == 'Product_category'){

				
				$breadcrumb .= "<li>". $model->product_section_name . " ></li>";
				$breadcrumb .= "<li>". $model->name ."</li>";

				return $breadcrumb;

			}elseif($model == 'Product_section'){

				// $breadcrumb .= "<li>".$this->product_title." ></li>";
				$breadcrumb .= "<li>". $model->name ."</li>";
				// $breadcrumb .= "<li>". $model->category->get()->name . " ></li>";

				return $breadcrumb;
			}

			// exit();

		}
	}



}

/* End of file example.php */
/* Location: ./application/controllers/example.php */