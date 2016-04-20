<?php
   $zm1 = ""; $zm2 = "";$year = 0; $manth = 0;
   $rez = $dbb->all_ped_prac("*", "ped_prac", "-");
   for ($c=0; $c<mysql_num_rows($rez); $c++)
   {

   	$f = mysql_fetch_array($rez);
   	echo "<p class = \"nameprac\">".$f[1]." ".$f[2]." ".$f[3]." ";
   	echo "<input id =\"but".$c."\" type=\"button\" value=\"+\" onClick=\"viziblediv('prac_tabl".$c."', 'but".$c."')\" >";
   	echo "</p>";
   	echo "<div id = \"prac_tabl".$c."\" class = \"tabprac\">";
   	echo "<table border = \"3\" width = 100%>";
   	echo "<tr>";
   	   echo"<td class = \"t_nz\">Прізвище:</td><td class = \"t_zn\">".$f[1]."</td><td class = \"t_nz\">Навчальний заклад, який закінчив та рік:</td><td class = \"t_zn\">".$f[9]."</td>";
   	echo "</tr>";
   	echo "<tr>";
   	   echo"<td class = \"t_nz\">Ім'я:</td><td class = \"t_zn\">".$f[2]."</td><td class = \"t_nz\">Спеціальність за дипломом:</td><td class = \"t_zn\">".$f[10]."</td>";
   	echo "</tr>";
   	echo "<tr>";
   	   echo"<td class = \"t_nz\">По батькові:</td><td class = \"t_zn\">".$f[3]."</td><td class = \"t_nz\">Кваліфікація за дипломом:</td><td class = \"t_zn\">".$f[11]."</td>";
   	echo "</tr>";
   	if ($f[4] == 0) {$zm1 = "чоловіча";}
   	else $zm1 = "жіноча";
   	if ($f[12] == 0) {$zm2 = "основний";}
   	else $zm2 = "сумісник";
   	echo "<tr>";
   	     echo"<td class = \"t_nz\">Стать:</td><td class = \"t_zn\">".$zm1."</td><td class = \"t_nz\">Працівник:</td><td class = \"t_zn\">".$zm2."</td>";
   	echo "</tr>";
   	if ($f[13] == 0) {$zm2 = "так";}
   	else $zm2 = "ні";
   	echo "<tr>";
   	echo"<td class = \"t_nz\">Адреса:</td><td class = \"t_zn\">".$f[5]."</td><td class = \"t_nz\">Працює за спеціальнісю:</td><td class = \"t_zn\">".$zm2."</td>";
   	echo "</tr>";
    echo "<tr>";
	echo"<td class = \"t_nz\">Телефон 1:</td><td class = \"t_zn\">".$f[6]."</td><td class = \"t_nz\">Дата прийому на роботу:</td><td class = \"t_zn\">".strftime("%d-%m-%Y", strtotime($f[14]))."</td>";
   	echo "</tr>";
   	echo "<tr>";
     	$date1 = strtotime($f[14]); $date2 = getdate();
     	$manth = 0;
   	$y1 = idate('Y', $date1); $m1 = idate('m', $date1); $d1 = idate('d', $date1);
   	$y2 = $date2['year']; $m2 = $date2['mon']; $d2 = $date2['mday'];
   /*	echo $y1." ".$m1." ".$d1;
   	echo "<p>".$y2." ".$m2." ".$d2;*/
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
   	//echo "<p>".$manth;
   	$year += $f[15]; $manth += $f[16];
   	if ($manth > 12)
   	{
   		$year++; $manth -= 12;
   	}
   	$zm1 = "";
   	if ($manth == 1)
   	{
   		$zm1 = $manth." місяць";
   	}
   	if (($manth > 1) && ($manth < 5))
   	{
   		$zm1 = $manth." місяця";
   	}
   	if (($manth > 4) || ($manth == 0))
   	{
   		$zm1 = $manth." місяців";
   	}

   	echo"<td class = \"t_nz\">Телефон 2:</td><td class = \"t_zn\">".$f[7]."</td><td class = \"t_nz\">Стаж :</td><td class = \"t_zn\"> ".$year." років ".$zm1. "</td>";
   	echo "</tr><tr>";
   	echo"<td class = \"t_nz\">Рік останьої атестації:</td>";
   	if ($f[8] == 2000)
   	{
   		echo "<td class = \"t_zn\">не атестувався</td>";

   	}
   	else echo "<td class = \"t_zn\">".$f[8]."; наступна атестація: ".($f[8] + 5)." р.</td>";
   	echo"<td class = \"t_nz\">Дата останьої курсової перепідготовки:</td>";
   	if (strtotime($f[17]) == 0)
   	{
   		echo "<td class = \"t_zn\">курси не проходив </td>";

   	}
   	else echo "<td class = \"t_zn\">".strftime("%d-%m-%Y", strtotime($f[14]))."; курси ".(idate('Y',(strtotime($f[14]))) +  5)." р.</td>";
   	$rez1 = $dbb->all_ped_prac("categoriyi.name_cat", "categoriyi INNER JOIN p_prac_cat ON categoriyi.id_cat = p_prac_cat.cat_prac", "p_prac_cat.p_prac = ".$f[0]);
   	$f1 = mysql_fetch_array($rez1);
    echo "</tr><tr>";
   	echo"<td class = \"t_nz\">Категорія:</td><td class = \"t_zn\">".$f1[0]."</td>";
   	$rez1 = $dbb->all_ped_prac("klasy.klas", "klasy INNER JOIN klas_ker ON klasy.id_klas = klas_ker.klas", "klas_ker.k_ker = ".$f[0]);
   	if (mysql_num_rows($rez1) == 0)
   	{
   	   $zm1 = "не має";
   	}
   	else
   	{
   	   	$f1 = mysql_fetch_array($rez1);
   		$zm1 = $f1[0];
   	}
   	echo "<td class = \"t_nz\">Класний керівник</td><td class = \"t_zn\">".$zm1."</td";
    echo "</tr><tr>";
   	$rez1 = $dbb->all_ped_prac("ped_posada.name_posada", "ped_posada INNER JOIN p_ped_prac ON ped_posada.id_posada = p_ped_prac.posada", "p_ped_prac.p_prac = ".$f[0]);
   	$f1 = mysql_fetch_array($rez1);
   	echo "<td class = \"t_nz\">Посада:</td><td class = \"t_zn\">".$f1[0]."</td>";
   	$rez1 = $dbb->all_ped_prac("predmety.predmet", "predmety INNER JOIN vik_pred ON predmety.id_pred = vik_pred.pred", "vik_pred.p_prac = ".$f[0]);
   	echo "<td class = \"t_nz\">Предмет, що викладає:</td>";
   	if (mysql_num_rows($rez1) == 0)
   	{
   		echo"<td class = \"t_zn\">не викладає</td>";
   	}
   	else
   	{
   		echo "<td style = \"line-height:3px; padding-top: 6px \" class = \"t_zn\">";
   		for ($c1 = 0; $c1 < mysql_num_rows($rez1); $c1++)
   		{
   			$f1 = mysql_fetch_array($rez1);
   			echo $f1[0]."<p>";
   		}
   		echo"</td>";
   	}
   	echo "</tr><tr>";
   	$rez1 = $dbb->all_ped_prac("zvanyz.zvanya", "zvanyz INNER JOIN zv_nag ON zvanyz.id_z = zv_nag.zv", "zv_nag.p_prac = ".$f[0]);
   	echo "<td class = \"t_nz\">Звання:</td>";
   	if (mysql_num_rows($rez1) == 0)
   	{
   		echo"<td class = \"t_zn\">не має</td>";
   	}
   	else
   	{
   		echo "<td style = \"line-height:3px; padding-top: 6px \" class = \"t_zn\">";
   		for ($c1 = 0; $c1 < mysql_num_rows($rez1); $c1++)
   		{
   			$f1 = mysql_fetch_array($rez1);
   			echo $f1[0]."<p>";
   		}
   		echo"</td>";
   	}
   	echo "<td class = \"t_nz\">Навчальний заклад та рік закінчення:</td><td class = \"t_zn\">".$f[9]."</td>";
   	echo "</tr>";
   	echo "<tr><td class = \"t_nz\">Примітка</td><td colspan = 3 class = \"t_zn\">".$f[18]."</td></tr>";
   	echo "</table>";
   	echo "<form name=\"home".$c."\" action=\"index.php\" method=\"get\">";
   	echo "<input type=\"hidden\" name=\"work_this\" value=\"10\"/>";
   	echo "<input type=\"hidden\" name=\"del_p\" value=\"".$f[0]."\"/>";
   	echo "<input type=\"submit\" value=\"Видалити\"/>";
   	echo "</form>";
   	echo "</div>";
   }


?>