<?php  
include("db.php");
$output = '';  
$video_id = '';  
//sleep(1);  
$connect = new mysqli($servername, $username, $password, $dbname); 
//echo $_POST['last_video_id'];
$new= $_POST['last_video_id']+1;
$sql = "select * from user ORDER BY id DESC LIMIT 2 OFFSET ".$new;  
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)  
{  
     while($row = mysqli_fetch_array($result))  
     {  
$lik = $result;
$sql="SELECT * FROM user ORDER BY id";
if ($result=mysqli_query($connect,$sql)){$rowcount=mysqli_num_rows($result);}
$result=$lik;
$full = 0;
$video_id = $row['id'];
$full = $rowcount - $row['id'];
          $output .= "<div class='col'><center><hr>(id : ".$row['id'].")<br>".$row['b']."<br>";
if($row["pss"]!=""){$output .= '<form method="post"><input type="password" name="pass1"><br><button value="'.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary"name="pass2">Check</button></form>';}else{
        $output .=  '<a href="http://nt.unaux.com/?p='.htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary">Read more</a><br>
    <a href="'.htmlspecialchars($row["e"], ENT_QUOTES, 'UTF-8').'" class="btn btn-primary">Link</a><br>';
    }
$output .=  "<hr></center></div>";
     }  
     $output .= '  
               <div id="remove_row">
               <button type="button" name="btn_more" data-vid="'. $full .'" id="btn_more" class="btn btn-primary form-control">more</button>  
               </div>  
     ';  
     echo $output;  
}  
?>
