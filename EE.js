function fetchuser(elements) 
{
	var show = document.getElementById(elements);
	if (show != null) 
	{
		if (show.style.display == "block") 
		{
			show.style.display = 'none';
		}
		else
		{
			show.style.display = 'block';
		}
	return false;

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