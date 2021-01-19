<!DOCTYPE html>
<html lang="en">
<html>
<head>
<?php
	include "header.php";
?>

<script type="text/javascript">

var id_contact = '';
    
function loadData(){
var textToFind = document.getElementById("textToFind").value;
		$.ajax({
		  type: "POST",
		  url: "script/contactLoad.php",
		  async:true,
		  data: {textToFind:textToFind},
		  dataType: "html",
		  success: function(msg)
		  {
			$("#listResult").html(msg);
		  }
		});
					
  };
function newContact(){
    $('#form1')[0].reset();
	document.getElementById('contactList').hidden = true;
    document.getElementById('newContact').hidden = false;
 }
function singleItem(id) {
    $('#form1')[0].reset();
	id_contact = id;
		document.getElementById('contactList').hidden = true;
		document.getElementById('newContact').hidden = false;
	$.ajax({
				  type: "POST",
				  url: "script/contactSingleItem.php",
				  async:true,
				  data: {id:id},
				  dataType: "html",
				  success: function(msg)
				  {
					myObj = JSON.parse(msg);
                          document.getElementById('firstName').value = myObj.firstName;
                          document.getElementById('lastName').value = myObj.lastName;
                          document.getElementById('phone').value = myObj.phone;
                          document.getElementById('email').value = myObj.email;
				  }
				});
					
  };
function deleteItem(id){
	  if(confirm("Confirm action?")){
	  $.ajax({
			  type: "POST",
			  url: "script/contactDeleteItem.php",
			  async:true,
			  data: {id:id},
			  dataType: "html",
			  success: function(msg)
			  {
				id_contact = "";
                $('#form1')[0].reset();
				loadData();
			  }
	  });
	  }
  }
function pdfBook(){
	window.open("fpdf/pdfBook.php",'_blank');
}
function vCard(id){
	window.open("fpdf/pdfVcard.php?id=" + id,'_blank');
}
</script>
<script type="text/javascript">
	$(document).ready(function() {
        loadData();
        document.getElementById('textToFind').focus();
        $("#btnSave").click(function(){

        document.getElementById('id_contact').value = id_contact;
        
    //console.log(JSON.stringify($('#form1').serializeArray()));    
    if(document.getElementById('firstName').value != "" || document.getElementById('lastName').value != ""){
         $.ajax({
                type: "POST",
                url: "script/contactSave.php",
                async: true,
                data: {formData: JSON.stringify($('#form1').serializeArray())},
                success: function(data){
                    loadData();
                    document.getElementById('contactList').hidden = false;
		            document.getElementById('newContact').hidden = true;
                }
            });

            } else {alert("Edit all mandatory field please!");}

	  });
	});
</script>
</head>
<body>
<div class="container-fluid" style="margin-top: 20px;">
<?php
	include "navbar.php";
?>
</div>
<div class="container-fluid">
<div class='row'>
		<div class='col'>
		<div class='card'>
            <h5 class="card-header"><i class="fas fa-address-book" ></i> Contacts</h5>
			<div class='card-body'>
                <div class="input-group">
                  <input type="text" class="form-control" id="textToFind" placeholder="type text...">
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary" onclick='loadData()' id='btnFind' title="Search"><i class="fas fa-search"></i></button>
                </div>
                <div class="input-group-append">
                <button class='btn btn-success' type='button' onclick='newContact()' title='New'><i class='fas fa-user-plus'></i></button>
                <button class='btn btn-primary' type='button' onclick='pdfBook()' title='Address Book'><i class='fas fa-address-book'></i></button>
                  <a class='btn btn-success' href='script/contactsExcel.php' target='_new' title='Excel export'><i class="fas fa-file-excel"></i></a>
                </div>                                
                </div>						
			</div>
		</div>
		</div>
	</div>
	
	<div class="row" id='row_contactList'>
		<div class='col-md-12' id="contactList">
			<span id="listResult">....</span>
		</div>
	</div>
	<div class="row" id='newContact' hidden>
		<div class="col">
                <div class='card'>
				<h5 class="card-header">Contact</h5>
				<div class='card-body'>
					<form id='form1'>
                        <div class="col-md-12">
						<div class='form-group'>
						<label>Last Name</label>
							<input type='text' class='form-control' id='lastName' name='lastName'>
						</div>
						<div class='form-group'>
						<label>First Name</label>
							<input type='text' class='form-control' id='firstName' name='firstName'>
						</div>
						<div class='form-group'>
						<label>Phone</label>
							<input type='text' class='form-control' id='phone' name='phone'>
						</div>
						<div class='form-group'>
						<label>Email</label>
							<input type='email' class='form-control' id='email' name='email'>
						</div>
    
                        <div class='form-group '>
                        <input type='text' class='form-control' id='id_contact' name='id_contact' hidden>
                        </div>
					</div>
                    </form>	
				</div>
                <div class='card-footer'>
				<div class='form-group'>
							<button class='btn btn-success btn-lg' id='btnSave'><i class="fas fa-floppy-o" ></i> SAVE</button>
							<button class='btn btn-warning btn-lg' onclick='location.reload();'><i class="fas fa-window-close" ></i> CANCEL</button>
						</div>
				</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>