$(function () {

    $("input[name=supplyOps]:radio").click(function () {
        if ($('input[name=supplyOps]:checked').val() == "add") {
          $("#stock_quantity, #banyak, #harga ").on("keydown keyup", sum);
    
          function sum() {
          $("#total").val(Number($("#harga").val()) * Number($("#banyak").val()));
          $("#result").val(Number($("#stock_quantity").val()) + Number($("#banyak").val()));
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
    
        } else if ($('input[name=supplyOps]:checked').val() == "sub") {
          $("#stock_quantity, #banyak, #harga").on("keydown keyup", sub);
    
          function sub() {
          $("#result").val(Number($("#stock_quantity").val()) - Number($("#banyak").val()));
          $("#total").val(Number($("#harga").val()) * Number($("#banyak").val()));
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
          
    
        }
    });
    });
    