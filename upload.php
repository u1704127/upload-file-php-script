<!DOCTYPE html>
<html>
<body style='max-width: 500px; margin: auto;'>

<h1>Select file to inside the <i>upload</i> folder</h1>

<form method="POST" enctype="multipart/form-data">
  <label for="">Select File:</label>
  <input type="file" id="text-to-qr-code" name="file_name"><br><br>
 
  <input type="submit" value="Submit"><br /> <br />
</form>



</body>
</html>


<?php 


if(isset($_FILES['file_name'])){
    $file=$_FILES['file_name'];
    echo "<h3> Name of Uploaded File:".$file['name']."</h3>";
    $x = move_uploaded_file($file['tmp_name'], "upload/".$file['name']);
      if($x)
          {
              echo "<br /><h3> successfully uploaded</h3>";
          }
 }

else{
    echo "<h3>Please select a file</h3>";
}
echo "<hr /><hr />";
?>



<h2> List of Uploaded file</h2>
<table border=1>
    <tr>    <th>Name</th>   <th>Download Link</th>   </tr>
<?php
 
if(isset($_FILES['file_name'])){
    $list_of_files = scandir("upload");
    foreach($list_of_files as $name){
        echo "<tr> <td>$name</td> <td><a download='$name' href='upload/$name'>$name</a></td> </tr>";
         
    }

}
?>