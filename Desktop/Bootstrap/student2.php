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
table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style> 
<div class="container">
<?php 
$studentCwid = $_POST["cwid"];

//create connection
$link = mysql_connect('ecsmysql', 'cs332f24', 'ohxijeib');
if (!$link){
	die('Could not connect.' . mysql_error());
}
echo '<div class="panel panel-success"><div class="panel-heading">Connected Successfully</div><div class="panel-body">Here are all the courses the student took and his/her grades.</div></div>';
	
//access database
mysql_select_db("cs332f24", $link);
if (!$link){
	die("Unable to select database!");
}

//query for student-b:
$SQL = "SELECT c.name,e.grade,e.CWID FROM enrollment e, courses c WHERE e.CWID = $studentCwid";
$bStudentList = mysql_query($SQL, $link);
//echo $bStudentList;

/*while ($row = mysql_fetch_array($bStudentList))
{
	print_r($row);
	echo "</br>";
}*/

if(mysql_num_rows($bStudentList)){
	echo '<table cellpadding="0" cellspacing="0" class="db-table table table-striped">';
	echo '<tr><th>Name</th><th>Grade</th><th>CWID</th></tr>';
	while ($row = mysql_fetch_row($bStudentList)){
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