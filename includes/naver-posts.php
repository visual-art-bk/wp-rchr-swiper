<?php
header('Content-Type: application/json');

$blogId = 'spmsystem20';
$url = "https://m.blog.naver.com/api/blogs/{$blogId}/post-list?categoryNo=0&itemCount=24&page=1&userId={$blogId}";

$response = wp_remote_get($url, [
    'headers' => [
        'User-Agent' => 'Mozilla/5.0',
        'Accept' => 'application/json',
    ]
]);

if (is_wp_error($response)) {
    echo json_encode(['error' => '네이버 API 요청 실패']);
    exit;
}

echo wp_remote_retrieve_body($response);
