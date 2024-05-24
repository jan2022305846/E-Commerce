$(document).ready(function() {
  $(".search-icon").on("click", function() {
      let query = $(".search-bar").val().toLowerCase();
      $(".box").each(function() {
          let item = $(this).text().toLowerCase();
          if (item.indexOf(query) !== -1) {
              $(this).show();
          } else {
              $(this).hide();
          }
      });
  });
});