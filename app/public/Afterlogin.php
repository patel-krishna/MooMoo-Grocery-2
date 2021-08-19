<?php require_once("../resources/config.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Youngjae Kim 40169282" />
    <meta name="description" content="loginpage" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>loged in</title>
</head>
<body>
<?php
//load the xml file to compare user information
$xml = simplexml_load_file(XML_DB . DS ."users.xml") or die("Error of calling file");


  if(isset($_POST['submit']))
  {for($i=0;$i<$xml->user->count();$i++)
    //to check email is already registered
    {if($xml->user[$i]->email == $_POST['email'])
        //to check password input is correct
        {if($xml->user[$i]->password == $_POST['password'])
            //to check admin
            {if($xml->user[$i]->admin == "yes"||$xml->user[$i]->email == "Admin")    //if admin.
                {   
                    $cookievalue = $xml->user[$i]->firstname;
                    if(isset($_COOKIE["admin"])||isset($_COOKIE["user"]))
                       {
                           unset($_COOKIE["admin"]);
                           setcookie("admin", "", time()-3600);
                           unset($_COOKIE["user"]);
                           setcookie("user", "", time()-3600);
                           setcookie("admin",$cookievalue); 
                       }
                    else
                    {
                        setcookie("admin",$cookievalue); 
                    }
                    
                    header("Location: backstore/order-list.php");
                    break;
                }
              else //if normal user.
                {   
                    $cookievalue = $xml->user[$i]->firstname;
                    if(isset($_COOKIE["admin"])||isset($_COOKIE["user"]))
                       {
                           unset($_COOKIE["admin"]);
                           setcookie("admin", "", time()-3600);
                           unset($_COOKIE["user"]);
                           setcookie("user", "", time()-3600);
                           setcookie("user",$cookievalue); 
                       }
                    else
                    {
                        setcookie("user",$cookievalue); 
                    }
                    header("Location: index.php");
                    break;
                }  
                
            }
         else   //if password input is wrong
            {
                header("Location: wrong_password.php");
                break;
            }
        }
     else //if the email is not registered.
     {
       header("Location: not_registered.php");
       
     }
    }

  }

?>
</body>
</html>