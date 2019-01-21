$(document).ready(function() {

  new Dygraph(
      document.getElementById("roll14"),
      "data_17mhz.php",
      {
        rollPeriod: 14,
        showRoller: true,
//	errorBars: true,
//	valueRange:[-50,10],
        customBars: true,
        title: 'RF Noise recordings',
	titleHeight: 32,
        ylabel: 'Signal Level (dbm)',
	xlabel: 'Date series',
        legend: 'always',
        showRangeSelector: true,
        rangeSelectorHeight: 90,
	strokeWidth: 1.5,
        //rangeSelectorPlotStrokeColor: 'yellow',
        //rangeSelectorPlotFillColor: 'lightyellow'
        rangeSelectorPlotFillColor: 'MediumSlateBlue',
        // rangeSelectorPlotFillGradientColor: 'rgba(123, 104, 238, 0)',
        // colorValue: 0.9,
        // fillAlpha: 0.4
      }
    );

}
);
