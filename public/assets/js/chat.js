$(document).ready(function () {
  setInterval(() =>{
    getChat();
}, 500);

  $(".input-field").focus();
  $(".input-field").keyup(function (e) {
    if ($(".input-field").val() != "") {
      $("button").addClass("active");
    } else {
      $("button").removeClass("active");
    }
  });

  $("form.typing-area").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/messages/send_chat",
      data: $(this).serialize(),
      success: function (response) {
        $(".input-field").val("");
        $("button").removeClass("active");
  $(".input-field").focus();
      },
    });
  });
  
  $(".chat-box").mouseenter(function () {
    $(".chat-box").addClass("active");
  });

  $(".chat-box").mouseleave(function () {
    $(".chat-box").removeClass("active");
  });

  function getChat() {
    $.ajax({
      type: "post",
      url: "/messages/get_chat",
      dataType: "json",
      data: {
        receiver_id: $(".receiver_id").val(),
      },
      success: function (response) {
        $(".chat-box").html(response);
        if (!$(".chat-box").hasClass("active")) {
          $('.chat-box')[0].scrollTop = ($('.chat-box')[0].scrollHeight);
        }
      },
    });
  }
});
