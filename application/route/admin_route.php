<?php
use think\Route;
Route::get('/admcncp/','admin/index/get_index');//管理员首页
Route::get('/admcncp/login','admin/login/get_login');//登陆页面


Route::post('/admcncp/login','admin/login/post_login');//登陆逻辑
Route::post('/admcncp/quit','admin/login/post_quit');//退出逻辑

//用户路由
Route::get('/admcncp/index_add','admin/index/get_index_add');//管理员 添加
Route::post('/admcncp/index_add','admin/index/post_index_add');//管理员 添加
Route::get('/admcncp/indexEdit/:id','admin/index/get_index_edit');//管理员 编辑
Route::post('/admcncp/indexEdit/:id','admin/index/post_index_edit');//管理员 编辑



//新闻
Route::get('admcncp/news/','admin/new/get_news_list');
Route::get('admcncp/newsAdd','admin/new/get_news_add');
Route::post('admcncp/newsAdd','admin/new/post_news_add');
Route::get('admcncp/newsEdit/:id','admin/new/get_news_edit');
Route::post('admcncp/newsEdit/:id/','admin/new/post_news_edit');
Route::get('admcncp/newsDel/:id/','admin/new/get_news_del');


//联系我们
Route::get('admcncp/contactUs/','admin/contactUs/get_contact_us_list');
Route::get('admcncp/contactUsSee/:id/','admin/contactUs/get_contact_us_see');
Route::post('admcncp/contactUsDel/:id/','admin/contactUs/get_contact_us_del');

//底部导航
Route::get('/navigation','admin/navigation/get_navigation_list');
Route::get('/navigationEditAdd','admin/navigation/get_navigation_add');
Route::post('/navigationEditAdd','admin/navigation/post_navigation_add');
Route::get('/navigationEdit/:id','admin/navigation/get_navigation_edit');
Route::post('/navigationEdit','admin/navigation/post_navigation_edit');


?>
