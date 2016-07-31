<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Long Entry Generation</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="Styles/default.css"/>
    <script type="text/javascript" src="Scripts/tableManage.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="Scripts/jquery.validate.min.js"></script>
    <script src="Scripts/is.mobile.js" type="text/javascript"></script>
    <script src="Scripts/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="Scripts/validationScript.js"></script>
</head>
<body>
<form action="index.php" class="register" method="get" id="LongEntry">

<?php
/**
 * Created by PhpStorm.
 * User: RSadykov
 * Date: 02.08.2016
 * Time: 14:02
 */
if (!isset($_GET['posted'])){
     ?>
    <h1>Long Entry Generation Script</h1>
    <fieldset class="row1">
        <legend>Ticket Information</legend>
        <p>
            <label style="width: 120px">Airline account code:</label>
            <input name="airlineAccountCode" required="required" type="text" style="width: 50px;" maxlength="3"/>
            <label>Ticket number:</label>
            <input name="ticketNumber" required="required" type="text" style="width: 150px;" maxlength="10"/>
        </p>
        <p>
            <label>Departure date:</label>
        </p>
        <p>
            <label style="width: 120px">Day - </label>
            <input name="departureDay" required="required" type="text" style="width: 50px;" maxlength="2"/>
            <label style="width: 100px">Month - </label>
            <input name="departureMonth" required="required" type="text" style="width: 50px" maxlength="2"/>
            <label style="width: 37px">Year - </label>
            <input name="departureYear" required="required" type="text" style="width: 50px" maxlength="2"/>
        </p>
        <p>
            <label style="width: 120px">Departure airport:</label>
            <input name="departurePort" required="required" type="text" style="width: 30px;" maxlength="3"/>
        </p>
        <p>
            <label style="width: 120px">Passenger:</label>
            <input name="pnr" required="required" type="text" style="width: 313px;"/>
        </p>
        <div class="clear"></div>
    </fieldset>
    <fieldset class="row2">
        <legend>Legs Details</legend>
        <p>
            <input type="button" value="Add Leg" onClick="addRow('dataTable')" />
            <input type="button" value="Remove Leg" onClick="deleteRow('dataTable')"  />
        </p>
        <table id="dataTable" class="form" border="1">
            <tbody>
            <tr>
                <p>
                <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                <td>
                    <label>Carrier code:</label>
                    <input type="text" required="required" name="carrierCode[]" style="width: 50px" maxlength="2">
                </td>
                <td>
                    <label>Service class:</label>
                    <input type="text" required="required" class="small"  name="serviceClass[]" style="width: 20px" maxlength="1">
                </td>
                <td>
                    <label>Destination city:</label>
                    <input type="text" required="required" name="destinationCity[]" style="width: 50px" maxlength="3"/>
                </td>
                </p>
            </tr>
            </tbody>
        </table>
        <div class="clear"></div>
    </fieldset>
    <fieldset class="row4">
        <legend>Generated long entry row</legend>
        <p>
            <input class="submit" type="submit" value="Confirm &raquo;" name="posted" id="posted"/>
        </p>
        <p>
            <input type="text" required="required" name="result" style="width: 830px" readonly/>
        </p>
        <p>
            <label style="width: 140px">The size of long entry is:</label>
            <input type="text" required="required" name="size" style="width: 20px" readonly/>
        </p>
        <p>
            <input class="submit" type="submit" value="Copy"/>
        </p>
        <div class="clear"></div>
    </fieldset>
    <div class="clear"></div>
</form>
<?php
} else{
    try{
        $restrictedTicketIndicator="0";
        $agencyCode="";
        for ($i=0;$i<8;$i++){
            $agencyCode.=" ";
        }
        $agencyCodeLen=strlen($agencyCode);
        if ($agencyCodeLen!=8){
            throw new Exception("<b>Agency Code</b> must be only 8 symbols");
        }
        $extensionIndicator="01";
        $stopOverCode=" ";
        $airlineAccountCode = $_GET['airlineAccountCode'];
        if (!mb_ereg("([0-9][0-9][0-9])"))
        //
        $ticketNumber = $_GET['ticketNumber'];
        //
        $departureDay = $_GET['departureDay'];
        //
        $departureMonth = $_GET['departureMonth'];
        //
        $departureYear = $_GET['departureYear'];
        //
        $departurePort = $_GET['departurePort'];
        $pnr = $_GET['pnr'];
        $carrierCode = $_GET['carrierCode'];
        $serviceClass = $_GET['serviceClass'];
        //
        $destinationCity = $_GET['destinationCity'];
        $result = "";
        $size = 0;
        $checksum = 0;
        $chk=$_GET['chk'];
        $space="";
        $counter=0;

        $result.=$extensionIndicator.$agencyCode;
        for ($i=0;$i<count($carrierCode);$i++){
            if ($chk[$i]=='on'){
                $result.=strtoupper($carrierCode[$i]).strtoupper($serviceClass[$i]).$stopOverCode.strtoupper($destinationCity[$i]);
                $counter++;
            }
        }
        for ($i=$counter;$i<4;$i++){
            $space.="       ";
        }
        $spaceLen=strlen($space);
        $result.=$space.$restrictedTicketIndicator.$airlineAccountCode.$ticketNumber;
        $checksum=$ticketNumber-(floor($ticketNumber/7)*7);
        $result.=$checksum.$departureMonth.$departureDay.$departureYear.strtoupper($departurePort);
        $pnr=str_replace(" ","",$pnr);
        if (strlen($pnr)<20){
            for ($i=strlen($pnr); $i<20;$i++){
                $pnr.=" ";
            }
        } else{
            $pnr=substr($pnr,0,20);
        }
        $pnrLen=strlen($pnr);
        $result.=strtoupper($pnr);
        $checksum=strlen($result);
    } catch (Exception $e){

    }




}
?>
</body>
</html>
