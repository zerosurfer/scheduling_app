
    function updateCalendar(date, event_key) {
      
      date = $.fullCalendar.formatDate(date, "MM/dd/yyyy hh:mm TT");
    
      $.get("../backend/addevent.php", { "name" : name, "date" : date, "event_key" : event_key, "email" : email, "phone" : phone }, 
      function(data) {
        if(data.status == "Success") {
            $("#successModal").modal("show");
        } else if(data.status == "DateError") {
            $("#errorModal").modal("show");
        }
      }, "json");
    
    }
    
    
    $(document).ready(function() {

      $("#calendar").fullCalendar({
        droppable: true,
        defaultView: 'agendaWeek',
        allDaySlot: false,
        minTime: 9,
        maxTime: 18,
        weekends: false,
        theme: true,
        defaultEventMinutes: 60,
        drop: function(date, allDay) {
            
          var event_key = $(this).attr("data-type");
          
          event.title = name;
          event.date = date;
          event.allDay = allDay;
          updateCalendar(date, event_key); 
          $("#calendar").fullCalendar("renderEvent", event, true);            
        },
        eventSources: [ 
            {
                url: "../backend/feed.php"
            } ]
      });
      $(".event").draggable({ 
                revert: true,      // will cause the event to go back to its
            	revertDuration: 0 
        });    //Happy little spot
	});