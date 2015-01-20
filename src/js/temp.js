"use strict";

(function ($) {
  $('document').ready(function () {
    var sectionsElements = $('.section');
    var navigationElements = $('header a');

    sectionsElements.first().fadeIn();

    // Bind click
    navigationElements.each(function () {
      var item = $(this);
      item.on('click', function (event) {
        event.preventDefault();
        var href = event.target.href.split('/');
        sectionsElements.each(function () {
          var el = $(this);
          if ('#' + this.id === href[href.length - 1]) {
            el.fadeIn();
          } else {
            el.hide();
          }
        });
      });
    });
  });

})(jQuery);