<?php




function photo($lastInsertId )
{
	include('../model/connect.php');
		$session_id=$lastInsertId; 
		//$session id
		
		$path = "../ajaximageupload/uploads/";

			$valid_formats = array("jpg", "png", "gif", "bmp");
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
				{
					$name = $_FILES['fileupload']['name'];
					$size = $_FILES['fileupload']['size'];
					
					if(strlen($name))
						{
							list($txt, $ext) = explode(".", $name);
							if(in_array($ext,$valid_formats))
							{
							if($size<(1024*1024))
								{
									$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
									$tmp = $_FILES['fileupload']['tmp_name'];
									if(move_uploaded_file($tmp, $path.$actual_image_name))
										{
											$dbh->exec("INSERT INTO employee_details  (photo,employee_employee_id) VALUES('$actual_image_name','$session_id')");
   												
   												
		                                   
														return;	
											
										}

									else
										echo "failed";
								}
										else
										echo "Image file size max 1 MB";					
							}
								else
								echo "Invalid file format..";	
						}
						
					else
						echo "Please select image..!";
						
					exit;
				}

}
?>