function get_params_from_href(href){
    var paramstr = href.split('?')[1];        // get what's after '?' in the href
    var paramsarr = paramstr.split('&');      // get all key-value items
    var params = Array();
    for (var i = 0; i < paramsarr.length; i++) {
        var tmparr = paramsarr[i].split('='); // split key from value
        params[tmparr[0]] = tmparr[1];        // sort them in a arr[key] = value way
    }
    return params;
}

$(document).ready(function () {
    $('.showProfile').on('click', function() {
            var href = $(this).attr('href');
            var id = get_params_from_href(href).id;
            console.log(id);
            $.ajax({
                type: 'GET',
                url: 'index?r=profile/show',
                data: {'id':id},
                success: function (res) {
                    showProfile(res);
                },
                error: function () {
                    alert('Что-то не так!')
                }
            });
            return false;
        }
    );
});

function showProfile(res) {
    $('#profile .modal-body').html(res);
    $('#profile').modal();
}
