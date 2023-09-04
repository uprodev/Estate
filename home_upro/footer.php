    <?php if (!is_page_template('page-templates/login.php')): ?>
    </div>
  </section>  
<?php endif ?>

</main>

<footer>
  <div class="content-width">

  </div>
</footer>

<div id="sort" class="popup-select popup-scroll" style="display:none;">
  <div class="wrap">
    <div class="popup-main">
      <div class="form-select">
        <ul>
          <li>
            <input type="radio" name="sort_name" id="sort-1-1" value="date">
            <label for="sort-1-1"><?php _e('Найновіші', 'Home') ?></label>
          </li>
          <li>
            <input type="radio" name="sort_name" id="sort-1-2" value="price_min">
            <label for="sort-1-2"><?php _e('Найдешевші', 'Home') ?></label>
          </li>
          <li>
            <input type="radio" name="sort_name" id="sort-1-3" value="price_max">
            <label for="sort-1-3"><?php _e('Найдорожчі', 'Home') ?></label>
          </li>
          <li>
            <input type="radio" name="sort_name" id="sort-1-4" value="area_min">
            <label for="sort-1-4"><?php _e('Найменша площа', 'Home') ?></label>
          </li>
          <li>
            <input type="radio" name="sort_name" id="sort-1-5" value="area_max">
            <label for="sort-1-5"><?php _e('Найбільша площа', 'Home') ?></label>
          </li>
        </ul>
      </div>
    </div>
    <div class="btn-wrap">
      <button class="close-popup" data-fancybox-close type="submit"><img src="<?= get_stylesheet_directory_uri() ?>/img/close-popup.svg" alt=""></button>
    </div>
  </div>
</div>

<div class="fix-menu">
  <div class="content-width">
    <nav class="mob-menu">
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
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>