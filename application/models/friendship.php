<?php 
class Friendship extends CI_Model{
	public function get_friends_by_user_id($user_id){
		$query = "select * from friendships join users on friendships.friend_id = users.id where friendships.user_id = ?";
		return $this->db->query($query, array($user_id))->result_array();
	}

	public function add_friend($user_id, $friend_id){
		$query = "INSERT INTO friendships (user_id, friend_id) VALUES (?,?)";
		$values = array($user_id, $friend_id);
		$this->db->query($query, $values);
		$values = array($friend_id, $user_id);
		$this->db->query($query, $values);
	}

	public function delete_friend($user_id, $friend_id){
		$query = "DELETE FROM friendships where user_id = ? and friend_id = ?";
		$values = array($user_id, $friend_id);
		$this->db->query($query, $values);
		$values = array($friend_id, $user_id);
		$this->db->query($query, $values);
	}

	public function get_other_users($user_id){
		$query = "select * from users where id not in (
					select friend_id from friendships where user_id = ?
					) and id not in (?)";
		return $this->db->query($query, array($user_id, $user_id))->result_array();
	}
}