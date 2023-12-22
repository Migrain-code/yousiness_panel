(function($) {
    "use strict";

    // Almanca dil ayarları ile date picker
    $('.datepicker-default').pickadate({
        formatSubmit: 'yyyy-mm-dd', // İstenirse, veritabanına gönderilecek tarih formatı
        format: 'dd mmmm, yyyy',
        translations: {
            months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
            weekdaysShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            today: 'Heute',
            clear: 'Löschen',
            close: 'Schließen'
        }
    });

})(jQuery);
