<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>BShop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/layout.css" type="text/css" media="all">
        <link rel="stylesheet" href="styles/mediaqueries.css" type="text/css" media="all">
        <script src="scripts/jquery-1.7.2.min.js"></script>
        <script src="scripts/jquery-mobilemenu.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.topnav').mobileMenu({
                    combine: false,
                    switchWidth: 600,
                    prependTo: 'nav#topnav'
                });
            });
        </script>
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="styles/ie.css" type="text/css" media="all">
        <script src="scripts/css3-mediaqueries.min.js"></script>
        <script src="scripts/html5shiv.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include 'header.html'; ?>
        <!-- content -->
        <div class="wrapper row2">
            <div id="container">
                <!-- ################################################################################################ -->
                <div id="content">
                    <!-- ########################################################################################## -->


                    <section id="comments">
                        <h2>Welcome <?php echo $_GET["username"] ?></h2>
                        <?php
  
                        require "src/UserDao.php";
                        
                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        $key = $_GET["username"];
                        echo $key;
                        
                        //retrieves user_name from session that is logged in
                        $user_name = $_SESSION[$key];
                        
                        echo "user name in session store $user_name";
                        $userDao = new UserDao();
                        $result = $userDao->getUser($user_name);

 
                        setlocale(LC_ALL, "de_DE");
                        echo "It's now: &nbsp;" . strftime("%A %d %B %Y %H:%M:%S", time()) . "<br>";
                        echo "<br>";
                        echo "<table>";
                        echo "<thead>
                                    <th>Saulation</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Confirm Password</th>
                                    </thead>";
                        echo "<tbody>";
                        echo "<tr class=light>
                                    <td>$result->firstname</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>";
                        echo "</tbody>";
                        echo "</table>";
                        ?>
                    </section>
                    <!-- ########################################################################################## -->
                </div>
                <!-- right column -->
                <aside id="right_column">
                    <!-- ########################################################################################## -->
                    <h2>My Favourites</h2>


                    <!-- /nav -->

                    <!-- ########################################################################################## -->
                </aside>
                <!-- ################################################################################################ -->
                <div class="clear"></div>
            </div>
        </div>
        <!-- Footer -->
        <div class="wrapper row3">
            <footer id="footer" class="clear">
                <p class="fl_left">Copyright &copy; 2013- <a href="#">Domain Name</a></p>
            </footer>
        </div>
    </body>
</html>

