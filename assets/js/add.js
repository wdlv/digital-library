$(document).ready(function(){
	$("#btnAdd").click(function() {
	//Get user entered/selected data
	bookname = $("#bname_input").val();
	authorfname = $("#fname_input").val();
	authorlname = $("#lname_input").val();
	pubyear = $("#pubyear_input").val();
	rating = $("#rating_input").val();

	// alert("data in js" + bookname + authorlname + authorfname + pubyear + rating);

	//Send the user data to a PHP page via HTTP GET
	$.get('addrecord.php?bname_input=' + bookname
		+ "&fname_input=" + authorfname
		+ "&lname_input=" + authorlname
		+ "&pubyear_input=" + pubyear
		+ "&rating_input=" + rating,
		function(data, status){});
		// Empty the input section
		$("#bname_input").val("");
		$("#fname_input").val("");
		$("#lname_input").val("");
		$("#pubyear_input").val("");
		$("#rating_input").val("");
	}); 
});
