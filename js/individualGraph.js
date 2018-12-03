window.onload = function()
{
	generateGraph();
}

function generateGraph()
{
	var data = JSON.parse(document.getElementById("hiddenWeight").innerHTML);
	document.getElementById("graphContainer").style.width = "100%";
	document.getElementById("graphContainer").style.height = "500px";
	var divWidth = document.getElementById("graphContainer").offsetWidth;
	var divHeight = document.getElementById("graphContainer").offsetHeight;
	console.log(data);
	var border = 1;
	var borderColor = 'black';

	var margin={top:20, right:30, bottom:20, left:100},
		width = divWidth - margin.left - margin.right,
		height = divHeight - margin.top - margin.bottom;

	var lineOpacity = "0.25";
	var lineOpacityHover = "0.85";
	var otherLinesOpacityHover = "0.1";
	var lineStroke = "1.5px";
	var lineStrokeHover = "2.5px";

	var circleOpacity = '0.85';
	var circleOpacityOnLineHover = "0.25"
	var circleRadius = 3;
	var circleRadiusHover = 6;

	var x = d3.scaleTime()
    	.rangeRound([0, width]);
    //var xAxis = d3.axisBottom(x);

    var y = d3.scaleLinear()
    	.rangeRound([height, 0]);
    //var yAxis = d3.axisBottom(y);
    var xFormat = "%d-%b-%Y";;
    var parseTime = d3.timeParse("%Y-%m-%d");

    x.domain(d3.extent(data, function(d) { return parseTime(d.Date); }));
  	y.domain([0,
			d3.max(data, function(d) {
                return d.Weight;
              })]);

	var svg = d3.select("#graphContainer")
		.append("svg")
			.attr("width", divWidth)
			.attr("height", divHeight)
			.attr("border", border);

	var borderPath = svg.append("rect")
		.attr("x", 0)
		.attr("y", 0)
		.attr("height", divHeight)
		.attr("width", divWidth)
		.style("fill", "none")
		.style("stroke", borderColor);

	var g = svg.append("g")
   .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

	var line = d3.line()
		.x(function(d) {return x(parseTime(d.Date)); })
		.y(function(d) {return y(d.Weight); });

	g.append("path")
		.data([data])
		.attr("class", "line")
		.attr("d", line)
		.style("stroke", "black")
		.style("fill", "none");

	g.append("g")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x).tickFormat(d3.timeFormat(xFormat)));

	g.append("g")
    .call(d3.axisLeft(y));
}
