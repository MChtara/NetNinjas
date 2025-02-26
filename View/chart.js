
$(function() {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  console.log("ALLAH AKBAR");
  $.ajax({
      url: 'http://localhost/netninjaclass/View/get_statData.php',
      dataType: 'json',
      success: function(data_input) {
        // Mettre à jour les éléments HTML avec les statistiques
        console.log(data_input);
        convert_data(data_input);
      }
    });


    // Assume the JSON data received from the server is stored in a variable called `data_input`
    function convert_data(data)
    {
      // Initialize an empty object to store the data for the graph
      var data_graph = {
          labels: [],
          datasets: [{
              label: '# of Films',
              data: [],
              backgroundColor: [],
              borderColor: [],
              borderWidth: 1,
              fill: false
          }]
      };
  
      // Loop through the JSON data and populate the `labels` and `data` arrays of the `data_graph` object
      for (var i = 0; i < data.length; i++) {
          data_graph.labels.push(data[i].nom_cat);
          data_graph.datasets[0].data.push(data[i].nb_films);
      
          // Add a random background color for each data point
          var randomColor = 'rgba(' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ',0.2)';
          data_graph.datasets[0].backgroundColor.push(randomColor);
          data_graph.datasets[0].borderColor.push(randomColor.replace('0.2', '1'));
      }
  
      // Now `data_graph` should contain the data in the required format for your graph
      console.log(data_graph);

      var options = {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 1
              },
              gridLines: {
                color: "rgba(204, 204, 204,0.1)"
              }
            }],
            xAxes: [{
              gridLines: {
                color: "rgba(204, 204, 204,0.1)"
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        };

      if ($("#barChart").length) {
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          // This will get the first returned node in the jQuery collection.
          var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: data_graph,
            options: options
          });
        }

    }


      
      
      
  
});