<html>

<head>
<!-- 
Harsha And Tharindu Associates
Chooti Malli 1.0 For Appzone (c) GNU Public
Last Updated : 2011 May 17
-->
<title>Chooti Malli Main</title>

<script>
function Validate(){

var ans = document.getElementById("ans").value;
window.event.returnValue = false;
	if((ans == null)||(ans ==""))
			{
			alert("Please Enter the Answer!");
			return false;
			}
window.event.returnValue = true;
return true;
alert("Thanks, Message Sent!");
}
</script>

</head>

<body>


<center>
<h2>Chooti Malligen Ahanna</h2>
<br><image src="3434.png"><br>
<br><br>

<form name="SearchMalli" action="seekMalli.php" method="POST" >
Search Malli : 
<input type="text" id="id1" value="" />
<input type="submit" id="but" value="Search" />
<br><br>
</form>

<table border='0'>
<tr>
<td>Phone Number</td>
<td><label id='tp'><?php echo $_SESSION['tp']; ?></label></td>
</tr>
<tr>
<td>Question</td>
<td><label id='ques'><?php echo $_SESSION['ques']; ?></label></td>
</tr>
</table>

<form name="AppzoneSender" method="POST" action="SenderMalli.php">
<br>
<h3>Answer</h3>
<textarea id="ans" rows="2" cols="20"></textarea><br><br>
<input type="submit" onClick="Validate()" value="Send">

</form>
</center>
</body>

</html>

