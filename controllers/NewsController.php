<?php

class NewsController {
	public function actionIndex() // адрес списка новостей
		{
			echo "Список новостей";
			return true;
		}

	public function actionView() //
	{ 
		echo "Просмотр одной новости";
		return true;
	}

		
}

?>