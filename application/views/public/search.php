<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span><?= $title ?></span></h2>
              <ul class="spost_nav">
            <?php
              foreach ($search as $res) { 
            ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="<?= base_url('home/read/'.$res->id.'/'.$res->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$res->post_img) ?>"> </a>
                    <div class="media-body"> <a href="<?= base_url('home/read/'.$res->id.'/'.$res->post_slug) ?>" class="catg_title"> <?= $res->post_title ?></a>
                    </div>
                  </div>
                </li>
            <?php 
              }
            ?>
              </ul>
          </div>
          <div class="add_banner" style="margin-bottom: 25px;">
            <a target="_blank" href="http://tamhor.com"><img src="<?= base_url('assets/images/adsbanner728x90.png') ?>" alt=""></a>
          </div>
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