$(document).ready(function () {
  $(".search button").click(function (e) {
    $(".search input").toggleClass("show");
    $(".search button").toggleClass("active");
    $(".search input").focus();

    if ($(".search input").hasClass("active")) {
      $(".search input").val("");
      $(".search input").removeClass("active");
      interval = setInterval(getContact, 500);
    }
  });

  $("span.text").click(function (e) {
    $(".search input").addClass("show");
    $(".search button").addClass("active");
    $(".search input").focus();
  });

  $(".search input").keyup(function (e) {
    let keywordSearch = $(".search input").val();
    if (keywordSearch != "") {
      clearInterval(interval);
      $(".search input").addClass("active");
    } else {
      $(".search input").removeClass("active");
      interval = setInterval(getContact, 500);
    }

    $.ajax({
      type: "post",
      url: "/users/search_contact",
      data: {
        keywordSearch,
      },
      dataType: "json",
      success: function (response) {
        $(".users-list").html(response);
      },
    });
  });

  let interval;
  let getContact = function () {
    $.ajax({
      type: "post",
      url: "/users/get_contact",
      dataType: "json",
      success: function (response) {
        $(".users-list").html(response);
      },
    });
    clearInterval(interval);
    interval = setInterval(getContact, 500);
  };
  interval = setInterval(getContact, 500);
});
