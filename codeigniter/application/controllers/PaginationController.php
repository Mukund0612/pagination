<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaginationController extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index ()
	{
		// load library
		$this->load->model('paginationmodel', 'pm');

		$total_rows  = $this->pm->num_rows();
		$per_page = 3;
		
		$this->load->library('pagination');
		
		$config = [
			'base_url' => base_url('index.php/paginationcontroller/index'),
			'total_rows' => 10,
			'per_page'	=> 3,
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => "<li class='page-item'>",
			'next_tag_close' => "</li>",
			'prev_tag_open' => "<li class='page-item'>",
			'prev_tag_close' => "</li>",
			'num_tag_open' => "<li class='page-item'>",
			'num_tag_close' => "</li>",
			'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
			'cur_tag_close' => "</a></li>",
			'attributes' => ['class' => 'page-link'],
			'next_link' => "NEXT",
			'prev_link' => "PREV",
			'last_link' => FALSE,
			'first_link' => FALSE
		];
		
		$this->pagination->initialize($config);

		$data['allRecord'] = $this->pm->get_all($config['per_page'], $this->uri->segment(3));
		
		$this->load->view('index', $data);
	}
}
