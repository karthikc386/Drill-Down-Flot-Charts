pie_chatData = [];

pie_color = ['#0073b7','#3c8dbc','#00c0ef'];

$.each(dataset2, function (key, val) {

    var chartPointArray =  new Array();

    chartPointArray['label'] = val[0];
    chartPointArray['data'] = val[1];
    chartPointArray['color'] = pie_color[key % 3];

    pie_chatData.push(chartPointArray);
});


function labelFormatter(label, series) {
    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" 
            + label + "[" + series.datapoints.points + "]</div>";
  }



var placeholder =  $("#pie-chart");

$.plot(placeholder, pie_chatData, {
  series: {
    pie: { 
      show: true,
      radius: 1,
      label: {
        show: true,
        radius: 2/3,
        formatter: labelFormatter,
        background: {
          opacity: 0.5,
           color: '#000'
        }
      }
    }
  },
  legend: {
      show: false
  },
  grid: {
    hoverable: true,
    clickable: true
  }
});

placeholder.bind("plothover", function(event, pos, item) {

if (!item) {
  return;
}

var percent = parseFloat(item.series.percent).toFixed(2);
$("#hover").html("<span style='font-weight:bold; color:" + item.series.color + "'>" + item.series.label + " (" + percent + "%)</span>");
});


placeholder.bind("plotclick", function (event, pos, item) {
    if (item) { 

      currentLabel = item.series.label;

      currentLabel = currentLabel.replace('-','_');
      currentLabel = currentLabel.replace(/\s/g, '');

      var new_pie_data = dataset4[currentLabel];

      pie_chatData1 = [];
      pie_color1 = ['#0073b7','#3c8dbc','#00c0ef'];
      var color_cnt = 0;

      $.each(new_pie_data, function (key, val) {

        var chartPointArray1 =  new Array();
        chartPointArray1['label'] = key;
        chartPointArray1['data'] = val;
        chartPointArray1['color'] = pie_color1[color_cnt % 3];

        pie_chatData1.push(chartPointArray1);
        color_cnt++;
      });

      var placeholder1 = $("#pie-chart");

      $('#pie_chart_bck_btn').show();

      $.plot(placeholder1, pie_chatData1, {
        series: {
          pie: { 
           show: true,
            radius: 2/3,
            formatter: labelFormatter,
            background: {
              opacity: 0.5,
               color: '#000'
              }
            }
          }
        },
        legend: {
            show: false
        },
        grid: {
          hoverable: true,
        }
      });
    }
    else
      return;
  });
