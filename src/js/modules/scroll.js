import { throttle } from 'lodash';


jQuery(document).ready($ => {
  if ($('.scroll-down').length) {
    $(window).on('scroll', throttle(() => {
      $('.scroll-down').css('opacity', 1 - ($(window).scrollTop() / 1000));
    }, 100));
  }
});
