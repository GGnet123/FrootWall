var lockerComment = false;
var lockerProfile = false;
function submitComment(id){
    var title = document.getElementById('editTitleInput').value;
    var comment = document.getElementById('editCommentInput').value;

    $.post(
        'index.php?r=content/edit',
        {'id' : id, 'comment':comment,'title':title}
    );
    lockerComment = false;
}

function edit(id){
    if (lockerComment===false){
        var title = document.getElementsByClassName(id);
        var titleContent = document.getElementsByClassName(id).item(0).textContent;
        var comment = document.getElementsByClassName('comment'+id);
        var commentContent = document.getElementsByClassName('comment'+id).item(0).textContent;

        title.item(0).innerHTML = '<input type="text" class="input-sm" value="'+titleContent+'" id="editTitleInput">';
        comment.item(0).innerHTML = '<input type="text" class="input-sm" value="'+commentContent+'" id="editCommentInput">' +
            '<button class="btn btn-default" type="button" onclick="submitComment('+id+')">править</button>';
    }
    lockerComment = true;
}

function submitProfile(id){
    var fullName = document.getElementById('editFullNameInput').value;
    // var job = document.getElementById('editJob').value;
    var phone = document.getElementById('editPhone').value;
    var email = document.getElementById('editEmail').value;

    $.post(
        'index.php?r=profile/edit',
        {'id' : id, 'fullName' : fullName, 'phone' : phone, 'email' : email}
    );
}

function editProfile(id) {
    if (lockerProfile===false) {
        var full_name = document.getElementsByClassName('UserName');
        var full_nameContent = document.getElementsByClassName('UserName').item(0).textContent;

        // var job = document.getElementsByClassName('Job');
        // var jobContent = document.getElementsByClassName('Job').item(0).textContent;

        var phone = document.getElementsByClassName('phone');
        var phoneContent = document.getElementsByClassName('phone').item(0).textContent;

        var email = document.getElementsByClassName('email');
        var emailContent = document.getElementsByClassName('email').item(0).textContent;

        var image = document.getElementsByClassName('userImg');
        var submitBtn = document.getElementsByClassName('forSubmit');


        image.item(0).innerHTML = '<form enctype="multipart/form-data" action="index.php?r=profile/add-image" method="post">\n' +
            '    <input name="file" id="image-file" type="file"/>\n' +
            '<button type="submit">upload</button></form>';


        full_name.item(0).innerHTML = '<input type="text" placeholder="Имя Фамилия" class="input-sm" value="' + full_nameContent.trim() + '" id="editFullNameInput">';
        // job.item(0).innerHTML = '<input type="text" placeholder="Должность" class="input-sm" value="' + jobContent + '" id="editJob">';
        phone.item(0).innerHTML = '<input type="text" placeholder="Номер телефона" class="input-sm" value="' + phoneContent + '" id="editPhone">';
        email.item(0).innerHTML = '<input type="text" placeholder="Почта" class="input-sm" value="' + emailContent + '" id="editEmail">';

        submitBtn.item(0).innerHTML = '<button class="btn btn-default" type="button" onclick="submitProfile(' + id + ')">Сохранить</button>';
    }
    lockerProfile = true;
    $('#profile').on('hidden.bs.modal',function () {
        lockerProfile = false;
    });

}


