// setTimeout(function(){
// 		$('#s').load(document.location.href);
// }, 3000);



$(document).ready(function () {
	var page;
	var param = location.
	search.
	slice(location.search.indexOf('?')+1).
	split('&');

	/**
	* Перемотка трека по клику на timeline
	*/
	$('.js--timeline').on('click', function (e) {
		audioTime = $(this).closest('.js--audio-wrap').find('.js--audio-cont');
		duration = audioTime.prop('duration');
		if (duration > 0) {
			offset = $(this).offset();
			left = e.clientX-offset.left;
			width = $(this).width();
			$(this).find('.js--timeline-control').css('left', left+'px');
			audioTime.prop('currentTime', duration*left/width);
		}
		return false;
	});

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

	var block = false;
	$(window).scroll(function () {

		if($(window).height() + $(window).scrollTop() >= $(document).height() && !block) {
			block = true;
			page++;
			$.ajax({
				url:"http://localhost/Music.com/audio/tracks.php",
				type:"GET",
				data:("page="+page+"&move=1"),
				success:function(html) {
					if(html) {
						$(html).appendTo($("#posts")).hide().fadeIn(1000);
					}
					block = false;
				}
			});
		}
	});
});
