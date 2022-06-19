$(function () {

    $("input[name=submit]:button").click(function () {
        if ($('input[name=submit]:pressed').val() == "sell") {
            function baru() {
                $("action").val("add_sell.php");
                $("action").val("update_quantity.php");
            }
        }
    });
    });
    