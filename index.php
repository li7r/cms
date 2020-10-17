<?php
if($_SERVER['REMOTE_ADDR'] == "94.49.78.206"||"2.88.72.119"){
}else{
    echo "<script>alert('the site is under construction .');</script>";
    header('Refresh: 0.1; URL=https://www.google.com/'); }
?>
<?php
$GLOBALS['a']='a';
include("db.php");
if(isset($_GET["pass"])&&isset($_GET["id"])){
$pass=$_GET["pass"];
$id=$_GET["id"];
}
?>
<?php
include("db.php");
if(isset($_POST["pass2"])){
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$pass=$_POST["pass1"];
$id=$_POST["pass2"];
//header('Location: http://nt.unaux.com/?pass='.$pass.'&id='.$id.'&p=');
$sql= "SELECT * FROM user WHERE id = '$id' AND pss = '$pass'";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
$GLOBALS['a'] = '';
$sql="select id,e,b from user where id='$id'";
$rdata=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($rdata);
if($res['id']==$id)
echo "<center><b>".htmlspecialchars($res['b'], ENT_QUOTES, 'UTF-8')."</b><br><p><div id='c0py' >".htmlspecialchars($res['e'], ENT_QUOTES, 'UTF-8')."</div></p><br></center><script>
function copyText(element) {
  var range, selection, worked;

  if (document.body.createTextRange) {
    range = document.body.createTextRange();
    range.moveToElementText(element);
    range.select();
  } else if (window.getSelection) {
    selection = window.getSelection();        
    range = document.createRange();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
  }
  
  try {
    document.execCommand('copy');
    alert('text copied');
  }
  catch (err) {
    alert('unable to copy text');
  }
}
</script>";
}else{echo "<p style='color:red;'><center><b>wrong password</b></center></p>";}
}
?>
<?php
include("db.php");
if(isset($_POST["delet"])){
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$idd=$_POST["delet"];
$sql = "DELETE FROM user WHERE id='$idd'";
if ($conn->query($sql) === TRUE) {} else {echo "Error deleting record: " . $conn->error;}
}
?>
<?php
include("db.php");
if(isset($_POST["edit"])){
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$ide=$_POST["edit"];
$txe=$_POST["edit1"];
$sql = "UPDATE user SET e='$txe' WHERE id='$ide'";
if ($conn->query($sql) === TRUE) {} else {echo "Error updating record: " . $conn->error;}
$conn->close();
}
?>
<?php
include("db.php");
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
if(isset($_GET["p"])){
$g = $_GET["p"];
$sql="select id,e,b,pss from user where id='$g'";
$rdata=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($rdata);
if($res['id']==$g&$res['pss']=='')
{
echo "<center><b>".htmlspecialchars($res['b'], ENT_QUOTES, 'UTF-8')."</b><br><p><div id='c0py' >".htmlspecialchars($res['e'], ENT_QUOTES, 'UTF-8')."</div></p><br><button class='btn btn-primary' onClick=copyText(document.getElementById('c0py')) >copy</button><br><br></center><script>
function copyText(element) {
  var range, selection, worked;

  if (document.body.createTextRange) {
    range = document.body.createTextRange();
    range.moveToElementText(element);
    range.select();
  } else if (window.getSelection) {
    selection = window.getSelection();        
    range = document.createRange();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
  }
  
  try {
    document.execCommand('copy');
    alert('text copied');
  }
  catch (err) {
    alert('unable to copy text');
  }
}
</script>";
}
elseif($res['pss']!='')
{
echo "<p style='color:red;'><center><b>wrong password</b></center></p>";}else{echo "<p style='color:red;'><center><b>article not found !</b></center></p>";}
}
?>
<?php
include("db.php");
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$agent = $_SERVER['HTTP_USER_AGENT'];
$dt = date('m/d/Y h:i:s a', time());
$sql = "INSERT INTO ip (a,b,c) VALUES ('$ip','$agent','$dt')";
if ($conn->query($sql) === TRUE) {} else {echo "<center>Error: " . $sql . "<br>" . $conn->error."</center>";}
$conn->close();
if(isset($_POST["send"])){
$a = $ip;
$b = $_POST["b"];
//$sql_u = "SELECT * FROM ban WHERE a='$a'";
//$res_u = mysqli_query($conn, $sql_u);
//if (mysqli_num_rows($res_u) > 0) {
//  	echo "<script>alert('banned forever');</script>"; 	
//}else{//}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$d = date('m/d/Y h:i:s a', time());
$e = $_POST["e"];
$pss = $_POST["pss"];
$stmt = $conn->prepare("INSERT INTO user (a,b,d,e,pss) VALUES (?,?,?,?,?)");
$stmt->bind_param('sssss',$a,$b,$d,$e,$pss);
$stmt->execute();

$conn->close();
} 
?>
<html>
<head>
<title>Chat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel='icon' href='https://www.101computing.net/favicon.ico' type='image/x-icon'/ >
</head>
<body>
<!--button onclick="tex()" class="btn btn-primary">text</button><button onclick="imag()" class="btn btn-primary">image</button><button onclick="vide()" class="btn btn-primary">video</button-->
<center><a href="https://paypal.me/b5d" class="btn btn-primary">SUPPORT THE SITE !</a></center>
<br>
<form method="post">
<center>
<div class="form-group"><form method="POST" autocomplete="off"><div class="col-75"><input name="ser" type="text" class="form-control"  placeholder="Search"><br></div><button name="whaleremmeberuuibhuhubh" class="btn btn-primary">Search</button></form></div></center>
</form>
<?php
if(isset($_POST["ser"])){
include("db.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){die("Connection failed: " . $conn->connect_error);}else{
if($_POST['ser']==""){
echo '<br><center>
search field should not be empty
</center><br>';
}else{
$param = "%{$_POST['ser']}%";
$stmt = $conn->prepare("select e,b,pss from user where b like ?");
$stmt->bind_param("s", $param);
$stmt->execute();
$stmt->bind_result($e,$b,$pass);
while ($stmt->fetch()) {
if($pass!=''){echo "<br>";}else{echo "{$b}<br>{$e}<hr><br>";
}}}}}
?>
<?php
if(!isset($_GET["p"])&$GLOBALS['a']!=''){
echo '<center><br><div class="form-group"><form method="POST" autocomplete="off"><div class="col-75">
<input name="b" type="text" class="form-control"  placeholder="Subject"><br>

<textarea name="e" type="text" class="form-control"  placeholder="message" autofocus></textarea><br>
<input name="pss" type="password" class="form-control"  placeholder="Password"><p>if you want to make the file public just leave it empty</p>

<br></div><button name="send" class="btn btn-primary">send</button></form></div></center>';
}
?>
<div class="container">
<?php
include("db.php");
if(!isset($_GET["p"])&$GLOBALS['a']!=''){
if($conn->connect_error){die("Connection failed: " . $conn->connect_error);}
$sql = "select * from user ORDER BY id DESC LIMIT 2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo '
    <hr>
    <div class="row">
    <div class="w-100"></div>
    <div class="col">
    <center>(id : '.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').')
    <p>'.htmlspecialchars($row["b"], ENT_QUOTES, 'UTF-8').'</p>
    ';
    if($row["pss"]!=""){echo '<form method="post"><input type="password" name="pass1"><br><button value="'.$row["id"].'" class="btn btn-primary"name="pass2">Check</button></form>';}else{
        echo '<a href="http://nt.unaux.com/?p='.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary">Read more</a><br>
    <a href="'.htmlspecialchars($row["e"], ENT_QUOTES, 'UTF-8').'" target="_blank" class="btn btn-primary">Link</a><br>';
    }
    echo '
    <!--form method="post">
    <input name="edit1"><br>
    <button value="'.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary" name="edit">edit</button>
    </form>
    <form method="post"><button value="'.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary" name="delet">delete</button></form-->
    <br>
    </center>
    </div>
    <div class="w-100"></div>
    </div>
    <hr>
    ';
}
} else {
echo '<center>no chat</center><br>';
}
$conn->close();
}
?>
</div>          
<?php
include("db.php");
$connect = new mysqli($servername, $username, $password, $dbname); 
$sql = "select * from user ORDER BY id DESC LIMIT 2 OFFSET 2";  
$result = mysqli_query($connect, $sql);  
$video_id = '';  
if(!isset($_GET["p"])&$GLOBALS['a']!=''){ 
$GLOBALS['a']='a';
echo '<h2 align="center">History</h2><br />';
echo "<div class='table table-bordered' id='load_data_table'>";
while($row = mysqli_fetch_array($result)){
$lik = $result;
$sql="SELECT * FROM user ORDER BY id";
if ($result=mysqli_query($connect,$sql)){$rowcount=mysqli_num_rows($result);}
$result=$lik;
$full = 0;
$video_id = $row['id'];
$full = $rowcount - $row['id'];
//echo $full;
echo "
<div class='col'>
<center>
<hr>
(id : ".$row['id'].")<br>".$row['b']."<br>";
    if($row["pss"]!=""){echo '<form method="post"><input type="password" name="pass1"><br><button value="'.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary"name="pass2">Check</button></form>';}else{
        echo '<a href="http://nt.unaux.com/?p='.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary">Read more</a><br>
    <a href="'.htmlspecialchars($row["e"], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary">Link</a><br>';
    }
echo "
<hr>
</center>
</div>
";
}
echo "</div>
<div id='remove_row'>
<button type='button' name='btn_more' data-vid='".$full."' id='btn_more' class='btn btn-primary form-control'>more</button>
</div>";
}
?>
<!--div class="container"><div class="table-responsive"><h2 align="center">History</h2><br /></div></div-->   
<script>
function imag(){
document.getElementById("b").value = '<img src="LINK HERE !" width="320" height="240" >';
}
function vide(){
document.getElementById("b").value = '<video src="LINK HERE !" type="video/mp4" width="320" height="240"  controls>';
}
function tex(){
document.getElementById("b").value = '';
} 
 $(document).ready(function(){
     //fetch('https://api.codetabs.com/v1/proxy?quest=google.com').then((response) => response.text()).then((text) => console.log(text)); 
      $(document).on('click', '#btn_more', function(){  
           var last_video_id = $(this).data("vid");  
           $('#btn_more').html("Loading...");  
           $.ajax({  
                url:"l.php",  
                method:"POST",  
                data:{last_video_id:last_video_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove_row').remove();  
                          $('#load_data_table').append(data);  
                     }  
                     else  
                     {  
                          $('#btn_more').html("No Data");  
                     }  
                }  
           });  
      });  
 });  
 </script>
</body>
</html>
