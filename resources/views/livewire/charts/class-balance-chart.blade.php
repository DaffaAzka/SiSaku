<div>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-medium">Statistik Tabungan</h2>
    </div>

    <div id="class-balance-chart" class="h-64 w-full" wire:ignore></div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {


                document.addEventListener('livewire:initialized', function() {
                    console.log('Livewire initialized');


                    if (@this.chartData) {
                        initAreaChart(@this.chartData);
                    }

                    Livewire.on('tabunganDataUpdated', (data) => {
                        initAreaChart(data);
                    });
                });
            });

            function initAreaChart(chartData) {
                const chartElement = document.querySelector("#class-balance-chart");

                var options = {
                    chart: {
                        height: 300,
                        type: 'area',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        },
                        background: 'transparent',
                        foreColor: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280'
                    },
                    series: chartData.series,
                    xaxis: {
                        categories: chartData.categories,
                        labels: {
                            style: {
                                colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280',
                                fontSize: '13px',
                                fontFamily: 'Inter',
                                fontWeight: 400
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: (value) => value >= 1000 ? `${value / 1000}k` : value,
                            style: {
                                colors: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280',
                                fontSize: '13px',
                                fontFamily: 'Inter',
                                fontWeight: 400
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.1,
                            opacityTo: 0.6,
                            stops: [0, 90, 100]
                        }
                    },
                    grid: {
                        strokeDashArray: 2,
                        borderColor: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                    },
                    tooltip: {
                        x: {
                            format: 'dd MMM'
                        },
                        y: {
                            formatter: function(val) {
                                return 'Rp ' + val.toLocaleString('id-ID');
                            }
                        }
                    },
                    responsive: [{
                        breakpoint: 768,
                        options: {
                            chart: {
                                height: 250
                            },
                            xaxis: {
                                labels: {
                                    style: {
                                        fontSize: '11px'
                                    }
                                }
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        fontSize: '11px'
                                    }
                                }
                            }
                        }
                    }]
                };

                if (window.studentBalanceChart) {
                    window.studentBalanceChart.updateOptions(options);
                } else {
                    window.studentBalanceChart = new ApexCharts(document.querySelector("#class-balance-chart"), options);
                    window.studentBalanceChart.render();
                }

                const observer = new MutationObserver(() => {
                    window.studentBalanceChart.updateOptions({
                        chart: {
                            foreColor: document.documentElement.classList.contains('dark') ? '#9ca3af' :
                                '#6b7280'
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    colors: document.documentElement.classList.contains('dark') ? '#9ca3af' :
                                        '#6b7280'
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: document.documentElement.classList.contains('dark') ? '#9ca3af' :
                                        '#6b7280'
                                }
                            }
                        },
                        grid: {
                            borderColor: document.documentElement.classList.contains('dark') ? '#374151' :
                                '#e5e7eb'
                        }
                    });
                });

                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            }
        </script>
    @endpush

    <x-utilities.loading />
</div>
