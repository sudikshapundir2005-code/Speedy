<?php

$conn = mysqli_connect("localhost","root","","speedy_db");

if(!$conn){
    die("Connection Failed");
}

$result = mysqli_query($conn,"SELECT id,name FROM products");

while($row = mysqli_fetch_assoc($result))
{
    $id = $row['id'];

    $name = strtolower($row['name']);

    $name = str_replace(" ","",$name);

    $files = scandir("uploads");

    foreach($files as $file)
    {
        $filename = strtolower(pathinfo($file, PATHINFO_FILENAME));

        $filename = str_replace(" ","",$filename);

        if($filename == $name)
        {
            mysqli_query($conn,
            "UPDATE products SET image='$file' WHERE id='$id'");

            echo $row['name']." => ".$file."<br>";
        }
    }
}

echo "<h2>Done ✅</h2>";

?>