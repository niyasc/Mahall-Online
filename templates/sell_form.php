<form action="sell.php" method="post">
    <fieldset>
        <div class="control-group">
            <select name="symbol">
            <option></option>
            <?php
                foreach($values["stock"] as $stock)
                {
                    print("<option>".$stock["symbol"]."</option>");
                }
            ?>
            </select>
        </div>

        <div class="control-group">
            <button type="submit" class="btn">Sell</button>
        </div>
    </fieldset>
</form>
