<?php

require_once 'vendor/autoload.php';
use HTTPClient\Nano;

// ساخت یک شیء از کلاس HTTPClient با آدرس پایه سرور "http://example.com"
$client = new Nano("http://example.com");

// ارسال درخواست GET به آدرس "/api/users" با پارامترهای "page=1" و "per_page=10"
$response = $client->get("/api/users", ["page" => 1, "per_page" => 10]);

// نمایش پاسخ دریافتی از سرور
echo $response;
