<?php

include_once ROOT. '/models/News.php';

class NewsController {
	public function actionIndex() // адрес списка новостей
		{
			$newsList = array();
			$newsList = News::getNewsList();

			echo "<pre>";
			print_r($newsList);
			echo "</pre>";

			return true;
		}

	public function actionView($category, $id) //
	{ 
		if ($id) {
			$newsItem = News::getNewsByItemId($id);
			echo '<pre>';
			print_r($newsItem);
			echo '</pre>';

			echo 'actionView';
		}
		
		return true;
	}

		
}

?>