<!doctype html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header>
    <div class="top-line">
      <div class="content-width">

        <?php if ($field = get_field('logo_header', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>
        
        <nav class="top-menu">
          <ul>
            <li class="current-page">
              <a href="#">
                <figure>
                  <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2-1.svg" alt="">
                </figure>
                <p>Об’єкти</p>
              </a>
            </li>
            <li>
              <a href="#">
                <figure>
                  <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2-2.svg" alt="">
                </figure>
                <p>Продано</p>
              </a>
            </li>
            <li class="center">
              <a href="#">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt="">
              </a>
            </li>
            <li>
              <a href="#">
                <figure>
                  <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2-3.svg" alt="">
                </figure>
                <p>Обране</p>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="img-wrap">
                  <img src="<?= get_stylesheet_directory_uri() ?>/img/img-1.jpg" alt="">
                </span>
                <p>Нікіта</p>
              </a>
            </li>
          </ul>
        </nav>
        <div class="login-wrap">
          <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-8.svg" alt=""> <span>log out</span></a>
        </div>
      </div>
    </div>
  </header>

  <main>

    <?php 
    $section_class = '';
    if(is_front_page()) $section_class = 'home-block-default';
    if(is_singular('objects')) $section_class = 'inner-home-block';
    ?>

    <section class="home-block <?= $section_class ?>">
      <div class="content-width">

        <div class="filter-block">
          <div class="form-wrap">

            <?php get_search_form() ?>

            <div class="wrap-filter">
              <a href="#" class="filter-btn btn-default "><img src="<?= get_stylesheet_directory_uri() ?>/img/filter.svg" alt=""></a>
            </div>
          </div>
          <div class="sort-wrap">
            <a href="#sort" class="btn-sort btn-default fancybox"><img src="<?= get_stylesheet_directory_uri() ?>/img/sort.svg" alt=""></a>
          </div>
        </div>

        <?php get_template_part('parts/filter', 'objects') ?>

        <div class="prev-page">
          <a href="#" class="btn btn-border btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt="">Назад</a>
        </div>