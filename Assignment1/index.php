<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"assignment1");
?>
<form name="form1" action="" method="Post">
<table>
<tr>
<td>Select Country</td>
<td><select id="countrydd" onChange="change_country()">
<option>Select</option>
<?php
$res=mysqli_query($link,"select * from countries");
while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row["ID"]; ?>" > <?php echo $row["Name"]; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>Select State</td>
<td>
<div id="state">
<select>
<option>Select</option>
</select>
</div>
</td>
</tr>
</tr>
<tr>
<td>Select City</td>
<td>
<div id="city">
<select>
<option>Select</option>
</select>
</div>
</td>
</tr>
<tr>
<td>Hospitals List</td>
<td>
<div id="list_of_hospitals">
<select>
<option>Select</option>
</select>
</div>
</td>
</tr>
</table>    </form>
<script type = "text/javascript">
function change_country()
{
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","ajax.php?country="+document.getElementById("countrydd").value,false);
xmlhttp.send(null);
document.getElementById("state").innerHTML=xmlhttp.responseText;

if(document.getElementById("countrydd").value=="Select")
{
document.getElementById("city").innerHTML="<select><option>Select</option></select>";
}
}
function change_state()
{
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","ajax.php?state="+document.getElementById("statedd").value,false);
xmlhttp.send(null);
document.getElementById("city").innerHTML=xmlhttp.responseText;

if(document.getElementById("statedd").value=="Select")
{
document.getElementById("list_of_hospitals").innerHTML="<select><option>Select</option></select>";
}
}
function change_city()
{
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","ajax.php?city="+document.getElementById("citydd").value,false);
xmlhttp.send(null);
document.getElementById("list_of_hospitals").innerHTML=xmlhttp.responseText;

}
</script>