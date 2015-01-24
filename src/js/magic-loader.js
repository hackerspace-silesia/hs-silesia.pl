"use strict";

(function ($) {
  $('document').ready(function () {
    var body = $('body');
    // var sectionsElements = $('.section');
    var navigationElements = $('header a');
    var contentMain = $('#content-main');

    var loader = $('.milky-way--holder');
    var isLoading = false;


    $('.section').first().fadeIn();
    // Bind click
    navigationElements.each(function () {
      var item = $(this);
      item.on('click', function (event) {
        event.preventDefault();
        if (!isLoading) {
          var href = event.target.href.split('/'),
            lastHrefPart = href[href.length - 1];
          if (lastHrefPart.search('#') === -1) {
            isLoading = true;
            loader.fadeIn();
            setTimeout(function () {
              contentMain.load(event.target.href + " #content-main .section", function () {
                loader.fadeOut();
                isLoading = false;
              });
            }, 0);
          } else {
            $('.section').each(function () {
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
  });

})(jQuery);