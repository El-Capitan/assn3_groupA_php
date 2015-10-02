<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Info. Page</title>
<style>
    body {
        background-color: #42140D;
    }
    section {
        margin: 0 auto;
        padding: 12px;
        height: 400px;
        max-width: 450px;
        min-width: 200px;
    }
    legend {
        font-weight: bold;
    }
    h2 {
        font: bold 14px/20px 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;
    }
    h3 {
        font: 10px/14px 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;
    }
    p {
        font: bold 12px/16px 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;
    }
    #myStudentInfo {
        background-color: #E2D8D6;
        padding: 6px 8px 8px;
        border-radius: 4px;
        box-shadow: 4px 4px 4px #0D0403;
    }
</style>
</head>
<body>
<?php
/*all I got to say is it was excellent to see a couple strong approaches to this page...
Edison went the full-distance using php to generate the page nearly from top to bottom,
an issue encountered was that the 'reset' button no longer worked to clear the form.
-Patrick */
/* validation block:
    if data submitted is true AND either dept or topics are empty OR if submitted is true and 'badTouch isn't empty return with an error page */
if (($_SERVER["REQUEST_METHOD"]=="POST") && (empty($_POST['department']) || empty($_POST['myTopics'])) || !empty($_POST['badTouch'])) {
    print "<section><form id='myStudentInfo' name='myStudentInfo'><fieldset>";
    print "<legend>Bummer Message:</legend><h2>Errors for you!</h2>";
    print "<p>Please go back and be sure to choose a primary department and at least one topic of interest.</p><h2>Thank you!</h2>";
    print "<h3>...and for goodness sake please DO NOT check that last \"don't check!\" checkbox.</h3>";
}
/* form processing block:
    if passes validation and there is data provided, make the magic happen! */
elseif (count($_REQUEST)) {
    /* put our data into variables */
    $department = $_POST['department'];
    $topics = $_POST['myTopics'];
    print "<section><form id='myStudentInfo' name='myStudentInfo'><fieldset>";
    print "<legend>Awesome Sauce:</legend>";
    print "<h2>Your submission is confirmed</h2>";
    print "<h2>Your Department:</h2><p>$department</p>";
    print "<h2>and your topic(s) of interest:</h2><p>";
    foreach ($topics as $i) {
        if ($i==end($topics)) {
            if (count($topics)>1) {
                print " and ";
            }
            print " $i.";
        }
        else {
            print " $i,";
        }
    }
    print "</p><h3>...and you didn't check the box!</h3><h2>Thank you!</h2>";
}
else {
?> 
   <section>
    <form method="POST" action="assn3_groupA.php" id="myStudentInfo" name="myStudentInfo">
    <fieldset>
    <legend>Student Survey:
    </legend>
    <h2>Please Select Your Primary CCSF Department:<br />
        <input type="radio" name="department" value="VMD - Visual Media Design">&nbsp;Visual Media Design (VMD)<br />
        <input type="radio" name="department" value="CS - Computer Science">&nbsp;Computer Science (CS)
    </h2>
        <h2>What web programming topics are you studying?</h2>
        <h3>(you may select as many as you like)</h3>   
        <table>
            <colgroup>
                <col style="width:160px">
                <col style="width:160px">
            </colgroup>
<!-- I did not use php to generate the table, BUT this can be added, was keeping the integration simple -->
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="HTML5">HTML5</td>
	            <td><input type="checkbox" name="myTopics[]" value="CSS3">CSS3</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="JavaScript">JavaScript</td>
	            <td><input type="checkbox" name="myTopics[]" value="PHP">PHP</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="my/SQL">my/SQL</td>
	            <td><input type="checkbox" name="myTopics[]" value="Python">Python</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="ASP.net">ASP.net</td>
	            <td><input type="checkbox" name="myTopics[]" value="Perl">Perl</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="Li/Unix">Li/Unix</td>
	            <td><input type="checkbox" name="myTopics[]" value="Apache">Apache</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="WordPress">WordPress</td>
	            <td><input type="checkbox" name="myTopics[]" value="Bootstrap">Bootstrap</td>
            </tr>     
        </table>   
    <h3><input type="checkbox" name="badTouch" value="true">&nbsp;Whatever you do, do not select this box!</h3>    
    <input type="submit" value="Submit">
    <input type="reset" value="Clear Form">
<?php
}
?>
    </fieldset>
    </form>
</section>
</body>
</html>
