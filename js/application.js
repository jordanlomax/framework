function loginShow()
{
	var display = document.getElementById('logindiv').style.display;

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


function formatValidate()
{
	//var form = document.getElementById("loginForm");

	var email = document.getElementById("userId").value;

	var regex = /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/;
	var check = false;

	if (regex.test(email) == true)
	{
		check = true;
	}

	if (check == false)
	{
		document.getElementById('formatError').style.color = 'red';
		var error = document.getElementById('formatError');
		error.innerHTML = 'Invalid Email';
	}

	return check;
}

function getSearch()
{
	var name = document.getElementById('nameSearch').value;
	if (name != '')
	{
		var startPos = name.indexOf(" ");
		if (startPos == -1)
		{
			var first = name.substr(0);
			if (first == "")
			{
				first = "";
			}
			var last = "";
		}
		else
		{
			var first = name.substr(0,startPos);
			var last = name.substr(startPos+1);
		}

		location.href = "?q=friends&a=search&first=" + first + "&last=" + last;
	}
	else
	{
		alert("Please enter a name");
	}
}


/*---------------------------------------------------------------------------------------------*/



function updateAvatar()
{
	alert('loaded');
	var path = document.getElementById('avatarFile').value;
	alert(path);
}

function updateFields(about)
{
	alert(about);
	document.getElementById('aboutField').innerHTML = about;
}

function init()
{
	'use strict';

	if (document.getElementById)
	{
		alert(document.getElementById('userId'));
		var loginForm = document.getElementById('loginForm');
		loginForm.onsubmit = formatValidate;
	}
}

function test()
{
	alert('loaded');
}