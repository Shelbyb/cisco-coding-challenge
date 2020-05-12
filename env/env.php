<?php
$variables = [
    'MS_CLIENT_ID' => 'dfe94d37-0551-457e-a54e-55ed452edd9a',
    'MS_TENANT_ID' => 'fd99e66c-fa05-46c5-9881-4e59e3fbfb89',
    'MS_SECRET_ID' => 'xzEpLGMKSPNvUdBO-8xb3s8_g1LGxm-]',
    'USER_EMAIL' => 'shelby.brayton@gmail.com',
    'USER_PASSWORD' => 'makeworklesswork11!!',
];

// Loop through all of our array of variables we want to be environment variables
foreach ($variables as $key => $value) {
    putenv("$key=$value");
}