<?php
include __DIR__ . '/includes/dev-shortcode.php';
include __DIR__ . '/includes/dev-menu-page.php';
/**
 * Plugin Name: wp-rchr-swiper
 * Description: 뤼초록에서 개발한 스와이퍼입니다.
 * Author: 뤼초록 김병관
 * Version: 1.0.0
 */
function admin_wp_rchr_swiper() {}
add_action('admin_menu', 'admin_wp_rchr_swiper');