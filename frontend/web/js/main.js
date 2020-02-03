var lockerComment = false;
var lockerProfile = false;
function submitComment(id){
    var comment = document.getElementById('editCommentInput').value;

    $.post(
        'index.php?r=content/edit',
        {'id' : id, 'comment':comment}
    );
    lockerComment = false;
}

function edit(id){
    if (lockerComment===false){
        var comment = document.getElementsByClassName('comment'+id);
        var commentContent = document.getElementsByClassName('comment'+id).item(0).textContent;

        comment.item(0).innerHTML = '<input type="text" class="input-sm" value="'+commentContent+'" id="editCommentInput">' +
            '<button class="btn btn-default" type="button" onclick="submitComment('+id+')">править</button>';
    }
    lockerComment = true;
}

function submitProfile(id){
    var fullName = document.getElementById('editFullNameInput').value;
    var about = document.getElementById('editAboutInput').value;
    var phone = document.getElementById('editPhone').value;
    var email = document.getElementById('editEmail').value;

    $.post(
        'index.php?r=profile/edit',
        {'id' : id, 'fullName' : fullName, 'phone' : phone, 'email' : email, 'about':about}
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

        var about = document.getElementsByClassName('about');
        var aboutContent = document.getElementsByClassName('about').item(0).textContent;


        image.item(0).innerHTML = '<form enctype="multipart/form-data" action="index.php?r=profile/add-image" method="post">\n' +
            '    <input name="file" id="image-file" type="file"/>\n' +
            '<button type="submit"> Загрузить </button></form>';


        about.item(0).innerHTML = '<textarea style="height: 100px; width: 300px;" placeholder="Обо мне" class="input-sm" id="editAboutInput">' + aboutContent.trim() + '</textarea>';
        full_name.item(0).innerHTML = '<input type="text" placeholder="Имя Фамилия" class="input-sm" value="' + full_nameContent.trim() + '" id="editFullNameInput">';
        phone.item(0).innerHTML = '<input type="tel" placeholder="Номер телефона" class="input-sm" value="' + phoneContent.trim() + '" id="editPhone">';
        email.item(0).innerHTML = '<input type="email" placeholder="Почта" class="input-sm" value="' + emailContent.trim() + '" id="editEmail">';

        submitBtn.item(0).innerHTML = '<button class="btn btn-default" type="button" onclick="submitProfile(' + id + ')">Сохранить</button>';
    }
    lockerProfile = true;
    $('#profile').on('hidden.bs.modal',function () {
        lockerProfile = false;
    });

}


