window.onload = function(){
	var circle = document.getElementById('circle');
	var span = document.getElementById('time').getElementsByTagName('span')[0];
	var remind = document.getElementById('remind');
	//给圆加上手指按下事件
	circle.ontouchstart = function(){
		// alert('5555')
		// 记录按下开始的时间
		start_time = new Date();
	}
	// 给圆加上手指抬起事件
	circle.ontouchend = function(){
		// alert('123');
		// 记录抬起时候得时间
		end_time = new Date();
		// 还要计算他们的时间差
		diff_time = end_time.getTime() - start_time.getTime();
		// alert(diff_time);
		span.innerHTML = diff_time/1000;
		if (diff_time < 800) {
			remind.innerHTML = '亲，别激动，慢慢来....'
		}else if (diff_time > 1400) {
			remind.innerHTML = '亲，睡着了吗....'
		}else if (diff_time >=800 && diff_time <=1400 ) {
			remind.innerHTML = '亲，就差一点点喽'
		}else if (diff_time == 1000) {
			remind.innerHTML = '亲，晚上买彩票吧'
		}
	}
}
