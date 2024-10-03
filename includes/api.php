<?php

function get_namespaces()
{
    return (object)[
        "v1" => "wp-rchr-swp/v1"
    ];
}


function apt_edit_duration_of_swiper()
{
    $namespace_v1 = get_namespaces()->v1;
    $pathname = 'edit';


    register_rest_route(
        $namespace_v1,
        $pathname,
        [
            "methods" => "GET",
            "callback" => 'callback_apt_edit_duration_of_swiper'
        ]
    );
}
function callback_apt_edit_duration_of_swiper() {}
