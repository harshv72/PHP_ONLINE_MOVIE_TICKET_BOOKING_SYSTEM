<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Vnox World</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Gill_Sans_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="js/ie_png.js"></script>
<script type="text/javascript">ie_png.fix('.png, .link1 span, .link1');</script>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<?php 
	$con = mysqli_connect("localhost","root","","movieproject");
	$res = mysqli_query($con,"select * from movies where status = 1");
	
?>
<body id="page1">
<!-- START PAGE SOURCE -->
<div class="tail-top">
  <div class="tail-bottom">
    <div id="main">
      <div id="header">
        <div class="row-1">
          <div class="fleft"><a href="index.php">VNOX <span>World</span></a></div>
          <ul>
              <li><a href="search.php"title="Goto Search Movie"><img src="images/search.png"></li>
            <li><a href="index.php" title="home"><img src="images/icon1.png" alt="" /></a></li>
            <?php
                session_start();
                if(isset($_SESSION['log']))
                {
                    echo '<li><a href="account.php" title="account"><img src="images/icon2.png" alt="" /></a></li>';
                }
                else
                {
                    echo '<li><a href="login.php" title="account"><img src="images/login.png" alt="" /></a></li>';
                }
            ?>
          </ul>
        </div>  
        <div class="row-2">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="upcoming.php" class="active">Upcoming-Movies</a></li>
            <li><a href="about-us.php">About-Us</a></li>
            <li><a href="account.php">Account</a></li>
            <?php
                                
                               if(!isset($_SESSION['log'])){
        			   echo '<li class="last"><a href="login.php">Login</a></li>';
         		   }
                           else
                           {
                               echo '<li class="last"><a href="logout.php">Logout</a></li>';
                           }
                        	  ?>
           
          </ul>
        </div>
      </div>
      <div id="content">
        <div id="slogan">
          <div class="image png"></div>
          <div class="inside">
            <h2>Exciting movies are<span>coming</span></h2>
            <p><br>Book Your seats in advance ...</p>
          </div>
        </div>
      <!--  <div class="box">
          <div class="border-right">
            <div class="border-left">
              <div class="inner">
                <h3>Welcome to <b>VNOX</b> <span>World</span></h3>
                <p>Felitsed vel inte vivamus ant sed sapientesque ero id auctor tincidunt. Enimin ulla mi et nibh turien augue habitudin platea sed orci. Intedonec quis sed condis donec urna lacilis leo quismodo wisi quis.</p>
                <div class="img-box1"><img src="images/1page-img1.jpg" alt="" />Fauctororci cursuspendrerisque ipsum elit congue nibh proin nulla eu urna et. Tordolorem metus fringilla sem facinia sapien in in malesuada vitae quismodo. Ipsumut tellentegest nunc pede id sem gravida natis justo maecenas eu. </div>
                <p>Doneccursus et amet a mattitor condisse laoreet accum wisis sapibulum orci. Cursuscondimentum dolorem pulvinare lacus amet commod tincidunt tellus quisque donec natibus.</p>
              </div>
            </div>
          </div>
        </div> -->
        <?php
        $numResults = mysqli_num_rows($res);
		$counter = 0
        
        ?>
        <div class="content" style="padding: 0 !important">
          <h3>Upcoming <span>Movies</span></h3>
          
          <ul class="movies"> 

            <?php while($row = mysqli_fetch_array($res)) {  if( ($counter+1)%3!=0)	{?>
            	
            		<li>
              	 		<?php echo "<h4>".strtoupper($row['movietitle'])."[".$row['language']."]</h4>";?>
               			<img src="<?php echo $row['poster']; ?>" height="300px" width="200px" style="margin: 0;" />
                    <?php echo "<h3>Rating $row[rating]"."/10</h3>";?>
               			<?php echo "<p>$row[storyline]</p>";?>
               			<div class="wrapper"><a href="book.php?mid=<?php echo $row['mid'];?>" class="link2"><span><span>Book Advance</span></span></a> &nbsp;  <a href="<?php echo $row['trailer_link']?>" class="link2" target="_blank"><span> <span> See Trailer</span> </span></a> </div>
            		</li>
            		&nbsp;
        		<?php } else {?>

        			<li class="last">
             	 		  <?php echo "<h4>".strtoupper($row['movietitle'])."[".$row['language']."]</h4>";?>
              			<img src="<?php echo $row['poster']; ?>" height="300px" width="200px" style="margin: 0;" />
              			<?php echo "<h3>Rating $row[rating]"."/10</h3>";?>
                    <?php echo "<p>$row[storyline]</p>";?>
              			<div class="wrapper"><a href="book.php?mid=<?php echo $row['mid'];?>" class="link2"><span><span>Book Advance</span></span></a> &nbsp; <a href="<?php echo $row['trailer_link']?>" class="link2" target="_blank"><span> <span> See Trailer</span> </span></a> </div>
            		</li>
           			<li class="clear">&nbsp;</li>
            	<?php } ?>
           	
            <?php $counter++; } ?>
            
          </ul>
        </div>
      </div>
      <!--<div id="footer">
        <div class="left">
          <div class="right">
            <div class="footerlink">
              <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
              <p class="rf">Design by <a href="http://www.templatemonster.com/">TemplateMonster</a></p>
              <div style="clear:both;"></div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>