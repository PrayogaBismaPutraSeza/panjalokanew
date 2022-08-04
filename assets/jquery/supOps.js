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
          $("#banyak, #operation_value, #stok, #hpp, #harga, #hppKg").on("keydown keyup", sub);
    
          function sub() {
          var B = Number($("#banyak").val());
          var c = 155000;
          var d = 0;
          if((Number($("#operation_value").val()) > Number($("#banyak").val()))|| (Number($("#operation_value").val()) > 150 || (Number($("#operation_value").val()) < 150))){
            $("#result").val(B);
            $("#stok").val(d);
            $("#hpp").val(d);
            $("#hppKg").val(d);       
          } else {
            $("#result").val(Number($("#banyak").val()) - Number($("#operation_value").val()));
            $("#stok").val(Number($("#operation_value").val()) - (Number($("#operation_value").val()) * 0.3));
            $("#hpp").val((Number($("#harga").val()) * Number($("#operation_value").val())) + c);
            $("#hppKg").val(Number($("#hpp").val()) / Number($("#operation_value").val()));
          }
          //$("#subt").val(Number($("#num1").val()) - Number($("#num2").val()));
          }
    
        }
    });
    });
    