<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_public extends CI_Model 
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('array');
  }

  public function get_all_posts()
  {
    return $this->db
            ->select('p.id, p.post_title, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->get('posts p, categories c')
            ->result();
  }

  public function get_comment_count($id)
  {
    return $this->db->select('*')->where('post_id ='.$id.' AND is_delete = 0')->get('comments')->num_rows();
  }

  public function get_post_populars()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->order_by('p.created_at', 'DESC')
            ->limit(6)
            ->get('posts p, categories c')
            ->result();
  }

  public function get_post_by_id($post_id)
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_cat_id, p.post_slug, p.post_content, p.post_img, u.full_name, c.cat_title, p.created_at')
            ->where('p.user_id = u.id AND p.post_cat_id = c.id AND p.is_delete = 0 AND p.id ='.$post_id)
            ->get('posts p, categories c, users u')
            ->row();
  }

  public function get_post_by_cat_id($cat_id)
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_content, p.post_img, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_cat_id ='.$cat_id)
            ->order_by('p.created_at', 'ASC')
            ->get('posts p, categories c')
            ->result();
  }

  public function insert_comment($data)
  {
    return $this->db
            ->insert('comments', $data);
  }

  public function get_comments($id)
  {
    return $this->db
            ->select('*')
            ->where('post_id ='.$id.' AND is_delete = 0')
            ->get('comments');
  }
  
  public function get_all_categories()
  {
    return $this->db
            ->select('id, cat_title, cat_slug')
            ->where('is_delete = 0')
            ->order_by('id', 'ASC')
            ->get('categories')
            ->result();
  }

  public function get_category_id($cat_id)
  {
    return $this->db
            ->select('id, cat_title, cat_slug')
            ->where('is_delete = 0 AND id ='.$cat_id)
            ->order_by('id', 'ASC')
            ->get('categories')
            ->result();
  }
  
  public function get_post_breaking_news()
  {
    return $this->db
    ->select('p.id, p.post_title, p.post_img, p.post_slug, c.cat_title, p.created_at')
    ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_lvl = 1')
    ->get('posts p, categories c')
    ->result();
  }

  public function get_post_sliders()
  {
    return $this->db
    ->select('p.id, p.post_title, p.post_img, p.post_content, p.post_slug, c.cat_title, p.created_at')
    ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_lvl = 2')
    ->get('posts p, categories c')
    ->result();
  }

  public function get_post_lasts()
  {
    return $this->db
    ->select('p.id, p.post_title, p.post_img, p.post_slug, c.cat_title, p.created_at')
    ->where('p.post_cat_id = c.id AND p.is_delete = 0')
    ->order_by('p.created_at', 'ASC')
    ->limit(5)
    ->get('posts p, categories c')
    ->result();
  }

  public function get_1st_category()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, p.post_content, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_cat_id = 1')
            ->order_by('p.created_at', 'ASC')
            ->limit(4)
            ->get('posts p, categories c')
            ->result();
  }

  public function get_2nd_category()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, p.post_content, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_cat_id = 2')
            ->order_by('p.created_at', 'ASC')
            ->limit(3)
            ->get('posts p, categories c')
            ->result();
  }

  public function get_3rd_category()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, p.post_content, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_cat_id = 3')
            ->order_by('p.created_at', 'ASC')
            ->limit(3)
            ->get('posts p, categories c')
            ->result();
  }

  public function get_search($keyword)
  {
    return $this->db
          ->select('*')
          ->from('posts')
          ->like('post_title', $keyword)
          ->or_like('post_content', $keyword)
          ->get()->result();
  } 
}
