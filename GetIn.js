var crn;
var pswrd;
var blank;



function confirm()
{
	crn = document.getElementById('usrnm').value;
	if(crn == "")
	{
		blank = 0;
		document.getElementById("usrnmHTML").innerHTML = "Where do you expect to end up without entering any value?";
		return false;
	}
	else if(isNaN(crn))
	{
		blank = 0;
		document.getElementById("usrnmHTML").innerHTML = "Let me complete it for you... CRN means College Roll Number. 'Number' you see? ";
		return false;
	}
	else
	{
		
		document.getElementById("usrnmHTML").innerHTML = "";

	}

	pswrd = document.getElementById('pswrd').value;
	if(crn == 1915307 && pswrd == "")
	{
		blank = 0;
		document.getElementById("pswrdHTML").innerHTML = "Recite your password as many times you recite 'Not now, but from next year'.";
		return false;
	}
	if(crn == 1921127 && pswrd == "")
	{
		blank = 0;
		document.getElementById("pswrdHTML").innerHTML = "Only if remembering your password was as easy as remembering your GOTRA!";
		return false;
	}
	if(crn == 1916008 && pswrd == "")
	{
		blank = 0;
		document.getElementById("pswrdHTML").innerHTML = "Maybe save your password as one of your love interests' number!";
		return false;
	}
	if (pswrd == "")
	{
		blank = 0;
		document.getElementById("pswrdHTML").innerHTML = "Entering without proving identity? Are you from Shahin Bagh?";
		return false;
	}
	else
	{
		
		document.getElementById("pswrdHTML").innerHTML = "";

	}
	if(blank == 0)
	{
		confirm();
	}

}


function openSide() 
{
  document.getElementById("side").style.width = "100%";
}

function closeSide() 
{
  document.getElementById("side").style.width = "0%";
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