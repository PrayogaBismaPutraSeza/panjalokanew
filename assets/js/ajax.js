$(document).ready(function() {
  $("#company").change(function() {
    var company_id = $(this).val();
    if(company_id != "") {
      $.ajax({
        url:"get-groups.php",
        data:{c_id:company_id},
        type:'POST',
        success:function(response) {
          var resp = $.trim(response);
          $("#group").html(resp);
        }
      });
    } else {
      $("#group").html("<option value=''>------- Select --------</option>");
    }
  });
});
