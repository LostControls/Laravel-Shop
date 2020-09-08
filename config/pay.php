<?php
return [
    'alipay' => [
        'app_id'         => '2021000116690132',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAghAwrMuTeFnLClGvOn3V5fafDfw5rjNrD9fcMWAYyn1ylWylFIrDAO0/fmTkidaM+QtrPQLvKSgCRsW0+7+CvXuJkhub3qcRMaVmcRjUCUsn0LMjjkAytY33OD+oqfvltacHTcc1/IY0AlJ0tCSLJT5KGE2zGp7UJX+zW9RY3rEZqiyG4vOytEWTvw2GlvWMlUYRkcRYmR9v1gqm03j9Urw3lKeYiZQk8yO3REEYMY2zvPzRiYpBBXePIJrHYabfFoIQeRu8PXRfJ01Tw8FSWJtZKT4ayooLTwHsb3l/qM77R7kH/ONNW+ey1iALTqogdmEtPiDiBVUN/f5A5mAkWwIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEAht9JLSk/0T9O224txIePFzhu4XPI5D3K2k5OmQ2FWr3CacnbJWEe/HfWQ5+cQJjcwe2pQQIUMwmUxdqn3Nq7uGAmuhz57PQ2YEA/qQ8JNFmUzwb8wd0u8oFxVLzT2kPGF7fYWDjh/4BPfVZbUA/V8Z9GaqAqrYjf+lpiugB2KvYHQ54lXcDjNIaEjxIDRVo7ubAbdRgv+GRCcasnP/fA7Kqy7XJVj043LUh/NFnWFx0Sb4LMP5gWFS20Em1SHFBaoKL+R6G0uGI6Fw0q0pKQcYV1cIgPM7nmMMz38PZUoIBB5L23PZmp6NxsXDzeoITqfegtyDU2JuIWTQDt5Y5fFwIDAQABAoIBAAh+x/0wO/TSKAVqSze10i2EQHey81RtD/nwNMMvNtcgXL6NGGCiXXFJmxVnWFA5UK5maeLOXrdYQyazPx+KJ4jVhZrzeEqUl1g4s8nSSKIjglwH9KPBatObk6fivPVij3eu/NGRw6p0So16gwXn+XHetnDA5e9IT9NVHiLZJJhQD3sXQ58IXZ8SvYXQ341KdQ80+0n8Nb/45jsMXNZM2Svrt/xpGdtSKmiZb6bacpsPY1y3Drzn4Ki68eOXPNKcbu1bfF6pSIkj/b0gtxJbOy3Ay056k1njtRPB+t3fRlRk5s6RQqfVD6XetDKzyXq/fFxEc3mBLZ0F2gQwLt5XHwECgYEAvfAMvCYMwh/NilDz1lQ2OxvKgljJmQgJP1prweeVLxqF0jLDk8j7eY0xb3kXSiV2bHwbFsikw/GlidqYE/qTFnq3mfMyEy4Zh6wz6WDMzHTum2ZMe1Pinwt33SXv7i/lyH3FudtkvRAYP9ty8l9+QKXGx4gG1/ksACd1otWp2+MCgYEAtcg8KFS6SktGFny6niwOBvaTlTSl7IJMvGV5cxJTt/mH3EGPm8uH94AZhsiGbNe6l08Jui4bKWs/En61dxJIFeXFFVAd0gKPtlElZfeVTFwYRj12/8CkvMKph/MUB/LiNrTbI4R09RldWREpalxAw+f0w6YYGNUvskyZ/MQcPj0CgYA8lhrp1VVSguSEj2gIYRpfZnEFfR7pYqfYfpZK5v0uZk5zi1/Zf03AKyquvTiRnTuWRUw6y0vLeQRt4b2K+e37SK/SOsIpXhYksehpNEh/m3kVNt+Eo3BxfS4B6/0JxFuOxZfRvkr3B/BERlL3P0C9jGPI9/n+4GuJrQyYIYGqMwKBgGAe9yBkXPU4BGGTpqJIrUolTDiTVEFRTP45shSU1kvr2FkxGZzJ7KWEyPqqQdp/4BxuILif9KDcIsfG1HGX6yIZEzOH35zS2ecP1XSri/iKohNSIQBvfyyIylgmwqrJVbCTxWRsf+Oye9fC6WFiUqTEnHpv80H+SHBBbRNpJ34JAoGBALDpFTsF9KZE/sUmevpfL1N2oEwD4HMCZSVbmI2EkRS3fr+oCTcpkTRqDJ+r6n2W//5WXyAGwoydZhucWS+7oMfhaWmSyhCjCyxGdT0LdpdqB7fe17du6HT7j1VuJP4GOfyq18KAS1klxQ0x1aYIWKEryPTINh5cyHzEgTWQKtpC',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
        'mode' => 'dev'
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
