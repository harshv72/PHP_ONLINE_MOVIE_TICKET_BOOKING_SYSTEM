<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
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
<style>
    input[type=text]{
         width:293px;
	       padding:1px 0 1px 3px;
	       background:#000;
	       border:1px solid #3a3a3a;
	       color:#fff;
    }     
    input[type=password]{
        width:293px;
	      padding:1px 0 1px 3px;
	      background:#000;
	      border:1px solid #3a3a3a;
	      color:#fff;
    }     
</style>

<body id="page2">
    
<!-- START PAGE SOURCE -->
<div class="tail-top">
  <div class="tail-bottom">
    <div id="main">
      <div id="header">
        <div class="row-1">
          <div class="fleft"><a href="index.php">Vnox <span>World</span></a></div>
          
          <ul>
              <li><a href="adminindex.php" title="home"><img src="images/icon1.png" alt="" /></a></li>
            <?php
                if(isset($_SESSION['log']))
                {
                    echo '<li><a href="users.php" title="users  "><img src="images/icon2.png" alt="" /></a></li>';
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
              <li><a href="adminindex.php">Movies</a></li>
            <li><a href="shows.php">Shows</a></li>
            <li><a href="suggestion.php">Suggestions</a></li>
            <li><a href="users.php" class="active">Users</a></li>
            <?php
               if(isset($_SESSION['log'])){
                  echo '<li class="last"><a href="logout.php">Logout</a></li>';
               }
               else {
                 echo '<li class="last"><a href="login.php">Login</a></li>';
               }
            ?>
          </ul>
        </div>
     </div>
     <?php
        if(!isset($_SESSION['log']))
        {
            header('location:login.php');
        }
        else{
        $con= mysqli_connect("localhost", "root", "", "movieproject");
        $sql = "select count(*) from users where id!='11'";
        $res = mysqli_query($con, $sql);
        
        $r1 = mysqli_fetch_array($res);
        
        
        $sql1 = "select * from users where id!='11'";
        $res1 = mysqli_query($con,$sql1);
        
        
        
        
     ?>
      <div id="content">
        <div class="line-hor"></div>
          <div class="box">
            <div class="border-right">
              <div class="border-left">
                <div class="inner">
                   <div class="content">
                        <h3>Total <span>Users:</span><?php echo $r1[0]; ?></h3>
                        
                       <?php while( $row = mysqli_fetch_array($res1))
                       {
                        ?>   
                                <table border="0">
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">UserName:</td>
                                    <td><b><?php echo $row['username']?></b></td>
                                </tr>
                                
                                
                                                      
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">Firstname:</td>
                                    <td><b><?php echo $row['firstname'] ?></b></td>
                                </tr>
                                
                                <tr style="height: 30px;">
                                    <td style="width: 100px;">Lastname:</td>
                                    <td><?php echo $row['lastname'] ?></td>
                                </tr>
                                </table>
                            <br><br><p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                       <?php } ?>       
                              
                                
                           
                            
                    </div>
              </div>
            </div>
       		</div>
        </div>
      </div>
        <?php } ?>
    </div> 
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<!-- END PAGE SOURCE -->
</body>
</html>

