<?php
/**
 * Created by PhpStorm.
 * User: RSadykov
 * Date: 27.07.2016
 * Time: 12:39
 */
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE html";
echo "   PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"";
echo "\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">";
echo "<head>";
echo "   <title>Lond Entry Creator</title>";
echo "</head>";
echo "<body>";

echo "<form action=\"LogEntry.php\" method=\"post\">";
echo "   <table style=\"border: medium black;\">";
echo "       <thead>";
echo "        <tr style=\"font-style: oblique; font-weight: bolder; border: thick solid;\">";
echo "            <td style=\"border: solid black; width: 50px\">Airline Code</td>";
echo "            <td style=\"border: solid black; width: 50px\">Service Class</td>";
echo "            <td style=\"border: solid black; width: 80px\">Destination</td>";
echo "            <td style=\"border: solid black; width: 50px\">Legs</td>";
echo "            <td style=\"border: solid black; width: 80px\">Airline account code</td>";
echo "            <td style=\"border: solid black; width: 200px\">Ticket's number</td>";
echo "            <td style=\"border: solid black; width: 100px\">Departure date (MMddyy)</td>";
echo "            <td style=\"border: solid black; width: 80px\">Departure airport code</td>";
echo "            <td style=\"border: solid black; width: 250px\">Passenger name and surname</td>";
echo "        </tr>";
echo "        </thead>";
echo "        <tbody>";
echo "        <tr>";
echo "            <td style=\"width: 50px\"><input style=\"width: 50px\"/></td>";
echo "            <td style=\"width: 50px\"><input style=\"width: 50px\"/></td>";
echo "            <td style=\"width: 80px\"><input style=\"width: 80px\"/></td>";
echo "            <td style=\"width: 50px\"><button style=\"width: 50px\">ADD</button></td>";
echo "            <td style=\"width: 80px\"><input style=\"width: 80px\"/></td>";
echo "            <td style=\"width: 200px\"><input style=\"width: 200px\"/></td>";
echo "            <td style=\"width: 100px\"><input style=\"width: 100px\"/></td>";
echo "            <td style=\"width: 80px\"><input style=\"width: 80px\"/></td>";
echo "            <td style=\"width: 250px\"><input style=\"width: 250px\"/></td>";
echo "        </tr>";
echo "        </tbody>";
echo "    </table>";
echo "    <br/><br/>";
echo "    <input type=\"submit\" value=\"Generate\"/>";
echo "    <h3>Long Entry Text Field:</h3>";
echo "    <input/>";
echo "</form>";
echo "</body>";
echo "</html>";