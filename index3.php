<html>
<head><title></title></head>
<body>

    <?php
    /**
     * Created by PhpStorm.
     * User: RSadykov
     * Date: 02.08.2016
     * Time: 15:23
     *
     */
    echo "<form method='get' action='index3.php'>";
    if (isset($_GET['posted'])=='OK'){

        echo "<b>Posted</b><br/>";
        echo "<input type='submit' value='OK' name='posted' />";
    } else{
        echo "<b>UNPOSTED</b><br/>";
        echo "<input type='submit' value='OK' name='posted' />";
    }
    echo "</form>";

    ?>



</body>
</html>