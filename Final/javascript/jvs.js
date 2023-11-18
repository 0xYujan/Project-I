function checkpw()
{
 	var pw 		= document.getElementById('password').value;
  	var rpw 	= document.getElementById('cpassword').value;
  	var fname	= document.getElementById('fname').value;
  	var lname	= document.getElementById('lname').value;
  	var address	= document.getElementById('address').value;
  	var email	= document.getElementById('email').value;
  	var contact	= document.getElementById('contact').value;
	
		if(rpw != pw)
		{
 			alert("Password do not match");	
 			document.getElementById('cpassword').focus();
 			return false;
		}
}
	
function disp()
{
	alert("Login First!");
}

function reset() 
{
    document.getElementById("myForm").reset();
}

