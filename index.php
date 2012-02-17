<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel="icon" href="favicon.ico" type="image/x-icon"> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
<title>Money Matters</title>
<LINK REL=StyleSheet HREF="mm.css" TYPE="text/css" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" SRC="js/himagefall/picture-fall.js">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
<script src="js/mm.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
<!-- begin body -->
<!-- header -->
<div id="a">
	<div id="heading">
		<div id="logo" style='height:144px;width:144px;background-image:url("dollar.jpg");position:absolute;top:10px;z-index:5;left:40px;'></div>
		<h1>Money Matters</h1>
		<h2>How much is college really costing you?</h2>
	</div>
</div>
<!-- main box -->
<div id="b">
	<div id="tuitioninput">
		<div id="labels">
			<label>What is the cost per year?</label><input id="costinput"></input><br />
			<label>(Or per semester?)</label><input id="costseminput"></input><br />
			<label>Any grants or scholarships?</label><input id="deductinput"></input><br />
			<button style="top:-15px;margin-right:15px;">Toggle Falling $$$</button>
		</div>
	</div>
	<div id="summary">You pay <span class="money" id="peryear">$50000</span> per year<br />
	<span class="money" id="persem">$25000</span> per semester<br />
	<span class="money" id="perday">$309</span> per day<br />
	<span class="money" id="perhour">$19</span> per hour<br />
	<span style="font-size:10pt">9AM to 11PM, Monday through Friday</span></div>
	<div id="today" class="progressbox">Today alone - <span class='percent'></span><br /><br />
<div class="progressBar"><span><em style="left:70px"></em></span></div>
you paid <span id="todaycount" class="money"></span><br /> out of <span class='bartotal'></span>.</div>
</div>
<!-- right panel-->
<div id="c">
	<div id="week" class="progressbox">This week - <span class='percent'></span><br /><br />
<div class="progressBar"><span><em style="left:70px"></em></span></div>
you paid <span id='weekcount' class="money"></span><br /> out of <span class='bartotal'></span>.</div>
	<div id="semester" class="progressbox">This semester - <span class='percent'></span><br /><br />
<div class="progressBar"><span><em style="left:70px"></em></span></div>
you paid <span id='yearcount' class="money"></span><br /> out of <span class='bartotal'></span>.</div>	
</div>
<!-- end body -->
<div id="footer">
<?php
define(RUN_ERRORS, TRUE);
$filename = rawurlencode(base64_encode($_SERVER['PHP_SELF']));
$filename = 'log.txt';
if(is_writable($filename) && is_readable($filename)){
		$file_contents = file_get_contents($filename);
		if(is_numeric($file_contents)){
			$file_contents = $file_contents + 1;			
			file_put_contents($filename, $file_contents);
		}}
echo (file_get_contents($filename).' views');
?>
<br />
&copy Copyright 9/1/2011, All Rights Reserved<br />
Karan Sikka - <a href="http://projmilo.org/">Project Milo</a><br />
Follow me on <a href="http://twitter.com/ksikka">Twitter</a></div>

</div>
</body>
</html>
