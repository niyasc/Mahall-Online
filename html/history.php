<?
    // configuration
    require("../includes/config.php");
    $rows=query("select * from history where id=".$_SESSION["id"].";");
    render("show_history.php", ["rows" => $rows, "title" => "History"]);
?>
