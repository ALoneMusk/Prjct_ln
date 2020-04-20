var name;
var uname;
var pass;
var conpass;
var mail;
var branch;
var blank;

function Validate()
{
		name = document.getElementById("Name").value;
	if(name == "")
	{
		blank = 0;
		document.getElementById("NameHTML").innerHTML = "Entering your own name shouldn't be that difficult!";
		return false;
	}
	else
	{
		
		document.getElementById("NameHTML").innerHTML = "";
		
	}
	uname = document.getElementById("UName").value;
	if(uname == "")
	{
		blank = 0;
		document.getElementById("UNameHTML").innerHTML = "Your CRN is unique, and so are you as a human! Please enter a (valid) value. ";
		return false;
	}
	else if(isNaN(uname))
	{
		blank = 0;
		document.getElementById("UNameHTML").innerHTML = "Didn't they tell you in school that number means 0 to 9? ";
		return false;
	}
	else if(uname.length !=7)
	{
		blank = 0;
		document.getElementById("UNameHTML").innerHTML = "Your CRN has seven digits, hacker.";
		return false;
	}
	else
	{
		
		document.getElementById("UNameHTML").innerHTML = "";
		
	}
	pass = document.getElementById("Pass").value;
	if(pass == "")
	{
		blank = 0;
		document.getElementById("PassHTML").innerHTML = "Please don't leave the field as blank as your skull. ";
		return false;
	}
	else if(pass.length < 7)
	{
		blank = 0;
		document.getElementById("PassHTML").innerHTML = "Isn't longer attractive? So shall be your password. 7 letters atleast. ";
		return false;
	}
	else
	{
		document.getElementById("PassHTML").innerHTML = "";
	}
	conpass = document.getElementById("ConPass").value;
	if(conpass != pass)
	{
		blank = 0;
		document.getElementById("ConPassHTML").innerHTML = "Confirm password means reentering the same password, moron. ";
		return false;
	}
	else
	{
		document.getElementById("ConPassHTML").innerHTML ="";
	}
	mail = document.getElementById("Mail").value;
	at = mail.indexOf("@");
	dot = mail.lastIndexOf(".");
	if(mail == "" || at <2 || (dot-at)<4 || mail.includes(" "))
	{
		blank = 0;
		document.getElementById("MailHTML").innerHTML = "Your email address please, or atleast the same format! ";
		return false;
	}
	else
	{
		document.getElementById("MailHTML").innerHTML ="";
	}
	
	if(blank == 0)
	{
		Validate();
	}
}


 var a = '';   
        function detect()
        { 
  
            if (navigator.userAgent.match(/Android/i) 
                || navigator.userAgent.match(/webOS/i) 
                || navigator.userAgent.match(/iPhone/i)  
                || navigator.userAgent.match(/iPad/i)  
                || navigator.userAgent.match(/iPod/i) 
                || navigator.userAgent.match(/BlackBerry/i) 
                || navigator.userAgent.match(/Windows Phone/i))
                { 
                a = 'true'; 
           		}
            else
            { 
                a = 'false'; 
            } 

            if(a === 'true')
            {
            	alert("You are trying to access this site using a mobie browser. For a complete experience, it is advised to use a desktop when visiting this website. Some features might not work on this version of browser.");
            }
        } 




	