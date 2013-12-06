function ajax(url, data){
	url = url || '../info/getImgInfo.php';
	data = data || {};
	$.ajax({
		url: url,
		async: false,
		data: data,
		success: function(response){
			return $.parseJSON(response);
		},
		error: function(){
			$('body').html('Произошла ошибка!');
		}
	});
}
function generateImg(type, count){
	var imgsHtml = '';
	for(var i = 0; i < count; i++){
		imgsHtml += '<img src="../images/'+type+'/'+albums[i]+'/1.jpg" data-albumNumber='+i+'>';
	}
	return imgsHtml;
}