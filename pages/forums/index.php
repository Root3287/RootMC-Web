<?php
$page ="Forums";
$path="../../";
require($path."php/config.php");
?>
<html>
  <head>
    <title><?php echo $config['SERVERNAME']." &bull; ". $page?></title>
  </head>
  <body>
  	<?php
  	  /*
  	    IF index?page=something
  	    If index?page=something&c=Serverinfo
  	    IF index?page=something&c=Servernfo&f=news
  	    If index?page=something&c=Serverinfo&f=news&t=This topic
  	                ^ HOPEFULLY THIS WORKS ^
  	  */
  		if( (isset($_GET['page'])) || (isset($_GET['page']))&&(isset($_GET['c'])) || (isset($_GET['page']))&&(isset($_GET['c']))&&(isset($_GET['f'])) || (isset($_GET['page']))&&(isset($_GET['c']))&&(isset($_GET['f']))&&(isset($_GET['t'])) ){
  		  switch($_GET['page']){
  		    case "cat":
  		      //List all the catagoies
  		      break;
                  case "forums":
  		      //LIST ALL FORUMS
  		      break;
                  case "topic":
  		      //TOPIC PAGE HERE
  		      break;
  		    case default
  		      //GOTO: CAT
  		      break;
  		  }
  		}
  	?>
  </body>
</html>
