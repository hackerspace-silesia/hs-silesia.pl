"use strict";

(function (window, $) {
  $('document').ready(function () {
    var sections = $('.section');
    var magicLinks = $('.magic-links a');
    var contentMain = $('#content-main');

    var loader = $('.milky-way--holder');
    var isLoading = false;
    var stateObj = {};
    var pushState = window && window.history && window.history.pushState;

    sections.first().fadeIn();

    function reloadThings() {
      // Bind click
      if (pushState) {
        magicLinks.each(function () {
          var item = $(this);
          item.off('click');
          item.on('click', function (event) {
            var href = this.href;
            event.preventDefault();
            if (!isLoading) {
              var splitHref = href.split('/'),
                isTheLinkBeautiful = splitHref[splitHref.length - 1] === '',
                lastHrefPart = !isTheLinkBeautiful ? splitHref[splitHref.length - 1] : splitHref[splitHref.length - 2];
              if (lastHrefPart.search('#') === -1) {
                isLoading = true;
                loader.fadeIn();
                window.history.pushState(stateObj, "", window.location.host !== lastHrefPart ? isTheLinkBeautiful ? '../' + lastHrefPart + '/' : lastHrefPart : '/');
                contentMain.load(href + " #content-main>.section", function () {
                  loader.fadeOut();
                  isLoading = false;
                  magicLinks = $('.magic-links a');
                  sections = $('.section');
                  reloadThings();
                  // Update elements lists
                });
              } else {
                sections.each(function () {
                  isLoading = true;
                  var el = $(this);
                  // Check if current section's ID equals to clicked link's ID
                  if (lastHrefPart.search('#' + this.id) !== -1) {
                    el.fadeIn();
                  } else {
                    el.hide();
                  }
                });
                isLoading = false;
              }
            }
          });
        });
      }
    }
    reloadThings();
  });

})(window, jQuery);