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
/* Latest version includes optimizations and enhancements, see git commit changes for further notes */
$form_html_header = "<section><form id='myStudentInfo' name='myStudentInfo'><fieldset>";
$form_legend = array("...and a Rickroll:", "Bummer Message:", "Awesome Sauce:");
$topics_key = array("html"=>"HTML5", "css"=>"CSS3", "javaS"=>"JavaScript", "php"=>"PHP", "sql"=>"my/SQL", "monty"=>"Python", "asp"=>"ASP.net", "prl"=>"Perl", "unix"=>"Li/Unix", "apache"=>"Apache", "wdPs"=>"WordPress", "btSp"=>"Bootstrap");
$keys = array_keys($topics_key);
/* validation block: */
	/* post and "don't checked" = true? Rickroll 4 U! */
if (($_SERVER["REQUEST_METHOD"]=="POST") && !empty($_POST['badTouch'])) {
	print $form_html_header;
    	print "<legend>{$form_legend[0]}</legend>";
    	print "<h2>You were warned not to check that box!</h2><p>Just remember, you earned it. Now perhaps go back and try again?</p>";
    	print "<h3>...and for goodness sake please DO NOT check that last \"don't check!\" checkbox again. We don't want to wear poor Rick out do we?</h3>";
	print "<iframe width='400' height='225' src='https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe><br /><br />";
}
	/* else, if post and either or both fields empty, then Bummer 4 U! */
elseif (($_SERVER["REQUEST_METHOD"]=="POST") && (empty($_POST['department']) || empty($_POST['myTopics']))) {
    print $form_html_header;
    print "<legend>{$form_legend[1]}</legend><h2>Errors for you!</h2>";
    print "<p>Please go back and be sure to choose a primary department and at least one topic of interest.</p><h2>Thank you!</h2>";
    print "<h3>Good thing you didn't check that last \"don't check!\" checkbox.</h3>";
}
/* form processing block: */
	/* if has passed full validation then process and return Awesome Sauce! */
elseif (count($_REQUEST)) {
    /* put data into variables */
    $department = $_POST['department'];
    $topics = $_POST['myTopics'];
    print $form_html_header;
    print "<legend>{$form_legend[2]}</legend>";
    print "<h2>Your submission is confirmed</h2>";
    print "<h2>Your Department:</h2><p>$department</p>";
    print "<h2>and your topic(s) of interest:</h2><p>";
    /* Return each topic in the posted array, in a fancy and readable way */
    foreach ($topics as $i) {
        if ($i==end($topics)) {
            if (count($topics)>1) {
                print " and ";
            }
            print " {$topics_key[$i]}.";
        }
        else {
            print " {$topics_key[$i]},";
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
        <input type="radio" name="department" value="vmd - Visual Media Design">&nbsp;Visual Media Design (VMD)<br />
        <input type="radio" name="department" value="CS - Computer Science">&nbsp;Computer Science (CS)
    </h2>
        <h2>What web programming topics are you studying?</h2>
        <h3>(you may select as many as you like)</h3>   
        <table>
            <colgroup>
                <col style="width:160px">
                <col style="width:160px">
            </colgroup>
<!-- add php to generate 2 columns x5 rows -->
<?php
	$j=1;
	foreach($keys as $key_value) {
            if (!$j%2) {
            	print "<tr>";
            }
            print "<td><input type='checkbox' name='myTopics[]' value='$key_value'>$topics_key[$key_value]</td>";
            $j++;
            if ($j%2) {
            	print "</tr>";
            }
	}
?>    
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
