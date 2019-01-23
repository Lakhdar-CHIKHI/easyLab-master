/**/
$(document).ready(function() {
    getMessage();
    getMessage2();
    getMessage3();

    function getMessage() {
        $.getJSON('charts', function(data) {
            console.log(data);
            var dataPoints2 = [];
            var datasets = [];
            var date = [];
            var color = ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"];
            var i = 0;
            /*$.each(data, function(key, value) {
                color.push(dataset);
            });*/
            $.each(data, function(key, value) {
                if (key != 'date') {
                    dataPoints2.push(key);
                    var tmp = key;
                    var dataPoints = [];
                    $.each(value, function(key, value2) {
                        dataPoints.push(value2);
                    });
                    var dataset = {
                        label: tmp,
                        backgroundColor: color[i++],

                        data: dataPoints
                    }
                    datasets.push(dataset);
                } else {
                    $.each(value, function(key, value3) {
                        date.push(value3['annee']);
                    });

                }

            });

            console.log(color);
            //console.log(dataPoints);
            new Chart(document.getElementById("bar-chart-grouped"), {


                type: 'bar',
                data: {
                    labels: date,
                    datasets: datasets
                },
                options: {
                    title: {
                        display: true,
                        text: 'Nombre des articles pour un équipe chaque année'
                    },
                    animationEnabled: true,
                    exportEnabled: true,
                }
            });


        });


    }

    function getMessage2() {
        $.getJSON('charts/graph2', function(data2) {


            var datasets = [];
            // console.log(data2);
            $.each(data2, function(key, value) {
                var tmp = key;
                var dataPoints2 = [];
                //var dataPoints = [];
                $.each(value, function(key, value2) {
                    dataPoints2.push({ y: value2, label: key });
                    // datasets.push(value2);
                });



                var dataset = {
                    type: "stackedColumn",
                    name: tmp,
                    showInLegend: true,
                    dataPoints: dataPoints2
                }
                datasets.push(dataset);


            });
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Nombre d'articles publies chaque année"
                },
                axisY: {
                    title: "Nombre d'articles publies",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisX: {
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                legend: {
                    fontSize: 14,
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    itemclick: function(e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible)
                            e.dataSeries.visible = false;
                        else
                            e.dataSeries.visible = true;
                        e.chart.render();
                    }
                },
                toolTip: {
                    shared: true
                },
                data: datasets
            });
            chart.render();
        });
    }

    function getMessage3() {
        $.getJSON('charts/graph3', function(data3) {
            //console.log(data3);
            var datasets = [];
            // console.log(data2);
            $.each(data3, function(key, value) {


                datasets.push({ y: value, label: key });


            });
            var chart3 = new CanvasJS.Chart("chartContainer3", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Nombre de théses soutenues chaque année"
                },
                axisY: {
                    title: "Nombre de théses soutenues"
                },
                legend: {
                    fontSize: 14,
                    cursor: "pointer",
                    verticalAlign: "bottom",
                    itemclick: function(e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible)
                            e.dataSeries.visible = false;
                        else
                            e.dataSeries.visible = true;
                        e.chart.render();
                    }
                },
                toolTip: {
                    shared: true
                },
                data: [{
                    type: "column",
                    showInLegend: false,
                    legendMarkerColor: "grey",
                    legendText: "",
                    dataPoints: datasets
                }]
            });
            chart3.render();

        });
    }
});