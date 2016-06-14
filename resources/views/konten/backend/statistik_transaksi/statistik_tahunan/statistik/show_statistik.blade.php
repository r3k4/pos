 <script src="/plugins/highcharts/highcharts.js"></script>
 <script src="/plugins/highcharts/modules/exporting.js"></script>




<div id="statistik-penjualan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">

       $(function () {
            Highcharts.setOptions({
                lang: {
                    decimalPoint: ',',
                    thousandsSep: '.'
                },
                colors: [ '#F97C00', '#5B79EA'],
        
            });

            $('#statistik-penjualan').highcharts({
                chart: {
                    zoomType: 'xy'
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: 'Statistik Penjualan Bulan Juni 2016'
                },
    //             subtitle: {
                   
    //                 text: 'Total Keuntungan ' + "Rp0" + ' (' + 0 + ' Item Terjual)'
                // },
                xAxis: [{
                    title: {
                        text: 'Tanggal',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    categories: [
                        @foreach($transaksi as $tgl => $jml)
                            "{!! $tgl !!}",
                        @endforeach
                    ],
                    crosshair: true
                }],
                yAxis: [
                 
                { // Primary yAxis
                    labels: {
                        format: '',

                        style: {
                            color: Highcharts.getOptions().colors[0]

                        },
                        formatter: function () {
                            return 'Rp ' + Highcharts.numberFormat(this.value,0);
                        }
                    },
                    title: {
                        text: 'Nominal Transaksi',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    opposite: true

                }, 
                                { // Secondary yAxis
                    gridLineWidth: 0,
                    title: {
                        text: 'Produk Terjual',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    labels: {
                        format: '{value} item',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }

                }],
                tooltip: {
                    shared: true,
                    borderColor: '#bbbbbb',
                    shadow: false,
                    useHTML: true,
                    headerFormat: 'Tanggal {point.key}<table>',
                    pointFormat: '<tr><td style="color: {series.color}"><b>{series.name}</b>: </td>' +
                        '<td style="text-align: right"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                },

                legend: {
                    layout: 'horizontal',
                    align: 'left',
                    lineHeight: 16,
                    x: 0,
                    verticalAlign: 'top',
                   lineHeight: 50,
                    y: 0,
                    // floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                series: [ 
                                
                {
                    name: 'Nominal Transaksi',
                    type: 'column',
                     yAxis: 0,
                    data: [
                        @foreach($transaksi_tunai as $tgl => $nominal)  
                            {!! $nominal !!},
                        @endforeach
                    ],
                    tooltip: {
                        valuePrefix: 'Rp '
                    }
                },
                {
                    name: 'Produk Terjual',
                    type: 'column',
                    yAxis: 1,
                    data: [
                        @foreach($transaksi as $tgl => $jml)
                            @if($jml == '')
                                0,
                            @else
                                {!! $jml !!},
                            @endif
                        @endforeach
                    ],
                    tooltip: {
                        valueSuffix: ' Item'
                    }

                }
                                
                ]
            });
            
            
        });

</script>