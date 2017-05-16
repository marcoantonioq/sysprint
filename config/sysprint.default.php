<?php
return [
    'debug' => 1,
    "SYSPRINT" => [
        'GLOBAL'=> [
            "status"=> "0",
            "debug"=> "0",
            "title"=> "IFPrints",
            "hostname"=> "",
            "locale"=> "pt-br",
            "bootstraps"=> "",
            "date_time_format"=> "D, M d Y H=>i=>s",
            "force_https"=> "0",
            "descrition"=> "",
        ],
        'MODULES' => [
            "AUTH" => [
                "enable"=> 0,
                "Config" => [
                    'authorize' => ['Controller'],
                    'loginRedirect' => '/',
                    'logoutRedirect' => '/',
                    'loginAction' => [
                        'plugin' => 'AuthUser',
                        'controller' => 'Users',
                        'action' => 'login',
                    ],
                    'flash' => ['element' => 'Template.error'],
                    'authenticate' => [
                        'Form' => [
                            'fields' => ['username' => 'username','password' => 'password'],
                            // 'scope'  => ['Users.status' => 1],
                        ]
                    ]
                ]
            ],
            "AD"=> [
                "enable"=> 0,
                "Config" => [
                    "ldap_host"=> "192.168.1.1",
                    "ldap_port"=> "389",
                    "base_dn"=> "OU=SYSPrint,DC=sys,DC=br",
                    "ldap_user"=> "user_ad",
                    "ldap_pass"=> "password_ad",
                    "suffix"=> "@sysprint.br",
                    "attr"=> "name,displayname,mail,mobile,homephone,telephonenumber,streetaddress,postalcode,physicaldeliveryofficename,l,group,thumbnailphoto,memberof",
                    "filter"=> ""
                ]
            ],
            // "EMAIL"=> [
            //     "email_notification"=> "0",
            //     "transport"=> "Smtp",
            //     "title"=> "SYSPrint",
            //     "from"=> "marco.aq7@gmail.com",
            //     "host"=> "ssl=>\\\/\\\/smtp.gmail.com",
            //     "port"=> "465",
            //     "timeout"=> "30",
            //     "username"=> "marco.aq7@gmail.com",
            //     "password"=> "",
            //     "log"=> "",
            //     "charset"=> "",
            //     "headerCharset"=> ""
            // ],
        ],
    ],
];

