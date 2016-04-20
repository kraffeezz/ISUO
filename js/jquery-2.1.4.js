function viziblediv(objt, objb)
{
	var tablprac = document.getElementById(objt);
	var but = document.getElementById(objb);
    if (tablprac.style.display == 'none') {
    	tablprac.style.display = 'block';
    	but.value = '-';
    }
	
	else{
		tablprac.style.display = 'none';
		but.value = '+';
	};
}


function noerror(obj)
{
	var ell = document.getElementById(obj);
	var er;
	ell.className = 'noerror';
	if (obj[obj.length -1] == '8')
	{
		document.getElementById('pom1').style.display = 'none';
	}
	
}