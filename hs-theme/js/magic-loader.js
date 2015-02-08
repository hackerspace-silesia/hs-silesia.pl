"use strict";

(function (window, $) {
  $('document').ready(function () {
    var main = $('#main');
    var magicLinks = $('.magic-links a, .widget_recent_entries');
    var milkyWay = $('.milky-way');
    var loader = $('.milky-way--holder');
    var isLoading = false;
    var stateObj = {};
    var pushState = window && window.history && window.history.pushState;

    main.first().fadeIn();

    function centerElement(el) {
      var $window = $(window);
      var top = $window.scrollTop() * 2;
      var left = $window.width() / 2;
      el.css({
        top: (top > 256 ? top : 256) + 'px',
        left: (left > 0 ? left : 0) + 'px'
      });
    }

    function reloadThings() {
      // Bind click
      if (pushState) {
        magicLinks.each(function () {
          var item = $(this),
            doc = $(document);
          item.off('click');
          item.on('click', function (event) {
            milkyWay.width(doc.width()).height(doc.height());
            var href = this.href;
            event.preventDefault();
            if (!isLoading) {
              var splitHref = href.split('/'),
                isTheLinkBeautiful = splitHref[splitHref.length - 1] === '',
                lastHrefPart = !isTheLinkBeautiful ? splitHref[splitHref.length - 1] : splitHref[splitHref.length - 2];
              if (lastHrefPart.search('#') === -1) {
                isLoading = true;
                loader.fadeIn();
                centerElement($('.loader'));
                window.history.pushState(stateObj, "", window.location.host !== lastHrefPart ? isTheLinkBeautiful ? '../' + lastHrefPart + '/' : lastHrefPart : '/');
                main.load(href + " #main", function () {
                  loader.fadeOut();
                  isLoading = false;
                  magicLinks = $('.magic-links a, .widget_recent_entries a');
                  main = $('#main');
                  reloadThings();
                });
              }
            }
          });
        });
      }
    }
    reloadThings();
  });

})(window, jQuery);