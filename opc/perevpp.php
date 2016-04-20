<?php

$zm1 = ""; $zm2 = "";$year = 0; $manth = 0;
$mpr = 0; $merror = 0;
$yesf= 0;
$rez = $dbb->all_ped_prac("*", "ped_prac", "-");
$cat = $dbb->all_ped_prac("*", "categoriyi", "-");
for ($at = 0; $at < mysql_num_rows($cat); $at++)
{
	$fcat1[$at] = mysql_fetch_array($cat);
}
$kil_kat = $at;
$zvan = $dbb->all_ped_prac("*", "zvanyz", "-");
for ($at = 0; $at < mysql_num_rows($zvan); $at++)
{
	$fzvan1[$at] = mysql_fetch_array($zvan);
}
$kil_zvan = $at;
$posada = $dbb->all_ped_prac("*", "ped_posada", "-");
for ($at = 0; $at < mysql_num_rows($posada); $at++)
{
	$fpos1[$at] = mysql_fetch_array($posada);
}
$kil_pos = $at;
for ($c=0; $c<mysql_num_rows($rez); $c++)
{
   $f = mysql_fetch_array($rez);
	$kategoriya = $dbb->all_ped_prac("categoriyi.id_cat, categoriyi.name_cat", "categoriyi INNER JOIN p_prac_cat ON categoriyi.id_cat = p_prac_cat.cat_prac", "p_prac_cat.p_prac = ".$f[0]);
	$fkat = mysql_fetch_array($kategoriya);
	$zvanya = $dbb->all_ped_prac("zvanyz.id_z", "zvanyz INNER JOIN zv_nag ON zvanyz.id_z = zv_nag.zv", "zv_nag.p_prac = ".$f[0]);
	$posada1 = $dbb->all_ped_prac("ped_posada.id_posada", "ped_posada INNER JOIN p_ped_prac ON ped_posada.id_posada = p_ped_prac.posada", "p_ped_prac.p_prac = ".$f[0]);
	$fpos = mysql_fetch_array($posada1);
	$date1 = strtotime($f[14]); $date2 = getdate();
	$manth = 0;
	$y1 = idate('Y', $date1); $m1 = idate('m', $date1); $d1 = idate('d', $date1);
	$y2 = $date2['year']; $m2 = $date2['mon']; $d2 = $date2['mday'];
	$year = $y2 - $y1;
	if ($m2 < $m1)
	{
		$year--;
		$manth = 12 - $m1 + $m2;
	}
	else $manth = $m2 - $m1;
	//echo "<p>".$manth;
	if ($d2 < $d1)
	{
		$manth--;
	}
	//echo "<p>".$manth;
	if ($manth < 0)
	{
		$year--;
		$manth = 11;
	}
	$yearkursy = idate('Y',(strtotime($f[14])));
	$klas_ker = $dbb->all_ped_prac("klasy.klas", "klasy INNER JOIN klas_ker ON klasy.id_klas = klas_ker.klas", "klas_ker.k_ker = ".$f[0]);
	$predmet = $dbb->all_ped_prac("predmety.predmet", "predmety INNER JOIN vik_pred ON predmety.id_pred = vik_pred.pred", "vik_pred.p_prac = ".$f[0]);
	if ($f[1] == "")
	{
	   $np[1] = 1;
	} else $np[1] = 0;
	if ($f[2] == "")
	{
		$np[2] = 1;
	} else $np[2] = 0;
	if ($f[3] == "")
	{
		$np[3] = 1;
	} else $np[3] = 0; $np[4] = 0;
	if ($f[5] == "-")
	{
		$np[5] = 1;
	} else $np[5] = 0;
	if ($f[6] == "-")
	{
		$np[6] = 1;
	} else $np[6] = 0; $np[7] = 0;
	if (($f[8] == 2000 && $y2 - $y1 >4) || ($y2 - $f[8] > 4))
	{
		$np[8] = 1;
	} else $np[8] = 0;
	$np[9] = $np[10] = 0;
	if (mysql_num_rows($predmet) == 0 && $fpos[0] == 1)
	{
		$np[11] = 1;
	} else $np[11] = 0;
	if ($f[9] == "-")
	{
		$np[12] = 1;
	} else $np[12] = 0;
	for ($ni = 1; $ni < 13; $ni++)
		if ($np[$ni] == 1) {$yesf = 1; $ni = 13  ;	}
    if ($yesf == 1)
    {
    	echo "
    	<form name=\"form".$c."\" action=\"index.php\" method=\"get\" >
    	<div >
    	<input type=\"hidden\" name=\"work_this\" value=\"9\"/>
    	<table border=\"3\">
    	<tr>
    	<td>
    	<label for=\"p1\">
         Прізвище:
        </label>
        <input type=\"text\" id = \"in_".$c."_1\"";
    	if ($np[1] == 1) {
    		echo " class = \"error\" ";
    	}
    	else echo " value =\"".$f[1]."\" ";
        echo "name=\"p1\"  onchange=\"no_error('in_".$c."_1')\" />";
    	//------------------------------
        echo "<p><label for=\"p2\">
                 Ім'я:
              </label>
             <input type=\"text\" id = \"in_".$c."_2\"";
    	if ($np[2] == 1) {
    		echo " class = \"error\" ";
    	}
    	else echo " value =\"".$f[2]."\" ";
    	echo "name=\"p2\" onchange=\"no_error('in_".$c."_2')\" />";
          	//------------------------------
    	echo "<p><label for=\"p3\">
                 По батькові:
              </label>
             <input type=\"text\"";
    	if ($np[3] == 1) {
    		echo " class = \"error\" ";
    	}
    	else echo " value =\"".$f[3]."\" ";
    	echo "name=\"p3\"/>";
    	//------------------------------
    	echo "<p>
    		<label for=\"p4\">
    		  Стать:
    		</label>
    		<select name=\"p4\">
    		<option value=\"chol\"";
    	    if ($f[4] == 0) {
    	    	echo" selected ";
    	    }
    		echo">Чоловіча</option>
    		<option value=\"jin\"";
        	if ($f[4] == 1) {
    	    	echo" selected ";
    	    }
     		echo">Жіноча</option>
    		</select>";
    	//-------------------------------
    	echo "<p><label for=\"p5\">
                 Адреса:
              </label>
             <textarea  rows=\"5\" cols=\"30\" name=\"p5\"";
    	if ($np[5] == 1) {
    		echo " class = \"error\" >";
    	}
    	else echo " >".$f[5];
    	echo "</textarea>";
    	//-------------------------------
    	echo "<p><label for=\"p6\">
                 Телефон 1:
              </label>
             <input type=\"text\"  placeholder=\"Введите ваш телефон\"";
    	if ($np[6] == 1) {
    		echo " class = \"phone3\" ";
    	}
    	else echo " value =\"".$f[6]."\" ";
    	echo " class = \"phone1\" name=\"p6\"/>";
    	//-------------------------------
    	echo "<p><label for=\"p7\">
                 Телефон 2:
              </label>
             <input type=\"text\"  placeholder=\"Введите ваш телефон\" value =\"".$f[7]."\"  class = \"phone1\" name=\"p7\"/>";

    	//----------------------------------
        echo"<p> <label for=\"p8\">
	         Рік останьої атестації:
	         </label>
	         <select name=\"p8\" id = \"in_".$c."_8\" onchange=\"no_error('in_".$c."_8')\"";
        if ($np[8] == 1)
    	{
    	   	echo " class = \"error\" >";
    	} else echo ">";

	    echo "<option value=\"-\">-</option>";

	 $yearat = date('Y');
    for ($at = 1; $at < 8; $at++)
    {
    	echo"<option value=\"".$yearat."\"";
    	if ($yearat == $f[8])
    	{
    		echo" selected>";
    	} else echo ">";
    	echo $yearat."</option>";
    	$yearat--;
    }
    	if ($np[8] == 1)
    	{
    		echo "</select>
                   <p class = \"errort\" id = \"pom".$c."\"> Працівник працює більше 5 років без атестації. Введіт рік атестації або рік отримання диплома.";
    	} else echo "</select>";

    	//----------------------------------
    	echo "<p>
    	<label for=\"p9\">
		Категорія:
		</label>
		<select name=\"p9\">";
    	for ($at = 0; $at < $kil_kat; $at++)
    	{
    		echo "<option value=\"".($at + 1)."\"";
    		if ($fcat1[$at][0] == $fkat[0]) {echo " selected";	}
            echo ">".$fcat1[$at][1]."</option>";
    	}

    	echo "	</select>";
    	//----------------------------------
    	echo "<p>
    	<label for=\"p10\">
		Звання:
		</label>
		<select name=\"p10\">";
    	if (mysql_num_rows($zvanya) >0)
    	{
    	   $fzvan = mysql_fetch_array($zvanya);
    	} else $fzvan[0] = 0;
    	echo "<option value=\"-\">-</option>";
    	for ($at = 0; $at < $kil_zvan; $at++)
    	{
    		echo "<option value=\"".($at + 1)."\"";
    		if ($fzvan1[$at][0] == $fzvan[0]) {echo " selected";	}
    		echo ">".$fzvan1[$at][1]."</option>";
    	}

    	echo "	</select>";
    	//----------------------------------
    	echo "<p>
    	<label for=\"p11\">
		Посада:
		</label>
		<select name=\"p11\"";
    	if ($np[11] == 1)
    	{
    		echo "class = \"error\"";
    	}
    	echo ">";
    	for ($at = 0; $at < $kil_pos; $at++)
    	{
    		echo "<option value=\"".($at + 1)."\"";
    		if ($fpos1[$at][0] == $fpos[0]) {echo " selected";	}
    		echo ">".$fpos1[$at][1]."</option>";
    	}

    	echo "	</select>";
    	if ($np[11] == 1)
    	{
          echo"	<p class = \"errort\" id_ = \"pom".$c."_11\"> Змініть посаду або вкажіть предмети, що викладає вчитель.";
    	}
    	//----------------------------------
    	echo "<p><label for=\"p12\">
                 Навчальний заклад, який закінчив та рік:
              </label>
             <textarea  rows=\"5\" cols=\"30\" name=\"p12\"";
    	if ($np[12] == 1) {
    		echo " class = \"error\" >";
    	}
    	else echo " >".$f[9];
    	echo "</textarea>";
    	//-------------------------------
		echo "</td><td>";
    	echo "</td></tr></table><input type=\"submit\" value=\"Зберегти\"/></div></form>";
    }

	$yesf = 0;
}


?>