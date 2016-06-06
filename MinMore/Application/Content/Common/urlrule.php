<?php

// +----------------------------------------------------------------------
// | MinMoreCMS URL处理函数
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

function get_static_index_url() {
    $role = get_site_role();
    return "assets/$role/index.html|assets/$role/index_{\$page}.html";
}

function get_static_show_url1() {
    $role = get_site_role();
    return "assets/$role/{\$catdir}/{\$id}.shtml|assets/$role/{\$catdir}/{\$id}_{\$page}.shtml";
}

function get_static_show_url2() {
    $role = get_site_role();
    return "assets/$role/{\$categorydir}{\$id}.shtml|assets/$role/{\$categorydir}{\$id}_{\$page}.shtml";
}

function get_static_show_url3() {
    $role = get_site_role();
    return "assets/$role/{\$year}/{\$catdir}_{\$month}/{\$id}.shtml|assets/$role/{\$year}/{\$catdir}_{\$month}/{\$id}_{\$page}.shtml";
}

function get_static_download_url() {
    $role = get_site_role();
    return "assets/$role/download.shtml|assets/$role/download_{\$page}.shtml";
}

function get_static_news_url1() {
    $role = get_site_role();
    return "assets/$role/news/{\$catid}.shtml|assets/$role/news/{\$catid}-{\$page}.shtml";
}

function get_static_news_url2() {
    $role = get_site_role();
    return "assets/$role/{\$categorydir}{\$catdir}/index.shtml|assets/$role/{\$categorydir}{\$catdir}/index_{\$page}.shtml";
}
