<html>
<head>

<!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" media="screen">-->
    <title>CSUF Database</title>
    <style>
      form {
        padding: 10px;
      }
      body {
        background-color: #A7DAEB;
        padding: 10px 0px;
      }
      .jumbotron {
        background-color: #F0BA84;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url(http://www.fullerton.edu/_resources/images/Langsdorf-with-flowers.jpg);
        height: 300px;
      }
      h1 {
        background-color: #A7DAEB;
      }
      
    </style>
</head>
<body>
<header>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="" class="navbar-brand">CSUF Databases</a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              
            </ul>
          </div>
        </div>
      </nav><!--end of nav bar-->

    <div class="jumbotron">
      <div class="container text-center">
        <h1>Welcome to CSUF Database</h1>
        <h3><span class="label label-primary">Results of Your Query</span></h3>
    </div>
    
  </header> <!--end of header-->
<style>
table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; padding: 10px; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style> 
<div class="container">
<?php 
$profCourseNo = $_POST["profcoursenumber"];
$profSectionNo = $_POST["sectionnumber"];

//create connection
$link = mysql_connect('ecsmysql', 'cs332f24', 'ohxijeib');
if (!$link){
	die('Could not connect.' . mysql_error());
}
echo '<div class="panel panel-success"><div class="panel-heading">Connected Successfully</div><div class="panel-body">Here is the count of how many students get a distinct grade in this class.</div></div>';
	
//access database
mysql_select_db("cs332f24", $link);
if (!$link){
	die("Unable to select database!");
}

//query for professor-b
$SQL = "SELECT grade, COUNT(*) students FROM enrollment WHERE courseID = $profCourseNo and sectionID = $profSectionNo GROUP BY grade";
$bProfessorList = mysql_query($SQL, $link);

/*while ($row = mysql_fetch_array($bProfessorList))
{
	print_r($row);
	echo "</br>";
}*/

if(mysql_num_rows($bProfessorList)){
	echo '<table cellpadding="0" cellspacing="0" class="db-table table table-striped">';
	echo '<tr><th>Grade</th><th>Students</th></tr>';
	while ($row = mysql_fetch_row($bProfessorList)){
		echo '<tr>';
		foreach($row as $key=>$value){
			echo '<td>',$value,'</td>';
		}
		echo '</tr>';
	}
	echo '</table><br />';
}

mysql_close($link);
?>
</div>
<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    &copy; 2015 Website by <strong>Joshua D Moynihan</strong>. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script src="bootstrap.min.js"></script>
</body>
</html>