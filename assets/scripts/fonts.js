$(document).ready(function () {

	WebFontConfig = {
    google: { families: [ 'Oswald:400,700,300:latin', 'Cabin:400,700:latin', 'Raleway:400,500:latin', 'Fira+Sans:400,300:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();


}