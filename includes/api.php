<?php

function get_namespaces()
{
    return (object)[
        "v1" => "wp-rchr-swp/v1"
    ];
}
function api_edit_duration_of_swiper()
{
    $namespace_v1 = get_namespaces()->v1;
    $pathname = 'edit';


    register_rest_route(
        $namespace_v1,
        $pathname,
        [
            "methods" => "POST",
            "callback" => 'callback_api_edit_duration_of_swiper'
        ]
    );
}
add_action('rest_api_init', "api_edit_duration_of_swiper");

function callback_api_edit_duration_of_swiper()
{
    edit_duration();
    redirect();
}
function edit_duration()
{
    global $wpdb;
    $table = $wpdb->prefix . 'rchr-swp';

    $duration = $_POST['duration'];
    $data = [
        'duration' => $duration
    ];
    $wpdb->show_errors();

    $wpdb->insert($table, $data);

    $wpdb->print_error();

    return $data;
}
function redirect()
{
    $urlparts = wp_parse_url(home_url());
    $scheme = $urlparts['scheme'];
    $domain = $urlparts['host'];

    header("Location: {$scheme}://{$domain}/wp-admin/admin.php?page=wp-rchr-swp");
}
