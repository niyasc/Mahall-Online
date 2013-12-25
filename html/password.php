<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["password"]))
        {
            apologize("You must provide password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm password");
        }
        else if($_POST["password"]!=$_POST["confirmation"])
        {
            apologize("Passwords donot match");
        }
        query("update users set hash=\"".crypt($_POST["password"])."\" where id=".
        $_SESSION["id"].";");
        redirect("index.php");
    }
    else
    {
        // else render form
        render("password_form.php", ["title" => "Change password"]);
    }

?>
