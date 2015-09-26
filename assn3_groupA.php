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
    h2 {
        font: bold 14px/20px 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;
    }
    h3 {
        font: 10px/14px 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;
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

?>

   <section>
    
    <form method="POST" action="assn3_groupA.php" id="myStudentInfo" name="myStudentInfo">
    <fieldset>
    
    <legend>Student Survey:
    </legend>
    
    <h2>Please Select Your Primary CCSF Department:<br />
        <input type="radio" name="department" value="vmd">&nbsp;Visual Media Design (VMD)<br />
        <input type="radio" name="department" value="cs">&nbsp;Computer Science (CS)
    </h2>
    
        <h2>What web programming topics are you studying?</h2>
        <h3>(you may select as many as you like)</h3>
        
        <table>
            <colgroup>
                <col style="width:160px">
                <col style="width:160px">
            </colgroup>

            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="HTML5 ">HTML5</td>
	            <td><input type="checkbox" name="myTopics[]" value="CSS3, ">CSS3</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="JavaScript ">JavaScript</td>
	            <td><input type="checkbox" name="myTopics[]" value="PHP ">PHP</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="my/SQL ">my/SQL</td>
	            <td><input type="checkbox" name="myTopics[]" value="Python ">Python</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="ASP.net ">ASP.net</td>
	            <td><input type="checkbox" name="myTopics[]" value="Perl ">Perl</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="Li/Unix ">Li/Unix</td>
	            <td><input type="checkbox" name="myTopics[]" value="Apache ">Apache</td>
            </tr>
            <tr>
	            <td><input type="checkbox" name="myTopics[]" value="WordPress">WordPress</td>
	            <td><input type="checkbox" name="myTopics[]" value="Bootstrap">Bootstrap</td>
            </tr>
            
        </table>
    
    <h3><input type="checkbox" name="badTouch" value="true">&nbsp;Whatever you do, do not select this box!</h3>
    
    <input type="submit" value="Submit">
    <input type="reset" value="Clear Form">
    
    </fieldset>
    </form>
</section>

</body>
</html>