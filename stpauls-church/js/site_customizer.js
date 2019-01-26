var siteCustomizer = (function($) {

  var settings = null;

  /**
  * Init
  */
  function init() {
    settings = _$ite_$ettings;

    if (!_$ite_$ettings && typeof _$ite_$ettings !== 'object') {
      // don't run script if no settings or if settings is not a json object
      throw new Error('Site settings must be a json object!');
      return;
    } else {
      console.log(settings);
      appendStyles();
      appendClasses();
    }
  }

  /**
  * Append all styles
  */

  function appendStyles() {

    var font = {
      baseSize: function() {
        $(document).ready(function() {
          var fontSize = $('body').css('font-size');
          return fontSize;
        });
      },
      primary: settings.font.primaryFont,
      secondary: settings.font.secondaryFont,
      headings: function() {
        var styleRules = '';

        for (var heading in settings.font.headings) {
          var headings = settings.font.headings;
          styleRules += heading + '{font-size:' + (parseInt(headings[heading].size) / 16) +'rem; font-weight:' + headings[heading].weight +';}';
        }

        return styleRules;
      },
      body: function() {
        var styleRules = '';

        for (var el in settings.font.body) {
          var elems = settings.font.body;
          if (el === 'paragraph') {
            styleRules += 'p{font-size:' + (parseInt(elems[el].size) / 16) + 'rem; font-weight:' + elems[el].weight + ';}';
          } else if (el === 'anchor') {
            styleRules += 'a{font-size:' + (parseInt(elems[el].size) / 16) + 'rem; font-weight:' + elems[el].weight + ';}';
          }
        }

        return styleRules;
      },
      appendLinks: function() {

        var stack = {
          'Cormorant Garamond': {
            name: 'Cormorant Garamond',
            gLink: 'Cormorant+Garamond',
            weights: '',
          },
          'Playfair Display': {
            name: 'Playfair Display',
            gLink: 'Playfair+Display',
            weights: '',
          },
          'Source Serif Pro': {
            name: 'Source Serif Pro',
            gLink: 'Source+Serif+Pro',
            weights: '',
          },
          'Cardo': {
            name: 'Cardo',
            gLink: 'Cardo',
            weights: '',
          },
          'Open Sans': {
            name: 'Open Sans',
            gLink: 'Open+Sans',
            weights: '',
          },
        }

        $('head').append('<link href="https://fonts.googleapis.com/css?family="' + stack[font.primary].gLink + '|' + stack[font.secondary].gLink + '" rel="stylesheet"');
      },
      decleration: function() {
        return 'body{ font-family: "' + this.secondary + '", sans-serif;} h1,h2,h3,h4,h5,h6{ font-family: "' + this.primary + '", serif;}' + this.headings() + this.body();
      }
    }

    var color = {
      primary: function() {
        var color = settings.color.primaryColor || 'cornflowerblue';

        return '.bg-primary{background-color: ' + color +';} .color-primary{color:' + color + ';}';
      },
      secondary: function() {
        var color = settings.color.secondaryColor || 'white';

        return '.bg-secondary{background-color: ' + color + ';} .color-secondary{color:' + color +';}';
      },
      neutral: function() {
        var color = settings.color.neutralColor || '#ccc';

        return '.bg-neutral{background-color:' + color + ';} .color-neutral{color:' + color + ';}';
      },
      base: function() {
        var color = settings.color.baseColor || 'black';

        return '.bg-base{background-color:' + color + ';} .color-base{color:' + color + ';} body{color:' + color + ';}';
      },
      headingColor: function() {
        var color = settings.color.headingColor || 'cornflowerblue';

        return '.color-heading{color:' + color + ';}';
      },
      bodyColor: function() {
        var color = settings.color.bodyColor || 'black';

        return '.color-body{color:' + color +';}';
      },
      linkColor: function() {
        var color = settings.color.linkColor;

        return '.color-link{color:' + color + ';}';
      },
      decleration: function() {
        return this.primary() + this.secondary() + this.neutral() + this.base() + this.headingColor() + this.bodyColor() + this.linkColor();
      },
    }
    console.log(font.baseSize());
    font.appendLinks();
    font.headings();
    $('head').append('<style type="text/css">' + font.decleration() + color.decleration() + '</style>');
  }

  /**
  * Append style classes to elements
  */
  function appendClasses() {

    // doc ready
    $(document).ready(function() {

      var $body = $('body');
      var $headings = $body.find('h1, h2, h3, h4, h5, h6');
      var $bodyText = $body.find('p');
      var $links = $body.find('a');

      // append color class to headings
      $headings.each(function() {
        $(this).addClass('color-heading');
      });

      // append color class to body text
      $bodyText.each(function() {
        $(this).addClass('color-body');
      });

      // append color class to links
      $links.each(function() {

        // dont style links that are buttons
        if ($(this).hasClass('btn')) {
          // do nothing
        } else {
          $(this).addClass('color-link');
        }
      });
    });

  }

  // api
  return {
    init: init,
  }

})(jQuery);

siteCustomizer.init();
