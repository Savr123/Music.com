// setTimeout(function(){
// 		$('#s').load(document.location.href);
// }, 3000);
$(document).ready(function () {
	// const express=require('express');
	// const app=express();
	// app.use(express.static('public'));
	//
	// app.get('/test',(req,res)=>{
	//   res.send(data);
	// });

	// var express = require('express')
	// var app = express()
	//
	// // respond with "hello world" when a GET request is made to the homepage
	// app.get('/', function (req, res) {
	//   res.send('hello world')
	// })


	var page;
	var param = location.
	search.
	slice(location.search.indexOf('?')+1).
	split('&');

	var result = [];
	for(var i = 0; i < param.length;i++) {
		var res = param[i].split('=');
		result[res[0]] = res[1];
	}

	if(result['page']) {
	 page = result['page'];
	}
	else {
		page = 1;
	}
	// $(".pager").show().text(page);

	var block = false;
	$(window).scroll(function () {

		if($(window).height() + $(window).scrollTop() >= $(document).height() && !block) {
			block = true;
			// $(".load").fadeIn(500, function () {
				page++;
				$.ajax({
					url:"http://localhost/Music.com/php/my_music/tracks.php",
					type:"GET",
					data:("page="+page+"&move=1"),
					success:function(html) {
						if(html) {
							$(html).appendTo($("#posts")).hide().fadeIn(1000);
						}
						block = false;
					}
				});
			// });
		}
	});
});
