$('.status-select').select2({
    theme: 'classic',
    minimumResultsForSearch: -1
});

$('.priority-select').select2({
    theme: 'classic',
    minimumResultsForSearch: -1
});

$('.partner-select').select2({
    theme: 'classic',
    dropdownAutoWidth : true
});

$('.filter-select').select2({
    theme: 'classic',
    minimumResultsForSearch: -1
});

$('.filter-select-search').select2({
    theme: 'classic',
    dropdownAutoWidth : true
});

const showAlert = (message) => {
    const el = $('.info-alert');
    el.fadeOut(() => {
        el.find('span').html(message);
        el.fadeIn(() => el.css('display', 'flex'));
        const timeOut = setTimeout(() => {
            el.fadeOut();
            clearTimeout(timeOut);
        }, 3000);
    
        el.find('.close').click(e => {
            el.fadeOut();
            clearTimeout(timeOut);
        });
    });
};

$('[data-action]').change(e => {
    const target = $(e.target);
    const api = target.attr('data-action');
    const key = target.attr('name');
    const request = { [key]: target.val() };

    axios.post(api, request)
        .then(res => {
            const message = res.data.message;
            showAlert(message);
        }).catch(({response}) => {
            const message = response.data.message;
            showAlert(message);
        });
});

(function() {
    const modal = $('[name="ticket-error"]').val();
    if (modal) {
        $('#ticket').modal('show');
    }
})();
