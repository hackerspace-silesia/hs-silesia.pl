"use strict";

(function (document, window, $) {
  $(document).ready(function () {
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

    function getPushStateURL(splittedHref) {
      var link = document.location.toString().split('/');
      if (splittedHref[splittedHref.length - 1] === '') splittedHref.pop();
      if (link[link.length - 1] === '') link.pop();
      var generatedLink = '';
      for (var i = 0; i < link.length; i++) {
        if (splittedHref[i] !== link[i]) {
          generatedLink = generatedLink + '../';
        }
      }
      return generatedLink + (splittedHref[splittedHref.length - 1] === window.location.host ? '' : splittedHref[splittedHref.length - 1]);
    }

    function colorMenu() {
      var classes = 'current-menu-item current_page_item';
      $('.magic-links li').removeClass(classes);
      $('a[href="' + document.location + '/"]').addClass(classes);
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
              isLoading = true;
              loader.fadeIn();
              centerElement($('.loader'));
              window.history.pushState(stateObj, "", getPushStateURL(href.split('/')));
              main.load(href + " #main", function () {
                loader.fadeOut();
                isLoading = false;
                magicLinks = $('.magic-links a, .widget_recent_entries a');
                main = $('#main');
                reloadThings();
                colorMenu();
              });
            }
          });
        });
      }
    }
    reloadThings();
  });

})(document, window, jQuery);