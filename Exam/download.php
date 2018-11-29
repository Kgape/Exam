

<?php


include "download.inc.php";


if(isset($_GET['id']))
{
	$id =$_GET['id'];
	$stat = $db->prepare("select * from upload where id=?");
	$stat->bindParam(1,$id);
	$stat->execute();
	$data = $stat->fetch();


	$file = 'uploads/'.$data['name'];

if(file_exists($file))
{
	header('Content-Description: '. $data['description']);
     header('Content-Type: '.$data['type']);
        header('Content-Disposition: '.$data['disposition'].'; name="'.basename($file).'"');
        header('Expires: '.$data['expires']);
       header('Cache-Control: '.data['cache']);
        header('Pragma: '.$data['pragma']);
        header('Content-Length: '.filesize($file));
        readfile($file);
        exit;
    }
}

