/*
Theme by: WebThemez.com
Note: Please use our back link in your site
*/
$( function() {
        var endDate = "April  14, 2023 15:30:00";

        $('.countdown.simple').countdown({ date: endDate });

        $('.countdown.styled').countdown({
          date: endDate,
          render: function(data) {
            $(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>dni</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>godzin</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>minut</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>sekund</span></div>");
          }
        });

        $('.countdown.callback').countdown({
          date: +(new Date) + 10000,
          render: function(data) {
            $(this.el).text(this.leadingZeros(data.sec, 2) + " sekund");
          },
          onEnd: function() {
            $(this.el).addClass('ended');
          }
        }).on("click", function() {
          $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });
		
		
		
      });
   