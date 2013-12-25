<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("Enter a symbol to purchase");
        }
        else if(empty($_POST["shares"]))
        {
            apologize("Enter number of shares");
        }
        else
        {
            if(!preg_match("/^\d+$/", $_POST["shares"]))
            {
                apologize("Enter valid number of shares");
            }
            $details=lookup($_POST["symbol"]);
            if($details===false)
            {
                apologize("Enter valid symbol");
            }
            $cost=$details["price"]*$_POST["shares"];
            //get balance of user
            $balance=query("select cash from users where id=".$_SESSION["id"]);
            $balance=$balance[0];
            $balance=$balance["cash"];
            if($balance<$cost)
            {
                apologize("You don't have sufficient balance");
            }
            $result=query("select * from share where symbol=\"".$details["symbol"].
            "\" and id=".$_SESSION["id"].";");
            if(sizeof($result)==0)
            {
                query("insert into share values(
                    ".$_SESSION["id"].",
                    \"".$details["symbol"]."\",
                    ".$_POST["shares"]
                .");");
            }
            else
            {
                query("update share set shares=shares+".$_POST["shares"].";");
            }
            query("update users set cash=cash-".$cost." where id=".$_SESSION["id"].";");
            query("insert into history(id,type,symbol,shares,price) 
                values(".$_SESSION["id"].",
                \"BUY\",
                \"".$details["symbol"]."\",".
                $_POST["shares"].",".
                $details["price"].");");
            
            redirect("index.php");
        }
    }
    else
    {
        render("buy_form.php",["title"=>"Buy"]);
    }

?>
