<form action="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>" method="GET" class="full-filter" style="display: none" id="filter_objects">
  <input type="hidden" name="sort">
  <div class="full-filter-wrap">
    <div class="form-filter">
      <div class="border">

        <?php 
        $cities = get_terms( [
          'taxonomy' => 'city',
          'parent'  => 0,
          'hide_empty' => false,
        ] ) 
        ?>

        <?php if ($cities): ?>
          <div class="input-wrap input-wrap-popup">
            <p class="label-info"><?php _e('Місто', 'Home') ?></p>
            <div class="nice-select">
              <span class="current"><?php _e('Місто', 'Home') ?></span>
              <div class="list">
                <ul class="new">
                  <li class="option selected focus">
                    <label for="select-1-0"></label>
                    <input type="radio" id="select-1-0" name="city" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($cities as $index => $term): ?>
                    <li class="option">
                      <label for="select-1-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-1-<?= $index + 1 ?>" name="city" value="<?= $term->term_id ?>">
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
              <span class="current"><?php _e('Тип об’єкта', 'Home') ?></span>
              <div class="list">
                <ul class="new">
                  <li class="option selected focus">
                    <label for="select-2-0"></label>
                    <input type="radio" id="select-2-0" name="object_type" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($terms as $index => $term): ?>
                    <li class="option">
                      <label for="select-2-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-2-<?= $index + 1 ?>" name="object_type" value="<?= $term->term_id ?>">

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

        <?php 
        $districts = get_terms( [
          'taxonomy' => 'city',
          'parent'  => $cities[0]->term_id,
          'hide_empty' => false,
        ] ) 
        ?>

        <?php if ($cities && $districts): ?>
          <div class="input-wrap input-wrap-popup">
            <p class="label-info"><?php _e('Район', 'Home') ?></p>
            <div class="nice-select">
              <span class="current" id="current_district"><?php _e('Район', 'Home') ?></span>
              <div class="list">
                <ul class="new" id="districts">
                  <li class="option selected focus">
                    <label for="select-3-0"></label>
                    <input type="radio" id="select-3-0" name="district" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($districts as $index => $term): ?>
                    <li class="option">
                      <label for="select-3-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-3-<?= $index + 1 ?>" name="district" value="<?= $term->term_id ?>">
                      <?= $term->name ?>
                    </li>
                  <?php endforeach ?>

                </ul>
              </div>
            </div>
          </div>
        <?php endif ?>

        <div class="input-wrap input-wrap-search input-wrap-popup">
          <label for="street"><?php _e('Вулиця', 'Home') ?></label>
          <input type="text" name="street" id="street" class="street">
          <p><img src="<?= get_stylesheet_directory_uri() ?>/img/search.svg" alt=""></p>
        </div>
        <div class="input-wrap input-wrap-number">
          <label for="count"><?php _e('Кількість кімнат', 'Home') ?></label>
          <div class="flex">
            <div class="btn-count btn-count-minus"><img src="<?= get_stylesheet_directory_uri() ?>/img/minus.svg" alt=""></div>
            <input type="number" name="number_of_rooms" min="1" step="1" id="count" value="" class="form-control"/>
            <div class="btn-count btn-count-plus"><img src="<?= get_stylesheet_directory_uri() ?>/img/plus.svg" alt=""></div>
          </div>
        </div>
        <div class="input-wrap input-wrap-2">
          <label for="area1"><?php _e('Площа', 'Home') ?></label>
          <label for="area2"></label>
          <div class="flex space-between">
            <input type="number" name="area1" min="0" step="1" id="area1" placeholder="<?php _e('від', 'Home') ?>">
            <input type="number" name="area2" min="0" step="1" id="area2" placeholder="<?php _e('до', 'Home') ?>">
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
              <span class="current"><?php _e('Стан', 'Home') ?></span>
              <div class="list">
                <ul class="new">
                  <li class="option selected focus">
                    <label for="select-5-0"></label>
                    <input type="radio" id="select-5-0" name="condition" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($terms as $index => $term): ?>
                    <li class="option">
                      <label for="select-5-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-5-<?= $index + 1 ?>" name="condition" value="<?= $term->term_id ?>">
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
            <input type="number" name="price1" min="0" step="1" id="price1" placeholder="<?php _e('від', 'Home') ?>">
            <input type="number" name="price2" min="0" step="1" id="price2" placeholder="<?php _e('до', 'Home') ?>">
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
                  <li class="option selected focus">
                    <label for="select-6-0"></label>
                    <input type="radio" id="select-6-0" name="builder" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($terms as $index => $term): ?>
                    <li class="option">
                      <label for="select-6-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-6-<?= $index + 1 ?>" name="builder" value="<?= $term->term_id ?>">
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
                  <li class="option selected focus">
                    <label for="select-7-0"></label>
                    <input type="radio" id="select-7-0" name="residential_complex" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($terms as $index => $term): ?>
                    <li class="option">
                      <label for="select-7-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-7-<?= $index + 1 ?>" name="residential_complex" value="<?= $term->term_id ?>">
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
              <span class="current"><?php _e('Черга', 'Home') ?></span>
              <div class="list">
                <ul class="new">
                  <li class="option selected focus">
                    <label for="select-8-0"></label>
                    <input type="radio" id="select-8-0" name="turn" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($terms as $index => $term): ?>
                    <li class="option">
                      <label for="select-8-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-8-<?= $index + 1 ?>" name="turn" value="<?= $term->term_id ?>">
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
            <span class="current"><?php _e('Секція', 'Home') ?></span>
            <div class="list">
              <ul class="new">
                <li class="option selected focus">
                  <label for="select-9-0"></label>
                  <input type="radio" id="select-9-0" name="section" value="" checked>
                  <?php _e('Всі', 'Home') ?>
                </li>

                <?php foreach ($terms as $index => $term): ?>
                  <li class="option">
                    <label for="select-9-<?= $index + 1 ?>"></label>
                    <input type="radio" id="select-9-<?= $index + 1 ?>" name="section" value="<?= $term->term_id ?>">
                    <?= $term->name ?>
                  </li>
                <?php endforeach ?>

              </ul>
            </div>
          </div>
        </div>

        <?php $users = get_users() ?>

        <?php if ($users): ?>
          <div class="input-wrap input-wrap-popup">
            <p class="label-info"><?php _e('Автор', 'Home') ?></p>
            <div class="nice-select">
              <span class="current"><?php _e('Автор', 'Home') ?></span>
              <div class="list">
                <ul class="new">
                  <li class="option selected focus">
                    <label for="select-10-0"></label>
                    <input type="radio" id="select-10-0" name="author" value="" checked>
                    <?php _e('Всі', 'Home') ?>
                  </li>

                  <?php foreach ($users as $index => $user): ?>

                    <li class="option">
                      <label for="select-10-<?= $index + 1 ?>"></label>
                      <input type="radio" id="select-10-<?= $index + 1 ?>" name="author" value="<?= $user->ID ?>">
                      <?= $user->data->display_name ?>
                    </li>

                  <?php endforeach ?>

                </ul>
              </div>
            </div>
          </div>
        <?php endif ?>

        <?php 
        $terms = get_terms( [
          'taxonomy' => 'features',
          'hide_empty' => false,
        ] ) 
        ?>

        <?php if ($terms): ?>
          <div class="input-wrap-check input-wrap-check-more">
            <p class="label-info"><?php _e('Особливості', 'Home') ?></p>
            <div class="wrap flex">

              <?php foreach ($terms as $index => $term): ?>
                <div class="item">
                  <input type="checkbox" name="features[]" id="check-1-<?= $index + 1 ?>" value="<?= $term->term_id ?>">
                  <label for="check-1-<?= $index + 1 ?>"><?= $term->name ?></label>
                </div>
              <?php endforeach ?>

            </div>
          </div>
        <?php endif ?>

      </div>
      <div class="input-submit flex">
        <button type="submit"class="btn-default btn"><?php _e('Переглянути', 'Home') ?></button>
        <a href="#" class="btn-default btn-border btn" id="filter_objects_reset"><?php _e('Зкинути', 'Home') ?></a>
      </div>
      <input type="hidden" name="action" value="filter_objects">
    </div>
  </div>
</form>