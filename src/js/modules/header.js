jQuery(document).ready(($) => {
  // classes
  const mainHeader = $('.header');
  const theNav = $('.primary-nav');
  const navTrigger = '.hamburger';
  const navOpenClass = 'is-active';
  const headerHiddenClass = 'is-hidden';

  // scrolling variables
  let scrolling = false;
  let previousTop = 0;
  let currentTop = 0;
  const scrollDelta = 10;
  const scrollOffset = 150;

  // will open navigation on mobile
  mainHeader.on('click', navTrigger, (event) => {
    event.preventDefault();
    mainHeader.toggleClass(navOpenClass);
    theNav.toggleClass(navOpenClass);
  });

  // will monitor scrolling and add or remove is-hidden class
  function checkSimpleNavigation(theCurrentTop) { // eslint-disable no-shadow
    if (previousTop - theCurrentTop > scrollDelta) {
      mainHeader.removeClass(headerHiddenClass);
    } else if (theCurrentTop - previousTop > scrollDelta && theCurrentTop > scrollOffset) {
      mainHeader.addClass(headerHiddenClass);
    }
  }

  function autoHideHeader() {
    currentTop = $(window).scrollTop();
    checkSimpleNavigation(currentTop);
    previousTop = currentTop;
    scrolling = false;
  }


  $(window).on('scroll', () => {
    if (!scrolling) {
      scrolling = true;
      if (!window.requestAnimationFrame) {
        setTimeout(autoHideHeader, 250);
      } else {
        requestAnimationFrame(autoHideHeader);
      }
    }
  });
});


// Change background color of header on scroll
$(window).on('scroll', () => {
  if ($(window).scrollTop() > 80) {
    $('.header').addClass('is-scroll');
  } else {
    $('.header').removeClass('is-scroll');
  }
});
