function updateTime() {
	console.log ( '#timeleft updated' );
	var seconds_left = $( "#time" ).val();
	console.log(seconds_left);


	var text = "";
	var  days = parseInt(seconds_left / 86400);
	if(days > 0)
		text += days + " Days ";

	seconds_left = seconds_left % 86400;
	var  hours = parseInt(seconds_left / 3600);
	if(hours > 0)
		text += hours + " Hours ";


	seconds_left = seconds_left % 3600;
	var  minutes = parseInt(seconds_left / 60);
	if(minutes > 0)
		text += minutes + " Minutes ";

	seconds = parseInt(seconds_left % 60);


	if(seconds > 0)
		text += seconds + " Seconds ";

	var span = '<h4 class="h4time"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> ' + text + '</h4>';
	$( ".h4time" ).replaceWith( span);

	$( "#time" ).val($( "#time" ).val()-1);

}

setInterval(updateTime, 1000); // 5 * 1000 miliseconds