<?php
   //echo strlen(trim($_GET['p12']))."/";
//$string = $_GET['p12'];
/*$string = trim($string);
$len = strlen($string);
for($i = 0; $i < $len; $i++)
{
	echo "~".ord($string[$i]);
}*/
/* в качестве разделителей используем пробел, табуляцию и перевод строки */
/*$tok = strtok($string, " \n\t\0");
while ($tok) {
	$tok = trim($tok);
	echo "Word=".$tok."~".strlen($tok)."<br />";
	$tok = strtok(" \n\t\0");
}*/
   $klas_ker = "";
   $p_prac = "";
   $p_p_prac = "";
   $p_prac_cat = "";
   $Vik_pred = "";
   $zv_nag= "";
   $p_prac = "'".$_GET['p1']."','".$_GET['p2']."','".$_GET['p3']."',";
   $i = 1;
   if ($_GET['p4'] == 'chol')
   {
   	  $p_prac .= "'0',";
   }
   else $p_prac .= "'1',";
   if ($_GET['p5'] == '')
   {
	  $p_prac .= "'-',";
   }
   else $p_prac .= "'".$_GET['p5']."',";
	if ($_GET['p6'] == '')
	{
		$p_prac .= "'-',";
	}
	else $p_prac .= "'".$_GET['p6']."',";
	if ($_GET['p7'] == '')
	{
		$p_prac .= "'-',";
	}
	else $p_prac .= "'".$_GET['p7']."',";
	if ($_GET['p8'] == '-')
	{
		$p_prac .= "'0',";
	}
	else $p_prac .= "'".$_GET['p8']."',";

	$_GET['p12'] = trim($_GET['p12']);
	if ($_GET['p12'] == '')
	{
		$p_prac .= "'-',";
	}
	else $p_prac .= "'".$_GET['p12']."',";
	if ($_GET['p13'] == '')
	{
		$p_prac .= "'-',";
	}
	else $p_prac .= "'".$_GET['p13']."',";
	if ($_GET['p14'] == '')
	{
		$p_prac .= "'-',";
	}
	else $p_prac .= "'".$_GET['p14']."',";
	if (isset($_GET['p15']))
	{
		$p_prac .= "'1',";
	}
	else $p_prac .= "'0',";
	if (isset($_GET['p16']))
	{
		$p_prac .= "'1',";
	}
	else $p_prac .= "'0',";

	if ($_GET['p17'] == '')
	{
		$p_prac .= "'0000-00-00',";
	}
	else $p_prac .= "'".$_GET['p17']."',";
	if ($_GET['p18'] == '')
	{
		$p_prac .= "'0',";
	}
	else $p_prac .= "'".$_GET['p18']."',";
	if ($_GET['p19'] == '')
	{
		$p_prac .= "'0',";
	}
	else $p_prac .= "'".$_GET['p19']."',";

	if ($_GET['p20'] == '')
	{
		$p_prac .= "'0000-00-00',";
	}
	else $p_prac .= "'".$_GET['p20']."',";
	if ($_GET['p23'] == '')
	{
		$p_prac .= "'-',";
	}
	else $p_prac .= "'".$_GET['p23']."'";

	$dbb->add_to_table("ped_prac", "pr,im,pb,stat,adres,tel1,tel2,year_at,navch_zak,spec,kval,sumisnik,no_spec,date_rob,staj_y, staj_m, date_kursy,prymytka", $p_prac);
	$dbb->add_to_table1("p_prac_cat","p_prac,cat_prac",$_GET['p9'],"id_ped_prac","ped_prac");
    if ($_GET['p10'] != '-')
    {
    	$dbb->add_to_table1("zv_nag","p_prac,zv",$_GET['p10'],"id_ped_prac","ped_prac");
    }
    $dbb->add_to_table1("p_ped_prac","p_prac,posada",$_GET['p11'],"id_ped_prac","ped_prac");
	if ($_GET['p21'] != '-')
	{
		$dbb->add_to_table1("klas_ker","k_ker,klas",$_GET['p21'] + $_GET['p22'],"id_ped_prac","ped_prac");
	}
for ($i = 1; $i <= $_GET['kp']; $i++)

{
	if (isset($_GET['pred'.$i]))
	{
		$dbb->add_to_table1("vik_pred","p_prac, pred",$_GET['pred'.$i],"id_ped_prac","ped_prac");

	}
}
   //echo $p_prac;

?>