<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $upload_dir = 'uploads'.DIRECTORY_SEPARATOR;
        $imagesTypes = array('jpg','jpeg','png','gif');
        $max = 2 * 1024 * 1024;
        if(!empty(array_filter($_FILES['image']['name'])))
        {
            foreach($_FILES['image']['tmp_name'] as $key => $value)
            {
                $imagesTmpName = $_FILES['image']['tmp_name'][$key];
                $imagesName = basename($_FILES["image"]["name"][$key]);
                $imageExt = strtolower(pathinfo($imagesName, PATHINFO_EXTENSION));
                $imagesNewName = time().'_'.$key.'.'.$imageExt;
                if(in_array($imageExt, $imagesTypes))
                {
                    $images = $upload_dir.$imagesNewName;
                    if(move_uploaded_file($imagesTmpName, $images))
                    {
                        print_r("<img src='$images' height='100px' width='100px'>");
                    }
                }                
            }
        }
    }
?>
