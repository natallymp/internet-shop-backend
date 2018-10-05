<?php

class News
{
	//require(ROOT.'/components/Db.php');
	public static function getNewsItemById($id)
	{
		//запрос к бд;
		$id = intval($id);
		
		if ($id)
		{
			
			$db = Db::getConnection();

			//$db->query("SET wait_timeout=9999;");
			$result = $db->query('SELECT * from news WHERE id='.$id);
			//$result->setFetchMode(PDO::FETCH_NUM);
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$newsItem = $result -> fetch();
			return $newsItem;
		}

	}

	public static function getNewsList()
	{
		//запрос к бд;
		
		$db = Db::getConnection();

		$newsList = array();

		$result = $db->query('SELECT id, title, date, short_content '
			. 'FROM news '
			. 'ORDER BY date DESC '
			. 'LIMIT 5');

		$i = 0;
		while ($row=$result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;

		}
		return $newsList;
	}
}
