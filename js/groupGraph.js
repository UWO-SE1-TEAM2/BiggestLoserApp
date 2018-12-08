window.onload = function()
{
	GenerateGraph();
}

function GenerateGraph()
{
	var data = JSON.parse(document.getElementById("hiddenWeight").innerHTML);
	document.getElementById("graphContainer").style.width = "100%";
	document.getElementById("graphContainer").style.height = "500px";

	data = JSON.parse(CreateGraphableData(data));

	GenerateGroupGraph(data);
}

function CreateGraphableData(data)
{
	var jsonData = [];
	var values = [];
	var currUser = data[0].Username;
	for(var i = 0; i < data.length ; i++)
	{
		if(data[i].Username == currUser)
		{
			var date = data[i].Date;
			var weight = data[i].Weight;
			var value = {
				"Date": date,
				"Weight": weight
			}

			values.push(value);
		}
		else
		{
				var jsonObj = {
					"Username": currUser,
					"Values": values
				}

				jsonData.push(jsonObj);
				values = [];
				currUser = data[i].Username;

				var date = data[i].Date;
				var weight = data[i].Weight;
				var value = {
					"Date": date,
					"Weight": weight
				}

				values.push(value);
		}
	}
	var jsonObj = {
		"Username": currUser,
		"Values": values
	}

	jsonData.push(jsonObj);
	return JSON.stringify(jsonData);
}

function GenerateGroupGraph(data)
{
	var width = document.getElementById("graphContainer").offsetWidth - 150;
	var height = document.getElementById("graphContainer").offsetHeight - 150;
	var margin = 50;

	var lineOpacity = "0.25";
	var lineOpacityHover = "0.85";
	var otherLinesOpacityHover = "0.1";
	var lineStroke = "1.5px";
	var lineStrokeHover = "2.5px";

	var circleOpacity = '0.85';
	var circleOpacityOnLineHover = "0.25"
	var circleRadius = 3;
	var circleRadiusHover = 6;


	/* Format Data */
	var xFormat = "%m/%md/%Y"
	var parseTime = d3.timeParse("%Y-%m-%d");
	data.forEach(function(d) {
	  d.Values.forEach(function(d) {
	    d.Date = parseTime(d.Date);
	  });
	});

	/* Scale */
	var x = d3.scaleTime()
		.range([0, width-margin])
		.domain([
				d3.min(data, function(e) {return d3.min(e.Values, function(d) {
				return d.Date; });}),
				d3.max(data, function(e) {return d3.max(e.Values, function(d) {return new Date(d.Date); });})
			]);


	var y = d3.scaleLinear()
		.range([height-margin, 0])
	  .domain([
			d3.min(data, function(e){return d3.min(e.Values, function(d){return parseInt(d.Weight); }); }),
			d3.max(data, function(e){return d3.max(e.Values, function(d){return parseInt(d.Weight); }); })
		]);

	var z = d3.scaleOrdinal(d3.schemeCategory10);
	z.domain(data.map(function(t){return t.Username}))

	/* Add SVG */
	var svg = d3.select("#graphContainer").append("svg")
	  .attr("width", (width+margin)+"px")
	  .attr("height", (height+margin)+"px");

	var g = svg.append('g')
	  .attr("transform", `translate(${margin}, ${margin})`);

	/* Add Axis into SVG */
	var xAxis = d3.axisBottom(x).ticks(8);
	var yAxis = d3.axisLeft(y).ticks(5);

	g.append("g")
	  .attr("class", "x axis")
	  .attr("transform", `translate(0, ${height-margin})`)
	  .call(xAxis);

	g.append("g")
	  .attr("class", "y axis")
	  .call(yAxis)
	  .append('text')
	  .attr("y", 15)
	  .attr("transform", "rotate(-90)")
	  .attr("fill", "#000")
	  .text("Weight (lbs)");

	var line = d3.line()
		.x(function(d) {return x(d.Date)})
		.y(function(d) {return y(parseInt(d.Weight))});

	/* Add line into SVG */
	let lines = g.append('g')
	  .attr('class', 'lines');

	lines.selectAll('.line-group')
	  .data(data).enter()
	  .append('g')
	  .attr('class', 'line-group')
	  .on("mouseover", function(d, i) {
	      svg.append("text")
	        .attr("class", "title-text")
	        .text(d.Username)
	        .attr("text-anchor", "middle")
	        .attr("x", (width-margin)/2)
	        .attr("y", 25);
	    })
	  .on("mouseout", function(d) {
	      svg.select(".title-text").remove();
	    })
	  .append('path')
	  .attr('class', 'line')
	  .attr('d', d => line(d.Values))
	  .style('stroke', (d, i) => z(i))
	  .style('opacity', lineOpacity)
	  .on("mouseover", function(d) {
      d3.selectAll('.line')
				.style('opacity', otherLinesOpacityHover);
      d3.selectAll('.circle')
				.style('opacity', circleOpacityOnLineHover);
      d3.select(this)
      .style('opacity', lineOpacityHover)
      .style("stroke-width", lineStrokeHover)
      .style("cursor", "pointer");
    })
	  .on("mouseout", function(d) {
      d3.selectAll(".line")
				.style('opacity', lineOpacity);
      d3.selectAll('.circle')
				.style('opacity', circleOpacity);
      d3.select(this)
        .style("stroke-width", lineStroke)
        .style("cursor", "none");
    });


	/* Add circles in the line */
	lines.selectAll("circle-group")
	  .data(data).enter()
	  .append("g")
	  .style("fill", (d, i) => z(i))
	  .selectAll("circle")
	  .data(d => d.Values).enter()
	  .append("g")
	  .attr("class", "circle")
	  .on("mouseover", function(d) {
      d3.select(this)
        .style("cursor", "pointer")
        .append("text")
        .attr("class", "text")
        .text(`${d.Weight}`)
        .attr("x", d => x(d.Date) + 5)
        .attr("y", d => y(d.Weight) - 10);
    })
	  .on("mouseout", function(d) {
      d3.select(this)
        .style("cursor", "none")
        .transition()
        .selectAll(".text").remove();
    	})
	  .append("circle")
	  .attr("cx", d => x(d.Date))
	  .attr("cy", d => y(d.Weight))
	  .attr("r", circleRadius)
	  .style('opacity', circleOpacity)
	  .on("mouseover", function(d) {
      d3.select(this)
        .transition()
        .attr("r", circleRadiusHover);
    })
    .on("mouseout", function(d)
		{
      d3.select(this)
        .transition()
        .attr("r", circleRadius);
    });

	var legend = svg.selectAll('.line-group')
		.data(data)
		.append('g')
		.attr("class", "legend");

  legend.append('rect')
    .attr('x', width - margin - 20)
    .attr('y', function(d, i)
		{
      return i * 20;
    })
    .attr('width', 10)
    .attr('height', 10)
    .style("fill", (d, i) => z(i))
		.style('opacity', lineOpacity);

   legend.append('text')
    .attr('x', width - margin - 8)
    .attr('y', function(d, i)
		{
      return (i * 20) + 9;
    })
		.style("fill", (d, i) => z(i))
	  .attr("class", "segmentText")
	  .attr("Segid", function(d){return d.Username;})
    .text(function(d) {return d.Username;});
}
