var date = new Date();
var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();
$('#calendar').fullCalendar({
    lang: 'es',
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    events



});
