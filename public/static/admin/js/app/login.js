// $(".form-signin").on("click", "#btn_login", function() {
// $.post("/admcncp/login",{a:$("#ipt_user_id").attr("value")},function(data){
//     alert(data.status);
//     switch (data.status) {
//         case 200:
//             window.location.replace("/admcncp");
//             break;
//         default:
//             alert(data.message);
//     }
// });
// });

$("#btn_login").click(function(){
    $.ajax({
        type:"post",
        url:"/admcncp/login",
        data:{dengluming:$("#ipt_user_id").attr("value"),mima:$("#ipt_password").attr("value")},
        contentType:"application/x-www-form-urlencoded",
        success:function(data){
            switch (data.status) {
              case 200:
                  window.location.replace("/admcncp");
                  break;
              default:
            alert(data.message);
          }
        }
    })
})

$(document).on("click", "#btn_quit", function() {
  $.post("/admcncp/quit",{
  },function(data,status){
    switch (data.status) {
      case 200:
	  	alert(data.message);
        window.location.replace("/admcncp/");
        break;
      default:
        alert(data.message);
    }
  });
});
