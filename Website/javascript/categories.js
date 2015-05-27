$(window).ready(function() {
	if ($(this).width() < 768)
	{
		$('#collapseFour').removeClass('in');
		$('#collapseFour').addClass('out');
	}
	else
	{
		$('#collapseFour').removeClass('out');
		$('#collapseFour').addClass('in');
	}
});

$(window).resize(function() {
	if ($(this).width() < 768)
	{
		$('#collapseFour').removeClass('in');
		$('#collapseFour').addClass('out');
	}
	else
	{
		$('#collapseFour').removeClass('out');
		$('#collapseFour').addClass('in');
	}
});