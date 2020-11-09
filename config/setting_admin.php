<?php
return [
    'sidebar' => [
        [
            'name' => 'Tổng quan',
            'route' => 'get_admin.dashboard',
            'class-icon' => 'la la-tachometer-alt'
        ],
        [
            'name' => 'Khoá học',
            'class-icon' => 'la la-book-open',
            'sub' => [
                [
                    'name' => 'Từ khoá',
                    'route' => 'get_admin.tag.index'
                ],
                [
                    'name' => 'Danh mục',
                    'route' => 'get_admin.category.index'
                ],
                [
                    'name' => 'Giáo viên',
                    'route' => 'get_admin.teacher.index'
                ],
                [
                    'name' => 'Khoá học',
                    'route' => 'get_admin.course.index'
                ],
            ]
        ],
        [
            'name' => 'Tin tức && Sự kiện',
            'class-icon' => 'la la-edit',
            'sub' => [
                [
                    'name' => 'Từ khoá',
                    'route' => 'get_admin.keyword.index'
                ],
                [
                    'name' => 'Menu',
                    'route' => 'get_admin.menu.index'
                ],
                [
                    'name' => 'Bài viết',
                    'route' => 'get_admin.article.index'
                ],
            ]
        ],
        [
            'name' => 'Người dùng',
            'class-icon' => 'la la-user',
            'sub' => [
                [
                    'name' => 'Thành viên',
                    'route' => 'get_admin.user.index'
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
        ],
        [
            'name' => 'Dữ liệu nền',
            'class-icon' => 'la la-database',
            'sub' => [
                [
                    'name' => 'Slide',
                    'route' => 'get_admin.slide.index'
                ]
            ]
        ],
        [
            'name' => 'Admin',
            'class-icon' => 'la la-cogs',
            'sub' => [
                [
                    'name' => 'Permission',
                    'route' => 'get_admin.permission.index'
                ],
                [
                    'name' => 'Role',
                    'route' => 'get_admin.role.index'
                ],
                [
                    'name' => 'Quản trị viên',
                    'route' => 'get_admin.account.index'
                ],
            ]
        ],
    ]
];
