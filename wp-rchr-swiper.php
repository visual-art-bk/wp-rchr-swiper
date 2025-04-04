<?php
include __DIR__ . '/includes/admin-screens.php';
include __DIR__ . '/includes/api.php';
/**
 * Plugin Name: wp-rchr-swiper
 * Description: 뤼초록에서 개발한 네이버 블로그 미들웨어입니다.
 * Author: 뤼초록
 * Version: 1.0.0
 */
function admin_wp_rchr_swiper() {}
add_action('admin_menu', 'admin_wp_rchr_swiper');
