$('.front-faq').on('click', '.item', e => {
    const animateSpeed = 200;
    const current = $(e.target).parents('.item').first();
    const p = current.children('p');

    if (current.hasClass('active')) {
        current.removeClass('active');
        p.animate({height: 0}, animateSpeed);
    } else {
        $('.front-faq .item.active p').animate({height: 0}, animateSpeed);
        $('.front-faq .item.active').removeClass('active');

        p.animate({height: p.get(0).scrollHeight + 30}, animateSpeed);
        current.addClass('active');
    }
});