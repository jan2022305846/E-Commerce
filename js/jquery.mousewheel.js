(function($) {

    var types = ['DOMMouseScroll', 'mousewheel'];
    
    $.event.special.mousewheel = {
        setup: function() {
            if (this.addEventListener) {
                for (var i = types.length; i;) {
                    this.addEventListener(types[--i], handler, false);
                }
            } else {
                this.onmousewheel = handler;
            }
        },
        
        teardown: function() {
            if (this.removeEventListener) {
                for (var i = types.length; i;) {
                    this.removeEventListener(types[--i], handler, false);
                }
            } else {
                this.onmousewheel = null;
            }
        }
    };
    
    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.on("mousewheel", fn) : this.trigger("mousewheel");
        },
        
        unmousewheel: function(fn) {
            return this.off("mousewheel", fn);
        }
    });
    
    function handler(event) {
        var orgEvent = event || window.event,
            args = [].slice.call(arguments, 1),
            delta = 0,
            returnValue = true,
            deltaX = 0,
            deltaY = 0;
        event = $.event.fix(orgEvent);
        event.type = "mousewheel";
        
        // Old school scrollwheel delta
        if (orgEvent.wheelDelta) {
            delta = orgEvent.wheelDelta / 120;
        }
        if (orgEvent.detail) {
            delta = -orgEvent.detail / 3;
        }
        
        // New school multidimensional scroll (touchpads) deltas
        deltaY = delta;
        
        // Gecko
        if (orgEvent.axis !== undefined && orgEvent.axis === orgEvent.HORIZONTAL_AXIS) {
            deltaY = 0;
            deltaX = -1 * delta;
        }
        
        // Webkit
        if (orgEvent.wheelDeltaY !== undefined) {
            deltaY = orgEvent.wheelDeltaY / 120;
        }
        if (orgEvent.wheelDeltaX !== undefined) {
            deltaX = -1 * orgEvent.wheelDeltaX / 120;
        }
        
        // Add event and delta to the front of the arguments
        args.unshift(event, delta, deltaX, deltaY);
        
        return $.event.dispatch.apply(this, args);
    }
    
    })(jQuery);
    