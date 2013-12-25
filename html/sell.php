<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("Choose a stock to sell");
        }
        else
        {
            $stock_info=query("select * from share where id=".$_SESSION["id"]." and symbol=\"".$_POST["symbol"]."\";");
            $stock = lookup($_POST["symbol"]);
            $stock_info=$stock_info[0];
            $cash=$stock_info["shares"]*$stock["price"];
           query("delete from share where id=".$_SESSION["id"]." and symbol=\"".$_POST["symbol"]."\";");
            query("update users set cash=cash+".$cash." where id=".$_SESSION["id"].";");
            query("insert into history(id,type,symbol,shares,price) 
                values(".$_SESSION["id"].",
                \"SELL\",
                \"".$_POST["symbol"]."\",".
                $stock_info["shares"].",".
                $stock["price"].");");
            redirect("index.php");
        }
    }
    else
    {
        $stock=query("select * from share where id=".$_SESSION["id"].";");
        render("sell_form.php",["title"=>"Sell","stock"=>$stock]);
    }

?>
