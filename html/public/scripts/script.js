/**
 * @author Kigen
 */
var base_url = "http://www.hcsshare.org/";

function check_file_api() {
	// Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob) {
		// Great success! All the File APIs are supported.
		alert('Working');
	} else {
		alert('The File APIs are not fully supported in this browser.');
	}
}

/*
 * Gichingiri's from the header section of
 * the default template
 */
jQuery(document).ready(function($) {

	/* prepend menu icon */
	$('#nav-wrap').prepend('<div id="menu-icon">Menu</div>');

	/* toggle nav */
	$("#menu-icon").on("click", function() {
		$("#nav").slideToggle();
		$(this).toggleClass("active");
	});

});

$(function() {
	$(".datepicker").datetimepicker({
		changeMonth : true,
		changeYear : true,
		timeFormat : 'hh:mm tt z',
		showTimezone : false
	});

});

//Show event
function show_event(event_id) {

	$.ajax({
		type : 'POST',
		url : base_url + "index.php/events/get_event",
		data : {
			event_id : event_id
		},
		success : function(response) {
			var event_object = JSON.parse(response);
			//var to_display = "Event: "  + event_object[0]['event_name'];
			var to_display = [];

			to_display.push(event_object[0]['event_name']);
			to_display.push("\n");
			to_display.push("\n");

			to_display.push("From: ");
			to_display.push(event_object[0]['start_date']);
			to_display.push("\n");
			to_display.push("\n");

			to_display.push("To: ");
			to_display.push(event_object[0]['end_date']);
			to_display.push("\n");
			to_display.push("\n");

			to_display.push("Venue: ");
			to_display.push(event_object[0]['event_venue']);
			to_display.push("\n");
			to_display.push("\n");

			to_display.push("Description: ");
			to_display.push(event_object[0]['description']);

			alert(to_display.join(""));
		}
	});
}

//Fetch all docs
function fetch_all_uploads() {
	
	/*
	 if ($.browser.msie && window.XDomainRequest) {
	 alert("testing");
	 // Use Microsoft XDR
	 var xdr = new XDomainRequest();
	 xdr.open("post", base_url + "index.php/home/get_all");
	 xdr.onload = function() {
	 var JSON = $.parseJSON(xdr.responseText);
	 if (JSON == null || typeof (JSON) == 'undefined') {
	 JSON = $.parseJSON(data.firstChild.textContent);
	 }
	 parse_all(JSON);
	 };
	 xdr.send();
	 } else {
	 */
	$.ajax({
		type : "POST",
		url : base_url + "index.php/home/get_all",
		data : { },
		success : function(response) {
			//alert(response);
			parse_all(response);
		}
	});
	return false;

}

function parse_all(response) {
	var root_json = JSON.parse(response);
	var docs_json = root_json["documents"];
	var news_json = root_json["news"];
	var org_users = root_json["org_users"];

	//Populate documents
	var docs_content = prep_docs(docs_json, org_users);
	document.getElementById("uploads").innerHTML = docs_content.join("");

	//Populate News
	var news_content = prep_news(news_json);
	document.getElementById("news").innerHTML = news_content.join("");
}

//News
function filter_content(host_url, dropdown, table) {
	//alert(host_url);
	//Filter content
	////http://localhost/hcs/
	$.ajax({
		type : 'POST',
		url : host_url + "index.php/home/organization_docs",
		data : {
			organization_id : dropdown.value,
			table : table
		},
		success : function(response) {
			
			if (table.toLowerCase() == "documents".toLowerCase()) {
				var json_object = JSON.parse(response);
				//prep_docs(docs_json, org_users)
				var org_users = [];
				var docs_html = prep_docs(json_object, org_users);

				document.getElementById("uploads").innerHTML = docs_html.join("");

			} else {

				parse_news(response);
			}

		}
	});
	return false;

}
//Filter news content

function parse_news(response) {
	var json_news = JSON.parse(response);
	//alert(json_news[0]['news_title']);
	var news_items = prep_news(json_news);
	var final_string = news_items.join("");

	document.getElementById("news").innerHTML = final_string;

}

//Prepare HTML content for uploaded documents
function prep_docs(docs_json, org_users) {

	var docs_content = [];
	for (var i = 0; i < docs_json.length; i++) {

		current_file = docs_json[i]["file_name"];
		var p_class = "<p class = downloaddescription";
		var file_extension = get_file_extension(current_file);
		var user_id = docs_json[i]["user_id"];
		var organization = org_users[user_id];

		//Beginining of Document class
		docs_content.push("<div class = 'downloadlist'>");

		//Title
		docs_content.push("<h5>");
		docs_content.push(docs_json[i]["title"]);
		docs_content.push("</h5>");

		//Description
		docs_content.push('<p class = "downloaddescription');
		docs_content.push(" " + file_extension);
		docs_content.push('">');
		docs_content.push(docs_json[i]["description"]);
		docs_content.push('</p>');

		//Download link
		docs_content.push('<p class="downloadfiledetails">');
		docs_content.push('<a href="');
		docs_content.push(base_url);
		docs_content.push(docs_json[i]['directory_path']);
		docs_content.push(docs_json[i]['file_name']);
		docs_content.push('">Download:</a>&nbsp;&nbsp;');
		docs_content.push(docs_json[i]['file_name']);
		docs_content.push(docs_json[i]['size']);
		docs_content.push(" uploaded on ");
		docs_content.push(docs_json[i]['upload_date']);

		if (organization) {
			//alert(organization['organization'])
			docs_content.push(" by: ");
			docs_content.push(organization['organization']);
		}

		docs_content.push('</p>');

	}

	return docs_content;
}

function prep_news(news_json) {
	var news_content = [];
	for (var i = 0; i < news_json.length; i++) {
		news_content.push("<div class='newstitle'>");
		news_content.push("<p>");
		news_content.push(news_json[i]["news_title"]);
		news_content.push("<span>");
		news_content.push("&nbsp;&nbsp; - &nbsp;&nbsp; " + news_json[i]["date_created"]);
		news_content.push(" by " + news_json[i]["organization"]);
		news_content.push("</span>");
		news_content.push(" <a  href='" + base_url + "index.php/news/item/" + news_json[i]["slug"] + "'>read more</a>");
		news_content.push("</p>");
		news_content.push("</div>");
	}
	return news_content;
}

function get_file_extension(file_name) {
	var re = /(?:\.([^.]+))?$/;

	var extension = re.exec(file_name)[1];

	switch (extension) {
		case 'docx':
			return "description-word";
			break;
		case 'doc':
			return "description-word";
			break;
		case 'xls':
			return "description-excel";
			break;
		case 'xlsx':
			return "description-excel";
			break;
		case 'pdf':
			return "description-pdf";
			break;
		default:
			return "description-pdf";

	}

}
