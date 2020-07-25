<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function logged_in_admin($username)
  {
    return $this->db
            ->select()
            ->where('role = 1 AND username =', $username)
            ->get('users');
  }

  public function logged_in_user($username)
  {
    return $this->db
            ->select()
            ->where('role = 0 AND username =', $username)
            ->get('users');
  }

  public function get_post_numrows()
  {
    return $this->db
            ->select('id')
            ->where('is_delete = 0')
            ->get('posts')
            ->num_rows();
  }
  
  public function get_post_numrowss($auth)
  {
    return $this->db
            ->select('id')
            ->where('is_delete = 0 AND user_id=', $auth)
            ->get('posts')
            ->num_rows();
  }
 
  
  public function get_pending_numrows(){
      return $this->db
            ->select('p.id, p.post_title, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.is_public = 0')
            ->get('posts p, categories c')
            ->num_rows();
  }

  public function get_category_numrows()
  {
    return $this->db
            ->select('id')
            ->where('is_delete = 0')
            ->get('categories')
            ->num_rows();
  }

  public function get_user_numrows()
  {
    return $this->db
            ->select('id')
            ->get('users')
            ->num_rows();
  }

  public function get_all_posts()
  {
    return $this->db
            ->select('p.id, p.post_title, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->get('posts p, categories c')
            ->result();
  }
  
  public function get_user_posts()
  {
    return $this->db
            ->select('p.id, p.post_title, c.cat_title, p.created_at, u.full_name')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.user_id=u.id AND u.role=0')
            ->get('posts p, categories c, users u')
            ->result();
  }

  public function get_pending_posts()
  {
    return $this->db
            ->select('p.id, p.post_title, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.is_public = 0')
            ->get('posts p, categories c')
            ->result();
  }
  
  public function get_all_users()
  {
    return $this->db
            ->select()
            ->where('is_delete = 0')
            ->get('users')
            ->result();
  }

  public function get_all_categories()
  {
    return $this->db
            ->select('id, cat_title')
            ->where('is_delete = 0')
            ->get('categories')
            ->result();
  }

  public function get_all_subs()
  {
    return $this->db
            ->select('s.id, c.cat_title, sub_title')
            ->where('s.cat_id = c.id AND s.is_delete = 0')
            ->get('subs s, categories c')
            ->result();
  }

  public function insert_new_user($data)
  {
    return $this->db
            ->insert('users', $data);
  }

  public function update_user($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('users', $data);
  }

  public function delete_user($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('users', array('is_delete' => 1));
  }

  public function insert_new_post($data)
  {
    $this->db
            ->insert('posts', $data);
            return $this->db->insert_id();
  }

  public function update_post($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('posts', $data);
  }

  public function delete_post($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('posts', array('is_delete' => 1));
  }

  public function get_post_row_obj($id)
  {
    return $this->db
            ->where('id = ' . $id)
            ->get('posts')
            ->row();
  }

  public function get_user_row_obj($id)
  {
    return $this->db
            ->where('id = ' . $id)
            ->get('users')
            ->row();
  }

  public function insert_new_cat($data)
  {
    return $this->db
            ->insert('categories', $data);
  }

  public function update_cat($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('categories', $data);
  }

   public function delete_cat($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('categories', array('is_delete' => 1));
  }

  public function get_add_subs($cat_id)
  {
    $this->db->where('cat_id', $cat_id);
    $result = $this->db->get('subs')->result();
    return $result;
  }

  public function insert_new_sub($data)
  {
    return $this->db
            ->insert('subs', $data);
  }

  public function update_sub($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('subs', $data);
  }

  public function delete_sub($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('subs', array('is_delete' => 1));
  }
}
