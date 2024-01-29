    
var tablaServicios= $('#datatableServicios').DataTable({
    ajax: {
        url: "/servicios/dataListaServicios",
        type: "GET",
        dataSrc: ""
    },
    columns: [
        {data: "id" },
        {data: "servicio" },
        {data: "especialidad" },
        {data: "precio" },
        {data: "duracion" },
        {data: "preparacion_previa" },
        {data: null,
                "render": function ( data, type, row, meta ) { 
                    return `<button class="btn btn-primary editaServicio" data-bs-toggle="modal" data-bs-target="#modalEditarServicio" data-id="${row.id}">Editar</button>
                    <button class="btn btn-danger eliminaServicio" data-id="${row.id}">Eliminar</button>`
                 }
        }
    ]
});

$(document).on("click", ".editaServicio", function (event) {
    event.preventDefault();
    var data = tablaServicios.row( $(this).parents("tr") ).data();
    
    idServicio = data['id'];
    fetch('/servicios/'+idServicio,{
        headers:{
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        method: 'GET'
    //     body: 
    //          JSON.stringify({ idServicio: data[0] }) 
    })
    .then(function(response){ 
        return response.json();
    })
    .then(function(result){
        
        let arreglo = JSON.parse(JSON.stringify(result));

        document.querySelector('#idServicio').value = arreglo['data']['id'];
        document.querySelector('#nombreServicio').value = arreglo['data']['servicio'];
        document.querySelector('#especialidad').value = arreglo['data']['id_especialidad'];
        document.querySelector('#duracion').value = arreglo['data']['duracion'];
        document.querySelector('#precio').value = arreglo['data']['precio'];
        document.querySelector('#descripcion').value = arreglo['data']['descripcion'];
        document.querySelector('#preparacionPrevia').value = arreglo['data']['preparacion_previa'];
        
    })
    .catch(function (error) {
        console.log(error);
    });

});




const btnCrearServicio = document.querySelector("#btnGuardarServicio");

if (btnCrearServicio){
    
    btnCrearServicio.addEventListener("click", (event) => {

        event.preventDefault();
        var formulario = new FormData();

            let url = '';
            let metodo = '';
            
            
            url = '/servicios';
            metodo = 'POST';
            

            formulario.append("nombreServicio", document.getElementById('nombreServicio').value);
            formulario.append("especialidad", document.getElementById('especialidad').value);
            formulario.append("duracion", document.getElementById('duracion').value);
            formulario.append("precio", document.getElementById('precio').value);
            formulario.append("descripcion", document.getElementById('descripcion').value);
            formulario.append("duracion", document.getElementById('duracion').value);
            formulario.append("preparacionPrevia", document.getElementById('preparacionPrevia').value);

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
                window.location.href = '/servicios/lista-servicios';
            })
            .then(function(result){
                // alert(result.message);
            })
            .catch(function (error) {
                console.log(error);
            });

    });
}

const btnEditarServicio = document.querySelector("#btnEditarServicio");

if (btnEditarServicio){
    
    btnEditarServicio.addEventListener("click", (event) => {

        const idServicio = document.querySelector('#idServicio').value;

        event.preventDefault();
        var formulario = new FormData();

            let url = '';
            let metodo = '';
            
            url = '/servicios/'+idServicio;
            metodo = 'PUT';
            

            formulario.append("nombreServicio", document.getElementById('nombreServicio').value);
            formulario.append("especialidad", document.getElementById('especialidad').value);
            formulario.append("duracion", document.getElementById('duracion').value);
            formulario.append("precio", document.getElementById('precio').value);
            formulario.append("descripcion", document.getElementById('descripcion').value);
            formulario.append("duracion", document.getElementById('duracion').value);
            formulario.append("preparacionPrevia", document.getElementById('preparacionPrevia').value);

            // data = JSON.parse(JSON.stringify(Object.fromEntries(formulario.entries())));
            data = JSON.stringify(Object.fromEntries(formulario.entries()));
            // data = Object.fromEntries(formulario.entries());

            // console.log(  JSON.stringify(Object.fromEntries(formulario.entries())));

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
                // return response.json();
                
                if ( response.status == 200){
                    $('#modalEditarServicio').modal('hide');
                    // window.location.href='/servicios/lista-servicios';
                    tablaServicios.ajax.reload(null, false);
                }
            })
            .then(function(result){
                
            })
            .catch(function (error) {
                console.log(error);
            });

    });
}


$(document).on("click", ".eliminaServicio", function () {
    var data = tablaServicios.row( $(this).parents("tr") ).data();
        console.log(data);

        Swal.fire({
            title: "Desea eliminar el servicio?",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: "#1c84ee",
            cancelButtonColor: "#fd625e"
        }).then(function (result) {
            if (result.isConfirmed) {
                fetch('/servicios/'+data['id'],{
                    headers:{
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    method: 'DELETE'
                })
                .then(function(response){
                    if ( response.status == 200){
                        tablaServicios.ajax.reload(null, false);
                    }else{
                        Swal.fire({
                            title: 'Error al borrar, contactar al administrador',
                            icon:'error'
                        })

                    } 
                    
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