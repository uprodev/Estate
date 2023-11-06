<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class('lading'); ?>>
  <?php wp_body_open(); ?>
  <header>
    <div class="top-line-lading">
      <div class="content-width">

        <?php if ($field = get_field('logo_header', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>

        <nav class="top-menu-lading">

          <?php wp_nav_menu( array(
            'theme_location'  => 'header',
            'container'       => '',
            'items_wrap'      => '<ul>%3$s</ul>'
          ) ); ?>

          <div class="btn-wrap">
            <div class="wrap">

              <?php if ($field = get_field('link_header', 'option')): ?>
                <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
              <?php endif ?>

              <?php $terms = get_field('cities_header', 'option') ?>

              <?php if ($terms): ?>
                <div class="nice-select">
                  <span class="current"><?= mb_convert_case(mb_strtolower($terms[0]->name), MB_CASE_TITLE) ?></span>
                  <div class="list">
                    <ul class="new">

                      <?php foreach ($terms as $index => $term): ?>
                        <li class="option region<?php if($index == 0) echo ' selected focus' ?>" region_id="<?= $term->term_id ?>">
                          <a href="#"><?= mb_convert_case(mb_strtolower($term->name), MB_CASE_TITLE) ?></a>
                        </li>
                      <?php endforeach ?>

                    </ul>
                  </div>
                </div>
              <?php endif ?>
              
            </div>

            <?php if ($field = get_field('button_header', 'option')): ?>
              <a href="<?= $field['url'] ?>" class="btn-default btn-border"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
            <?php endif ?>

          </div>
          <div class="open-menu-land">
            <a href="#">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <div class="menu-responsive-land" id="menu-responsive-land" style="display: none">
    <div class="top">
      <div class="close-menu-land">
        <a href="#"><img src="<?= get_stylesheet_directory_uri() ?>/img/lading/close.svg" alt=""></a>
      </div>
    </div>
    <div class="wrap">

      <?php if ($field = get_field('logo_header', 'option')): ?>
        <div class="logo-wrap">
          <a href="<?= get_home_url() ?>">
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          </a>
        </div>
      <?php endif ?>

      <nav class="mob-menu-land">

        <?php wp_nav_menu( array(
          'theme_location'  => 'header',
          'container'       => '',
          'items_wrap'      => '<ul>%3$s</ul>'
        ) ); ?>

        <div class="btn-wrap">

          <?php if ($field = get_field('link_header', 'option')): ?>
            <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          <?php endif ?>

          <?php if ($terms): ?>
            <div class="nice-select">
              <span class="current"><?= mb_convert_case(mb_strtolower($terms[0]->name), MB_CASE_TITLE) ?></span>
              <div class="list">
                <ul class="new">

                  <?php foreach ($terms as $index => $term): ?>
                    <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                      <a href="#"><?= mb_convert_case(mb_strtolower($term->name), MB_CASE_TITLE) ?></a>
                    </li>
                  <?php endforeach ?>

                </ul>
              </div>
            </div>
          <?php endif ?>

          <?php if ($field = get_field('button_header', 'option')): ?>
            <a href="<?= $field['url'] ?>" class="btn-default btn-border"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
          <?php endif ?>

        </div>
      </nav>
    </div>
  </div>

  <main>