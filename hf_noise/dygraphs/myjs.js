$(document).ready(function() {

  new Dygraph(
      document.getElementById("roll14"),
      data_temp,
      {
        rollPeriod: 14,
        showRoller: true,
        customBars: true,
        title: 'Daily Temperatures in New York vs. San Francisco',
        ylabel: 'Temperature (F)',
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