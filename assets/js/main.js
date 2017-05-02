
$(document).ready(function(){
	$("#subsearch").click(function() {
	//Get user entered/selected data
	bookname = $("#bname").val();
	firstname = $("#fname").val();
	lastname = $("#lname").val();
	pubyear = $("#pyear").val();

	// alert("Data: " +  pubyear + bookname + firstname + lastname);

	//Send the user data to a PHP page via HTTP GET
	$.get("searchinfo.php", {bname: bookname, fname:firstname, lname:lastname, pyear:pubyear}, 
		function(data, status){
			$("#form_list").empty();
			// alert("Data: " + typeof data + "\nStatus: " + status);

			//loop
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
			// Empty the input section
			$("#bname").val("");
			$("#fname").val("");
			$("#lname").val("");
			$("#pyear").val("");
		});
});
});
