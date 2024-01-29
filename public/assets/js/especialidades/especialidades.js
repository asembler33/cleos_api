var tablaEspecialidades = $('#datatableEspecialidades').DataTable({
       
    ajax: {
        url: "/especialidades/dataListaEspecialidades",
        type: "GET",
        dataSrc: ""
    },
    columns: [
        {data: "especialidad" },
        {data: null,
                "render": function ( data, type, row, meta ) { 
                    return `<button class="btn btn-primary editaEspecialidad" data-bs-toggle="modal" data-bs-target="#modalCrearEspecialidad" data-id="${row.id}">Editar</button>
                    <button class="btn btn-danger eliminaEspecialidad" data-id="${row.id}">Eliminar</button>`
                 }
        }
    ]

});

$('#btnEditarEspecialidad').hide();


$(document).on("click", ".editaEspecialidad", function (event) {
event.preventDefault();
var data = tablaEspecialidades.row( $(this).parents("tr") ).data();
$('#especialidad').val(data.especialidad);
$('#btnCrearEspecialidad').hide();
$('#btnEditarEspecialidad').show();
$('#idEspecialidad').val(data.id);
$('#modalCrearEspecialidad').modal('show');
});


$(document).on("click", ".eliminaEspecialidad", function () {
var data = tablaEspecialidades.row( $(this).parents("tr") ).data();
    Swal.fire({
        title: "Desea eliminar la especialidad?",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: "#1c84ee",
        cancelButtonColor: "#fd625e"
    }).then(function (result) {
        if (result.isConfirmed) {
            fetch('/especialidades/'+data.id,{
                headers:{
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                method: 'DELETE'
            })
                .then(function(response){ 
                    tablaEspecialidades.ajax.reload(null, false); 
                })
                .then(function(result){
                    // alert(result.message);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
    });
});


if ( document.querySelector("#btnCrearEspecialidad") ){
    document.querySelector("#btnCrearEspecialidad").addEventListener("click", () => {
        let url = '';
        let metodo = '';
        formulario = new FormData();
        
        url = '/especialidades';
        metodo = 'POST';
        
        formulario.append("especialidad", document.getElementById('especialidad').value);

        data = JSON.stringify(Object.fromEntries(formulario.entries()));

        fetch(url,{
            headers:{
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            method: metodo,
            body: data
        })
        .then(function(response){ 
            $('#modalCrearEspecialidad').modal('hide');
            tablaEspecialidades.ajax.reload(null, false); 
        })
        .then(function(result){
            // alert(result.message);
        })
        .catch(function (error) {
            console.log(error);
        });

    });
}

var btnEditar = document.querySelector("#btnEditarEspecialidad");

if ( btnEditar ){
btnEditar.addEventListener("click", () => {
    
    formulario = new FormData();
    metodo = 'PUT';
    url = '/especialidades/' + document.querySelector('#idEspecialidad').value;
    
    formulario.append("especialidad", document.getElementById('especialidad').value);
    // formulario.append("idEspecialidad", document.getElementById('idEspecialidad').value);
    
    data = JSON.stringify(Object.fromEntries(formulario.entries()));
    console.log(data);

    fetch(url,{
        headers:{
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        method: metodo,
        body: data
    })
    .then(function(response){ 
        $('#modalCrearEspecialidad').modal('hide');
        tablaEspecialidades.ajax.reload(null, false); 
    })
    .then(function(result){
        // alert(result.message);
    })
    .catch(function (error) {
        console.log(error);
    });
});
}
