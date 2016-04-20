<?php
function monthDiff($date1, $date2) {
	$rev =  $date1 > $date2 ? -1 : 1;
	if (preg_match("/^(\d{4})\D(\d{1,2})\D(\d{1,2})$/", $rev > 0 ? $date1 : $date2, $m1) && preg_match("/^(\d{4})\D(\d{1,2})\D(\d{1,2})$/", $rev > 0 ? $date2 : $date1, $m2)){
		return $rev * (($m2[1] - $m1[1]) * 12  + ($m2[2] - $m1[2]) - ($m2[3] >= $m1[3] ? 0 : 1));
	}
	return false;
}


   class Bconfig
   {
   	//$dbtype = 'mysqli';
    var $host = '127.0.0.1';
   	var $user = 'root';
   	var $password = '123456';
   	var $dbname = 'isuo_gor';
   	var $dbcnx;
   	var $ver;
   	public function __construct()
   	{
   		$this->dbcnx = @mysql_pconnect($this->host, $this->user, $this->password);
   		if (!$this->dbcnx)
   		{
   			echo "<p>К сожалению, не доступен сервер mySQL</p>";
   			exit();
   		}
   		if (!@mysql_select_db($this->dbname, $this->dbcnx) )
   		{
   			echo "<p>К сожалению, не доступна база данных</p>";
   			exit();
   		}
        $this->ver = mysql_query("SELECT VERSION()");
   		$this->ver = mysql_query("SET NAMES 'utf8' ");
   		//echo mysql_result($this->ver, 0);
   	}
   	public function set_id_cook($cook)
   	{
   		 $this->ver = mysql_query("SELECT id_cook FROM users WHERE id_cook=".$cook);
   		$rows = mysql_num_rows($this->ver);
   		return $rows;

   	}
   	public function setrr()
   	{
   		$bb = time();
   		echo $bb."                ";
   		echo strftime("%d/%m/%y", 1188334800)."@@@@@@@@";
   		echo strtotime("2007-08-29 00:00:00")."^^^^^^^^^^^^^^^";

   	/*	$cc='qwe';
   		$vv='rty';
   		echo($cc.$vv);
   		$stringg = "INSERT INTO predmety  VALUES (1, 'Українська мова'),(2, 'Українська література'),(3, 'Англійська мова'),(4, 'Зарубіжна література'),(5, 'Російська мова')";
        // $this->ver = mysql_query($stringg);
   		echo $this->ver;
         //,(4, '1В'),(5, '2'),(6, '2A'),(7, '2Б'),(8, '2В'),(9, '3'),(10, '3A'),(11, '3Б'),(12, '3В'),(13, '4'),(14, '4A'),(15, '4Б'),(16, '4В'),(17, '5'),(18, '5A'),(19, '5Б'),(20, '5В'),(21, '6'),(22, '6A'),(23, '6Б'),(24, '6В'),(25, '7'),(26, '7A'),(27, '7Б'),(28, '7В'),(29, '8'),(30, '8A'),(31, '8Б'),(32, '8В'),(33, '9'),(34, '9A'),(35, '9Б'),(36, '9В'),(37, '10'),(38, '10A'),(39, '10Б'),(40, '10В'),(41, '11'),(42, '11A'),(43, '11Б'),(44, '11В')");
   		  /*$this->ver = mysql_query("SELECT * FROM zvanyz");
   		 echo mysql_result($this->ver,0,0 );
   		   		 echo mysql_result($this->ver,0,1 );
   		   		 echo mysql_result($this->ver,1,0 );
   		   		 echo mysql_result($this->ver,1,1 );
   		   		 echo mysql_result($this->ver,2,0 );
   		   		 echo mysql_result($this->ver,2,1 );
   		         echo mysql_result($this->ver,3,0 );
   		echo mysql_result($this->ver,3,1 );
   		echo mysql_result($this->ver,4,0 );
   		echo mysql_result($this->ver,4,1 );
   		echo mysql_result($this->ver,5,0 );
   		echo mysql_result($this->ver,5,1 );
   		echo mysql_result($this->ver,6,0 );
   		echo mysql_result($this->ver,6,1 );*/

   	}
   	public function is_user($l, $p)
   	{
   		$this->ver = mysql_query("SELECT id_user FROM users WHERE ((login='".$l."')AND(passwor='".$p."'))");
   		//.") AND(passwor=".$p."))");
   		$rows = mysql_num_rows($this->ver);
   		$tt = 0;
   		if ($rows == 1)
   		{
   			$id = mysql_result($this->ver,0);
   			$tt = time();
   		   	$this->ver = mysql_query("UPDATE users SET id_cook = '".$tt."' WHERE id_user = ".$id);

   		}

		return $tt;


   	}

   public function _exit($cook)
   {
       $this->ver = mysql_query("UPDATE users SET id_cook = '0' WHERE id_cook = ".$cook);
   }

   	public function add_to_table ($name_t, $row,  $value)
   	{
   		$this->ver = mysql_query("INSERT INTO ".$name_t."(".$row.") VALUES(".$value.")");
   		//echo "<p>".$qqq."</p>";
   		//$this->ver = mysql_query("INSERT INTO ".$name_t." (".$row.") VALUES (".$value.")");
   		echo "************************************************";
   		echo $this->ver;
   		return $this->ver;
   	}

   	public function add_to_table1($name_t,$row,$value,$colum,$namet)
   	{
   		$this->ver = mysql_query("SELECT MAX(".$colum.") AS kil FROM ".$namet);
   		$kil = mysql_result($this->ver,0);
   		echo "****".$value."***";
		$this->ver = mysql_query("INSERT INTO ".$name_t."(".$row.") VALUES(".$kil.",".$value.")");
   		//echo "<p>".$qqq."</p>";
   		//$this->ver = mysql_query("INSERT INTO ".$name_t." (".$row.") VALUES (".$value.")");
   		//echo "************************************************";
   		//echo $this->ver."  ^^^^^^   ". mysql_result($this->ver,0);
   		echo $this->ver;
   		return $this->ver;

   	}
   	public function all_ped_prac($colum, $table, $umova)
   	{
   		$stringg = "SELECT ".$colum." FROM ".$table;
   		if ($umova != "-")
   		{
   		   $stringg .= " WHERE ".$umova;
   		}
   		$this->ver = mysql_query($stringg);
   		return $this->ver;
   	}
    public function dell_ped_prac($id_prac)
    {
    	$yes = true;
    	$this->ver = mysql_query("DELETE FROM klas_ker WHERE klas_ker.k_ker = ".$id_prac);
    	$yes &= $this->ver;
    	$this->ver = mysql_query("DELETE FROM p_ped_prac WHERE p_ped_prac.p_prac = ".$id_prac);
    	$yes &= $this->ver;
    	$this->ver = mysql_query("DELETE FROM p_prac_cat WHERE p_prac_cat.p_prac = ".$id_prac);
    	$yes &= $this->ver;
    	$this->ver = mysql_query("DELETE FROM vik_pred WHERE vik_pred.p_prac = ".$id_prac);
    	$yes &= $this->ver;
    	$this->ver = mysql_query("DELETE FROM zv_nag WHERE zv_nag.p_prac = ".$id_prac);
    	$yes &= $this->ver;
    	$this->ver = mysql_query("DELETE FROM ped_prac WHERE ped_prac.id_ped_prac = ".$id_prac);
    	$yes &= $this->ver;

    	if ($yes)
    	{
    		echo true;
    			//"yessssssssssssssssssssss";
    	}else return false;
    }
   }
?>