<?php
include'conn.php';
include'config.php';
if(isset($_SESSION['access_token']) && $_SESSION['access_token']!=null)
{
     header("location:login.php");
}
if(isset($_GET["code"]))
{
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token['error']))
    {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();
        
        // print_r($data);
        $_SESSION['email'] = $data['email'];
        $_SESSION['firstname'] = $data['given_name'];
        $_SESSION['lastname'] =$data['family_name'];
        $_SESSION['user_img'] = $data['picture'];
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $img = $_SESSION['user_img'];
        $email = $_SESSION['email'];
        //data saved of google
        $qry = "Insert tbimg(File) values('$img')";
        $res = mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            $qry1 = "select FileID from tbimg where File ='$img'";
            $res1 = mysqli_query($link,$qry1);
            $r1 = mysqli_fetch_row($res1);
            $fileId = $r1[0];
            if($fileId!=" ")
            {
            $qry2 = "Insert tbform(FirstName,LastName,Email,File) values('$firstname','$lastname','$email',$fileId)";
            $res2 = mysqli_query($link,$qry2);
            ///save the google email of the person
            if(mysqli_affected_rows($link)==1)
            {
            header("location:login.php");
            }
            else{
                echo"Data not Saved";
                header("location:login.php");
            }    
        }
    }
}
}
?>