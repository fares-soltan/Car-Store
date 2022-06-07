<?php 
session_start();
include("../Connection/index.php");
include("../back-end/inbox.php");

$problems="SELECT COUNT(*) FROM problems";
$problems_query=mysqli_query($connect,$problems);


$admin=$_SESSION['admin'];
if(!$admin == 1){
    header("location: ../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Inbox mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Css File-->
        <link href="../wwwroot/Css/inbox.css" rel="stylesheet" />
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-sm-3">
        <a href="../index.php" class="btn  btn-block btn-compose-email" style="background-color:#35A6F4 ; color:white;">Honda</a>
        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li class="active">
                <a href="#mail-inbox.html">
                    <i class="fa fa-inbox"></i> Inbox  <span class="label pull-right"><?php foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?></span>
                </a>
            </li>
        </ul><!-- /.nav -->
    </div>
    <div class="col-sm-9">
        <div class="panel rounded shadow ">
            <div class="panel-heading" style="background-color:#35A6F4 ; color:white;">
                <div class="pull-left" >
                    <h3 class="panel-title">Inbox (<?php foreach($problems_query as $row) {echo  $row['COUNT(*)'];} ?>)</h3>
                </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-sub-heading inner-all">
                <div class="pull-right">
                    <ul class="list-inline no-margin">
                        <li class="hidden-xs"><span class="text-muted">Showing 1-50 of 2,051 messages</span></li>
                        <li>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i></a>
                                <a href="#" class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-sub-heading -->
            <div class="panel-body no-padding">

                <div class="table-responsive">
                    <table class="table table-hover table-email">
                        <tbody>
                        <?php inbox();?>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->

            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div>
</div>
</div>



<script type="text/javascript">

</script>
</body>
</html>