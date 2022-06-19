$(function () {

    $("input[name=sell_operation]:radio").click(function () {
        if ($('input[name=sell_operation]:checked').val() == "add") {
          $("#stock_quantity, #banyak, #harga ").on("keydown keyup", sum);
    
          function sum() {
          $("#result").val(Number($("#stock_quantity").val()) + Number($("#banyak").val()));
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
    
        } else if ($('input[name=sell_operation]:checked').val() == "sub") {
          $("#stock_quantity, #banyak, #harga").on("keydown keyup", sub);
    
          function sub() {
          $("#result").val(Number($("#stock_quantity").val()) - Number($("#banyak").val()));
          $("#total").val(Number($("#harga").val()) * Number($("#banyak").val()));
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
          
    
        }
    });
    });
    