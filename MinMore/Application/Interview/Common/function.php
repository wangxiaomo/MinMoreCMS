<?php

// +----------------------------------------------------------------------
// | MinMoreCMS 内容模块自定义函数
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.minmore.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 太原小众软件科技有限公司 <dev@minmore.com>
// +----------------------------------------------------------------------

function GetSize($sizeb) {
	$sizekb = $sizeb / 1024;
	$sizemb = $sizekb / 1024;
	$sizegb = $sizemb / 1024;
	$sizetb = $sizegb / 1024;
	$sizepb = $sizetb / 1024;
	if ($sizeb > 1) {$size = round($sizeb,2) . "B";}
	if ($sizekb > 1) {$size = round($sizekb,2) . "K";}
	if ($sizemb > 1) {$size = round($sizemb,2) . "M";}
	if ($sizegb > 1) {$size = round($sizegb,2) . "G";}
	if ($sizetb > 1) {$size = round($sizetb,2) . "T";}
	if ($sizepb > 1) {$size = round($sizepb,2) . "P";}
	return $size;
}