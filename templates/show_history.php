
<?php
    $positions=$values["rows"];
?>
<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Timestamp</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($positions as $position) 
    {
       print("<tr>");
       printf("<td>%s</td>",$position["type"]);
       printf("<td>%s</td>",$position["timestamp"]);
       printf("<td>%s</td>",$position["symbol"]);
       printf("<td>%d</td>",$position["shares"]);
       printf("<td>$%.2f</td>",$position["price"]);
       print("</tr>");
    }
?>
 
</tbody>
</table>
