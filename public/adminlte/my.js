$('.delete').click(function () {
    var res = confirm('Подтвердите действие');
    if (!res) return false;
});

$('.main-sidebar  a').each(function () {
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if (link == location) {
        $(this).addClass('active');
        $(this).closest('.has-treeview').addClass('menu-open');
        $('.menu-open a').first().addClass('active');

    }
});
