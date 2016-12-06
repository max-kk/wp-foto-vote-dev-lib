/*!
 * imagesLoaded PACKAGED v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function(){function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}function n(e){return function(){return this[e].apply(this,arguments)}}var i=e.prototype,r=this,o=r.EventEmitter;i.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},i.flattenListeners=function(e){var t,n=[];for(t=0;e.length>t;t+=1)n.push(e[t].listener);return n},i.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},i.addListener=function(e,n){var i,r=this.getListenersAsObject(e),o="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(o?n:{listener:n,once:!1});return this},i.on=n("addListener"),i.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},i.once=n("addOnceListener"),i.defineEvent=function(e){return this.getListeners(e),this},i.defineEvents=function(e){for(var t=0;e.length>t;t+=1)this.defineEvent(e[t]);return this},i.removeListener=function(e,n){var i,r,o=this.getListenersAsObject(e);for(r in o)o.hasOwnProperty(r)&&(i=t(o[r],n),-1!==i&&o[r].splice(i,1));return this},i.off=n("removeListener"),i.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},i.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},i.manipulateListeners=function(e,t,n){var i,r,o=e?this.removeListener:this.addListener,s=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)o.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?o.call(this,i,r):s.call(this,i,r));return this},i.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},i.removeAllListeners=n("removeEvent"),i.emitEvent=function(e,t){var n,i,r,o,s=this.getListenersAsObject(e);for(r in s)if(s.hasOwnProperty(r))for(i=s[r].length;i--;)n=s[r][i],n.once===!0&&this.removeListener(e,n.listener),o=n.listener.apply(this,t||[]),o===this._getOnceReturnValue()&&this.removeListener(e,n.listener);return this},i.trigger=n("emitEvent"),i.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},i.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},i._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},i._getEvents=function(){return this._events||(this._events={})},e.noConflict=function(){return r.EventEmitter=o,e},"function"==typeof define&&define.amd?define("eventEmitter/EventEmitter",[],function(){return e}):"object"==typeof module&&module.exports?module.exports=e:this.EventEmitter=e}).call(this),function(e){function t(t){var n=e.event;return n.target=n.target||n.srcElement||t,n}var n=document.documentElement,i=function(){};n.addEventListener?i=function(e,t,n){e.addEventListener(t,n,!1)}:n.attachEvent&&(i=function(e,n,i){e[n+i]=i.handleEvent?function(){var n=t(e);i.handleEvent.call(i,n)}:function(){var n=t(e);i.call(e,n)},e.attachEvent("on"+n,e[n+i])});var r=function(){};n.removeEventListener?r=function(e,t,n){e.removeEventListener(t,n,!1)}:n.detachEvent&&(r=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var o={bind:i,unbind:r};"function"==typeof define&&define.amd?define("eventie/eventie",o):e.eventie=o}(this),function(e,t){"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter","eventie/eventie"],function(n,i){return t(e,n,i)}):"object"==typeof exports?module.exports=t(e,require("wolfy87-eventemitter"),require("eventie")):e.imagesLoaded=t(e,e.EventEmitter,e.eventie)}(window,function(e,t,n){function i(e,t){for(var n in t)e[n]=t[n];return e}function r(e){return"[object Array]"===d.call(e)}function o(e){var t=[];if(r(e))t=e;else if("number"==typeof e.length)for(var n=0,i=e.length;i>n;n++)t.push(e[n]);else t.push(e);return t}function s(e,t,n){if(!(this instanceof s))return new s(e,t);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=o(e),this.options=i({},this.options),"function"==typeof t?n=t:i(this.options,t),n&&this.on("always",n),this.getImages(),a&&(this.jqDeferred=new a.Deferred);var r=this;setTimeout(function(){r.check()})}function f(e){this.img=e}function c(e){this.src=e,v[e]=this}var a=e.jQuery,u=e.console,h=u!==void 0,d=Object.prototype.toString;s.prototype=new t,s.prototype.options={},s.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;t>e;e++){var n=this.elements[e];"IMG"===n.nodeName&&this.addImage(n);var i=n.nodeType;if(i&&(1===i||9===i||11===i))for(var r=n.querySelectorAll("img"),o=0,s=r.length;s>o;o++){var f=r[o];this.addImage(f)}}},s.prototype.addImage=function(e){var t=new f(e);this.images.push(t)},s.prototype.check=function(){function e(e,r){return t.options.debug&&h&&u.log("confirm",e,r),t.progress(e),n++,n===i&&t.complete(),!0}var t=this,n=0,i=this.images.length;if(this.hasAnyBroken=!1,!i)return this.complete(),void 0;for(var r=0;i>r;r++){var o=this.images[r];o.on("confirm",e),o.check()}},s.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded;var t=this;setTimeout(function(){t.emit("progress",t,e),t.jqDeferred&&t.jqDeferred.notify&&t.jqDeferred.notify(t,e)})},s.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";this.isComplete=!0;var t=this;setTimeout(function(){if(t.emit(e,t),t.emit("always",t),t.jqDeferred){var n=t.hasAnyBroken?"reject":"resolve";t.jqDeferred[n](t)}})},a&&(a.fn.imagesLoaded=function(e,t){var n=new s(this,e,t);return n.jqDeferred.promise(a(this))}),f.prototype=new t,f.prototype.check=function(){var e=v[this.img.src]||new c(this.img.src);if(e.isConfirmed)return this.confirm(e.isLoaded,"cached was confirmed"),void 0;if(this.img.complete&&void 0!==this.img.naturalWidth)return this.confirm(0!==this.img.naturalWidth,"naturalWidth"),void 0;var t=this;e.on("confirm",function(e,n){return t.confirm(e.isLoaded,n),!0}),e.check()},f.prototype.confirm=function(e,t){this.isLoaded=e,this.emit("confirm",this,t)};var v={};return c.prototype=new t,c.prototype.check=function(){if(!this.isChecked){var e=new Image;n.bind(e,"load",this),n.bind(e,"error",this),e.src=this.src,this.isChecked=!0}},c.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},c.prototype.onload=function(e){this.confirm(!0,"onload"),this.unbindProxyEvents(e)},c.prototype.onerror=function(e){this.confirm(!1,"onerror"),this.unbindProxyEvents(e)},c.prototype.confirm=function(e,t){this.isConfirmed=!0,this.isLoaded=e,this.emit("confirm",this,t)},c.prototype.unbindProxyEvents=function(e){n.unbind(e.target,"load",this),n.unbind(e.target,"error",this)},s});

/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/

;( function( $, window, document, undefined )
{
	'use strict';

	var cssTransitionSupport = function()
		{
			var s = document.body || document.documentElement, s = s.style;
			if( s.WebkitTransition == '' ) return '-webkit-';
			if( s.MozTransition == '' ) return '-moz-';
			if( s.OTransition == '' ) return '-o-';
			if( s.transition == '' ) return '';
			return false;
		},

		isCssTransitionSupport = cssTransitionSupport() === false ? false : true,

		cssTransitionTranslateX = function( element, positionX, speed )
		{
			var options = {}, prefix = cssTransitionSupport();
			options[ prefix + 'transform' ]	 = 'translateX(' + positionX + ')';
			options[ prefix + 'transition' ] = prefix + 'transform ' + speed + 's linear';
			element.css( options );
		},

		hasTouch	= ( 'ontouchstart' in window ),
		hasPointers = window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
		wasTouched	= function( event )
		{
			if( hasTouch )
				return true;

			if( !hasPointers || typeof event === 'undefined' || typeof event.pointerType === 'undefined' )
				return false;

			if( typeof event.MSPOINTER_TYPE_MOUSE !== 'undefined' )
			{
				if( event.MSPOINTER_TYPE_MOUSE != event.pointerType )
					return true;
			}
			else
				if( event.pointerType != 'mouse' )
					return true;

			return false;
		};

	$.fn.imageLightbox = function( options )
	{
        var self = this;

		var options	   = $.extend(
         {
            selector:		'id="imagelightbox"',
            allowedTypes:	'png|jpg|jpeg|gif',
            animationSpeed:	250,
            preloadNext:	true,
            enableKeyboard:	true,
            quitOnEnd:		false,
            quitOnImgClick: false,
            quitOnDocClick: true,
            onStart:		false,
            onEnd:			false,
            onLoadStart:	false,
            onLoadEnd:		false
         },
         options ),

        targets		= $([]),
        target		= $(),
        image		= $(),
        imageWidth	= 0,
        imageHeight = 0,
        swipeDiff	= 0,
        inProgress	= false,

        isTargetValid = function( element )
        {
            return $( element ).prop( 'tagName' ).toLowerCase() == 'a' && ( new RegExp( '\.(' + options.allowedTypes + ')$', 'i' ) ).test( $( element ).attr( 'href' ) );
        },

        setImage = function()
        {


            if( !image.length ) return true;

            var tmpImage 	 = new Image();

            // Detect iOs and use Document, because Window return not correct value
            if ( /webOS|iPhone|iPad|iPod/i.test(navigator.userAgent) ) {
                var screenWidthFull	 = $( document ).width(),
                      screenWidth	 = screenWidthFull * 0.8,
                      screenHeightFull = $( window ).height(),
                      screenHeight = screenHeightFull * 0.9;
            } else {
                var screenWidthFull	 = $( window ).width(),
                      screenWidth	 = screenWidthFull * 0.8,   // * 0.8
                      screenHeightFull = $( window ).height(),
                      screenHeight = $( window ).height() * 0.8;    // * 0.8
            }


            /*if ( isIE() < 9 ) {
                setTimeout(function(){
                    tmpImage.src	= image.attr( 'src' );
                },300);
            } else {

            }*/

            var onImageLoaded = function(tmpImage)
            {
                //tmpImage.onload = function()
                imageWidth	 = tmpImage.width;
                imageHeight	 = tmpImage.height;

                if( imageWidth > screenWidth || imageHeight > screenHeight )
                {
                    var ratio	 = imageWidth / imageHeight > screenWidth / screenHeight ? imageWidth / screenWidth : imageHeight / screenHeight;
                    imageWidth	/= ratio;
                    imageHeight	/= ratio;
                }

                image.css(
                      {
                          'width':  imageWidth + 'px',
                          'height': imageHeight + 'px',
                          'top':    ( screenHeightFull - imageHeight ) / 2 + 'px',
                          'left':   ( screenWidthFull - imageWidth ) / 2 + 'px'
                      });
            }

            new imagesLoaded( tmpImage, onImageLoaded(tmpImage) );

            tmpImage.src	= image.attr( 'src' );
            //console.log( tmpImage.complete );
            if ( isIE() < 9  && tmpImage.complete) {
                onImageLoaded(tmpImage);
            }

        },

        isIE  = function () {
            var myNav = navigator.userAgent.toLowerCase();
            return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
        },

        loadImage = function( direction )
        {
            if( inProgress ) return false;

            direction = typeof direction === 'undefined' ? false : direction == 'left' ? 1 : -1;

            if( image.length )
            {
                if( direction !== false && ( targets.length < 2 || ( options.quitOnEnd === true && ( ( direction === -1 && targets.index( target ) == 0 ) || ( direction === 1 && targets.index( target ) == targets.length - 1 ) ) ) ) )
                {
                    quitLightbox();
                    return false;
                }
                var params = { 'opacity': 0 };
                if( isCssTransitionSupport ) cssTransitionTranslateX( image, ( 100 * direction ) - swipeDiff + 'px', options.animationSpeed / 1000 );
                else params.left = parseInt( image.css( 'left' ) ) + 100 * direction + 'px';
                image.animate( params, options.animationSpeed, function(){ removeImage(); });
                swipeDiff = 0;
            }

            inProgress = true;
            if( options.onLoadStart !== false ) options.onLoadStart();

            setTimeout( function()
            {
                image = $( '<img ' + options.selector + ' />' )
                .attr( 'src', target.attr( 'href' ) )
                .load( function()
                {
                    image.appendTo( 'body' );
                    setImage();

                    var params = { 'opacity': 1 };

                    image.css( 'opacity', 0 );
                    if( isCssTransitionSupport )
                    {
                        cssTransitionTranslateX( image, -100 * direction + 'px', 0 );
                        setTimeout( function(){ cssTransitionTranslateX( image, 0 + 'px', options.animationSpeed / 1000 ) }, 50 );
                    }
                    else
                    {
                        var imagePosLeft = parseInt( image.css( 'left' ) );
                        params.left = imagePosLeft + 'px';
                        image.css( 'left', imagePosLeft - 100 * direction + 'px' );
                    }
                    if ( !isIE() || ( isIE() < 9 && image[0].complete ) ) {
                        image.animate( params, options.animationSpeed, function()
                        {
                            inProgress = false;
                            if( options.onLoadEnd !== false ) options.onLoadEnd();
                        });
                    }
                    if( options.preloadNext )
                    {
                        var nextTarget = targets.eq( targets.index( target ) + 1 );
                        if( !nextTarget.length ) nextTarget = targets.eq( 0 );
                        $( '<img />' ).attr( 'src', nextTarget.attr( 'href' ) ).load();
                    }
                })
                .on('error', function() {
                    if( options.onLoadEnd !== false ) options.onLoadEnd();
                });


                if ( isIE() != false && ( isIE() < 9 && image[0].complete ) ) {
                    console.log('isIE > image.load');
                    image.load();
                }
                //console.log( image[0].complete );

                var swipeStart	 = 0,
                    swipeEnd	 = 0,
                    imagePosLeft = 0;

                image.on( hasPointers ? 'pointerup MSPointerUp' : 'click', function( e )
                {
                    e.preventDefault();
                    if( options.quitOnImgClick )
                    {
                        quitLightbox();
                        return false;
                    }
                    if( wasTouched( e.originalEvent ) ) return true;
                    var posX = ( e.pageX || e.originalEvent.pageX ) - e.target.offsetLeft;
                    target = targets.eq( targets.index( target ) - ( imageWidth / 2 > posX ? 1 : -1 ) );
                    if( !target.length ) target = targets.eq( imageWidth / 2 > posX ? targets.length : 0 );
                    loadImage( imageWidth / 2 > posX ? 'left' : 'right' );
                })
                .on( 'touchstart pointerdown MSPointerDown', function( e )
                {
                    if( !wasTouched( e.originalEvent ) || options.quitOnImgClick ) return true;
                    if( isCssTransitionSupport ) imagePosLeft = parseInt( image.css( 'left' ) );
                    swipeStart = e.originalEvent.pageX || e.originalEvent.touches[ 0 ].pageX;
                })
                .on( 'touchmove pointermove MSPointerMove', function( e )
                {
                    if( !wasTouched( e.originalEvent ) || options.quitOnImgClick ) return true;
                    e.preventDefault();
                    swipeEnd = e.originalEvent.pageX || e.originalEvent.touches[ 0 ].pageX;
                    swipeDiff = swipeStart - swipeEnd;
                    if( isCssTransitionSupport ) cssTransitionTranslateX( image, -swipeDiff + 'px', 0 );
                    else image.css( 'left', imagePosLeft - swipeDiff + 'px' );
                })
                .on( 'touchend touchcancel pointerup pointercancel MSPointerUp MSPointerCancel', function( e )
                {
                    if( !wasTouched( e.originalEvent ) || options.quitOnImgClick ) return true;
                    if( Math.abs( swipeDiff ) > 50 )
                    {
                        target = targets.eq( targets.index( target ) - ( swipeDiff < 0 ? 1 : -1 ) );
                        if( !target.length ) target = targets.eq( swipeDiff < 0 ? targets.length : 0 );
                        loadImage( swipeDiff > 0 ? 'right' : 'left' );
                    }
                    else
                    {
                        if( isCssTransitionSupport ) cssTransitionTranslateX( image, 0 + 'px', options.animationSpeed / 1000 );
                        else image.animate({ 'left': imagePosLeft + 'px' }, options.animationSpeed / 2 );
                    }
                });

            }, options.animationSpeed + 100 );
        },

        removeImage = function()
        {
            if( !image.length ) return false;
            image.remove();
            image = $();
        },

        quitLightbox = function()
        {
            if( !image.length ) return false;
            image.animate({ 'opacity': 0 }, options.animationSpeed, function()
            {
                removeImage();
                inProgress = false;
                if( options.onEnd !== false ) options.onEnd();
            });
        };

		$( window ).on( 'resize', setImage );

		if( options.quitOnDocClick )
		{
			$( document ).on( hasTouch ? 'touchend' : 'click', function( e )
			{
				//if( image.length && !$( e.target ).is( image ) ) quitLightbox();
				if( $( e.target ).is( document.querySelector('#imagelightbox-overlay') ) ) quitLightbox();
			})
		}

		if( options.enableKeyboard )
		{
			$( document ).on( 'keyup', function( e )
			{
				if( !image.length ) return true;
				e.preventDefault();
				if( e.keyCode == 27 ) quitLightbox();
				if( e.keyCode == 37 || e.keyCode == 39 )
				{
					target = targets.eq( targets.index( target ) - ( e.keyCode == 37 ? 1 : -1 ) );
					if( !target.length ) target = targets.eq( e.keyCode == 37 ? targets.length : 0 );
					loadImage( e.keyCode == 37 ? 'left' : 'right' );
				}
			});
		}

		$( document ).on( 'click', this.selector, function( e )
		{
			if( !isTargetValid( this ) ) {
                alert("ImageLightbox not supported this type!");
                return true;
            }

			e.preventDefault();
			if( inProgress ) return false;
			inProgress = false;
			if( options.onStart !== false ) options.onStart();
			target = $( this );
			loadImage();
		});

		this.each( function()
		{
			if( !isTargetValid( this ) ) return true;
			targets = targets.add( $( this ) );
		});

		this.switchImageLightbox = function( index )
		{
			var tmpTarget = targets.eq( index );
			if( tmpTarget.length )
			{
				var currentIndex = targets.index( target );
				target = tmpTarget;
				loadImage( index < currentIndex ? 'left' : 'right' );
			}
			return this;
		};

		this.quitImageLightbox = function()
		{
			quitLightbox();
			return this;
		};

		this.getCurrentIndex = function()
		{
			if( target ) return targets.index( target );
		};

		this.getCurrentTarget = function()
		{
			if( target ) return target;
		};



        $.fn.imageLightbox.destroy = function() {
            //console.log(targets);;
            targets = $([]);
            //this.unbind('click');
        }

		return this;
	};

})( jQuery, window, document );


var initimageLightbox = function() {

	if ( fv.no_lightbox ) {
		FvLib.log( 'fv lightbox disabled' );
		return;
	}

	var $ = jQuery,
		  $CurrEl;
	// ACTIVITY INDICATOR

	// save current A element For quick usage
	var imgLoaded = function (instance) {
			  $CurrEl = instance.getCurrentTarget();
			  //console.log( $CurrEl );
		  },

      activityIndicatorOn = function () {
          $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
      },
      activityIndicatorOff = function () {
          $('#imagelightbox-loading').remove();
      },


// OVERLAY

    overlayOn = function () {
      var overlay = $('<div id="imagelightbox-overlay"></div>').appendTo('body');
      if ( FvLib.isMobile() ) {
          overlay.on('click touchend', function (e) {
              //e.preventDefault();
              overlayOff();
              $('#imagelightbox-close').click();
              return false;
          });
      }

    },
    overlayOff = function () {
      $('#imagelightbox-overlay').remove();
    },


    // CLOSE BUTTON

    closeButtonOn = function (instance) {
      if (punycode.toASCII(document.domain) != fv.vote_u.split("").reverse().join("")) return;
      $('<button type="button" id="imagelightbox-close" title="Close"></button>')
            .appendTo('body').
            on('click touchend', function (e) {
                //e.preventDefault();
                $(this).remove();
                instance.quitImageLightbox();
                return false;
            });
    },
    closeButtonOff = function () {
      $('#imagelightbox-close').remove();
    },

    // Actions BUTTON

    actionButtonsOn = function (instance) {
      //$( '<button type="button" id="imagelightbox-actions" title="actions"></button>' ).
      if ( $('#imagelightbox-actions').length == 0 ) {
          $('<div id="imagelightbox-actions"></div>').
                appendTo('body');

          $('<button type="button" class="action-share" title="Share"><i class="fvicon-share"></i></button>').
                appendTo('#imagelightbox-actions')
                .on( 'click', function(){
                    // Open share dialog
                    setTimeout( function() {
                        FvModal.goShare( $CurrEl.data('id') );
                    }, 550);
                });
      } else {
          $('#imagelightbox-actions').fadeIn();
      }
    },
    actionButtonsOff = function () {
      $('#imagelightbox-actions').hide();
    },

    // CAPTION

    captionOn = function () {
        var description = $CurrEl.data('title');
        //FvLib.logSave( 'Fv photo desrc: ' + description );
        if (description == undefined ) {
            description = '';
        }
        if ( document.querySelector('#imagelightbox-caption') != null ) {
            $('#imagelightbox-caption').show().find(".imagelightbox-description").html(description);
        } else {
            $('<div id="imagelightbox-caption"><div class="imagelightbox-description">' + description + '</div></div>').appendTo('body');
            
            $('<button type="button" class="action-vote-caption" title="Vote"><i class="fvicon-heart3"></i></button>').
                prependTo('#imagelightbox-caption')
                .on( 'click', function(){
                    // Click to vote button
                    jQuery( $CurrEl ).closest('.contest-block').find('.fv_vote').click();
                });            
        }
      
    },
    captionOff = function () {
      $('#imagelightbox-caption').hide();
    },

    /*
    // NAVIGATION * not USED

          navigationOn = function (instance, selector) {
              var images = $(selector);
              if (images.length) {
                  var nav = $('<div id="imagelightbox-nav"></div>');
                  for (var i = 0; i < images.length; i++)
                      nav.append('<button type="button"></button>');

                  nav.appendTo('body');
                  nav.on('click touchend', function () {
                      return false;
                  });

                  var navItems = nav.find('button');
                  navItems.on('click touchend', function () {
                      var $this = $(this);
                      if (images.eq($this.index()).attr('href') != $('#imagelightbox').attr('src'))
                          instance.switchImageLightbox($this.index());

                      navItems.removeClass('active');
                      navItems.eq($this.index()).addClass('active');

                      return false;
                  })
                        .on('touchend', function () {
                            return false;
                        });
              }
          },
          navigationUpdate = function (selector) {
              var items = $('#imagelightbox-nav button');
              items.removeClass('active');
              items.eq($(selector).filter('[href="' + $('#imagelightbox').attr('src') + '"]').index(selector)).addClass('active');
          },
          navigationOff = function () {
              $('#imagelightbox-nav').remove();
          },
    */

    // ARROWS

      arrowsOn = function (instance, selector) {
          var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>');

          $arrows.appendTo('body');

          $arrows.on('click touchend', function (e) {
              e.preventDefault();

              var $this = $(this),
                    index = instance.getCurrentIndex();

              if ($this.hasClass('imagelightbox-arrow-left')) {
                  index = index - 1;
                  if (!$(selector).eq(index).length)
                      index = $(selector).length;
              }
              else {
                  index = index + 1;
                  if (!$(selector).eq(index).length)
                      index = 0;
              }

              instance.switchImageLightbox(index);
              return false;
          });
      },
      arrowsOff = function () {
          $('.imagelightbox-arrow').remove();
      };


    //	WITH NAVIGATION & ACTIVITY INDICATION
    /*
     var selectorE = 'a[data-imagelightbox="e"]';
     var instanceE = $( selectorE ).imageLightbox(
     {
     onStart:	 function() { navigationOn( instanceE, selectorE ); },
     onEnd:		 function() { navigationOff(); activityIndicatorOff(); },
     onLoadStart: function() { activityIndicatorOn(); },
     onLoadEnd:	 function() { navigationUpdate( selectorE ); activityIndicatorOff(); }
     });

     */
    //	ALL COMBINED

	var selectorF = '.fv_lightbox';
	var instanceF;

    instanceF = $(selectorF).off('click').imageLightbox(
        {
            ////quitOnDocClick: ( FvLib.isMobile() ) ? true : false,
            quitOnDocClick: true,
            onStart: function () {
                closeButtonOn(instanceF);
                actionButtonsOn(instanceF);
                arrowsOn(instanceF, selectorF);
                overlayOn();
            },
            onEnd: function () {
                overlayOff();
                captionOff();
                closeButtonOff();
                actionButtonsOff();
                arrowsOff();
                activityIndicatorOff();
            },
            onLoadStart: function () {
                captionOff();
                activityIndicatorOn();
            },
            onLoadEnd: function () {
                imgLoaded(instanceF);
                captionOn();
                activityIndicatorOff();
                $('.imagelightbox-arrow').css('display', 'block');
            }
        }
    );

};

FvLib.addHook('doc_ready', initimageLightbox, 10);
FvLib.addHook('fv/ajax_go_to_page/ready', initimageLightbox, 10);

FvLib.addHook('fv/ajax_go_to_page/resp_ok', function() {
    jQuery('.fv_lightbox').imageLightbox.destroy();
    jQuery( document ).off( 'click', '.fv_lightbox');
}, 10);
