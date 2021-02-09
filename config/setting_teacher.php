<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 2/9/21 .
 * Time: 10:58 AM .
 */

return [
    'sidebar' => [
        [
            'name' => 'Tổng quan',
            'route' => 'get_teacher.dashboard',
            'class-icon' => 'la la-tachometer-alt'
        ],
        [
            'name' => 'Khoá học',
            'class-icon' => 'la la-database',
            'sub' => [
                [
                    'name' => 'Danh sách',
                    'route' => 'get_teacher.course.index'
                ]
            ]
        ],
        [
            'name' => 'Đơn hàng',
            'class-icon' => 'la la-cart-arrow-down',
            'sub' => [
                [
                    'name' => 'Danh sách',
                    'route' => 'get_admin.transaction.index'
                ]
            ]
        ]
    ]
];
