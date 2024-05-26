$(document).ready(function() {
    let isContentVisible = false;

    function toggleNavButtons(disable) {
        $('.ca-nav-prev, .ca-nav-next').prop('disabled', disable);
    }

    $('.ca-item-main .link').on('click', function(e) {
        e.preventDefault();
        let $contentWrapper = $(this).closest('.ca-item').find('.ca-content-wrapper');
        $('.ca-content-wrapper').not($contentWrapper).hide();
        $contentWrapper.toggle();
        isContentVisible = $contentWrapper.is(':visible');
        toggleNavButtons(isContentVisible);
    });

    $('.ca-close').on('click', function(e) {
        e.preventDefault();
        $('.ca-content-wrapper').hide();
        isContentVisible = false;
        toggleNavButtons(false); // Enable navigation buttons
    });

    $('#ca-container').contentcarousel({
        nextButton: '.ca-nav-next',
        prevButton: '.ca-nav-prev',
        scroll: 1,
        onBefore: function(item) {
            if (isContentVisible) {
                if (!$(item).find('.ca-content-wrapper').is(':visible')) {
                    return false; // Prevent transition if content is not visible
                }
            }
        }
    });

    // Bind mousewheel control
    $('#ca-container').on('mousewheel', function(event) {
        if (isContentVisible) {
            event.preventDefault();
        }
    });

    // Initially, disable the navigation buttons
    toggleNavButtons(false);
});