<div class="col-lg-8 col-md-8 col-sm-8">
  <div class="left_content">
    <div class="single_page">
      <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li class="active"><?= $posts->cat_title ?></li>
      </ol>
      <h1><?= $posts->post_title ?></h1>
      <div class="post_commentbox">
        <a href="#"><i class="fa fa-user"></i><?= $posts->full_name ?></a>
        <span><i class="fa fa-calendar"></i><?= $posts->created_at ?></span>
        <a href="<?= base_url('home/category_page/'.$posts->post_cat_id) ?>"><i class="fa fa-tags"></i><?= $posts->cat_title ?></a>
      </div>
      <div class="single_page_content">
        <img class="img-center" src="<?= base_url('uploads/'.$posts->post_img) ?>" alt="">
        <p><?= $posts->post_content ?></p>
      </div>
      <div class="social_link">
        <ul class="sociallink_nav">
          <li><a target="_blank" href="<?= 'https://www.facebook.com/sharer/sharer.php?u='.$links ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a target="_blank" href="<?= 'https://twitter.com/intent/tweet?url='.$links ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a target="_blank" href="<?= 'https://plus.google.com/share?url='.$links ?>"><i class="fa fa-google-plus"></i></a></li>
          <li><a target="_blank" href="<?= 'https://www.linkedin.com/cws/share?url='.urlencode($links) ?>"><i class="fa fa-linkedin"></i></a></li>
          <li><a target="_blank" href="<?= 'http://pinterest.com/pin/create/button/?url='.$links ?>"><i class="fa fa-pinterest"></i></a></li>
        </ul>
      </div>
      <div class="related_post">
        <h2>Comment <i class="fa fa-comment-o"></i></h2>
        <form action="<?= $action ?>" method="post">
          <input type="hidden" name="post_id" value="<?= $posts->id ?>">
          <div class="form-group">
            <label for="username_comment">Username *</label>
            <input type="text" name="username" class="form-control" id="username_comment" placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="comment_text">Comment</label>
            <textarea name="comment" class="form-control" id="comment_text" rows="3" placeholder="Write your comment ..." required></textarea>
          </div>
          <button type="submit" class="btn btn-theme">Send</button>
        </form>
        <h4> <?= $comment_count ?> comment </h4>
        <?php foreach ($comments as $comment) { ?>
          <div class="post_commentbox">
          <a href="#"><i class="fa fa-user"></i><?= $comment->username ?></a>
          <span><i class="fa fa-calendar"></i><?= $comment->created_at ?></span>
          <p><?= $comment->comment ?></p>
          </div>
        <?php } ?>
      </div>
      <div class="related_post">
        <h2>Related News <i class="fa fa-thumbs-o-up"></i></h2>
        <ul class="spost_nav wow fadeInDown animated">
          <?php 
            foreach (array_slice($related, 0, 3) as $relate) {
          ?>
            <li>
              <div class="media"> <a class="media-left" href="<?= base_url('home/read/'.$relate->id.'/'.$relate->post_slug) ?>"> <img src="<?= base_url('uploads/'.$relate->post_img) ?>" alt=""> </a>
                <div class="media-body"> <a class="catg_title" href="<?= base_url('home/read/'.$relate->id.'/'.$relate->post_slug) ?>"><?= $relate->post_title ?></a> </div>
              </div>
            </li>
          <?php
            }
          ?>
        </ul>
      </div>
      <div class="related_post">
        <h2>Another News <i class="fa fa-thumbs-o-up"></i></h2>
        <ul class="spost_nav wow fadeInDown animated">
          <?php 
            foreach (array_slice($related, 0, 3) as $relate) {
          ?>
            <li>
              <div class="media"> <a class="media-left" href="<?= base_url('home/read/'.$relate->id.'/'.$relate->post_slug) ?>"> <img src="<?= base_url('uploads/'.$relate->post_img) ?>" alt=""> </a>
                <div class="media-body"> <a class="catg_title" href="<?= base_url('home/read/'.$relate->id.'/'.$relate->post_slug) ?>"><?= $relate->post_title ?></a> </div>
              </div>
            </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>