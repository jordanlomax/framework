function loginShow()
{
	var display = document.getElementById('logindiv').style.display

	if (display == 'none')
	{
		document.getElementById('logindiv').style.display = 'block';
	}
	else if(display == 'block')
	{
		document.getElementById('logindiv').style.display = 'none';
	}
	else
	{
		document.getElementById('logindiv').style.display = 'block';
	}
}