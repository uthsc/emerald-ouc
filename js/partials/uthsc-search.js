/*
 * Returns count of items in an object
 * Use to count results for off campus searches
 */
function countPeople(obj) {
	var count = 0;

	for (var prop in obj) {
		if (obj.hasOwnProperty(prop))
			++count;
	}

	return count;
}

/*
 * Outputs appropriate table cell value with icon
 * @value data value
 * @icon  fontawesome icon class
 * @naMsg message to display if value is empty
 */
function peopleSearchItem(value, icon, message) {
	var html = "";

	if (value.length < 1) {
		value = "<em>Not Available</em>"
	}

	html += "<span class=\"fa " + icon + " hide-for-large\"></span>&nbsp;&nbsp;";
	html += value;

	return html;
}

/*
 * Generates html for people search tables and renders to dom
 * @data      json search results
 * @count     search results count
 * @el        element to render html in
 * @offCampus bool: true if user is off campus
 */
function peopleSearchTable(data, count, el, offCampus, soundsLike, lichterman) {

	var html = '';

	//search result count
	html += "<div class=\"search-results-count\">";
	html += "<p>";
	html += offCampus ? "Showing <strong>" + countPeople(data) + "</strong> of " : "";

	//use person if there is only one result
	if (count == 1) {
		html += "<strong>" + count + "</strong> person";
	} else {
		html += "<strong>" + count + "</strong> people";
	}

	html += "</small>";
	html += "</p>";

	//off campus max results message
	if (offCampus) {
		html += "<small>";
		html += "Maximum search results are limited for off-campus networks. ";
		html += "</small>";
	}

	//use sounds like message
	if (soundsLike) {
		html += "<small>";
		html += soundsLike ? soundsLike : "";
		html += "</small>";
	}

	//lichterman
	if (lichterman) {
		html += "<small>";
		html += "If you are using people search to nominate a UTHSC employee for the Lichterman Award, click on the name of the person you wish to nominate in the list.";
		html += "</small>";
	}

	//results table head
	html += "<table class=\"stack\">";
	html += "<thead>";
	html += "<tr>";
	html += "<th width=\"200\">Name</th>";
	html += "<th>NetID</th>";
	html += "<th width=\"180\">Phone</th>";
	html += "<th>Department/College</th>";
	html += "</tr>";
	html += "</thead>";
	html += "<tbody>";

	//results table body
	for (var person in data) {
		html += "<tr>";
		html += "<td>";
		html += "<a href=\"detail.php?id=" + data[person]['id'] + "\">";
		html += data[person]['name'];
		html += "</a>";
		html += "</td>";
		html += "<td>";
		html += peopleSearchItem(person, 'fa-user');
		html += "</td>";
		html += "<td>";
		html += peopleSearchItem(data[person]['phone'], 'fa-phone');
		html += "</td>";
		html += "<td>";
		html += peopleSearchItem(data[person]['dept'], 'fa-university');
		html += "</td>";
		html += "</tr>";
	}

	//results table close
	html += "</tbody>";
	html += "</table>";

	$(el).html(html);
}


$(document).ready(function () {
	var offCampus = peopleSearchResults['meta']['off_campus'],
		soundsLike = peopleSearchResults['meta']['use_sounds_like'],
		campusResultsCount = peopleSearchResults['meta']['memphis_count'],
		systemResultsCount = peopleSearchResults['meta']['system_count'],
		campusResults = peopleSearchResults['campus'],
		systemResults = peopleSearchResults['system'],
		lichterman = peopleSearchResults['meta']['lichterman'];


	//check for query
	if (typeof searchUthscQuery !== 'undefined') {
		//un-hide search results
		$('.search-uthsc-results').removeAttr("style");
		//set value of search input to query
		$('form.search-form .search-input').attr({value: searchUthscQuery});
	} else {
		//add bottom-margin to input
		$('.main-content .search-form').attr({style:"margin-bottom:30em;"})
	}

	//check for search type
	if (typeof searchUthscType !== 'undefined') {
		//check search type for utsys
		if (searchUthscType == 'utsys') {
			//make the System tab active
			$('.tabs #custom-search-results-system-label').click();
			$('.tabs #people-search-results-system-label').click();
		}
	}

	if(campusResultsCount > 0) {
		peopleSearchTable(campusResults, campusResultsCount, '#people-search-results-campus', offCampus, soundsLike, lichterman);

	} else {
		$('#people-search-results-campus').html('no results')
	}

	if(systemResultsCount > 0) {

		peopleSearchTable(systemResults, systemResultsCount, '#people-search-results-system', offCampus, soundsLike, 0);

	} else {
		$('#people-search-results-system').html('no results')
	}
});