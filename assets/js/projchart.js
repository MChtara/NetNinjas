
src = "https://code.jquery.com/jquery-1.10.2.js"
src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
src="http://localhost/netninjaclass/view/data.php"
$(document).ready(function () {
    'use strict';
    $('#submit_data').click(function () {
        var id_salle = $("#id_salle").val();
        var h_proj = $("#h_proj").val();
        var id_film = $("#id_film").val();
        var date_proj= $("#date_proj").val();
        $.ajax({
            url: "http://localhost/netninjaclass/view/data.php",
            method: "POST",
            data: {
                action: 'insert',
                id_salle: id_salle,
                h_proj: h_proj,
                id_film: id_film,
                date_proj: date_proj
            },
            beforeSend: function () {
                $('#submit_data').attr('disabled', 'disabled');
            },
            success: function (data) {
                $('#submit_data').attr('disabled', false);

                  //  alert("New projection is registered successfully...");
                    makechart();            
            }
        });

    });

    makechart();

    function makechart() {
        $.ajax({
            url: "http://localhost/netninjaclass/view/data.php",
            method: "POST",
            data: { action: 'fetch' },
            dataType: "JSON",
            success: function (data) {
                var id_salle = [];
                var total = [];
                var color = [];

                for (var count = 0; count < data.length; count++) {
                    id_salle.push(data[count].id_salle);
                    total.push(data[count].total);
                    color.push(data[count].color);

                }
                var doughnutPieData = {
                    datasets: [{
                        data: total,
                        backgroundColor: color,
                        borderColor: '#fff'
                    }],
                    labels: id_salle,
                };
                var doughnutPieOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0
                            }
                        }]
                    }
                };
                if ($("#pieChart").length) {
                    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
                    //var pieChartCanvas = $("#pieChart");
                    var pieChart = new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: doughnutPieData,
                        options: doughnutPieOptions
                    });
                }
            }
        })
    }
}
);
