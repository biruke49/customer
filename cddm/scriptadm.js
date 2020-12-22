//TABLE REFERENCE
var empRef = firebase.database().ref('Admin');
//$('#emp-table').find('tbody').html('');
var new_html = '';
window.onload = function () {
    initApp();
    displayEmpData();
};
//BUTTONS OR ACTIONS
function initApp() {
    document.getElementById('add_emp').addEventListener('click', addNewEmp, false);

}



// INSERT DATA
function addNewEmp() {
    var fname = document.getElementById('fname').value;
    var lname= document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var hno = document.getElementById('hno').value;
    var phone = document.getElementById('phone').value;
    var keb = document.getElementById('keb').value;
    var wor= document.getElementById('wor').value;
    var sc = document.getElementById('sc').value;
    var un = document.getElementById('un').value;
    var pw = document.getElementById('pw').value;

    var timeStamp = new Date().getTime();
    var empID = 'ADM_' + timeStamp;
    empRef.child(empID).set({
        First_Name: fname,
        Last_Name: lname,
        Email: email,
        House_Number: hno,
        Phone: phone,
        Kebele: keb,
        Woreda:wor,
        Subcity: sc,
        Username: un,
        Password: pw,
        adm_id: empID
    });
    $('#First_Name').val('');
    $('#Last_Name').val('');
    $('#Email').val('');
    $('#House_Number').val('');
    $('#Phone').val('');
    $('#Kebele').val('');
    $('#Woreda').val('');
    $('#Subcity').val('');
    $('#Username').val('');
    $('#Password').val('');
}



//Display Employee Data 


function displayEmpData() {

    empRef.on('child_added', function (empData) {
        console.log(empData.val());
       
        new_html += '<tr id="'+empData.val().adm_id+'">';
        new_html += '<td id="finame_'+empData.val().adm_id+'">' + empData.val().First_Name + '</td>';
        new_html += '<td id="laname_'+empData.val().adm_id+'">' + empData.val().Last_Name + '</td>';
        new_html += '<td id="emmail_'+empData.val().adm_id+'">' + empData.val().Email + '</td>';
        new_html += '<td id="hnno'+empData.val().adm_id+'">' + empData.val().House_Number + '</td>';
        new_html += '<td id="phonen_'+empData.val().adm_id+'">' + empData.val().Phone + '</td>';
        new_html += '<td id="kebe'+empData.val().adm_id+'">' + empData.val().Kebele + '</td>';
        new_html += '<td id="wore'+empData.val().adm_id+'">' + empData.val().Woreda + '</td>';
        new_html += '<td id="sci'+empData.val().adm_id+'">' + empData.val().Subcity + '</td>';
        new_html += '<td id="usn'+empData.val().adm_id+'">' + empData.val().Username + '</td>';
        new_html += '<td id="paw'+empData.val().adm_id+'">' + empData.val().Password + '</td>';

        new_html += '<td><a  class="edit" data-toggle="modal"><i class="material-icons editEmp"';
        new_html += 'data-toggle="tooltip" data-emp-id="' + empData.val().adm_id + '" title="Edit">&#xE254;</i></a>';
        new_html += '<a class="" data-toggle="modal"><i class="material-icons delete"';
        new_html += 'data-toggle="tooltip"  data-emp-id="' + empData.val().adm_id + '" title="Delete">&#xE872;</i></a>';
        new_html += '</td>';
        new_html += '</tr>';

        $("#emp-table").html(new_html);
       
    });

    // $('#emp-table').find('tbody').append(new_html);
}




$(document).on('click', '.delete', function () {
    var adm_id = $(this).attr('data-emp-id');
    
    empRef.child(adm_id).once('value', function (emp) {
        var modal_header = '';

        modal_header += '<h4 class="modal-title">Delete ' + emp.val().name + '</h4>';
        modal_header += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';

        var modal_body = '';
        modal_body += '<p>Are you sure you want to delete these Records?</p>';
        modal_body += '<p class="text-warning"><small>This action cannot be undone.</small></p>';
        var modal_footer = '';
        modal_footer += '<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">';
        modal_footer += '<input type="submit" data-dismiss="modal" data-emp-id="'+adm_id+'" class="btn btn-danger deleteEmpData" value="Delete">';
        $("#deleteEmployeeModal").find('.modal-header').html(modal_header);
        $("#deleteEmployeeModal").find('.modal-body').html(modal_body);
        $("#deleteEmployeeModal").find('.modal-footer').html(modal_footer);
        $("#deleteEmployeeModal").modal();
    })
});

$(document).on('click', '.deleteEmpData', function () {
    var adm_id = $(this).attr('data-emp-id');
     
    empRef.child(adm_id).remove();
  
    $('#'+adm_id).remove();
    
    
});

$(document).on('click', '.editEmp', function () {
    var adm_id = $(this).attr('data-emp-id');
    
    empRef.child(adm_id).once('value', function (emp) {
        var modal_header = '';

        modal_header += '<h4 class="modal-title">Edit Admin' + emp.val().name + '</h4>';
        modal_header += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';

        var modal_body = '';
        modal_body += '<div class="form-group">';
        modal_body += '<label>First Name</label>';
        modal_body += '<input id="edit-fname" type="text" value="'+emp.val().First_Name+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Last Name</label>';
        modal_body += '<input id="edit-lname" type="text" value="'+emp.val().Last_Name+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Email</label>';
        modal_body += '<input type="email" id="edit-email" value="'+emp.val().Email+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>House Number</label>';
        modal_body += '<input type="text" id="edit-hno"  class="form-control" required value="'+emp.val().House_Number+'">';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Phone</label>';
        modal_body += '<input id="edit-phone" type="text" value="'+emp.val().Phone+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Kebele</label>';
        modal_body += '<input id="edit-keb" type="text" value="'+emp.val().Kebele+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Woreda</label>';
        modal_body += '<input id="edit-wor" type="text" value="'+emp.val().Woreda+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Subcity</label>';
        modal_body += '<input id="edit-sc" type="text" value="'+emp.val().Subcity+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Username</label>';
        modal_body += '<input id="edit-un" type="text" value="'+emp.val().Username+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Password</label>';
        modal_body += '<input id="edit-pw" type="text" value="'+emp.val().Password+'" class="form-control" required>';
        modal_body += '</div>';
        
        var modal_footer = '';
        modal_footer += '<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">';
        modal_footer += '<input type="submit" data-dismiss="modal" data-emp-id="'+adm_id+'"  class="btn btn-danger updateEmpData" value="Save">';
        
        $("#editEmployeeModal").find('.modal-header').html(modal_header);
        $("#editEmployeeModal").find('.modal-body').html(modal_body);
        $("#editEmployeeModal").find('.modal-footer').html(modal_footer);
        $("#editEmployeeModal").modal();
    })
});




$(document).on('click', '.updateEmpData', function () {
    var adm_id = $(this).attr('data-emp-id');
     
    var fname = document.getElementById('edit-fname').value;
    var lname = document.getElementById('edit-lname').value;
    var email = document.getElementById('edit-email').value;
    var hno = document.getElementById('edit-hno').value;
    var phone = document.getElementById('edit-phone').value;
    var keb = document.getElementById('edit-keb').value;
    var wor = document.getElementById('edit-wor').value;
    var sc = document.getElementById('edit-sc').value;
    var un = document.getElementById('edit-un').value;
    var pw = document.getElementById('edit-pw').value;
   
    empRef.child(adm_id).update({
        First_Name: fname,
        Last_Name: lname,
        Email: email,
        House_Number: hno,
        Phone: phone,
        Kebele: keb,
        Woreda: wor,
        Subcity: sc,
        Username: un,
        Password: pw
    });
    
  
    $('#finame_'+adm_id).html(First_Name);
    $('#laname_'+adm_id).html(Last_Name);
    $('#emmail_'+adm_id).html(Email);
    $('#hnno'+adm_id).html(House_Number);
    $('#phonen_'+adm_id).html(Phone);
    $('#kebe'+adm_id).html(Kebele);
    $('#wore'+adm_id).html(Woreda);
    $('#sci'+adm_id).html(Subcity);
    $('#usn'+adm_id).html(Username);
    $('#paw'+adm_id).html(Password);
 
      
});

$(document).on('click', '.dltAllData', function () {
    var adm_id = $(this).attr('data-emp-id');
     
    empRef.remove();
  
    $('#emp-table').remove();

    
});
