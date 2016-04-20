<?php

define('JPATH_BASE', dirname(__FILE__) );

define( 'DS', DIRECTORY_SEPARATOR );

//setcookie("id_user","0");
require_once(JPATH_BASE .DS.'configuration.php');
$a_cook = 0; $nz = 1;
$dbb = NULL;
if (isset($_COOKIE["id_user"]))
{
	$a_cook = 1;
	$dbb = new Bconfig();
	if ($dbb->set_id_cook($_COOKIE['id_user'])== 0)
	{
		//setcookie('id_user','');
		$nz = 1;
	}
	else
	{
		//echo 'gppoodd!!!';
		$nz = 3;
		/*echo count($_GET).'tooo';
		echo $_GET[2];*/

	}

}


   if (!isset($_GET['work_this']))
   {
   	   if ($nz !=3) {

   	   	$nz = 1;}
        //require(JPATH_BASE .DS.'html'.DS.'vhid.php');
   }
   elseif($_GET['work_this'] == 0)
   {

   	    $dbb = new Bconfig();
   	    $user = ''; $pass = '';
   	    if (isset($_GET['username']) && isset($_GET['parol']))
   	    {
   	        $user = $_GET['username'];
   	    	$pass = $_GET['parol'];
   	    	$is = $dbb->is_user($user, $pass) ;
   	    	if ($is!= '0')
   	    	{
   	    		setcookie('id_user', $is);
   	    		$nz = 3;
   	    	}
   	    	else $nz = 2;
   	    }


   }



require_once(JPATH_BASE .DS.'html'.DS.'head.php');
if (($nz == 1) || ($nz == 2))
{
    require_once(JPATH_BASE .DS.'html'.DS.'vhid.php');
	if ($nz == 2)
	{
		echo '<p align = center> Невірний пароль </p>';
	}
}

if ($nz == 3)
{
   if (isset($_GET['work_this']))
    {
   	    $wt = $_GET['work_this'];
   	    if ($wt != 1)
   	    {
   	            require_once(JPATH_BASE .DS.'html'.DS.'home.php');
   	    }
   		/*if ($wt == 0)
   		{
   		   require_once(JPATH_BASE .DS.'html'.DS.'home.php');
   		}*/
   	    if($wt==1)
   	    {
   	       	$dbb->_exit($_COOKIE['id_user']);
   	    	require_once(JPATH_BASE .DS.'html'.DS.'vhid.php');
   	    }
   	    if ($wt == 2)
   	    {
   	    	require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
   	    }
   	    if ($wt == 3)
   	    {
   	    	$dbb->setrr();
   	    }
   	    if ($wt == 5)
   	    {
   	    	require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
   	        require_once(JPATH_BASE .DS.'html'.DS.'addkadryped.php');
   	    }
     	if ($wt == 6)
    	{
    		require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
     		echo "
                     <p align =\"center\">
                     <font color = red>
                     Дані збережено!!!
                     </font>
                     </p>
                 ";
     		require_once(JPATH_BASE .DS.'savepedkadry.php');
   	     	require_once(JPATH_BASE .DS.'html'.DS.'addkadryped.php');
   	    }
   	    if ($wt == 7)
   	    {
   	    	require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
   	    	require_once(JPATH_BASE .DS.'html'.DS.'zpop.php');
   	    }
	   	if ($wt == 8)
	   	{
	   		require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
	   		require_once(JPATH_BASE .DS.'html'.DS.'zpop.php');
	   		require_once(JPATH_BASE .DS.'html'.DS.'allpedprac.php');
	   	}

	   	if ($wt == 9)
	   	{
	   		require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
	   		require_once(JPATH_BASE .DS.'html'.DS.'zpop.php');
	   		require_once(JPATH_BASE .DS.'opc'.DS.'perevpp.php');
	   	}
	   	if ($wt == 10)
	   	{
	   		require_once(JPATH_BASE .DS.'html'.DS.'kadry.php');
	   		require_once(JPATH_BASE .DS.'html'.DS.'zpop.php');
	   		require_once(JPATH_BASE .DS.'opc'.DS.'del_prac.php');
	   		require_once(JPATH_BASE .DS.'html'.DS.'allpedprac.php');
	   	}

   	}
	else require_once(JPATH_BASE .DS.'html'.DS.'home.php');
}
//echo JPATH_BASE,'@@@', __FILE__,'@@@', DS , '<p>';
//echo JPATH_BASE .DS.'includes'.DS.'defines.php';
?>

