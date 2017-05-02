$(document).ready(function(){
	$.get('getRecentBook.php', function(data, status){
		$("#form_list").empty();

		$.each(data, function(index, record) {
			$("#form_list").append(
				"<tr>"
				+ "<td>" + record["idbook"] + "</td>"
				+ "<td>" + record['bookname'] + "</td>"
				+ "<td>" + record['author'] + "</td>" 
				+ "<td>" + record['pub_year'] + "</td>"
				+ "<td>" + record['rating'] + "</td>"
				+ "</tr>");
		});
	});
});
