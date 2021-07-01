<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct() {
        parent::__construct();
        //$this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Cropper', 'cropper');
    }
	 
	public function index()
	{
		$this->load->view('crop_and_rotate');
	}
	
	function download_file($file_name='')
	{
		//echo '<pre>';print_r($_SERVER);die;
		if($file_name=='')
		{
			$this->session->set_flashdata('error','Try again.');
			redirect($_SERVER['HTTP_REFERER']);
		}
		//echo $file_name;die;
		$this->load->helper('download');
				
		force_download('./images/thumb/'.$file_name, NULL);
	}
	
	function upload()
	{
		//print_r($_POST);die;
		
		$json = array();
        $avatar_src = $this->input->post('avatar_src');
        $avatar_data = $this->input->post('avatar_data');
        $avatar_file = $_FILES['avatar_file'];
        $ussid = $this->input->post('ussid');
        $upltype = $this->input->post('upltype');
        
		
		/*$originalPath = ROOT_UPLOAD_PATH; 
        $thumbPath = ROOT_UPLOAD_PATH.'_thumb/'; 
        $urlPath = HTTP_USER_PROFILE_THUMB_PATH; */
		
		$originalPath = 'images/original/'; 
        $thumbPath = 'images/thumb/'; 
        $urlPath = base_url().'images/thumb/'; 
        
        $thumb = $this->cropper->setDst($thumbPath);
        $this->cropper->setSrc($avatar_src);
        $data = $this->cropper->setData($avatar_data);
        // set file
        $avatar_path = $this->cropper->setFile($avatar_file, $originalPath); 
        // crop       
        $this->cropper->crop($avatar_path, $thumb, $data);
        // response       
        $json = array(
          'state'  => 200,
          'message' => $this->cropper->getMsg(),
          'result' => $this->cropper->getResult(),
          'thumb' => $this->cropper->getThumbResult(),
          'ussid' => $ussid,
          'upltype' => $upltype,
          'urlPath' => $urlPath,
        );
        echo json_encode($json);
	}
	
	
	
	
}
