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
        'wp-rchr-swp',
        'callback_dev_menu_page',
        $temp_icon_url,
        90
    );
}
add_action('admin_menu', 'dev_menu_page');

function callback_dev_menu_page()
{
?>
    <div class="rchr-swiper-admin-menu">
        <?php
        echo form();
        echo plugin_dir_url(__DIR__) . 'assets/css/rchr-index.css'
        ?>

    </div>
    <?php
    echo test_enque_script();
    ?>
<?php
}
function form()
{
?>
    <form
        class="swiper-props-form"
        method="post"
        action="http://8-studio.local/wp-json/wp-rchr-swp/v1/edit">
        <div>
            <label>애니메이션 동작 시간</label>
            <input type="text" name="duration">
        </div>
        <input type="submit">

    </form>
<?php
}
function test_enque_script()
{
?>
    <h1 id="testRchrRoot"></h1>
<?php
}


add_action('admin_enqueue_scripts', 'my_enqueue');
function my_enqueue($hook)
{
    // @TODO[dfw23] Find out what hook mean
    // if ( 'myplugin_settings.php' !== $hook ) {
    // 	echo plugin_dir_url( __DIR__) . 'assets/css/rchr-index.css';
    // }

    wp_enqueue_style(
        'rchr-header',
        plugin_dir_url(__DIR__) . 'assets/css/rchr-index.css',
        array(),
        '1.0.0',
    );

    wp_enqueue_script(
        'rchr-header-js',
        plugin_dir_url(__DIR__) . 'assets/js/rchr-index.js',
        [],
        '1.0.0',
        array(
            'in_footer'  => 'defer',
        )
    );
}
?>