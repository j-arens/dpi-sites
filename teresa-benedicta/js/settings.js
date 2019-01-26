(function($) {

  var customizer = {

    init: function() {
      this.cacheDom({firstLoad: true});
      this.setContext();
      this.cacheDom({secondLoad: true});
      this.bindEvents({});
      this._vendor.colorPicker();
      this._vendor.imagePicker();
    },

    checkIfAdmin: function() {
      if (_current_user_info_ && typeof _current_user_info_ === 'object') {
        if (_current_user_info_.roles[0] !== 'administrator') {
          return false;
        } else {
          return true;
        }
      } else {
        return false;
      }
    },

    cacheDom: function(options) {
      if (options && typeof options === 'object') {
        var firstLoad = options.firstLoad || false;
        var secondLoad = options.secondLoad || false;
        var sectionChanged = options.changeSection || false;

        if (firstLoad) {
          this.$optPage = $('#dpi-opt-page');
        }

        if (secondLoad) {
          this.$pageNav = this.$optPage.find('.site-section-nav');
          this.$pageNavLi = this.$pageNav.find('li');
          this.$siteSection = this.$optPage.find('.site-section');
          this.$tabNav = this.$optPage.find('.active-section .tab-nav');
          this.$tabNavLi = this.$tabNav.find('li');
          this.$components = this.$optPage.find('.active-section .tab-panel li');
        }

        if (sectionChanged) {
          this.$tabNav = this.$optPage.find('.active-section .tab-nav');
          this.$tabNavLi = this.$tabNav.find('li');
          this.$components = this.$optPage.find('.active-section .tab-panel li');
        }

      } else {
        throw new Error('Invalid property passed to cacheDom method');
      }
    },

    setContext: function() {
      if (!this.checkIfAdmin()) {
        this.$siteSection = this.$optPage.find('.site-section');
        this.$sectionTab = this.$optPage.find('.site-section-nav li');

        $(this.$siteSection[0]).removeClass('active-section').hide();
        $(this.$siteSection[1]).addClass('active-section');

        $(this.$sectionTab[0]).removeClass('active-tab').hide();
        $(this.$sectionTab[1]).addClass('active-tab');
      }

      setTimeout(function(t) {
        t.$optPage.find('.page-loading').fadeOut();
      }, 1000, this);

    },

    bindEvents: function(options) {
      if (options && typeof options === 'object') {
        var changeSection = options.changeSection || false;

        if (changeSection) {
          this.$tabNav.delegate('li:not(.active-part)', 'click', this.changeComponent.bind(this));
        } else {
          this.$pageNav.delegate('li:not(.active-tab)', 'click', this.changeSection.bind(this));
          this.$tabNav.delegate('li:not(.active-part)', 'click', this.changeComponent.bind(this));
          this.$optPage.delegate('.image_upload_button', 'click', function() {
            $.fn.uploadMediaFile( $(this), true );
          });
          this.$optPage.delegate('.image_delete_button', 'click', function () {
            $(this).closest('.input-wrapper').find( '.image_data_field' ).val( '' );
            $(this).closest( '.input-wrapper' ).find('.image_preview').attr('src', '');
            return false;
          });
        }
      } else {
        throw new Error('Invalid property passed to bindEvents method');
      }
    },

    render: function() {
      this.$tabNav.undelegate('li', 'click');
      this.cacheDom({changeSection: true});
      this.bindEvents({changeSection: true});
    },

    changeSection: function(e) {
      var $clicked = $(e.target).closest('li');
      var i = this.$pageNav.find('li').index($clicked);
      var $elArr = [[this.$pageNavLi, 'active-tab', i], [this.$siteSection, 'active-section', i]];

      $elArr.forEach(this.changeClass);
      this.render();
    },

    changeComponent: function(e) {
      var $clicked = $(e.target).closest('li');
      var i = this.$tabNav.find('li').index($clicked);
      var $elArr = [[this.$tabNavLi, 'active-part', i], [this.$components, 'active-component', i]];

      $elArr.forEach(this.changeClass);
    },

    changeClass: function(el, i, arr) {
      $(arr[i][0]).each(function() {
        $(this).removeClass(arr[i][1]);
      });

      $(arr[i][0][arr[i][2]]).addClass(arr[i][1]);
    },

    _vendor: {

      colorPicker: function() {
        $('.colorpicker').each( function() {
            $(this).farbtastic( $(this).closest('.color-picker').find('.color') );
        });
     },
     store: {
       id: '',
     },

     imagePicker: function() {

       $.fn.uploadMediaFile = function( button, preview_media ) {
           var button_id = button.attr('id');
           var field_id = button_id.replace( '_button', '' );
           var set_preview_id = button_id.replace( '_button', '_preview' );
           var file_frame;

           customizer._vendor.store.id = set_preview_id;

           // If the media frame already exists, reopen it.
           if ( file_frame ) {
             file_frame.open();
             return;
           }

           // Create the media frame.
           file_frame = wp.media.frames.file_frame = wp.media({
             title: $( this ).data( 'uploader_title' ),
             button: {
               text: $( this ).data( 'uploader_button_text' ),
             },
             multiple: false
           });

           // When an image is selected, run a callback.
           file_frame.on( 'select', function() {

             var attachment = file_frame.state().get('selection').first().toJSON();
             $("#" + field_id).val(attachment.id);

             if( preview_media ) {
              var preview_id = customizer._vendor.store.id;

               $("#" + preview_id).attr('src', attachment.url);
             }
           });

           // Finally, open the modal
           file_frame.open();
       }
     }
    }
  }

  $(document).ready(function() {
    customizer.init();
  });

})(jQuery);
