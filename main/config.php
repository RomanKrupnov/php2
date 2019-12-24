<?php
return [
    'defaultController' => 'user',
    'components' => [
        'db' => [
            'class' => \App\services\db::class,
            'config' => [
                'driver' => 'mysql',
                'host' => 'localhost;port=3307',
                'db' => 'image_db',
                'charset' => 'UTF8',
                'username' => 'root',
                'password' => '',
            ],
        ],
        'render' => [
            'class' => \App\services\renders\TwigRender::class,
            ],
        'userRepository' => [
            'class' => \App\repositories\UserRepository::class,
        ],
        'goodRepository' => [
            'class' => \App\repositories\GoodRepository::class,
        ],
        'basketRepository' =>[
            'class' => \App\repositories\BasketRepository::class,

        ],
        'filesRepository' =>[
            'class' => \App\repositories\FilesRepository::class,
        ],

        'loginRepository' =>[
            'class' => \App\repositories\LoginRepository::class,
        ],
        'orderRepository' =>[
            'class' => \App\repositories\OrderRepository::class,
        ],
        'userARepository' =>[
            'class' => \App\repositories\UserARepository::class,
        ],
        'userService' => [
            'class' => \App\services\UserService::class,
        ],
        'basketService' => [
            'class' => \App\services\BasketService::class,
        ],
        'goodService' => [
            'class' => \App\services\GoodService::class,
        ],
        'orderService' => [
            'class' => \App\services\OrderService::class,
        ],





    ]

];