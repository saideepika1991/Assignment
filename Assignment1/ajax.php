<?php
error_reporting(0);
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"assignment1");
$country=$_GET["country"];
$state=$_GET["state"];
$city=$_GET["city"];

if($country!="")
{
	$res=mysqli_query($link, "select * from states where country_id=$country");
	echo "<select id='statedd' onChange='change_state()'>";
	echo "<option>";echo "Select"; echo "</option>";
	while($row=mysqli_fetch_array($res))
	{
	echo "<option value='$row[Id]' selected >"; echo $row["Name"];echo "</option>";
	}
	echo "</select>";
}

if($state!="")
{
	$res=mysqli_query($link, "select * from city where state_id=$state");
	echo "<select  id='citydd' onChange='change_city()'>";
	echo "<option>";echo "Select"; echo "</option>";
	while($row=mysqli_fetch_array($res))
	{
	echo "<option value='$row[Id]' selected>"; echo $row["Name"];echo "</option>";
	}
	echo "</select>";
}

if($city!="")
{
	$res=mysqli_query($link, "select * from list_of_hospitals where city_id=$city");
	echo "<select>";
	echo "<option>";echo "Select"; echo "</option>";
	while($row=mysqli_fetch_array($res))
	{
	echo "<option value='$row[Id]' selected>"; echo $row["Name"];echo "</option>";
	}
	echo "</select>";
}
?>