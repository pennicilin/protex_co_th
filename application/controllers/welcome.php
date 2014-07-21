<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// header('content-type:text/plain;');
		

		redirect('contents');


		$Segment = new Productsegment();
		// $Category = new Productcategory();

		$Segment->get();

		// var_dump($Segment); exit(); 
		foreach ($Segment as $key => $value) {
			# code...
			/*$Category->clear();
			foreach ($Category->where('segment_id', $value->id)->get() as $key => $value) {
				# code...

				echo '<p>key = ' . $key . '</p>';
				echo '<p>value = ' . $value->name . '</p>';
			}*/
		}

		// exit();

		$this->load->view('template1', array(

				'init' => getTemplate(APPPATH . '/views/_init.php'),
				'header' => getTemplate(APPPATH . '/views/_header.php'),
				'footer' => getTemplate(APPPATH . '/views/_footer.php'),

			));


	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */