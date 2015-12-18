
<html>
<head>

<link rel="stylesheet" href="style.css" />

	<link href="chart/content/jquery.mobile-1.1.0.min.css" rel="stylesheet" type="text/css" />
	<link href="chart/content/jquery.jqplot.css" rel="stylesheet" type="text/css" />
	<script src="chart/scripts/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="chart/scripts/jquery.mobile-1.1.0.min.js" type="text/javascript"></script>

<style type="text/css">
		.myChart {
			width: 300px;
			height: 200px;
		}
	</style>
</head>
<body>
<div id="page1" data-role="page">
		<header data-role="header" data-position="fixed">
			<h1>JQM Charts</h1>
		</header>
		<section data-role="content">
			<ul data-role="listview" data-inset="true" data-shadow="true">
				<li data-role="list-divider" style="text-align: center;">Choose Your Chart</li>
				<li><a href="#pageBarChart">Bar Chart</a></li>
				<li><a href="#pagePieChart">Pie Chart</a></li>
				<li><a href="#pagePlotChart">Plot Chart</a></li>
			</ul>
		</section>
	</div>
	<div id="pageBarChart" data-role="page" data-rockncoder-jspage="manageBarChart">
		<header data-role="header" data-position="fixed">
			<h1>Bar Chart</h1>
		</header>
		<section data-role="content">
			<div id="barChart" class="myChart"></div>
			<button id="refreshBarChart" value="Refresh Chart" data-mini="true"></button>
			<input type="range" id="pageBarSliderA" value="25" min="0" max="50" data-mini="true"/>
			<input type="range" id="pageBarSliderB" value="25" min="0" max="50" data-mini="true"/>
			<input type="range" id="pageBarSliderC" value="25" min="0" max="50" data-mini="true"/>
		</section>
	</div>
	<div id="pagePieChart" data-role="page" data-rockncoder-jspage="managePieChart">
		<header data-role="header" data-position="fixed">
			<h1>Pie Chart</h1>
		</header>
		<section data-role="content">
			<div id="pieChart" class="myChart"></div>
			<button id="refreshPieChart" value="Refresh Chart" data-mini="true"></button>
			<input type="range" id="pagePieSliderA" value="50" min="0" max="100" data-mini="true"/>
			<input type="range" id="pagePieSliderB" value="50" min="0" max="100" data-mini="true"/>
			<input type="range" id="pagePieSliderC" value="50" min="0" max="100" data-mini="true"/>
		</section>
	</div>
	<div id="pagePlotChart" data-role="page" data-rockncoder-jspage="managePlotChart">
		<header data-role="header" data-position="fixed">
			<h1>Plot Chart</h1>
		</header>
		<section data-role="content">
			<div id="plotChart" class="myChart"></div>
			<button id="refreshPlotChart" value="Refresh Chart" data-mini="true"></button>
			<input type="hidden" id="plot1" value="50" min="-250" max="250" data-mini="true"/>
			<input type="hidden" id="plot2" value="1" min="-250" max="250" data-mini="true"/>
			<input type="hidden" id="plot3" value="3" min="-250" max="250" data-mini="true"/>
			<input type="hidden" id="plot4" value="9" min="-250" max="250" data-mini="true"/>
			<input type="hidden" id="plot5" value="22" min="-250" max="250" data-mini="true"/>
			<input type="hidden" id="plot6" value="4" min="-250" max="250" data-mini="true"/>
		</section>
	</div>
		<script src="chart/scripts/jquery.jqplot.min.js" type="text/javascript"></script>
	<script src="chart/scripts/jqplot.pieRenderer.min.js" type="text/javascript"></script>
	<script src="chart/scripts/jqplot.barRenderer.min.js" type="text/javascript"></script>
	<script src="chart/scripts/jqplot.categoryAxisRenderer.min.js" type="text/javascript"></script>
	<script src="chart/scripts/underscore-min.js" type="text/javascript"></script>
	<script src="chart/scripts/hideAddressBar.js" type="text/javascript"></script>
	<script src="chart/scripts/app.js" type="text/javascript"></script>
</body>
</html>
