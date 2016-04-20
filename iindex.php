<?php
  $i=1;
for ($i = 1; $i <= $_GET['kp']; $i++)

{
	if (isset($_GET['pred'.$i]))
 echo $_GET['pred'.$i];

}

?>