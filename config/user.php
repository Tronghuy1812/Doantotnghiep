<?php

return [
    'menu' => [
        [
            'title' => 'Tổng quan',
            'route' => 'get_user.dashboard',
            'icon' => 'fa fa-dashboard'
        ],
        [
            'title' => 'Thông tin',
            'route' => 'get_user.info',
            'icon' => 'fa fa-info'
        ],
        [
            'title' => 'Giao dịch',
            'route' => 'get_user.transaction',
            'icon' => 'fa fa-paypal'
        ],
        [
            'title' => 'Yêu thích',
            'route' => 'get_user.favourite',
            'icon' => 'fa fa-heart'
        ]
    ]
];
