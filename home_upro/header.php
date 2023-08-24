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
    <section class="home-block inner-home-block">
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
        <div class="full-filter" style="display: none">
          <div class="full-filter-wrap">
            <form action="#" class="form-filter">
              <div class="border">

                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'city',
                  'parent'  => 0,
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap input-wrap-popup">
                    <p class="label-info"><?php _e('Місто', 'Home') ?></p>
                    <div class="nice-select">

                      <?php foreach ($terms as $index => $term): ?>
                        <?php if ($index == 0): ?>
                          <span class="current"><?= $term->name ?></span>
                        <?php endif ?>
                      <?php endforeach ?>

                      <div class="list">
                        <ul class="new">

                          <?php foreach ($terms as $index => $term): ?>
                            <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                              <label for="select-1-<?= $index + 1 ?>"></label>
                              <input type="radio" id="select-1-<?= $index + 1 ?>" name="city" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
                              <?= $term->name ?>
                            </li>
                          <?php endforeach ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                
                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'object_type',
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap input-wrap-popup input-wrap-img">
                    <p class="label-info"><?php _e('Тип об’єкта', 'Home') ?></p>
                    <div class="nice-select">

                      <?php foreach ($terms as $index => $term): ?>
                        <?php if ($index == 0): ?>
                          <span class="current"><?= $term->name ?></span>
                        <?php endif ?>
                      <?php endforeach ?>

                      <div class="list">
                        <ul class="new">

                          <?php foreach ($terms as $index => $term): ?>
                            <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                              <label for="select-2-<?= $index + 1 ?>"></label>
                              <input type="radio" id="select-2-<?= $index + 1 ?>" name="object_type" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>

                              <?php if ($field = get_field('icon', 'term_' . $term->term_id)): ?>
                                <?= wp_get_attachment_image($field['ID'], 'full') ?>
                              <?php endif ?>
                              
                              <?= $term->name ?>
                            </li>
                          <?php endforeach ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                
                <div class="input-wrap input-wrap-popup">
                  <p class="label-info"><?php _e('Район', 'Home') ?></p>
                  <div class="nice-select">
                    <span class="current"><?php _e('Район', 'Home') ?></span>
                    <div class="list">
                      <ul class="new">
                        <li class="option selected focus"><label for="select-3-1"></label><input type="checkbox" id="select-3-1" name="select-3-1">Район 1</li>
                        <li class="option"><label for="select-3-2"></label><input type="checkbox" id="select-3-2" name="select-3-2">Район 2</li>
                        <li  class="option"><label for="select-3-3"></label><input type="checkbox" id="select-3-3" name="select-3-3">Район 3</li>
                        <li  class="option"><label for="select-4-4"></label><input type="checkbox" id="select-4-4" name="select-4-4">Район 4</li>

                      </ul>
                    </div>
                  </div>
                </div>
                <div class="input-wrap input-wrap-search input-wrap-popup">
                  <label for="street-1-1"><?php _e('Вулиця', 'Home') ?></label>
                  <input type="text" name="street-1-1" id="street-1-1" class="street">
                  <p><img src="<?= get_stylesheet_directory_uri() ?>img/search.svg" alt=""></p>
                </div>
                <div class="input-wrap input-wrap-number">
                  <label for="count"><?php _e('Кількість кімнат', 'Home') ?></label>
                  <div class="flex">
                    <div class="btn-count btn-count-minus"><img src="<?= get_stylesheet_directory_uri() ?>/img/minus.svg" alt=""></div>
                    <input type="text" name="number_of_rooms" id="count" value="1" class="form-control"/>
                    <div class="btn-count btn-count-plus"><img src="<?= get_stylesheet_directory_uri() ?>/img/plus.svg" alt=""></div>
                  </div>
                </div>
                <div class="input-wrap input-wrap-2">
                  <label for="area1"><?php _e('Площа', 'Home') ?></label>
                  <label for="area2"></label>
                  <div class="flex space-between">
                    <input type="text" name="area1" id="area1" placeholder="<?php _e('від', 'Home') ?>">
                    <input type="text" name="area2" id="area2" placeholder="<?php _e('до', 'Home') ?>">
                  </div>
                </div>

                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'area',
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap-check flex input-wrap-check-2 space-between">

                    <?php foreach ($terms as $index => $term): ?>
                      <div class="wrap">
                        <input type="checkbox" name="type_area[]" id="type-area-<?= $index + 1 ?>">
                        <label for="type-area-<?= $index + 1 ?>"><?= $term->name ?></label>
                      </div>
                    <?php endforeach ?>

                  </div>
                <?php endif ?>

                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'condition',
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap input-wrap-popup">
                    <p class="label-info"><?php _e('Стан', 'Home') ?></p>
                    <div class="nice-select">

                      <?php foreach ($terms as $index => $term): ?>
                        <?php if ($index == 0): ?>
                          <span class="current"><?= $term->name ?></span>
                        <?php endif ?>
                      <?php endforeach ?>

                      <div class="list">
                        <ul class="new">

                          <?php foreach ($terms as $index => $term): ?>
                            <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                              <label for="select-5-<?= $index + 1 ?>"></label>
                              <input type="radio" id="select-5-<?= $index + 1 ?>" name="condition" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
                              <?= $term->name ?>
                            </li>
                          <?php endforeach ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                
                <div class="input-wrap input-wrap-2 ">
                  <label for="price1"><?php _e('Ціна', 'Home') ?></label>
                  <label for="price2"></label>
                  <div class="flex space-between">
                    <input type="text" name="price1" id="price1" placeholder="<?php _e('від', 'Home') ?>">
                    <input type="text" name="price2" id="price2" placeholder="<?php _e('до', 'Home') ?>">
                  </div>
                </div>
                <div class="input-wrap-check">
                  <div class="wrap">
                    <input type="checkbox" name="mortgage" id="mortgage">
                    <label for="mortgage"><?php _e('Іпотека', 'Home') ?></label>
                  </div>
                </div>

                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'builder',
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap input-wrap-popup">
                    <p class="label-info"><?php _e('Забудовник', 'Home') ?></p>
                    <div class="nice-select">
                      <span class="current"><?php _e('Оберіть забудовника', 'Home') ?></span>
                      <div class="list">
                        <ul class="new">

                          <?php foreach ($terms as $index => $term): ?>
                            <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                              <label for="select-6-<?= $index + 1 ?>"></label>
                              <input type="radio" id="select-6-<?= $index + 1 ?>" name="builder" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
                              <?= $term->name ?>
                            </li>
                          <?php endforeach ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                
                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'residential_complex',
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap input-wrap-popup">
                    <p class="label-info"><?php _e('Житловий комплекс', 'Home') ?></p>
                    <div class="nice-select">
                      <span class="current"><?php _e('Оберіть ЖК', 'Home') ?></span>
                      <div class="list">
                        <ul class="new">

                          <?php foreach ($terms as $index => $term): ?>
                            <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                              <label for="select-7-<?= $index + 1 ?>"></label>
                              <input type="radio" id="select-7-<?= $index + 1 ?>" name="residential_complex" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
                              <?= $term->name ?>
                            </li>
                          <?php endforeach ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                
                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'turn',
                  'hide_empty' => false,
                ] ) 
                ?>

                <?php if ($terms): ?>
                  <div class="input-wrap input-wrap-popup">
                    <p class="label-info"><?php _e('Черга', 'Home') ?></p>
                    <div class="nice-select">

                      <?php foreach ($terms as $index => $term): ?>
                        <?php if ($index == 0): ?>
                          <span class="current"><?= $term->name ?></span>
                        <?php endif ?>
                      <?php endforeach ?>

                      <div class="list">
                        <ul class="new">

                          <?php foreach ($terms as $index => $term): ?>
                            <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                              <label for="select-8-<?= $index + 1 ?>"></label>
                              <input type="radio" id="select-8-<?= $index + 1 ?>" name="turn" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
                              <?= $term->name ?>
                            </li>
                          <?php endforeach ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                
                <?php 
                $terms = get_terms( [
                  'taxonomy' => 'section',
                  'hide_empty' => false,
                ] ) 
                ?>

                <div class="input-wrap input-wrap-popup">
                  <p class="label-info"><?php _e('Секція', 'Home') ?></p>
                  <div class="nice-select">

                    <?php foreach ($terms as $index => $term): ?>
                      <?php if ($index == 0): ?>
                        <span class="current"><?= $term->name ?></span>
                      <?php endif ?>
                    <?php endforeach ?>

                    <div class="list">
                      <ul class="new">

                        <?php foreach ($terms as $index => $term): ?>
                          <li class="option<?php if($index == 0) echo ' selected focus' ?>">
                            <label for="select-9-<?= $index + 1 ?>"></label>
                            <input type="radio" id="select-9-<?= $index + 1 ?>" name="turn" value="<?= $term->term_id ?>"<?php if($index == 0) echo ' checked' ?>>
                            <?= $term->name ?>
                          </li>
                        <?php endforeach ?>

                      </ul>
                    </div>
                  </div>
                </div>
                <div class="input-wrap input-wrap-popup">
                  <p class="label-info">Автор</p>
                  <div class="nice-select">
                    <span class="current">Чумичкін</span>
                    <div class="list">
                      <ul class="new">
                        <li class="option selected focus "><label for="select-10-1"></label><input type="checkbox" id="select-10-1" name="select-10-1">Чумичкін 1</li>
                        <li class="option"><label for="select-10-2"></label><input type="checkbox" id="select-10-2" name="select-10-2">Чумичкін 2</li>
                        <li  class="option"><label for="select-10-3"></label><input type="checkbox" id="select-10-3" name="select-10-3">Чумичкін 3</li>

                      </ul>
                    </div>
                  </div>
                </div>
                <div class="input-wrap-check input-wrap-check-more">
                  <p class="label-info">Особливості</p>
                  <div class="wrap flex">
                    <div class="item">
                      <input type="checkbox" name="check-1" id="check-1-1">
                      <label for="check-1-1">Ексклюзив</label>
                    </div>
                    <div class="item">
                      <input type="checkbox" name="check-1" id="check-1-2">
                      <label for="check-1-2">Усна домовленість</label>
                    </div>
                    <div class="item">
                      <input type="checkbox" name="check-1" id="check-1-3">
                      <label for="check-1-3">Партнерський продаж</label>
                    </div>
                    <div class="item">
                      <input type="checkbox" name="check-1" id="check-1-4">
                      <label for="check-1-4">Бартер</label>
                    </div>
                    <div class="item">
                      <input type="checkbox" name="check-1" id="check-1-5">
                      <label for="check-1-5">Ключі</label>
                    </div>
                    <div class="item">
                      <input type="checkbox" name="check-1" id="check-1-6">
                      <label for="check-1-6">Об'єкт з дошки оголошень</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="input-submit flex">
                <a href="#" class="btn-default btn">Переглянути</a>
                <button type="submit" class="btn-default btn-border btn">Зкинути</button>
              </div>
            </form>
          </div>
        </div>

        <div class="prev-page">
          <a href="#" class="btn btn-border btn-default"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt="">Назад</a>
        </div>