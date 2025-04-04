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

/**
 * Summary of api_naver_blog_posts_fetch
 * 이 함수는 네이버 
 * @return void
 */function api_naver_blog_posts_fetch(): void
{
    $namespace_v1 = get_namespaces()->v1;
    $path = 'naver-posts';

    register_rest_route(
        $namespace_v1,
        $path,
        [
            "methods"  => "GET",
            "callback" => "cb_to_api_naver_posts",
            "permission_callback" => '__return_true', // 필요시 권한 제한 가능
        ]
    );
}
add_action('rest_api_init', "api_naver_blog_posts_fetch");

function cb_to_api_naver_posts()
{
    $blogId = 'spmsystem20';
    $url = "https://m.blog.naver.com/api/blogs/{$blogId}/post-list?categoryNo=0&itemCount=24&page=1&userId={$blogId}";

    $response = wp_remote_get($url, [
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            'Accept'     => 'application/json',
            'Referer'    => "https://m.blog.naver.com/{$blogId}?tab=1"
        ]
    ]);

    if (is_wp_error($response)) {
        return new WP_Error('naver_api_error', '네이버 API 요청 실패', ['status' => 500]);
    }

    $body = wp_remote_retrieve_body($response);
    
    return json_decode($body, true);
}

// function add_items_test()
// {
//     global $wpdb;
//     $table = $wpdb->prefix . 'naver_posts_items';

//     // $backgroundImageUrl = $_POST['backgroundImageUrl'];
//     // $href = $_POST['href'];
//     // $productNumber = $_POST['productNumber'];
//     // $title = $_POST['title'];
//     // $description = $_POST['description'];

//     $data = array(
//         'titleWithInspectMessage' => '테스트1',
//         'encodedThumbnailUrl' => '테스트1',
//         'briefContents' => '테스트1'
//     );
//     $wpdb->show_errors();

//     $wpdb->insert($table, $data);

//     // $wpdb->print_error();


//     // $urlparts = wp_parse_url(home_url());
//     // $scheme = $urlparts['scheme'];
//     // $domain = $urlparts['host'];
//     // $pathname = 'edit';

//     // header("Location: {$scheme}://{$domain}/{$pathname}");
//     // die();
// }
