<?php

function dev_menu_page()
{
    $menu_title = '뤼초록 스와이퍼';
    $capability = 'manage_options';

    // @TODO[rser32] change temp to the icon.
    // $icon_url = plugins_url('wp-rchr-swiper/assets/rchr_wordpress_plugin_icon.png');
    $temp_icon_url = '';

    add_menu_page(
        'Header & Footer Script',
        $menu_title,
        $capability,
        'menu',
        'callback_dev_menu_page',
        $temp_icon_url,
        90
    );
}
add_action('admin_menu', 'dev_menu_page');

function callback_dev_menu_page()
{
?>
    <di class="rchr-swiper-admin-menu">
        <?php
        echo form();
        ?>
        </div>

    <?php
}
function form()
{
    ?>
        <form
            class="swiper-props-form"
            method="post"
            action=""
            >
            <div>
                <label>애니메이션 동작 시간</label>
                <input type="text">
            </div>
            <input type="submit">

        </form>
    <?php
}

    ?>