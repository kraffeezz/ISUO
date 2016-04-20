<?
  echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
  echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">";
  echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en-US\" lang=\"en-US\">";
  echo "<head>";
  echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=\"utf-8\" />";
  echo "<title>Система управління базою даних Городищенської ЗОШ І-ІІІ ступенів</title>";
  echo "<script src=\"js\\jquery-2.1.4.js\"></script>";
  echo "<script src=\"js\\maskedinput.js\"></script>";
  echo "<script src=\"js\\head.js\"></script>";

  echo "<script type=\"text/javascript\">

           jQuery(function($){
   	               $(\".phone1\").mask(\"(999) 999-9999\");
   	               $(\".phone2\").mask(\"(999) 999-9999\");
   	               $(\".phone3\").mask(\"(999) 999-9999\").css({'box-shadow':'0px 0px 10px 2px red'});

  	             });

           function onclick_(a)
           {
              document.location.href =\"".$_SERVER['PHP_SELF']."?work_this=\"+a;
           }

       </script>
       <link rel=\"stylesheet\" type=\"text/css\" href=\"css\\cssb.css\">

";
  echo "</head>";
  echo "<body>";
  echo "<h1 align=\"center\"><font color=\"#00FF40\">ІСУО Городищенської ЗОШ І-ІІІ ступенів!!!</font></h1>";



?>