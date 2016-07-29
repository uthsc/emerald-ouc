function parsePersonDetails(data) {
	var person = data.details,
		meta = data.meta,
		html = "";

	if (meta.lichterman) {
		if (meta.lichterman_eligible) {
			html += "<div class=\"callout\">";
			html += "<div class=\"row\">";
			html += "<div class=\"columns small-2\">";
			html += "<img src=\"/search/images/lichterman-portrait.jpg\" alt=\"\" />";
			html += "</div>";
			html += "<div class=\"columns small-10\">";
			if (meta.lichterman_nominated) {
				html += "<p>" + person.name + " has already been nominated for the Lichterman Award!</p>";
			} else {
				html += "<p>" + person.name + " might be eligible for the Lichterman Award!</p>";
				html += "<a href=\"" + meta.lichterman_nominate_url + "\" ><span class=\"fa fa-trophy\" aria-hidden=\"true\"></span>&nbsp;Nominate " + person.name + "</a>";
			}

			html += "</div>";
			html += "</div>";
			html += "</div>";
		} else {
			html += "<div class=\"callout\">";
			html += "<div class=\"row\">";
			html += "<div class=\"columns small-2\">";
			html += "<img src=\"/search/images/lichterman-portrait.jpg\" alt=\"\" />";
			html += "</div>";
			html += "<div class=\"columns small-10\">";
			html += "<p>" + person.name + " is not eligible for the Lichterman Award. Only full-time, ";
			html += "non-exempt employees with three years of service are eligible.</p>";
			html += "</div>";
			html += "</div>";
			html += "</div>";
		}
	}

	html += "<table>";
	html += "<tbody>";
	html += "<tr><td><strong>Name:</strong></td><td>" + person.name + "</td></tr>";
	html += "<tr><td><strong>Campus:</strong></td><td>" + person.campus + "</td></tr>";
	html += "<tr><td><strong>Department:</strong></td><td>" + person.department + "</td></tr>";
	html += "<tr><td><strong>Address:</strong></td><td>" + person.address + "</td></tr>";
	html += "<tr><td><strong>Location:</strong></td><td>" + person.location + "</td></tr>";
	html += "<tr><td><strong>Phone Number:</strong></td><td>" + person.phone + "</td></tr>";
	html += "<tr><td><strong>Designation:</strong></td><td>" + person.designation + "</td></tr>";
	html += "<tr><td><strong>Title:</strong></td><td>" + person.title + "</td></tr>";
	html += "<tr><td><strong>NetID:</strong></td><td>" + person.netid + "</td></tr>";
	html += "<tr><td><strong>E-Mail:</strong></td><td><a href=\"mailto:" + person.email + "\">" + person.email + "</a></td></tr>";
	html += "</tbody>";
	html += "</table>";

	return html;
}

function RenderPersonDetails (data) {

	var html = "";

	if (peopleSearchId) {
		html = parsePersonDetails(data);
	}

	$('.people-search-detail').html(html);
	
}

$(document).ready(function () {
	if(peopleSearchId){
		$.ajax({
			type: "GET",
			url: '/search/scripts/lookup-detail.php?id=' + peopleSearchId,
			dataType: "json",
			success: function (data) {
				RenderPersonDetails(data);

				//change-info link
				$('.change-information').attr('href', data.meta.change_info_url);
			},
			error: function (xhr, status, error) {
				var err = eval("(" + xhr.responseText + ")");
				alert(err.Message);
			}
		});
		// .done(function () {
		// 	console.log("success");
		// })
		// .fail(function () {
		// 	console.log("error");
		// })
		// .always(function () {
		// 	console.log("complete");
		// });
	}
	
	//return to search results (history.back)
	$('.back-to-search-results').on('click', function(){
		history.back()
	});
});