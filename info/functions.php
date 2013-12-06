<?php
/*
	Получаем список директорий или файлов в папке.
	$folder - указываем путь к нужной папке.
	$type - указываем тип, искать файлы или папки.
	список возможных типов содержится в массиве - $searchTypes;
	Возможные типы: 
		0 - folder.
		1 - file.
	Не обязательный параметр.
	по дефолту:
		folder.
	$sort - указываем какие типы файлов сортировать,
	указывать в виде массива:
		пример:
				array('jpg', 'png', 'exe');
	Они не попадут в массив, не обязательный парметр.
	по дефолту: null.
*/
function getFolderOrFileList($folder, $type = 0){
	// Присваиваем тип: folder || file....
	$type = $searchTypes[$type];
	// Узнаем, что в папке.
	$forldersOrFiles = scandir($folder);

	// Создаем пустой массив для записи результатов.
	$result = [];

	// Удаляем две не нужных папки, существующие по дефолту.
	unset($forldersOrFiles[0], $forldersOrFiles[1]);

	// Проверяем, если ищем папки, то:
	if($type == $searchTypes[0]){
		foreach($forldersOrFiles as $folder){
			/*
			  Проверяем, если не файл, 
			  то записываем в массив результатов.
			*/
			if(!is_file($folder)){
				$result[] = $folder;
			}
		}
	} 
	// Иначе ищем файлы.
	else {
		foreach($forldersOrFiles as $file){
			/*
			  Если файл, 
			  то записываем в массив результатов.
			*/
			$fileType = explode('.', $file);
			$fileType = $fileType[count($fileType)-1];

			if(is_file($file) && in_array($fileType, $fileTypes)){
				$result[] = $file;
			}
		}
	}
	// Возращаем результаты в виде массива.
	return $result;
}
function forE($arr, $callback){
	foreach($arr as $arr){
		$callback($arr);
	}
}
?>