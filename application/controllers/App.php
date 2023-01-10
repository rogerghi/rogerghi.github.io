<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
   public function __construct($config = 'rest') {
        parent::__construct();
        
    }
    public function landing(){
        $this->load->view('includes/header');
        $this->load->view('homepage');
        $this->load->view('includes/footer');
    }
    public function search(){
        $this->load->view('includes/header');
        $this->load->view('search');
        $this->load->view('includes/footer');
    }
    public function detail(){
        $this->load->view('includes/header');
        $this->load->view('detail');
        $this->load->view('includes/footer');
    }
    public function compare(){
        $this->load->view('includes/header');
        $this->load->view('compare');
        $this->load->view('includes/footer');
    }

}
