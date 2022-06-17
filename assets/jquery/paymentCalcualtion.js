$(document).ready(function() {
    $("#pay").keyup(function() {
        var due = 0;
        $("input[name='pay']").each(function (index) {
            var pay = $("input[name='pay']").eq(index).val();
            var salary = $("input[name='salary']").eq(index).val();
            if(isNaN(pay)){
                var due = 0;
            }
            else{
                var due = parseInt(salary) - parseInt(pay);
            }



            if (!isNaN(due)) {
                $("input[name='due']").eq(index).val(due);

                //grandTotal = parseInt(grandTotal) + parseInt(output);
                //$('#gran').val(grandTotal);
            }
            else{
                $("input[name='due']").eq(index).val(salary);
            }
        });
    });
});