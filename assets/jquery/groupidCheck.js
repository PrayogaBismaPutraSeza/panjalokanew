<script type="text/javascript">
$(document).ready(function() {
    var x_timer;
    $("#g_id").keyup(function (e){

        clearTimeout(x_timer);
        var g_id = $(this).val();
        x_timer = setTimeout(function(){
            check_groupId_ajax(g_id);
        }, 1000);
    });

function check_groupId_ajax(g_id){
    $("#id-result").html('<img src="img/Spinner.gif" />');
    $.post('checkId.php', {'g_id':g_id}, function(data) {
      $("#id-result").html(data);
    });
}
});
</script>
