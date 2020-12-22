//TABLE REFERENCE
var empRef = firebase.database().ref('Complaint');
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
    var id = document.getElementById('id').value;
    var date= document.getElementById('date').value;
    var griv = document.getElementById('griv').value;
    var rem = document.getElementById('rem').value;
   

    var timeStamp = new Date().getTime();
    var empID = 'COM_' + timeStamp;
    empRef.child(empID).set({
        CID: id,
        Complaint_Date: date,
        Grievance: griv,
        Remark: rem,
        com_id: empID
    });
    $('#id').val('');
    $('#date').val('');
    $('#griv').val('');
    $('#rem').val('');
}



//Display Employee Data 


function displayEmpData() {

    empRef.on('child_added', function (empData) {
        console.log(empData.val());
       
        new_html += '<tr id="'+empData.val().com_id+'">';
        new_html += '<td id="cid_'+empData.val().com_id+'">' + empData.val().CID + '</td>';
        new_html += '<td id="finame_'+empData.val().adm_id+'">' + empData.val().Complaint_Date + '</td>';
        new_html += '<td id="laname_'+empData.val().adm_id+'">' + empData.val().Grievance + '</td>';
        new_html += '<td id="emmail_'+empData.val().adm_id+'">' + empData.val().Remark + '</td>';
        

        new_html += '<td><a  class="edit" data-toggle="modal"><i class="material-icons editEmp"';
        new_html += 'data-toggle="tooltip" data-emp-id="' + empData.val().com_id + '" title="Edit">&#xE254;</i></a>';
        new_html += '<a class="" data-toggle="modal"><i class="material-icons delete"';
        new_html += 'data-toggle="tooltip"  data-emp-id="' + empData.val().com_id + '" title="Delete">&#xE872;</i></a>';
        new_html += '</td>';
        new_html += '</tr>';

        $("#emp-table").html(new_html);
       
    });

    // $('#emp-table').find('tbody').append(new_html);
}




$(document).on('click', '.delete', function () {
    var com_id = $(this).attr('data-emp-id');
    
    empRef.child(com_id).once('value', function (emp) {
        var modal_header = '';

        modal_header += '<h4 class="modal-title">Delete ' + emp.val().name + '</h4>';
        modal_header += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';

        var modal_body = '';
        modal_body += '<p>Are you sure you want to delete these Records?</p>';
        modal_body += '<p class="text-warning"><small>This action cannot be undone.</small></p>';
        var modal_footer = '';
        modal_footer += '<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">';
        modal_footer += '<input type="submit" data-dismiss="modal" data-emp-id="'+com_id+'" class="btn btn-danger deleteEmpData" value="Delete">';
        $("#deleteEmployeeModal").find('.modal-header').html(modal_header);
        $("#deleteEmployeeModal").find('.modal-body').html(modal_body);
        $("#deleteEmployeeModal").find('.modal-footer').html(modal_footer);
        $("#deleteEmployeeModal").modal();
    })
});

$(document).on('click', '.deleteEmpData', function () {
    var com_id = $(this).attr('data-emp-id');
     
    empRef.child(com_id).remove();
  
    $('#'+com_id).remove();
    
    
});

$(document).on('click', '.editEmp', function () {
    var com_id = $(this).attr('data-emp-id');
    
    empRef.child(com_id).once('value', function (emp) {
        var modal_header = '';

        modal_header += '<h4 class="modal-title">Edit ' + emp.val().name + '</h4>';
        modal_header += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';

        var modal_body = '';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Customer ID</label>';
        modal_body += '<input id="edit-fname" type="text" value="'+emp.val().CID+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Complaint Date</label>';
        modal_body += '<input id="edit-lname" type="date" value="'+emp.val().Complaint_Date+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Grievance</label>';
        modal_body += '<input type="text" id="edit-email" value="'+emp.val().Grievance+'" class="form-control" required>';
        modal_body += '</div>';
        modal_body += '<div class="form-group">';
        modal_body += '<label>Remark</label>';
        modal_body += '<input type="text" id="edit-hno"  class="form-control" required value="'+emp.val().Remark+'">';
        modal_body += '</div>';
        
        
        var modal_footer = '';
        modal_footer += '<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">';
        modal_footer += '<input type="submit" data-dismiss="modal" data-emp-id="'+com_id+'"  class="btn btn-danger updateEmpData" value="Save">';
        
        $("#editEmployeeModal").find('.modal-header').html(modal_header);
        $("#editEmployeeModal").find('.modal-body').html(modal_body);
        $("#editEmployeeModal").find('.modal-footer').html(modal_footer);
        $("#editEmployeeModal").modal();
    })
});




$(document).on('click', '.updateEmpData', function () {
    var com_id = $(this).attr('data-emp-id');
     
    var fname = document.getElementById('edit-fname').value;
    var lname = document.getElementById('edit-lname').value;
    var email = document.getElementById('edit-email').value;
    var hno = document.getElementById('edit-hno').value;
   
   
    empRef.child(com_id).update({
        CID: fname,
        Complaint_Date: lname,
        Grievance: email,
        Remark: hno
        
    });
    
  
    $('#finame_'+com_id).html(First_Name);
    $('#laname_'+com_id).html(Last_Name);
    $('#emmail_'+com_id).html(Email);
    $('#hnno'+com_id).html(House_Number);
   
    
      
      
});

$(document).on('click', '.dltAllData', function () {
    var com_id = $(this).attr('data-emp-id');
     
    empRef.remove();
  
    $('#emp-table').remove();

    
});
