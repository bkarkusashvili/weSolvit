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

const toggleInput = (element) => {
    const isActive = element.value.trim();
    if (isActive) { $(element).addClass('active'); }
    else { $(element).removeClass('active'); }
};

$('.we-input input').change(e => toggleInput(e.target));

$('#info.show').modal('show');

document.querySelectorAll('.we-select').forEach(el => new SimpleBar(el));

$(document).click(e => {
    if (!$(e.target).parents('[data-select]').length) {
        $('[data-select] .we-wrap').hide();
        $('[data-select] input').each((i, el) => toggleInput(el));
    }
});


$('[data-select]').each((i, el) => {
    const select = $(el).find('.simplebar-content');
    const optionElements = select.find('span');
    const input = $(el).find('input');
    const wrap = $(el).find('.we-wrap');
    const options = optionElements.map((i, el) => ({
        value: $(el).attr('data-value'),
        text: $(el).html(),
    }));
    
    const resetSelect = () => {
        select.html('');
        options.each((i, el) => select.append(`<span data-value="${el.value}">${el.text}</span>`));
    };

    input.keyup((el) => {
        select.html('');
        const value = el.target.value;
        options.filter((i, el) => {
            if (el.value.match(value)) {
                select.append(`<span data-value="${el.value}">${el.text}</span>`);
            }
        });
    });

    $(el).on('click', 'input, span.hint', e => {
        const siblings = $(el).siblings('[data-select]');
        input.addClass('active');
        siblings.find('.we-wrap').hide();
        siblings.find('input').each((i, el) => toggleInput(el));
        wrap.show();
    });

    select.on('click', 'span', el => {
        input.val($(el.target).attr('data-value'));
        wrap.hide();
        resetSelect();
    });
});


$('#working .submit-working').click(e => {
    const workingInput = $('[name="working_hours"]');
    const inputValue = [];

    $('#working .working-wrap input').each((i, el) => inputValue.push($(el).val()));

    workingInput.val(inputValue.join(' - '));
    workingInput.each((i, el) => toggleInput(el));
    
    $('#working').modal('hide');
});


$('[href="#partners"]').click(e => {
    
    const el = $('#partners');
    const addHeight = $('#front-header').height();

    if (el.length) {
        e.preventDefault();
    } else {
        return;
    }
    
    $('html, body').animate({
        scrollTop: el.offset().top - addHeight
     }, 500);
     $('.mobile-nav').fadeOut();
});

$('[href="#faqs"]').click(e => {

    const el = $('#faqs');
    const addHeight = $('#front-header').height();

    if (el.length) {
        e.preventDefault();
    } else {
        return;
    }

    $('html, body').animate({
        scrollTop: el.offset().top - addHeight
     }, 500);
     $('.mobile-nav').fadeOut();
});

$('.front-ticket textarea').keyup(e => {
    const isActive = Boolean(e.target.value.trim());

    $('.front-ticket button').attr('disabled', !isActive);
});

$('#ticket').on('show.bs.modal', e => {
    const value = $('.front-ticket textarea').val();
    $('#ticket .ticket-message p').html(value);
    $('#ticket [name="message"]').val(value);
});

$('.menu').click(e => {
    $('.mobile-nav').fadeIn();
});

$('.mobile-nav .close').click(e => {
    $('.mobile-nav').fadeOut();
});

let solvedNum = 0;
$('.front-solved-header nav a').click(e => {
    const itemSize = 316;
    const position = $(e.target).attr('class');
    const container = $('.solved-list');
    const itemCount = container.find('.item').length;
    
    if (position === 'next') {
        if (solvedNum < itemCount - 1) {
            solvedNum++;
        }
    } else {
        if (solvedNum > 0) {
            solvedNum--;
        }
    }

    container.stop().animate({scrollLeft: solvedNum * itemSize});
});

let partnerNum = 0;
$('.front-partner-header nav a').click(e => {
    const itemSize = 160;
    const position = $(e.target).attr('class');
    const container = $('.front-partner .list');
    const itemCount = container.find('.item-wrap').length;
    
    if (position === 'next') {
        if (partnerNum < itemCount - 1) {
            partnerNum++;
        }
    } else {
        if (partnerNum > 0) {
            partnerNum--;
        }
    }

    container.stop().animate({scrollLeft: partnerNum * itemSize});
});
