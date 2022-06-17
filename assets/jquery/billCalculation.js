$(document).ready(function() {
    $("#npaid").keyup(function() {
        var due = 0;
        var reduced = 0;
        var tpaid = 0;
        $("input[name='npaid']").each(function (index) {
            var bill = $("input[name='totalBill']").eq(index).val();
            var paid = $("input[name='paid']").eq(index).val();
            var npaid = $("input[name='npaid']").eq(index).val();


            if(isNaN(npaid)){
                var tpaid = 0;
                var reduced = 0;
                var npaid = 0;
                $("input[name='reduced']").eq(index).val(bill);
            }
            else{
              var tpaid = parseInt(paid) + parseInt(npaid);
              var reduced = parseInt(bill) - parseInt(tpaid);
            }



            if (isNaN(npaid)) {
              $("input[name='tpaid']").eq(index).val(tpaid);
              $("input[name='reduced']").eq(index).val(reduced);

                //grandTotal = parseInt(grandTotal) + parseInt(output);
                //$('#gran').val(grandTotal);
            }else{
              $("input[name='tpaid']").eq(index).val(tpaid);
              $("input[name='reduced']").eq(index).val(reduced);
            }



        });
    });
});
