function checkformat()
{
    var email  = document.getElementById("email").value;
    var message = document.getElementById("formatmessage").style;
    if(!/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(email)&&!/^Admin$/.test(email))
    {     
          message.display = "block";
          document.getElementById("email").focus();
          document.getElementById("email").select();
    }
    else{
            message.display= "none";
        }
    
}