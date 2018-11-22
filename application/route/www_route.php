<?php
use think\Route;
Route::get('/','www/index/index');//FX主页
    Route::post('/contact_us','www/index/contact_us');//联系我们提交


Route::get('/application','www/application/application');//应用

Route::get('/news','www/news/news');//新闻
Route::get('/newsInfo/:page','www/news/newsInfo');//新闻内容

Route::get('/about','www/about/about');//关于

//底部导航
Route::get('/public_sale_rules','www/BottomNavigation/public_sale_rules');//众售规则
Route::get('/risk_hints','www/BottomNavigation/risk_hints');//风险提示
Route::get('/disclaimer','www/BottomNavigation/disclaimer');//免责声明
Route::get('/intelligent_contract_for_mining','www/BottomNavigation/intelligent_contract_for_mining');//挖矿智能合约
Route::get('/payment_mechanism','www/BottomNavigation/payment_mechanism');//付费机制
Route::get('/intelligent_contract','www/BottomNavigation/intelligent_contract');//NEO智能合约
Route::get('/framework','www/BottomNavigation/framework');//FX架构

?>
