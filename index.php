<?php 
session_start();

$CMS_DIR = "C:/intranet/";
$APP_DIR = "http://localhost/cms/files/"

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Simple CMS</title>
    <style>
		a {text-decoration:none;}
		h3 {margin-bottom:0px;margin-top:0px;}
		ul {margin-top:5px; margin-bottom:10px;}
	</style>
</head>
<body>
	<h1>My Files</h1>
	<hr width="100%"></hr>
	<?php
	filesInDir($CMS_DIR);
	?>
</body>
</html>

<?php
function filesInDir($tdir){
		global $CMS_DIR;
		global $APP_DIR;

		$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($tdir), RecursiveIteratorIterator::SELF_FIRST);
		$isfirst=1;
		foreach ($it as $file){ 
			if (in_array($file->getFilename(), array('.', '..'))) continue;
			$path = $file->getPathname();
			$path = str_replace('\\', '/', $path);
			$path = str_replace($CMS_DIR, $APP_DIR, $path);
			$path=preg_replace("/\s/","%20", $path);
			if ($file->isDir()){
				$dirname = $file->getFilename();
				if(!$isfirst){
					echo '</ul>';
				}
				else{
					$isfirst=0;
				}
				echo '<b><h3>'.$dirname.'</b></h3>';
				echo '<ul>';
			} 
			elseif ($file->isFile()){
				$filename = $file->getFilename();
				echo "<li><a href=".$path.">".$filename."</a></li>";
			}
		}
	}
?>