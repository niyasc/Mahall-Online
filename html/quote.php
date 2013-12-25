<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a symbol");
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            if($stock===false)
            {
                apologize("You have entered invalid symbol");
            }
            else
            {
                $stock["title"]="Quotes";
                render("show_quote.php",$stock);
            }
        }
    }
    else
    {
        // else render form
        render("quotes_form.php", ["title" => "Quotes"]);
    }

?>
