document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        timeZone: 'Europe/Istanbul',
        locale: 'tr',
        themeSystem: 'bootstrap5',
        headerToolbar: {
            left: 'customPrev,customNext today',
            center: 'title',
            right: 'customMonth,customWeek,customDay'
        },
        customButtons: {
            customPrev: {
                text: 'Önceki',
                click: function () {
                    calendar.prev();
                }
            },
            customNext: {
                text: 'Sonraki',
                click: function () {
                    calendar.next();
                }
            },
            today: {
                text: 'Bugün',
                click: function () {
                    calendar.today();
                }
            },
            customMonth: {
                text: 'Ay',
                click: function () {
                    calendar.changeView('dayGridMonth');
                }
            },
            customWeek: {
                text: 'Hafta',
                click: function () {
                    calendar.changeView('timeGridWeek');
                }
            },
            customDay: {
                text: 'Gün',
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
                    '<h5 style="color: white;margin-bottom: -5px;">' + info.event.title + '</h5>' +
                    '<p style="color:white; font-weight: 600; font-size: 14px;margin-bottom: -4px;">' + clockRange + '</p>' +
                    '<span class="badge badge-' + statusCode + '">' + status + '</span>' +
                    '</div>'
            };
        },
        eventClick: function (info) {
            var modal = $('#eventDetailsModal');
            var customerName = info.event.extendedProps.customer;
            var servicesList = info.event.extendedProps.services;
            var clock = info.event.extendedProps.clockRange;

            modal.find('#customerName').text(customerName);
            modal.find('#appointmentClock').text(clock);
            modal.find('#servicesList').empty();

            for (var i = 0; i < servicesList.length; i++) {
                var service = servicesList[i];
                var listItem = '<li style="border: 1px solid black;border-radius: 15px;margin-bottom: 10px;padding: 5px;">' +
                    '<img src="' + service.image +
                    '" style="width: 33px;height: 33px;border-radius: 50%;">' +
                    '</strong> ' + service.personel +
                    ', <strong>Hizmet:</strong> ' + service.hizmet +
                    '</li>';
                modal.find('#servicesList').append(listItem);

            }

            modal.modal('show');
        }
    });
    calendar.render();
});
