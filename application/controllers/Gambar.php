<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('GambarModel');
		$this->load->library('pagination');
		$this->load->helper(array('html','url','form'));
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
		    $dari      = $this->uri->segment('3');
            $sampai = 5;
            $like      = '';
            $jumlah= $this->GambarModel->jumlah();
            $config = array();
            $config['base_url'] = base_url().'index.php/gambar/index/';
            $config['total_rows'] = $jumlah;
            $config['per_page'] = $sampai;
            $config['num_links'] = $jumlah;
 
	           $config['num_tag_open'] = '<li>';
	           $config['num_tag_close'] = '</li>';
	           $config['next_tag_open'] = "<li>";
	           $config['next_tagl_close'] = "</li>";
	           $config['prev_tag_open'] = "<li>";
	           $config['prev_tagl_close'] = "</li>";
	           $config['first_tag_open'] = "<li>";
	           $config['first_tagl_close'] = "</li>";
	           $config['last_tag_open'] = "<li>";
	           $config['last_tagl_close'] = "</li>";
	           $config['cur_tag_open'] = '&nbsp;<a class="current">';
	           $config['cur_tag_close'] = '</a>';
	           $config['next_link'] = 'Next';
	           $config['prev_link'] = 'Previous';
           $this->pagination->initialize($config);
           $data = array();
           $data['gambar'] = $this->GambarModel->view($sampai, $dari, $like);
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
           $this->load->view('gambar/view',$data);		
		} else {
			redirect("login");
		}
	}

 	public function cari()
    {
     $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';
     $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
            $dari      = $this->uri->segment('4');
            $sampai = 5;
            $like      = '';
           if($search) $like = "(nama LIKE '%$search%')";
           $jumlah= $this->GambarModel->jumlah($like);
           $config = array();
           $config['base_url'] = base_url().'index.php/cari/'.$search;
           $config['total_rows'] = $jumlah;
           $config['per_page'] = $sampai;
           $config['num_links'] = $jumlah;
 
           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous';
 
           $this->pagination->initialize($config);
           $data = array();
           $data['gambar'] = $this->GambarModel->view($sampai, $dari, $like);
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
           $this->load->view('gambar/search',$data);
      } 

    public function tambah(){
    	if($this->admin->logged_id())
		{
			$data = array();
			
			if($this->input->post('submit')){ 

				if($this->GambarModel->validation("save")){
					$upload = $this->GambarModel->upload();
					if($upload['result'] == "success"){ 
						$this->GambarModel->save($upload);
						redirect('gambar'); 
					}else{ 
						$data['message'] = $upload['error'];
					}
				}
			}
			
		$this->load->view('gambar/form', $data);
		} else{
				redirect("login");
		}
	}
 
	public function ubah($id)
	{
		if($this->admin->logged_id())
		{
			$data = array();
			//$upload="";
			if($this->input->post('submit')){
				$upload = $this->GambarModel->upload();
				if($this->GambarModel->validation("update")) { 	
					
					$this->GambarModel->edit($id, $upload); 
					redirect('gambar');
				}

			}
			$data['gambar'] = $this->GambarModel->view_by($id);
			$this->load->view('gambar/ubah', $data);
		}else{
			redirect("login");
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	public function hapus($id) {
		//$upload = $this->GambarModel->upload();
		$this->GambarModel->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
		redirect('gambar');
	}

}
