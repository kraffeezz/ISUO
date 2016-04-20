
 var items=1;
window.onload = function()
{
	var i = 0;
	while(k = document.getElementById('prac_tabl'+i))
	{
	  k.style.display = 'none';
	  i++;
	}
}

function AddItem(obj)
{
	var divv=document.getElementById('items');

	items++;
	var count = document.getElementById( 'count' );
	if(count) count.value = items;
	newitem='<p>';
	newitem='<select name="pred' + items + '">';

    newitem+='<option value ="0" selected>-</option>';
	newitem+='<option value ="1">Українська мова</option>';
	newitem+='<option value ="2">Українська література</option>';
	newitem+='<option value ="3">Англійська мова</option>';
	newitem+='<option value ="4">Зарубіжна література</option>';
	newitem+='<option value ="5">Російська мова</option>';
	newitem +='<input type="button" value="+" onclick="AddItem(this.parentNode)">';
	newitem +='<input type="button" value="-" onclick="del_input(this.parentNode)">';

	newnode=document.createElement('div');
	newnode.innerHTML=newitem;
	if (obj.nextSibling)
	divv.insertBefore(newnode,obj.nextSibling)

	else  divv.appendChild(newnode);
}

function del_input(obj)
{
	document.getElementById('items').removeChild(obj);
}




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
function no_error(obj)
{
	var ell = document.getElementById(obj);
	var er;
	ell.className = 'noerror';
	if (obj[obj.length -1] == '8')
	{
		document.getElementById('pom' + obj[obj.length -3]).style.display = 'none';
	}
}