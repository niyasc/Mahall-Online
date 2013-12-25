<ul class="nav nav-pills">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="password.php">Change password</a></li>
    <li><a href="logout.php"><strong>Log Out</strong></a></li>
</ul>
<?php
    $positions=$values["positions"];
    $cash=$values["cash"];
?>
<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($positions as $position) 
    {
       print("<tr>");
       printf("<td>%s</td>",$position["symbol"]);
       printf("<td>%s</td>",$position["name"]);
       printf("<td>%d</td>",$position["shares"]);
       printf("<td>$%.2f</td>",$position["price"]);
       printf("<td>$%.2f</td>",$position["price"]*$position["shares"]);
       print("</tr>");
    }
?>
    
    <tr>
    <td>CASH</td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php printf("$%.2f",$cash);?></td>
    </tr>
</tbody>
</table>
