<?php

require_once 'phplot.php';

//Define the object
$plot = new PHPlot(800,600);

//Set titles
$plot->SetTitle("A 3-Line Plot\nMade with PHPlot");
$plot->SetXTitle('month');
$plot->SetYTitle('K(in thousand)');

$plot->SetPlotType('bars');
//Define some data
$example_data = array(
		array('Jan',3,4),
		array('Feb',5,1),  // here we have a missing data point, that's ok
		array('Mar',7,2),
		array('Apr',8,1),
		array('May',2,2),
		array('June',6,3),
		array('July',7,2)
);
$plot->SetDataValues($example_data);

# Make a legend for the 3 data sets plotted:
$plot->SetLegend(array('Income', 'Expenditure'));

//Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');

//Draw it
$plot->DrawGraph();