window.onload = function()
{
	GenerateGraph();
}

function GenerateGraph()
{
	var data = JSON.parse(document.getElementById("hiddenWeight").innerHTML);
	document.getElementById("graphContainer").style.width = "100%";
	document.getElementById("graphContainer").style.height = "500px";
	var divWidth = document.getElementById("graphContainer").offsetWidth - 150;
	var divHeight = document.getElementById("graphContainer").offsetHeight - 150;
	var border = 1;
	var borderColor = 'black';

	var margin=50;

	var lineOpacity = "0.25";
	var lineStroke = "1.5px";

	var x = d3.scaleTime()
  	.rangeRound([0, divWidth-margin]);

  var y = d3.scaleLinear()
  	.rangeRound([divHeight-margin, 0]);
  var xFormat = "%m/%d/%Y";;
  var parseTime = d3.timeParse("%Y-%m-%d");

  x.domain(d3.extent(data, function(d) { return parseTime(d.Date); }));
	y.domain([d3.min(data, function(d)
		{
			return d.Weight - 10;
		}),
		d3.max(data, function(d) {
      return d.Weight;
    })]);

	var svg = d3.select("#graphContainer")
		.append("svg")
			.attr("width", divWidth + margin + margin)
			.attr("height", divHeight + margin + margin)
			.attr("border", border)
			.append("g")
			.attr("transform", `translate(${margin}, ${margin})`);


	var line = d3.line()
		.x(function(d) {return x(parseTime(d.Date)); })
		.y(function(d) {return y(d.Weight); });

	svg.append("g")
		.append("path")
		.attr("class", "line")
		.data([data])
		.attr("class", "line")
		.attr("d", line)
		.style("stroke", "black")
		.style("stroke-width", lineStroke)
		.style("opacity", lineOpacity)
		.style("fill", "none");

	svg.append("g")
    .attr("transform", `translate(0, ${divHeight-margin})`)
    .call(d3.axisBottom(x).tickFormat(d3.timeFormat(xFormat)).ticks(10));

	svg.append("g")
		.attr("class", "y axis")
    .call(d3.axisLeft(y).ticks(5))
		.append('text')
		.attr("y", 15)
		.attr('transform', 'rotate(-90)')
		.attr("fill", "#000")
		.text("Weight (lbs)");

}
