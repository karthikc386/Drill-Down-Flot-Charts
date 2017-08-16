var bar_data = {
    data : dataset2,
    color: '#3c8dbc'
  };

  $.plot('#bar-chart', [bar_data], {
    grid  : {
      borderWidth: 1,
      borderColor: '#f3f3f3',
      tickColor  : '#f3f3f3',
      hoverable: true,
      clickable: true
    },
    series: {
      bars: {
        show    : true,
        barWidth: 0.5,
        align   : 'center'
      }
    },
    xaxis : {
      mode      : 'categories',
      tickLength: 0
    }
  });


  $("#bar-chart").bind("plotclick", function (event, pos, item) {
    if (item) { 

      var x = item.datapoint[0];
      currentLabel = item.series.xaxis.ticks[x].label;

      currentLabel = currentLabel.replace('-','_');
      currentLabel = currentLabel.replace(/\s/g, '');

      var new_bar_data = dataset4[currentLabel];

      var in_chatData = []; // array to pass to flot

      $.each(new_bar_data, function (key, val) {
         // create 2 element array 
         var chartPointArray = [key,val];
         // push 2 element array to main array 
         in_chatData.push( chartPointArray  );
      });

       $('#bar_chart_bck_btn').show();

      $.plot('#bar-chart', [in_chatData], {
        grid  : {
          borderWidth: 1,
          borderColor: '#dadada',
          tickColor  : '#dadada',
          hoverable: true,
        },
        series: {
          bars: {
            show    : true,
            barWidth: 0.5,
            align   : 'center'
          }
        },
        xaxis : {
          mode      : 'categories',
          tickLength: 0
        }
      });
    }
  });




  var previousPoint = null,
    previousLabel = null;

  function showTooltip(x, y, color, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 40,
        left: x - 60,
        border: '2px solid ' + color,
        padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
        opacity: 0.9
    }).appendTo("body").fadeIn(200);
  }


  $("#bar-chart").on("plothover", function (event, pos, item) {
    if (item) {
        if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
            previousPoint = item.dataIndex;
            previousLabel = item.series.label;
            $("#tooltip").remove();

            var x = item.datapoint[0];
            var y = item.datapoint[1];

            var color = item.series.color;

            showTooltip(item.pageX,item.pageY,color,
                "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong>");
        }
    } else {
        $("#tooltip").remove();
        previousPoint = null;
    }
  });