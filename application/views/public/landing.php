<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <!--<div class="slick_slider" style="background: linear-gradient(100deg, #21409a 50%, #007cbd 100%);border-radius: 8px;margin-bottom: 24px;">-->
        <!--    <?php foreach ($sliders as $slider) { ?>-->
        <!--    <div class="single_iteam"> <a href="<?= base_url('home/read/'.$slider->id.'/'.$slider->post_slug) ?>"> <img src="<?= base_url('uploads/'.$slider->post_img) ?>" alt=""></a>-->
        <!--        <div class="slider_article">-->
        <!--            <h2><a class="slider_tittle" href=""><?= $slider->post_title ?></a></h2>-->
        <!--            <p><?= character_limiter($slider->post_content, 150) ?></p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <?php } ?>-->
        <!--</div>-->
        <div class="headline">
            <?php foreach ($sliders as $slider) { ?>
            <article class="media media--text-overlay block-link">
                <div class="media__image">
                    
                                
                    <a onclick="_pt(this, &quot;headline&quot;, &quot;Babak I: Man City Memimpin 2-0 atas Bournemouth&quot;, &quot;artikel&quot;)" href="<?= base_url('home/read/'.$slider->id.'/'.$slider->post_slug) ?>" class="media__link">
                        <span class="ratiobox ratiobox--16-9 lqd" style="background-image: url(<?= base_url('uploads/'.$slider->post_img) ?>);">
                             <img src="<?= base_url('uploads/'.$slider->post_img) ?>" alt="Babak I: Man City Memimpin 2-0 atas Bournemouth" title="Babak I: Man City Memimpin 2-0 atas Bournemouth" class="" style="display: none;">                </span>
                    </a>
                </div>
                <div class="media__text">
                    
                                
                    <h2 class="media__title" style="margin-bottom:2px;">
                        <a onclick="_pt(this, &quot;headline&quot;, &quot;Babak I: Man City Memimpin 2-0 atas Bournemouth&quot;, &quot;artikel&quot;)" href="<?= base_url('home/read/'.$slider->id.'/'.$slider->post_slug) ?>" class="media__link">
                            <?= $slider->post_title ?>                </a>
                    </h2>
                    <div class="media__date mgt-4"><?= character_limiter($slider->post_content, 150) ?></span></div>
                </div>
            </article>
            <?php } ?>
                    <div class="headline-terkait">
                    <div class="headline-terkait__title">Berita Terkait</div>
                    <div class="list-content list-content--column grid-row">
                        <?php foreach ($related as $zii) { ?>
                                            <article class="list-content__item column">
                                <h3 class="list-content__title">
                                    <a onclick="_pt(this, <?= $zii->post_title ?>)" href="<?= base_url('home/read/'.$zii->id.'/'.$zii->post_slug) ?>"><?= $zii->post_title ?></a>
                                </h3>
                            </article>
                                     
                            </article>
                                        <?php } ?>
                    </div>
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

      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container" style="margin-bottom:40px;">
            <table id="content" >
                <tbody>
                    <?php foreach ($lasts as $last) { ?>
                    <tr style="height:85px;">
                        <td style="margin-top:15px;"><a href="<?= base_url('home/read/'.$last->id.'/'.$last->post_slug) ?>" class="media-left"> <img alt="" src="<?= base_url('uploads/'.$last->post_img) ?>"> </a></td>
                        <td><a href="<?= base_url('home/read/'.$last->id.'/'.$last->post_slug) ?>" class="catg_title"><?= $last->post_title ?></a><br><?= $last->created_at ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="pagination"></div>
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
