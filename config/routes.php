<?php
return array(
	// 'news/77' => 'news/view', //распологаются выше чем 'news'
	// 'news/15' => 'news/view',
	// 'news/([0-9]+)' => 'news/view', //любле число длиной от одного символа и больше
	// 'news' => 'news/index', // actionIndex in NewsController
	// 'products' => 'product/list', // actionList in ProductController
	'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', 
);