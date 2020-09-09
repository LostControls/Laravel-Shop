<?php
return [
    'alipay' => [
        'app_id'         => env('ALIPAY_APP_ID',''),
        'ali_public_key' => env('ALI_PUBLIC_KEY',''),
        'private_key'    => env('PRIVATE_KEY',''),
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
        'mode' => 'dev'
    ],

    'wechat' => [
        'app_id'      => env('WECHAT_APP_ID',''),   // 公众号 app id
        'mch_id'      => env('WECHAT_MCH_ID',''),  // 第一步获取到的商户号
        'key'         => env('WECHAT_KEY',''),    // 刚刚设置的 API 密钥
        'cert_client' => resource_path('wechat_pay/apiclient_cert.pem'),
        'cert_key'    => resource_path('wechat_pay/apiclient_key.pem'),
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
