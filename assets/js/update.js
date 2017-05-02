$(document).ready(function(){

	$("#upbtn").click(function() {
	//Get user entered/selected data
	bookid = $("#id_update").val();
	bookname = $("#bname_update").val();
	authorfname = $("#fname_update").val();
	authorlname = $("#lname_update").val();
	pubyear = $("#pubyear_update").val();
	rating = $("#rating_update").val();

	// test received values
	alert("bookid: " + bookid + ", bookname: " + bookname + ", authorfname: " + authorfname 
		+ ", authorlname: " + authorlname + ", pub year: " + pubyear + ", rating: " + rating);

	//Send the user data to a PHP page via HTTP GET
	$.get("updateinfo.php", {id_update:bookid, bname_update:bookname, fname_update:authorfname, 
		lname_update:authorlname, pubyear_update:pubyear, rating_update:rating},
		// Callback function to be executed after server response
		function(data, status){
			alert("Result: " + data + ", status: " + status);
		});
		// Empty the input section
		$("#id_update").val("");
		$("#bname_update").val("");
		$("#fname_update").val("");
		$("#lname_update").val("");
		$("#pubyear_update").val("");
		$("#rating_update").val("");
	}); 
	$("#delbtn").click(function(){
	//get book id
	bookid = $("#id_update").val();

	$.get('delrecord.php', {id_update:bookid} ,function(data, status){
	});
});
});
