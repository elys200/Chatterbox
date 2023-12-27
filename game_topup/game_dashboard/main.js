var swiper = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 25000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

});

const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach((item) => {
    const accordionHeader = item.querySelector('.accordion-header');

    accordionHeader.addEventListener('click', () => {
        const openItem = document.querySelector('.accordion-open');

        toggleItem(item);

        if (openItem && openItem !== item) {
            toggleItem(openItem);
        }
    })
})

const toggleItem = (item) => {
    const accordionContent = item.querySelector('.accordion-content');

    if (item.classList.contains('accordion-open')) {
        accordionContent.style.height = '0';
        item.classList.remove('accordion-open')
    } else {
        accordionContent.style.height = accordionContent.scrollHeight + 'px';
        item.classList.add('accordion-open');
    }
}

var swiper = new Swiper(".control-images", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
