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
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.is_public = 1')
            ->order_by('p.created_at', 'DESC')
            ->limit(6)
            ->get('posts p, categories c')
            ->result();
  }
  
  
  
    public function get_post_cat()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->order_by('p.created_at', 'DESC')
            ->limit(4)
            ->get('posts p, categories c')
            ->result();
  }
    public function get_post_cats()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->order_by('p.created_at', 'ASC')
            ->limit(4)
            ->get('posts p, categories c')
            ->result();
  }
  
   public function get_post_catsi()
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->order_by('p.created_at', 'DESC')
            ->limit(2)
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

  public function get_post_by_sub_id($sub_id)
  {
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_content, p.post_img, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND p.post_sub_id ='.$sub_id)
            ->order_by('p.created_at', 'ASC')
            ->get('posts p, categories c')
            ->result();
  }

  public function insert_comment($data)
  {
    return $this->db
            ->insert('comments', $data);
  }

  public function update_comment($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('comments', $data);
  }

   public function delete_comment($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('comments', array('is_delete' => 1));
  }

    public function commented()
  {
      
    return $this->db
            ->select('p.id, p.post_title, p.post_slug, p.post_img, c.cat_title, p.created_at, COUNT(comments.post_id) AS num_comments')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0 AND comments.post_id = p.id')
            ->order_by('num_comments', 'DESC')
            ->limit(4)
            ->group_by('p.id')
            ->get('posts p, categories c, comments')
            ->result();
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

  public function get_all_subs()
  {
    $where = array(
      'is_delete' => 0
    );
    return $this->db->get_where('subs', $where)->result();
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
    ->limit(1)
    ->order_by('id', 'DESC')
    ->get('posts p, categories c')
    ->result();
  }

  public function get_post_lasts()
  {
    return $this->db
    ->select('p.id, p.post_title, p.post_img, p.post_slug, c.cat_title, p.created_at')
    ->where('p.post_cat_id = c.id AND p.is_delete = 0')
    ->order_by('p.created_at', 'DESC')
    ->limit(13)
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
          ->where('is_delete', '0')
          ->like('post_title', $keyword)
          ->or_like('post_content', $keyword)
          ->get()->result();
  } 
}
