<?php
require_once './connect-db.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Baby Names Survey</title>
       
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet">
   </head>
    
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Vote for your favorite baby names!</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu<i class="fa fa-bars"></i>
                </button>
            </div>
       </nav>
        <header class="masthead">
              <div class="container h-100">
                  <div class="row h-100">
                      <div class="col-lg-7 my-auto">
                            <div class="header-content mx-auto">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <label><p>Enter your favorite baby name for boy:</p> </label><input type="text" name="boyname" value="<?php echo $boyname;?>">
                                    <span class="error">* <?php echo $boynameErr;?></span>
                                    <br><br>
                                    <label><p>Enter your favorite baby name for girl:</p></label> <input type="text" name="girlname" value="<?php echo $girlname;?>">
                                    <span class="error">* <?php echo $girlnameErr;?></span>
                                    <br><br>
                                    <input type ="submit" value ="Submit" class="btn btn-outline btn-xl js-scroll-trigger"/>
                                </form>  
                                <?php
                                    echo "<br>";
                                    echo "<a>You entered:</a>";
                                    echo "<br>";
                                    echo $boyname;
                                    echo "<br>";
                                    echo $girlname;
                                    echo "<br>";
                                ?>
                          </div>
                     </div>
                      
                     <div class="col-lg-5 my-auto">
                          <div class="device-container">
                              <div class="device">
                              <h1 class="mb-5">Top 10 baby names:</h1>
                              <p></p>
                              
                            <?php                             
                                  $sql = "Select boyname, count(*) from babyname
                                  WHERE boyname !=''
                                  Group by boyname
                                  Order by count(*) desc
                                  Limit 10";
                                  $rank = NULL;
                                  if($result = mysqli_query( $db, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table>";
                                        echo "<tr>";
                                        echo "<th>Male Names    </th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                             echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                             echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                             echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                        echo "<th>Votes         </th>";
                                        echo "</tr>";
                            
                                        while($row = mysqli_fetch_array($result)){
           
            
                                            echo "<tr>";

                                            echo "<td>" . $row['boyname'] . "</td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                        echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td>" . $row['count(*)'] . "</td>";
                                        echo "</tr>";
                                        }
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                    } 
                                else
                                {
                                    echo "No records matching your query were found.";
                                }
                            } 
                                  else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                                        }
?>   
                                    <?php 
                                    $sql = "Select girlname, count(*) from babyname
                                    WHERE girlname !=''
                                    Group by girlname
                                    Order by count(*) desc
                                    Limit 10";

                                    if($result = mysqli_query( $db, $sql)){
                                        if(mysqli_num_rows($result) > 0){

                                            echo "<table>";
                                                echo "<tr>";
                                                    echo "<th>Female Names    </th>";
                                              echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                             echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                             echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                            echo "<th></th>";
                                                    echo "<th>Votes        </th>";
                                                echo "</tr>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td>" . $row['girlname'] . "</td>";
                                                 echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                 echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                 echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td></td>";
                                                    echo "<td>" . $row['count(*)'] . "</td>";
                                                echo "</tr>";

                                                }
                                            echo "</table>";
                                            // Free result set
                                            mysqli_free_result($result);
                                        } 
                                        else{
                                            echo "No records matching your query were found.";
                                        }
                                    } 

                                    else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                                    }
                                    ?>                             

                              </div>
                        </div>
                      </div> 
                </div>
             </div>
         </header>
         <footer>
            <div class="container">
                <p>&copy; Baby Names Survey 2018. All Rights Reserved.</p>
            </div>
        </footer>
        
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>
    </body> 
</html>