 <?php	

include("connection.php");

if(isset($_POST['submit'])){

    $ServerName = $_POST['ServerName'];
    $DownTime = date('Y-m-d H:i:s', strtotime($_POST['DownTime']));
    $UpTime = date('Y-m-d H:i:s', strtotime($_POST['UpTime']));
    $keterangan = $_POST['keterangan'];
	
	$date1 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['DownTime'])));
	$date2 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['UpTime'])));
	
	$alldiff = $date1->diff($date2);
	$difft = $alldiff->format("%a:%H:%i");
	$int_errortime = $alldiff -> days*24;
	$int_errortime = $int_errortime + $alldiff->h; 
		
    $sql = "INSERT INTO redudant_timur (peralatan, down_time, up_time, errortime, int_errortime, keterangan) VALUE ('$ServerName', '$DownTime', '$UpTime', '$difft', '$int_errortime', '$keterangan')";
    $query = mysqli_query($db, $sql);
	
   header("location:index.php");

    }
 else if(isset($_POST['simpanedit'])){

    $id = $_POST['id'];
    $ServerName = $_POST['ServerName'];
    $DownTime = date('Y-m-d H:i:s', strtotime($_POST['DownTime']));
    $UpTime = date('Y-m-d H:i:s', strtotime($_POST['UpTime']));
    $keterangan = $_POST['keterangan'];
	
	$date1 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['DownTime'])));
	$date2 = new DateTime(date('Y-m-d H:i:s', strtotime($_POST['UpTime'])));
	
	$alldiff = $date1->diff($date2);
	$difft = $alldiff->format("%a:%H:%i");
	$int_errortime = $alldiff -> days*24;
    $int_errortime = $int_errortime + $alldiff->h; 
    
    $sqlupdate = "UPDATE redudant_timur SET peralatan='$ServerName', down_time='$DownTime', up_time='$UpTime', errortime='$difft', int_errortime='$int_errortime', keterangan='$keterangan' WHERE id=$id";
    $queryupdate = mysqli_query($db, $sqlupdate);

    header("location:listtimur.php");
}

?>
