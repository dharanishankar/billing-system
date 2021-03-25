<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['aid'])){
      header("location:index.php");
  }
$it = new MultipleIterator();
$it->attachIterator(new ArrayIterator($_POST['pn']));
$it->attachIterator(new ArrayIterator($_POST['uc']));
$it->attachIterator(new ArrayIterator($_POST['qt']));
$it->attachIterator(new ArrayIterator($_POST['pr']));
$invoiceno=$_POST['invoiceno'];
$buyername=$_POST['buyername'];
$time=$_POST['time'];
$dp=$_POST['dp'];
$da=$_POST['da'];
$gtot=$_POST['gtot'];
$top=$_POST['top'];
$tot=$_POST['tot'];
$totnos=$_POST['totnos'];
$date=$_POST['date'];
$datesplit=explode("/", $date);
$datecrt=$datesplit[2]."/".$datesplit[1]."/".$datesplit[0];
mysqli_autocommit($conn,FALSE);
$insertafter="insert into sales(invoiceno,name,date,time,totqty,total,mop,dp,da,gtotal) value('$invoiceno','$buyername','$datecrt','$time','$totnos','$tot','$top','$dp','$da','$gtot');";
if(mysqli_query($conn,$insertafter)!=1)
{
	echo "<script>
alert('Invalid InvoiceNumber');
window.location.href='home.php';
</script>";
}
else
{
	$sid=mysqli_insert_id($conn);
	foreach ($it as $x) {
		$insert="insert into orders(sid,invoiceno,productname,unitcost,qty,total,date) value('$sid','$invoiceno','$x[0]','$x[1]','$x[2]','$x[3]','$datecrt');";
	$update="update products set qty=qty-'$x[2]' where name='$x[0]'";
	mysqli_query($conn,$update);
	mysqli_query($conn,$insert);
}

if (mysqli_commit($conn))
{
	$a=1;
}
else
{
	echo "<script>
alert('Invalid Data');
window.location.href='home.php';
</script>";
}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
	<META NAME="AUTHOR" CONTENT="dharani shanakar">
	<META NAME="CREATED" CONTENT="20201020;43200000000000">
	<META NAME="CHANGEDBY" CONTENT="dharani shanakar">
	<META NAME="CHANGED" CONTENT="20201030;140600000000000">
	<META NAME="AppVersion" CONTENT="16.0000">
	<META NAME="DocSecurity" CONTENT="0">
	<META NAME="HyperlinksChanged" CONTENT="false">
	<META NAME="LinksUpToDate" CONTENT="false">
	<META NAME="ScaleCrop" CONTENT="false">
	<META NAME="ShareDoc" CONTENT="false">
	<STYLE TYPE="text/css">
	<!--
		@page { size: 5.51in 21.66in; margin-left: 1.33in; margin-right: 1.33in; margin-top: 0.3in; margin-bottom: 10.66in }
		P { margin-bottom: 0.08in; direction: ltr; widows: 2; orphans: 2 }
	-->
	</STYLE>
</HEAD>
<BODY LANG="en-IN" DIR="LTR">
<P ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: -0.25in">
<FONT SIZE=6 STYLE="font-size: 28pt"><SPAN LANG="en-US"><B>Cheran
Restaurant</B></SPAN></FONT></P>
<FONT SIZE=6 STYLE="font-size: 18pt"><center><br>NO 1/49,G.N.T.ROAD,Azhinjivakkam,<br>Janappanchatram,Chennai-67<br><br>Phone : 9715248525,9585541920<br>GSTIN :</center>
<CENTER></FONT><br>
<center><img src="lgo.png" alt="" width="100" height="100"></center><br><FONT SIZE=6 STYLE="font-size: 18pt"><b><center>AAVIN PARLOUR</center></b>
<CENTER></FONT><br>

<TABLE WIDTH=510 CELLPADDING=7 CELLSPACING=0>
	<COL WIDTH=285>
	<COL WIDTH=197>
	<TR VALIGN=TOP>
		<TD WIDTH=285 HEIGHT=7 STYLE="border: none; padding: 0in">
			<P STYLE="margin-right: -0.31in"><FONT SIZE=6 STYLE="font-size: 22pt"><SPAN LANG="en-US">NAME:
			<?php echo $buyername?></SPAN></FONT></P>
		</TD>
		<TD WIDTH=197 STYLE="border: none; padding: 0in">
			<P STYLE="margin-right: -0.31in"><FONT SIZE=6 STYLE="font-size: 22pt"><SPAN LANG="en-US">DATE:
			<?php echo $date?></SPAN></FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=285 HEIGHT=6 STYLE="border: none; padding: 0in">
			<P STYLE="margin-right: -0.31in"><FONT SIZE=6 STYLE="font-size: 22pt"><SPAN LANG="en-US">INVOICE
			No: <?php echo $invoiceno?></SPAN></FONT></P>
		</TD>
		<TD WIDTH=197 STYLE="border: none; padding: 0in">
			<P STYLE="margin-right: -0.31in"><FONT SIZE=6 STYLE="font-size: 22pt"><SPAN LANG="en-US">TIME:
			<?php echo $time?></SPAN></FONT></P>
		</TD>
	</TR>
</TABLE>
</CENTER>
<P LANG="en-US" STYLE="margin-right: -0.31in; margin-bottom: 0in">
</P>
<P ALIGN=CENTER STYLE="margin-left: -1.28in; margin-right: -1.19in; margin-bottom: 0in">
<FONT SIZE=4 STYLE="font-size: 16pt"><SPAN LANG="en-US"><B>------------------------------------------------------------------------------</B></SPAN></FONT></P>
<CENTER>
	<TABLE WIDTH=530 CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=244>
		<COL WIDTH=78>
		<COL WIDTH=60>
		<COL WIDTH=92>
		<TR>
			<TD WIDTH=244 HEIGHT=8 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B>NAME</B></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=78 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B>PRICE</B></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=60 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=CENTER><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B>QTY</B></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=92 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B>TOTAL</B></FONT></FONT></FONT></P>
			</TD>
		</TR>
		<?php foreach($it as $y):?>
		<TR>
			<TD WIDTH=244 HEIGHT=8 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B><?php echo $y[0]?></B></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=78 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><?php echo $y[1]?></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=60 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=CENTER><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><?php echo $y[2]?></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=92 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><?php echo $y[3]?></FONT></FONT></FONT></P>
			</TD>
		</TR>
		<?php endforeach?>
	</TABLE>
</CENTER>
<P ALIGN=CENTER STYLE="margin-left: -1.28in; margin-right: -1.19in; margin-bottom: 0in">
<FONT SIZE=4><SPAN LANG="en-US"><B>-----------------------------------------------------------------------------------------</B></SPAN></FONT></P>
<CENTER>
	<TABLE WIDTH=527 CELLPADDING=7 CELLSPACING=0>
		<COL WIDTH=245>
		<COL WIDTH=77>
		<COL WIDTH=58>
		<COL WIDTH=92>
		<TR>
			<TD WIDTH=245 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P STYLE="margin-left: -0.23in; margin-right: -1.96in"><BR>
				</P>
			</TD>
			<TD WIDTH=77 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><BR>
				</P>
			</TD>
			<TD WIDTH=58 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=CENTER><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B><?php echo $totnos?></B></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=92 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B><?php echo $tot?></B></FONT></FONT></FONT></P>
			</TD>
		</TR>
		<TR>
			<TD WIDTH=245 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt">Discount@<?php echo $dp?>%</FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=77 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><BR>
				</P>
			</TD>
			<TD WIDTH=58 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=CENTER><BR>
				</P>
			</TD>
			<TD WIDTH=92 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B>-<?php echo $da?></B></FONT></FONT></FONT></P>
			</TD>
		</TR>
		<TR>
			<TD WIDTH=245 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B>Total</B></FONT></FONT></FONT></P>
			</TD>
			<TD WIDTH=77 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><BR>
				</P>
			</TD>
			<TD WIDTH=58 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=CENTER><BR>
				</P>
			</TD>
			<TD WIDTH=92 BGCOLOR="#ffffff" STYLE="border: none; padding: 0in">
				<P ALIGN=RIGHT><FONT COLOR="#000000"><FONT FACE="Calibri, serif"><FONT SIZE=6 STYLE="font-size: 22pt"><B><?php echo $gtot?></B></FONT></FONT></FONT></P>
			</TD>
		</TR>
	</TABLE>
</CENTER>
<P ALIGN=CENTER STYLE="margin-left: -1.28in; margin-right: -1.19in; margin-bottom: 0in">
<FONT SIZE=5><SPAN LANG="en-US"><B>---------------------------------------------------------------------</B></SPAN></FONT></P>
<P ALIGN=CENTER STYLE="margin-left: -1.28in; margin-right: -1.19in; margin-bottom: 0in">
<FONT SIZE=5 STYLE="font-size: 20pt"><SPAN LANG="en-US"><B>PAYMENT
MODE:</B></SPAN></FONT><FONT SIZE=5 STYLE="font-size: 20pt"><SPAN LANG="en-US">
<?php echo $top?></SPAN></FONT></P>
<P ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<FONT SIZE=5 STYLE="font-size: 20pt"><SPAN LANG="en-US"><B>***THANK
YOU***</B></SPAN></FONT></P>
<P LANG="en-US" ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
<P LANG="en-US" ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
<P LANG="en-US" ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
<P LANG="en-US" ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
<P LANG="en-US" ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
<P LANG="en-US" ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
<P ALIGN=CENTER STYLE="margin-left: -0.39in; margin-right: -0.31in; margin-bottom: 0in; line-height: 150%">
<BR>
</P>
</BODY>
</HTML>