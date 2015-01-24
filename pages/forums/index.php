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
  		      if($_GET['c'] !=null){
  		      	//getC
  		      ?>
  				<div class='main'>
  					<div class='nav'>
  						<?php include $path.'asset/includes/nav.php';?>
  					</div>
  		    		<div class='body'>
  		    			<div class='container'>";
  							<?php getAllCatToHTML(); ?>
  		    			</div>
  		      		</div>
  				</div>
  			<?php 
  		      }else{
  		      	if(catNotNull($_GET['c'])){
  		      	//other webpage
  		      	}
  		      }
  		      break;
                  case "forums":
  		      //LIST ALL FORUMS
  		      break;
                  case "topic":
  		      
  		      break;
  		    default:
  		      //GOTO: CAT
  		      break;
  		  }
  		}
  	?>
  </body>
</html>
