var FXNP = ( function( FXNP, $ ) {


	$(window).on( 'load', () => {
		FXNP.Popup.init()
	})


	FXNP.Popup = {
		$popup:		null,
		$closeBtn: 	null,
		

		init() {
			this.$popup		= $('.js-popup-notification')
			this.$closeBtn 	= $('.js-popup-notification .js-btn-close')
			
            if( localStorage.getItem('webfx-popup-display') == null || localStorage.getItem('webfx-popup-display') == undefined  ) {
                if( this.$popup.length && this.$closeBtn.length ) {
                    this.showNotification()
                    this.bind()
                }
            }
            
		},

        bind() {
            this.$closeBtn.on('click', this.closePopupNotification )
        },

        showNotification() {
            this.$popup.fadeIn();
        },

        closePopupNotification() {
            let $popup = $('.js-popup-notification')
            localStorage.setItem('webfx-popup-display', 'true');
            $popup.fadeOut( "slow", function() {
                $popup.remove()
            });
           
        }
		
	}


	return FXNP

} ( FXNP || {}, jQuery ) )