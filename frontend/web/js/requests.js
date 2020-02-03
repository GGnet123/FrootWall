var usersList = [];
$('#requests-to_users_id').change(function () {
    var selectedUser = $(this).children('option:selected').text();

    var selectedUserId = $(this).children('option:selected').val();

    if (selectedUserId!="") {
        usersList.push(selectedUserId);
    }
    if (selectedUser!='Сотрудники'){
        $('.selected-users').append('<div id="'+selectedUserId+'">'+selectedUser+'<i class="glyphicon glyphicon-remove" onclick="removeUser('+selectedUserId+')"></i>/');
    }
});

function removeUser(id) {
    $('#'+id).remove();
    usersList = $.grep(usersList,function (value) {
        return value != id;
    });
}

$('#submitRequest').on('click',function () {
   var date = $('#date').val();
   var category_id = $('#category').val();
   var docs = [];
    $('.name a').each(function (e) {
        docs.push($(this).text());
   });

    $.post(
        'index.php?r=requests/save',
        {'date' : date, 'category_id' : category_id, 'to_users_id' : usersList, 'docs': docs}
    );
   return false;
});

function accept(id){
    $.post(
        'index.php?r=requests/change-status',
        {'id':id}
    );
}
function uploadDocs(id) {
    $.post(
        'index.php?r=requests/upload-docs',
        {'id':id}
    );
}
