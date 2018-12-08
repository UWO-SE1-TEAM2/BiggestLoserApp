var globalTest;

window.onload = function()
{
	ParseJsonData();
}


function ParseJsonData()
{
	var data = JSON.parse(document.getElementById("hiddenWeight").innerHTML);
	var i = 0;
	var values = [];
	var jsonData = [];
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

	var employee_data = flatten(jsonData);

	employee_data = create_graphable_data(employee_data);
	employee_data = JSON.parse(employee_data);
	globalTest = employee_data;

	generate_activities_by_day_graph(employee_data);
	generate_average_time_per_activity(employee_data);
}


function flatten(data)
{
	var retData = [];
	for(var i = 0; i < data.length; i++)
	{
		for(var j = 0; j < data[i]['data'].length; j++)
		{
			retData.push(data[i]['data'][j]);
		}
	}

	return retData;
}
