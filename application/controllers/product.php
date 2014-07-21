<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		

		$this->load->view('template2', array(

				'init' => getTemplate(APPPATH . 'views/_init.php'),

				'breadcrumb' => getTemplate(APPPATH . 'views/_breadcrumb.php'),

				'header' => getTemplate(APPPATH . 'views/_header.php'),

				'footer' => getTemplate(APPPATH . 'views/_footer.php'),

				'activity_detail' => getTemplate(APPPATH . 'views/_activity_detail.php'),

				'right_panel' => getTemplate(APPPATH . 'views/_right_panel.php'),


			));
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */