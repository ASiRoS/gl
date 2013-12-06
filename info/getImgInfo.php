<?php
// Подключаем конфиги и функции.
require_once 'config.php';
require_once 'functions.php';

// Отправляем заголовки.
header('Content-type: text/plain; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

// Получаем список альбомов и перегоняем его в json.
$albums = json_encode(getFolderOrFileList($path));

// Если номер альбома равен null, тогда отдаем альбомы и прекращаем выполнение кода.
if($albumNumber === null){
	echo $albums;
	return;
}
//  Если передали параметр albumNumber

// обнуляем массив с альбомами за ненадобностью.  
$albums = null;

// Получаем список картинок в альбоме, и перегоняем в json.
$album = json_encode(getFolderOrFileList($path.'/'.$albumFolderName.$albumNumber, 1));

// Выводим список файлов в виде json'a
echo $album;
?>