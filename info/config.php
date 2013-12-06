<?php
// Путь до картинок.
$folderImg = '../images';
// Название для всех альбомов.
$albumFolderName = 'album';
// Список
$imgFolderType = [
	'previews', 
	'thumbnails'
];
/*
	Список разрешенных типов для поиска в функции - 
	getFolderOrFileList();
*/
$searchTypes = [
	'folder',
	'file'
];
// разрешенные типы файлов.
$fileTypes = [
	'jpg',
	'png',
	'gif'
];
/* 
  	Принимаем данные GET'ом.
	Придет номер альбома.
*/
$albumNumber = (!empty($_GET['albumNumber'])) ? (int)$_GET['albumNumber'] : null;
/*
	Тип по умолчанию равен previews, 
	так как альбомы будут везде одинаковые.
*/
$type = $imgFolderType[0];
/*
 Полный путь к картинкам виде:
 ../images/previews || ../images/thumbnails
*/
$path = $folderImg.'/'.$type;
?>