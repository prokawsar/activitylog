
$(document).ready(function () {

    if($('#log tr').length == 0){
        $('#submit').hide();
    }
    // console.log("welcome");
});

var ID;
function getID(id) {
    ID = id;
}
$(document).on('click', '#add', function () {
    var id = $('#id' + ID).val();
    var name = $('#name' + ID).text();
    // console.log(id);
    // console.log(name);

    $('#items > tbody').append('<tr><td> '+ name +' </td> <td><i title="Remove" style="cursor: pointer; color: #ac2925" id="remove" class="fa fa-remove fa-lg"></i></td> </tr>' +
        '<input type="hidden" value="'+ id +'" name="id[]" ');

    if($('#log tr').length >= 1){
        $('#submit').show();
    }
});

$(document).on('click', '#remove', function (e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    if($('#log tr').length == 0){
        $('#submit').hide();
    }else{
        $('#submit').show();
    }


});

//    var time = moment().format('LTS');   
// $('#clock').text(time); 

function update() {
    $('#clock').text(moment().format('LTS'));
}
      
setInterval(update, 1000);
