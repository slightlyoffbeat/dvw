jQuery(document).ready($ => {
  $(window).scroll(() => {
    $('.scroll-down').css('opacity', 1 - ($(window).scrollTop() / 1000));
    console.log($(window).scrollTop());
  });
});
