<?
    // configuration
    require("../includes/config.php");
    $rows=query("select * from share where id=".$_SESSION["id"].";");
    $cash=query("select cash from users where id=".$_SESSION["id"].";");
    $cash=$cash[0];
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio","cash"=>$cash["cash"]]);
?>
