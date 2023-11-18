document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek', /*veya listWeek*/
        timeZone: 'Europe/Berlin',
        locale: 'de',
        themeSystem: 'bootstrap5',
        headerToolbar: {
            left: 'customPrev,customNext today',
            center: 'title',
            right: 'customMonth,customWeek,customDay'
        },
        customButtons: {
            customPrev: {
                text: '<i class="fa fa-arrow-alt-circle-left">',
                click: function () {
                    calendar.prev();
                }
            },
            customNext: {
                text: 'Nächste',
                click: function () {
                    calendar.next();
                }
            },
            today: {
                text: 'Heute',
                click: function () {
                    calendar.today();
                }
            },
            customMonth: {
                text: 'Monat',
                click: function () {
                    calendar.changeView('dayGridMonth');
                }
            },
            customWeek: {
                text: 'Woche',
                click: function () {
                    calendar.changeView('timeGridWeek');
                }
            },
            customDay: {
                text: 'Tag',
                click: function () {
                    calendar.changeView('timeGridDay');
                }
            }
        },
        views: {
            dayGridMonth: {
                titleFormat: {year: 'numeric', month: 'long'} // Ay görünümünün başlığını Türkçe yapmak için
            },
            timeGridWeek: {
                titleFormat: {year: 'numeric', month: 'long', day: 'numeric'} // Hafta görünümünün başlığını Türkçe yapmak için
            },
            timeGridDay: {
                titleFormat: {year: 'numeric', month: 'long', day: 'numeric'} // Gün görünümünün başlığını Türkçe yapmak için
            }
        },
        events: allAppointments,
        eventContent: function (info) {
            var status = info.event.extendedProps.statusText;
            var statusCode = info.event.extendedProps.statusCode;
            var clockRange = info.event.extendedProps.clockRange;

            return {
                html: '<div class="event-content">' +
                    '<h5 style="color: white;margin-bottom: -5px;font-size: 11px;">' + info.event.title + '</h5>' +
                    '<p style="color:white; font-weight: 600; font-size: 11px;margin-bottom: -4px;">' + clockRange + '</p>' +
                    '</div>'
            };
        },
        eventClick: function (info) {
            var modal = $('#eventDetailsModal');
            var route_link = info.event.extendedProps.links;
            window.location.href = route_link;
        },

        windowResize: function (view) {
            if (window.innerWidth < 768) {
                calendar.changeView('timeGridDay');
            } else {
                // Ekran genişliği 768 piksel veya daha fazlaysa, varsayılan görünümü kullan
                calendar.changeView('timeGridWeek');
            }
        },
    });
    checkScreenWidth(calendar);
    window.onresize = function () {
        checkScreenWidth(calendar);
    };
    calendar.render();

});


function checkScreenWidth(calendar) {
    if (window.innerWidth < 768) {
        calendar.changeView('timeGridDay');
    } else {
        // Ekran genişliği 768 piksel veya daha fazlaysa, varsayılan görünümü kullan
        calendar.changeView('timeGridWeek');
    }
}