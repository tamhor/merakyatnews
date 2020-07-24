<!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keyword" content="<?= $title; ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.min.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/animate.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/li-scroller.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/slick.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/theme.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" >
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/spag.css" >
<style>
img{linear-gradient(to right, #20409a 50%, #007cbd 100%);
  border-radius: 3%;
}
.sidebar {
  height: 100%; 
  width: 0; 
  position: fixed; 
  z-index: 1; 
  top: 0;
  left: 0;
  background-color: #fff;
  box-shadow: 0 0 20px rgba(0,0,0,0.3);
  overflow-x: hidden;
  padding-top: 60px; 
  transition: 0.5s;
}
.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
.sidebar a:hover {
  color: #111;
}
.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.navbar-default{
    box-shadow: 0 0 20px rgba(0,0,0,0.2);
}
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}
.custom{
    border: 2px solid #20409a !important;
    padding: 8px 15px !important;
    margin-top: 11px;
    height: 38px;
    font-size: 14px;
    font-weight: 700;
    color: #20409a !important;
    border-radius: 29px;
    margin-left: 10px !important;
}
.openbtn:hover {
  background-color: #444;
}
#main {
  transition: margin-left .5s; 
  padding: 20px;
}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#" style="right: 30px;"><i class="fa fa-angle-up"></i></a>
<div class="navbar navbar-default">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="<?= base_url() ?>">Home</a></li>
      <li>
      </li>
    </ul>
  </div>
</div>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <?php if ($this->session->userdata('logged_in')) { ?>
        <button class="navbar-toggle dropdown collapsed">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="d-none d-md-inline-block"><?= $this->session->userdata('full_name') ?></span>
          </a>
          <ul class="dropdown-menu">
            <li>
            <a href="<?php
            if($this->auth->is_logged_in_admin()) {
              echo base_url('logout/admin');
            }else{
              echo base_url('logout/user');
            }
            ?>">
              Logout </a>
              </li>
          </ul>
        </button>
      <?php }else{ ?>
          <button class="navbar-toggle collapsed custom" onclick="location.href='<?= base_url('user_login') ?>';">Login</button>
      <?php } ?>
      <a class="navbar-toggle collapsed" style="border: 0;" href="#"><i class="fa fa-2x fa-youtube-play"></i></a>
      <a class="navbar-brand" onclick="openNav()" href="#"><i class="fa fa-bars"></i> Menu</a>
    </div>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php foreach ($categories as $category) { ?>
  <a href="<?= base_url('home/category_page/'.$category->id.'/'.$category->cat_slug) ?>" active><?= $category->cat_title ?></a>
  <?php foreach ($subs as $key): ?>
    <?php if ($category->id == $key->cat_id): ?>
      <a href="<?= base_url($key->sub_slug) ?>" style="margin-left: 10px;"><i class="fa fa-chevron-right"></i> <?php echo $key->sub_title ?></a>
    <?php endif ?>
  <?php endforeach ?>
<?php } ?>
</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="nav_top">
      <ul class="nav navbar-nav">
        <li>
          <form class="navbar-form" action="<?= base_url('home/search') ?>">
            <div class="form-group">
              <input class="form-control" style="border-radius: 200px;" type="text" name="search">
            </div>
            <button type="submit" class="form-control">Search</button>
          </form>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-2x fa-youtube-play"></i></a></li>
          <?php if ($this->session->userdata('logged_in')) { ?>
            <li class="dropdown">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
               <span class="d-none d-md-inline-block"><?= $this->session->userdata('full_name') ?></span>
             </a>
             <ul class="dropdown-menu">
               <li>
               <a href="<?php
               if($this->auth->is_logged_in_admin()) {
                 echo base_url('logout/admin');
               }else{
                 echo base_url('logout/user');
               }
               ?>">
                 Logout </a>
                 </li>
             </ul>
           </li>
          <?php }else{ ?>
            <li>
              <a class="navbar-brand custom" href="<?= base_url('login') ?>">Login</a>
            </li>
          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="<?= base_url() ?>" class="logo"><img src="<?= base_url('assets/images/logo.png') ?>" alt=""></a>
          </div>
          <div class="add_banner"><a target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbanner728x90.png') ?>" alt=""></a></div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <div class="container">
  <section id="navArea">
    <nav class="navbar navbar-inverse" style="border-radius: 10px; background:linear-gradient(to right, #20409a 50%, #007cbd 100%);" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav" style="padding:0 20px;">
          <li class="<?= $this->uri->segment(1) === NULL ? 'active' : '' ?>"><a href="<?= base_url() ?>"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
            <?php foreach ($categories as $category) { ?>
              <li class="<?= $this->uri->segment(3) === $category->id ? 'active' : '' ?> dropdown"><a href="<?= base_url().'home/category_page/'.$category->id.'/'.$category->cat_slug ?>" ><?= $category->cat_title ?></a>
                <?php $check = 0; ?>
                <?php foreach ($subs as $key): ?>
                  <?php if ($category->id == $key->cat_id): ?>
                    <?php if ($check == 0): ?>
                      <ul class="dropdown-menu">
                    <?php endif ?>
                    <li><a href="<?= base_url($key->sub_slug) ?>"><?php echo $key->sub_title ?></a></li>
                    <?php $check++; ?>
                  <?php endif ?>
                <?php endforeach ?>
                <?php if ($check > 0): ?>
                  </ul>
                <?php endif ?>
              </li>
            <?php } ?>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Breaking News</span>
          <ul id="ticker01" class="newsticker">
            <?php foreach ($breaking_news as $new) { ?>
              <li><a href="<?= base_url('home/read/'.$new->id.'/'.$new->post_slug) ?>"><?= $new->post_title ?></a></li>
            <?php } ?>
        </div>
      </div>
    </div>
  </section>
  
  <section id="contentSection">
    <div class="row">
      <?php $this->load->view($module); ?>

      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
            <?php
              foreach ($populars as $popular) {
            ?>
              <li>
                <div class="media wow fadeInDown"> <a href="<?= base_url('home/read/'.$popular->id.'/'.$popular->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$popular->post_img) ?>"> </a>
                  <div class="media-body"> <a href="<?= base_url('home/read/'.$popular->id.'/'.$popular->post_slug) ?>" class="catg_title"> <?= $popular->post_title ?></a> </div>
                </div>
              </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <a class="sideAdd" target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbannersquare.png') ?>" alt=""></a>
          </div>
          <!-- <div class="single_sidebar wow fadeInDown">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
            <?php
              // foreach ($populars as $popular) {
            ?>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="<? //= base_url('uploads/'.$popular->post_img) ?>"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> <? //= $popular->post_title ?></a> </div>
                </div>
              </li>
              <?php
              // }
              ?>
            </ul>
          </div> -->
          <div class="single_sidebar">
            <h2><span>Most Commented</span></h2>
            <ul class="spost_nav">
            <?php
              foreach ($commented as $popular) {
            ?>
              <li>
                <div class="media wow fadeInDown"> <a href="<?= base_url('home/read/'.$popular->id.'/'.$popular->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$popular->post_img) ?>"> </a>
                  <div class="media-body"> <a href="<?= base_url('home/read/'.$popular->id.'/'.$popular->post_slug) ?>" class="catg_title"> <?= $popular->post_title ?></a> </div>
                </div>
              </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="single_sidebar wow fadeInDown">
          <div class="single_sidebar wow fadeInDown">
            <a class="sideAdd" target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbannersquare.png') ?>" alt=""></a>
            <a class="sideAdd" target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbannersquare.png') ?>" alt=""></a>
          </div>
        </aside>
      </div>
      
    </div>
  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer_widget wow fadeInLeftBig" style="padding-top:20%;">
           <div style="text-align:center;">
            <img style="width:100%;" src="<?= base_url('assets/images/logo.png') ?>">
            <h5>Connect with Us</h5>
              <ul class="social_nav" style="align-content:center;">
                <li class="facebook"><a href="#"></a></li>
                <li class="twitter"><a href="#"></a></li>
                <li class="pinterest"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer_widget wow fadeInDown">
            <h2>Categori</h2>
            <ul class="tag_nav">
              <?php foreach (array_slice($categories, 0, 7) as $category) { ?>
                <li><a href="#"><?= $category->cat_title ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer_widget wow fadeInDown">
            <h2>Informasi</h2>
            <ul class="tag_nav">
                <li><a href="#">Redaksi</a></li>
                <li><a href="#">Pedoman Media Siber</a></li>
                <li><a href="#">Karir</a></li>
                <li><a href="#">Disclaimer</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Layanan</h2>
            <ul class="tag_nav">
                <li><a href="#">Forum</a></li>
                <li><a href="#">Pasang Iklan</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; <script>document.write(new Date().getFullYear())</script>
        <a href="#">Merakyat News</a></p>
      <p class="developer" style="color: white;">Developed By <a style="color: white;" target="_blank" href="http://tamhor.com">Tamhor Dev.</a></p>
    </div>
  </footer>
</div>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/wow.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/slick.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/jpag.js') ?>"></script> 
<script src="<?= base_url('assets/js/jquery.li-scroller.1.0.js') ?>"></script> 
<script src="<?= base_url('assets/js/jquery.newsTicker.min.js') ?>"></script> 
<script src="<?= base_url('assets/js/jquery.fancybox.pack.js') ?>"></script> 
<script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
    } 
    jQuery(function($) {
        var items = $("#content tbody tr");

        var numItems = items.length;
        var perPage = 5;

        items.slice(perPage).hide();

        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",

            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide()
                     .slice(showFrom, showTo).show();
            }
        });
    });
</script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>

<script>
	$(document).ready(function () {
		$('.update_comment').click(function () {
			$('input[name=update_username]').val($(this).attr('data-username'));
			$('textarea[name=update_comment]').val($(this).attr('data-comment'));
			$('input[name=comment_id]').val($(this).attr('data-id'));
			$('#update_comment').modal('show');
		})
	})
</script>

</body>
</html>