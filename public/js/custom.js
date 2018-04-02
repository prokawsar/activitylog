
$(document).ready(function () {
    // console.log("welcome");
});

$(document).on('click', '#add', function () {
    var id = $('#id').val();
    var name = $('#name').text();

    console.log(id);
    console.log(name);
});