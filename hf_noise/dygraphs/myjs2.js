$(document).ready(function() {

  new Dygraph(
      document.getElementById("roll14"),
      "evnormal2.php",
      {
        rollPeriod: 14,
        showRoller: true,
        customBars: true,
        title: 'Daily RF Noise recordings',
        ylabel: 'Signal Level (dbm)',
        legend: 'always',
        showRangeSelector: true,
        // rangeSelectorHeight: 30,
        // rangeSelectorPlotStrokeColor: 'yellow',
        // rangeSelectorPlotFillColor: 'lightyellow'
        // rangeSelectorPlotFillColor: 'MediumSlateBlue',
        // rangeSelectorPlotFillGradientColor: 'rgba(123, 104, 238, 0)',
        // colorValue: 0.9,
        // fillAlpha: 0.4
      }
    );

}
);
