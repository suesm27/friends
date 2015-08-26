<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Friendship');
	}

	public function index()
	{
		$friends = $this->Friendship->get_friends_by_user_id($this->session->userdata('current_user_id'));
		$other_users = $this->Friendship->get_other_users($this->session->userdata('current_user_id'));
		$this->load->view('home', array("friends" => $friends,
										"other_users" => $other_users));
	}

	public function add_friend($user_id, $friend_id)
	{
		$this->Friendship->add_friend($user_id, $friend_id);
		redirect('/main');
	}

	public function delete_friend($user_id, $friend_id)
	{
		$this->Friendship->delete_friend($user_id, $friend_id);
		redirect('/main');
	}
}