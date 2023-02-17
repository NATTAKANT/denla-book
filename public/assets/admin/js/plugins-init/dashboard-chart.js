(function ($) {
    "use strict";

    var dlabMorris = (function () {
        var screenWidth = $(window).width();

        var setChartWidth = function () {
            if (screenWidth <= 768) {
                var chartBlockWidth = 0;
                chartBlockWidth = screenWidth < 300 ? screenWidth : 300;
                jQuery(".morris_chart_height").css(
                    "min-width",
                    chartBlockWidth - 31
                );
            }
        };

        var lineChart = function () {
            //Area chart
            Morris.Area({
                element: "morris_line",
                data: [
                    {
                        period: "2012-02",
                        check_in: 0,
                        check_out: 0,
                    },
                    {
                        period: "2012-03",
                        check_in: 90,
                        check_out: 25,
                    },
                    {
                        period: "2012-04",
                        check_in: 40,
                        check_out: 35,
                    },
                    {
                        period: "2012-05",
                        check_in: 30,
                        check_out: 17,
                    },
                    {
                        period: "2012-06",
                        check_in: 150,
                        check_out: 120,
                    },
                    {
                        period: "2012-07",
                        check_in: 25,
                        check_out: 40,
                    },
                    {
                        period: "2012-08",
                        check_in: 10,
                        check_out: 10,
                    },
                ],
                xkey: "period",
                ykeys: ["check_in", "check_out"],
                labels: ["check_in", "check_out"],
                pointSize: 3,
                fillOpacity: 0,
                pointStrokeColors: ["#EE3C3C", "#5bcfc5"],
                behaveLikeLine: true,
                gridLineColor: "transparent",
                lineWidth: 3,
                hideHover: "auto",
                lineColors: ["rgb(238, 60, 60)", "#5bcfc5"],
                resize: true,
            });
        };

        /* Function ============ */
        return {
            init: function () {
                setChartWidth();

                lineChart();
            },

            resize: function () {
                screenWidth = $(window).width();
                setChartWidth();

                lineChart();
            },
        };
    })();

    jQuery(document).ready(function () {
        dlabMorris.init();
        //dlabMorris.resize();
    });

    jQuery(window).on("load", function () {
        //dlabMorris.init();
    });

    jQuery(window).resize(function () {
        //dlabMorris.resize();
        //dlabMorris.init();
    });
})(jQuery);
