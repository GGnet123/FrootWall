var locker = false;
function submit(id){
    var title = document.getElementById('editTitleInput').value;
    var comment = document.getElementById('editCommentInput').value;
    console.log(title);
    console.log(comment);
    $.post(
        'index.php?r=content/edit',
        {'id' : id, 'comment':comment,'title':title}
    );
    locker = false;
}

function edit(id){
    if (locker===false){
        var title = document.getElementsByClassName(id);
        var titleContent = document.getElementsByClassName(id).item(0).textContent;
        var comment = document.getElementsByClassName('comment'+id);
        var commentContent = document.getElementsByClassName('comment'+id).item(0).textContent;

        title.item(0).innerHTML = '<input type="text" class="input-sm" value="'+titleContent+'" id="editTitleInput">';
        comment.item(0).innerHTML = '<input type="text" class="input-sm" value="'+commentContent+'" id="editCommentInput">' +
            '<button class="btn btn-default" type="button" onclick="submit('+id+')">edit</button>';
    }
    locker = true;
}
