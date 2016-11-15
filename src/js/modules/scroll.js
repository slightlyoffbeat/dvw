$(window).scroll(function() {
  $(".scroll-down").css('opacity', 1 - $(window).scrollTop() / 250);
});
