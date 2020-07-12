<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
            <?php foreach ($sliders as $slider) { ?>
            <div class="single_iteam"> <a href="<?= base_url('home/read/'.$slider->id.'/'.$slider->post_slug) ?>"> <img src="<?= base_url('uploads/'.$slider->post_img) ?>" alt=""></a>
                <div class="slider_article">
                    <h2><a class="slider_tittle" href="<?= base_url('home/read/'.$slider->id.'/'.$slider->post_slug) ?>"><?= $slider->post_title ?></a></h2>
                    <p><?= character_limiter($slider->post_content, 150) ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_sidebar wow fadeInDown">
          <a class="sideAdd" target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbannersquare.png') ?>" alt=""></a> 
          <a class="sideAdd" target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbannersquare.png') ?>" alt=""></a> 
        </div>
      </div>
    </div>
  </section>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
            <?php foreach ($lasts as $last) { ?>
              <li>
                <div class="media"> <a href="<?= base_url('home/read/'.$last->id.'/'.$last->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$last->post_img) ?>"> </a>
                  <div class="media-body"> <a href="<?= base_url('home/read/'.$last->id.'/'.$last->post_slug) ?>" class="catg_title"><?= $last->post_title ?></a> </div>
                </div>
              </li>
            <?php } ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
        <div class="left_content">
          <div class="add_banner" style="margin-bottom: 25px;">
            <a target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbanner728x90.png') ?>" alt=""></a>
          </div>
          <div class="single_post_content">
            <h2><span><?= $categories[0]->cat_title ?></span></h2>
            <div class="single_post_content_left">
            <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="<?= base_url('home/read/'.$firsts[0]->id.'/'.$firsts[0]->post_slug) ?>" class="featured_img"> <img alt="" src="<?= base_url('uploads/'.$firsts[0]->post_img) ?>" style="max-height:220px;"> <span class="overlay"></span> </a>
                    <figcaption> <a href="<?= base_url('home/read/'.$firsts[0]->id.'/'.$firsts[0]->post_slug) ?>"><?= $firsts[0]->post_title ?></a> </figcaption>
                    <p> <?= character_limiter($firsts[0]->post_content, 100) ?> </p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
            <?php
              foreach (array_slice($firsts,1) as $first) { 
            ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="<?= base_url('home/read/'.$first->id.'/'.$first->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$first->post_img) ?>"> </a>
                    <div class="media-body"> <a href="<?= base_url('home/read/'.$first->id.'/'.$first->post_slug) ?>" class="catg_title"> <?= $first->post_title ?></a> 
                    </div>
                  </div>
                </li>
            <?php 
              }
            ?>
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span><?= $categories[1]->cat_title ?></span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="<?= base_url('home/read/'.$seconds[0]->id.'/'.$seconds[0]->post_slug) ?>" class="featured_img"> <img alt="" src="<?= base_url('uploads/'.$seconds[0]->post_img) ?>" style="max-height:220px;"> <span class="overlay"></span> </a>
                      <figcaption> <a href="<?= base_url('home/read/'.$seconds[0]->id.'/'.$seconds[0]->post_slug) ?>"><?= $seconds[0]->post_title ?></a> </figcaption>
                      <p><?= character_limiter($seconds[0]->post_content, 100) ?></p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  <?php
                    foreach (array_slice($seconds,1) as $second) { 
                  ?>
                    <li>
                      <div class="media wow fadeInDown"> <a href="<?= base_url('home/read/'.$second->id.'/'.$second->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$second->post_img) ?>"> </a>
                        <div class="media-body"> <a href="<?= base_url('home/read/'.$second->id.'/'.$second->post_slug) ?>" class="catg_title"><?= $second->post_title ?></a> </div>
                      </div>
                    </li>
                  <?php 
                    }
                  ?>
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span><?= $categories[2]->cat_title ?></span></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="<?= base_url('home/read/'.$thirds[0]->id.'/'.$thirds[0]->post_slug) ?>" class="featured_img"> <img alt="" src="<?= base_url('uploads/'.$thirds[0]->post_img) ?>" style="max-height:220px;"> <span class="overlay"></span> </a>
                      <figcaption> <a href="<?= base_url('home/read/'.$thirds[0]->id.'/'.$thirds[0]->post_slug) ?>"><?= $thirds[0]->post_title ?></a> </figcaption>
                      <p><?= character_limiter($thirds[0]->post_content, 100) ?></p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                <?php
                    foreach (array_slice($thirds,1) as $third) { 
                  ?>
                    <li>
                      <div class="media wow fadeInDown"> <a href="<?= base_url('home/read/'.$third->id.'/'.$third->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$third->post_img) ?>"> </a>
                        <div class="media-body"> <a href="<?= base_url('home/read/'.$third->id.'/'.$third->post_slug) ?>" class="catg_title"><?= $third->post_title ?></a> </div>
                      </div>
                    </li>
                  <?php 
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="add_banner" style="margin-bottom: 25px;">
            <a target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbanner728x90.png') ?>" alt=""></a>
          </div>
        </div>
      </div>
