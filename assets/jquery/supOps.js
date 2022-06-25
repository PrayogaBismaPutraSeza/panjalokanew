$(function () {

    $("input[name=stock_operation]:radio").click(function () {
        if ($('input[name=stock_operation]:checked').val() == "add") {
          $("#banyak, #operation_value").on("keydown keyup", sum);
    
          function sum() {
          $("#result").val(Number($("#banyak").val()) + Number($("#operation_value").val()));
          $("#total").val(Number($("#harga").val()) * Number($("#operation_value").val()));
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
    
        } else if ($('input[name=stock_operation]:checked').val() == "sub") {
          $("#banyak, #operation_value").on("keydown keyup", sub);
    
          function sub() {
            var x = 0;
          $("#result").val(Number($("#banyak").val()) - Number($("#operation_value").val()));
          if( $("#result").val() < 0){
            $("#result").val(x);
          }
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
    
        }
    });
    });
    