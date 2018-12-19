window.onload = () => {
    var slickContainer = $('.slick-container'),
        headerMenu = $('.header__top'),
        topOfHeaderMenu = headerMenu.position().top,
        wrapper = $('.wrapper'),
        wrapperTopIndent = 20,
        openOrderFormButton = $('[data-open-order-form]'),
        closeOrderFormButton = $('[data-close-order-form]'),
        orderOverlay = $('[data-order-form]'),
        orderModal = $('[data-order-form-modal]');
    
    function checkEvent(e) {
        var currentTarget = $(e.currentTarget),
            target = $(e.target);
        
        if (openOrderFormButton.is(target)) {
            openOrderModal();
            return null;
        }

        if (closeOrderFormButton.is(target)) {
            closeOrderModal();
            return null;
        }

        if (target.is(currentTarget)) {
            closeOrderModal();
            return null;
        }

        while (!target.is(currentTarget)) {
            if (target.is(orderModal)) {
                e.stopPropagation();
                return null;
            }

            target = target.parent();
        }
    }

    function openOrderModal() {
        orderOverlay.addClass('active');
    }

    function closeOrderModal() {
        orderOverlay.removeClass('active');
    }

    openOrderFormButton.on('click', checkEvent);
    closeOrderFormButton.on('click', checkEvent);
    orderOverlay.on('click', checkEvent);
    
    window.onscroll = function(e) {
        var scrollTop = window.scrollY,
            heightOfHeaderMenu = headerMenu.height();
        
        if (scrollTop >= topOfHeaderMenu) {
            headerMenu.addClass('fixed-scroll');
            // wrapper.css('padding-top', heightOfHeaderMenu+'px');
            
            return null;
        }
        
        headerMenu.removeClass('fixed-scroll');
        // wrapper.css('padding-top', '20px');
    }
    
    slickContainer.slick({
        slidesToShow: 4,
        arrows: true,
        prevArrow: '<button class="popular__prev-arrow" aria-label="Previous" type="button" style=""></button>',
        nextArrow: '<button class="popular__next-arrow" aria-label="Previous" type="button" style=""></button>',
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
}