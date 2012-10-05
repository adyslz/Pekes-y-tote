function switchImg(el){
	var element=$(el);
	if(element.attr('src')=='img/up-circle.png'){
		element.attr('src','img/down-circle.png');
		console.log(element.siblings('p').css('display','none'));

	}else{
		console.log(element.siblings('p').css('display','block'));
		element.attr('src','img/up-circle.png');
	}
	console.log(element);
}