    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>

<div id="container">
        <canvas id="canvas"></canvas>
    </div>
    <script>
        // var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        var randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function() {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',.7)';
        };

        var barChartData = {
            // labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            labels: [],
            datasets: [ {
                // hidden: true,
                label: 'transaksi bulan {!! fungsi()->bulan2(Request::get("bln")) !!} tahun {!! Request::get("thn") !!}',
                backgroundColor: "#7DCCBE",
                data: []
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    // Elements options apply to all of the options unless overridden in a dataset
                    // In this case, we are setting the border of each bar to be 2px wide and green
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#C3C3C3',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Statistik Jumlah Transaksi'
                    }
                }
            });

        };

$(document).ready(function(){
        @foreach($transaksi as $tgl => $jml)
            barChartData.labels.push("tanggal {!! $tgl !!}");
            barChartData.datasets[0].data.push("{!! $jml !!}");
           // barChartData.datasets.data[].push("{!! $jml !!}")

        @endforeach
});
 
 
    </script> 
