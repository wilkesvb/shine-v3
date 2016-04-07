// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

/* fitVids */

;(function( $ ){

  'use strict';

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null,
      ignore: null
    };

    if(!document.getElementById('fit-vids-style')) {
      // appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
      var head = document.head || document.getElementsByTagName('head')[0];
      var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
      var div = document.createElement("div");
      div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
      head.appendChild(div.childNodes[1]);
    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        'iframe[src*="player.vimeo.com"]',
        'iframe[src*="youtube.com"]',
        'iframe[src*="youtube-nocookie.com"]',
        'iframe[src*="kickstarter.com"][src*="video.html"]',
        'object',
        'embed'
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var ignoreList = '.fitvidsignore';

      if(settings.ignore) {
        ignoreList = ignoreList + ', ' + settings.ignore;
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not('object object'); // SwfObj conflict patch
      $allVideos = $allVideos.not(ignoreList); // Disable FitVids on this video.

      $allVideos.each(function(){
        var $this = $(this);
        if($this.parents(ignoreList).length > 0) {
          return; // Disable FitVids on this video.
        }
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width'))))
        {
          $this.attr('height', 9);
          $this.attr('width', 16);
        }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+'%');
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );

//jquery scrollbox

 /*global jQuery */
/*!
 * jQuery Scrollbox
 * (c) 2009-2013 Hunter Wu <hunter.wu@gmail.com>
 * MIT Licensed.
 *
 * http://github.com/wmh/jquery-scrollbox
 */

(function($) {

$.fn.scrollbox = function(config) {
  //default config
  var defConfig = {
    linear: false,          // Scroll method
    startDelay: 2,          // Start delay (in seconds)
    delay: 3,               // Delay after each scroll event (in seconds)
    step: 5,                // Distance of each single step (in pixels)
    speed: 32,              // Delay after each single step (in milliseconds)
    switchItems: 1,         // Items to switch after each scroll event
    direction: 'vertical',
    distance: 'auto',
    autoPlay: true,
    onMouseOverPause: true,
    paused: false,
    queue: null,
    listElement: 'ul',
    listItemElement:'li',
    infiniteLoop: true,     // Infinite loop or not
    switchAmount: 0,        // Give a number if you don't want to have infinite loop
    afterForward: null,     // Callback function after each forward action
    afterBackward: null     // Callback function after each backward action
  };
  config = $.extend(defConfig, config);
  config.scrollOffset = config.direction === 'vertical' ? 'scrollTop' : 'scrollLeft';
  if (config.queue) {
    config.queue = $('#' + config.queue);
  }

  return this.each(function() {
    var container = $(this),
        containerUL,
        scrollingId = null,
        nextScrollId = null,
        paused = false,
        backward,
        forward,
        resetClock,
        scrollForward,
        scrollBackward,
        forwardHover,
        pauseHover,
        switchCount = 0;

    if (config.onMouseOverPause) {
      container.bind('mouseover', function() { paused = true; });
      container.bind('mouseout', function() { paused = false; });
    }
    containerUL = container.children(config.listElement + ':first-child');

    // init default switchAmount
    if (config.infiniteLoop === false && config.switchAmount === 0) {
      config.switchAmount = containerUL.children().length;
    }

    scrollForward = function() {
      if (paused) {
        return;
      }
      var curLi,
          i,
          newScrollOffset,
          scrollDistance,
          theStep;

      curLi = containerUL.children(config.listItemElement + ':first-child');

      scrollDistance = config.distance !== 'auto' ? config.distance :
        config.direction === 'vertical' ? curLi.outerHeight(true) : curLi.outerWidth(true);

      // offset
      if (!config.linear) {
        theStep = Math.max(3, parseInt((scrollDistance - container[0][config.scrollOffset]) * 0.3, 10));
        newScrollOffset = Math.min(container[0][config.scrollOffset] + theStep, scrollDistance);
      } else {
        newScrollOffset = Math.min(container[0][config.scrollOffset] + config.step, scrollDistance);
      }
      container[0][config.scrollOffset] = newScrollOffset;

      if (newScrollOffset >= scrollDistance) {
        for (i = 0; i < config.switchItems; i++) {
          if (config.queue && config.queue.find(config.listItemElement).length > 0) {
            containerUL.append(config.queue.find(config.listItemElement)[0]);
            containerUL.children(config.listItemElement + ':first-child').remove();
          } else {
            containerUL.append(containerUL.children(config.listItemElement + ':first-child'));
          }
          ++switchCount;
        }
        container[0][config.scrollOffset] = 0;
        clearInterval(scrollingId);

        if ($.isFunction(config.afterForward)) {
          config.afterForward.call(container, {
            switchCount: switchCount,
            currentFirstChild: containerUL.children(config.listItemElement + ':first-child')
          });
        }
        if (config.infiniteLoop === false && switchCount >= config.switchAmount) {
          return;
        }
        if (config.autoPlay) {
          nextScrollId = setTimeout(forward, config.delay * 1000);
        }
      }
    };

    // Backward
    // 1. If forwarding, then reverse
    // 2. If stoping, then backward once
    scrollBackward = function() {
      if (paused) {
        return;
      }
      var curLi,
          i,
          newScrollOffset,
          scrollDistance,
          theStep;

      // init
      if (container[0][config.scrollOffset] === 0) {
        for (i = 0; i < config.switchItems; i++) {
          containerUL.children(config.listItemElement + ':last-child').insertBefore(containerUL.children(config.listItemElement+':first-child'));
        }

        curLi = containerUL.children(config.listItemElement + ':first-child');
        scrollDistance = config.distance !== 'auto' ?
            config.distance :
            config.direction === 'vertical' ? curLi.height() : curLi.width();
        container[0][config.scrollOffset] = scrollDistance;
      }

      // new offset
      if (!config.linear) {
        theStep = Math.max(3, parseInt(container[0][config.scrollOffset] * 0.3, 10));
        newScrollOffset = Math.max(container[0][config.scrollOffset] - theStep, 0);
      } else {
        newScrollOffset = Math.max(container[0][config.scrollOffset] - config.step, 0);
      }
      container[0][config.scrollOffset] = newScrollOffset;

      if (newScrollOffset === 0) {
        --switchCount;
        clearInterval(scrollingId);

        if ($.isFunction(config.afterBackward)) {
          config.afterBackward.call(container, {
            switchCount: switchCount,
            currentFirstChild: containerUL.children(config.listItemElement + ':first-child')
          });
        }
        if (config.autoPlay) {
          nextScrollId = setTimeout(forward, config.delay * 1000);
        }
      }
    };

    forward = function() {
      clearInterval(scrollingId);
      scrollingId = setInterval(scrollForward, config.speed);
    };

    // Implements mouseover function.
    forwardHover = function() {
        config.autoPlay = true;
        paused = false;
        clearInterval(scrollingId);
        scrollingId = setInterval(scrollForward, config.speed);
    };
    pauseHover = function() {
        paused = true;
    };

    backward = function() {
      clearInterval(scrollingId);
      scrollingId = setInterval(scrollBackward, config.speed);
    };

    resetClock = function(delay) {
      config.delay = delay || config.delay;
      clearTimeout(nextScrollId);
      if (config.autoPlay) {
        nextScrollId = setTimeout(forward, config.delay * 1000);
      }
    };

    if (config.autoPlay) {
      nextScrollId = setTimeout(forward, config.startDelay * 1000);
    }

    // bind events for container
    container.bind('resetClock', function(delay) { resetClock(delay); });
    container.bind('forward', function() { clearTimeout(nextScrollId); forward(); });
    container.bind('pauseHover', function() { pauseHover(); });
    container.bind('forwardHover', function() { forwardHover(); });
    container.bind('backward', function() { clearTimeout(nextScrollId); backward(); });
    container.bind('speedUp', function(speed) {
      if (speed === 'undefined') {
        speed = Math.max(1, parseInt(config.speed / 2, 10));
      }
      config.speed = speed;
    });

    container.bind('speedDown', function(speed) {
      if (speed === 'undefined') {
        speed = config.speed * 2;
      }
      config.speed = speed;
    });

    container.bind('updateConfig', function (options) {
        config = $.extend(config, options);
    });

  });
};

}(jQuery));