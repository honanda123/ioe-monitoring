<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\Firebase;

class CFirebase extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
	    $this->load->model('Mdata');  

    }
	public function index()
	{
		$this->load->view('firebase');

	}
	public function add_data()
	{
		$fb = Firebase::initialize('YOUR_FIREBASE_URL', 'YOUR_FIREBASE_SECRET');
	    $d = [
	        "notif" => "0",
	        "tipe" => "0",
	    ];
	    $a = $fb->push('/data', $d);
		echo json_encode($a);
		
	}
	public function get_data()
	{
		$fb = Firebase::initialize('YOUR_FIREBASE_URL', 'YOUR_FIREBASE_SECRET');
	    $a = $fb->get('/data');
		echo json_encode($a);
		
	}
	public function update_data()
	{
		$key = $this->input->get("key");
		$fb = Firebase::initialize('YOUR_FIREBASE_URL', 'YOUR_FIREBASE_SECRET');
		 $d = [
	        "notif" => "1",
	        "tipe" => "0",
	    ];
	    $a = $fb->update('/data/'.$key, $d);
		echo json_encode($a);
		
	}
	public function delete_data()
	{
		$key = $this->input->get("key");
		$fb = Firebase::initialize('YOUR_FIREBASE_URL', 'YOUR_FIREBASE_SECRET');
		 $d = [
	        "notif" => "1",
	        "tipe" => "0",
	    ];
	    $a = $fb->delete('/data/'.$key, $d);
		echo json_encode($a);
		
	}
}
