import Instafeed from 'instafeed.js';

const feed = new Instafeed({
  get: 'user',
  userId: 1073623,
  clienetId: '8fb025858cd442609d397a55aa7626e6',
  accessToken: '1073623.8fb0258.a23ff3e4b74a4c13a61564448649f61d',
  template: '<div class="insta__wrap"><a href="{{link}}" target="_blank"><div class="insta__photo" style="background-image: url({{image}})"></div><div class="insta__hover"><i class="fa fa-instagram insta__icon"></i></div></a></div>',
  resolution: 'standard_resolution',
  limit: '8',
});

jQuery(document).ready($ => {
  if ($('.insta').length) {
    feed.run();
  }
});
