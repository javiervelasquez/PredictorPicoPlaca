var a_modal, txt_fecha, txt_placa, div_msg;
function cargarControles() {
    a_modal = document.getElementById('a_modal');
    txt_fecha = document.getElementById('txt_fecha');
    txt_placa = document.getElementById('txt_placa');
    div_msg = document.getElementById('div_msg');
}

function revisar() {
    if (txt_fecha.value != '' && txt_placa.value) {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'servidor.php',
            data: {accion: 'revisarPlaca', fecha:txt_fecha.value, placa:txt_placa.value },
            success: function(json) {
                revisar1(json);
                
            }
        });
    } else {
        alert('Debe ingresar todos los campos para revisar');
    }    
}
function revisar1(json){
    //alert(json.msg);
    div_msg.innerHTML = json.msg;
    a_modal.click();
}