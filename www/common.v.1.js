$(".navigation").each(function() {
  var $thisParagraph = $(this);
  $thisParagraph.click(function() {
    $thisParagraph.toggleClass("active");
  });
});