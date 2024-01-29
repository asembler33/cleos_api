    
var tablaSucursales= $('#datatableSucursales').DataTable({
    ajax: {
        url: "/sucursales/dataListaSucursales",
        type: "GET",
        dataSrc: ""
    },
    columns: [
        {data: "id" },
        {data: "nombre_sucursal" },
        {data: "tipo_sucursal" },
        {data: "telefono" },
        {data: "correo" },
        {data: "comuna_nombre" },
        {data: null,
                "render": function ( data, type, row, meta ) { 
                    return `<button class="btn btn-primary editaSucursal" data-bs-toggle="modal" data-bs-target="#modalEditarSucursal" data-id="${row.id}">Editar</button>
                    <button class="btn btn-danger eliminaSucursal" data-id="${row.id}">Eliminar</button>`
                 }
        }
    ]
});

$(document).on("click", ".editaSucursal", function (event) {
    event.preventDefault();
    var data = tablaSucursales.row( $(this).parents("tr") ).data();
    
    idSucursal = data['id'];
    fetch('/sucursales/'+idSucursal,{
        headers:{
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        method: 'GET'
    })
    .then(function(response){ 
        return response.json();
    })
    .then(function(result){
        let arreglo = JSON.parse(JSON.stringify(result));
        console.log(arreglo['data']['tipo_sucursal']);

        document.querySelector('#idSucursal').value = arreglo['data']['id'];
        document.querySelector('#comunas').value = arreglo['data']['comuna_id'];
        document.querySelector('#nombreSucursal').value = arreglo['data']['nombre_sucursal'];

        if ( arreglo['data']['tipo_sucursal'] == 1){
            $('#tipoSucursalOnline').prop('checked', true);
        }else{
            document.getElementById('tipoSucursalFisica').checked;
            $('#tipoSucursalFisica').prop('checked', true);
        }

        document.querySelector('#direccion').value = arreglo['data']['direccion'];
        document.querySelector('#telefono').value = arreglo['data']['telefono'];
        document.querySelector('#correo').value = arreglo['data']['correo'];
        
        
        $('#modalEditarSucursal').modal('show');
    })
    .catch(function (error) {
        console.log(error);
    });

});




const btnGuardarSucursal = document.querySelector("#btnGuardarSucursal");

if (btnGuardarSucursal){
    
    btnGuardarSucursal.addEventListener("click", (event) => {

        event.preventDefault();
        var formulario = new FormData();

            let url = '';
            let metodo = '';
            
            
            url = '/sucursales';
            metodo = 'POST';
            

            formulario.append("nombreSucursal", document.getElementById('nombreSucursal').value);
            formulario.append("comuna", document.getElementById('comuna').value);           
            formulario.append("tipoSucursal", document.querySelector('.tipoSucursal').value);
            formulario.append("telefono", document.getElementById('telefono').value);
            formulario.append("direccion", document.getElementById('direccion').value);
            formulario.append("correo", document.getElementById('correo').value);

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
                window.location.href = '/sucursales/lista-sucursales';
            })
            .then(function(result){
                // alert(result.message);
            })
            .catch(function (error) {
                console.log(error);
            });

    });
}

const btnEditarSucursal = document.querySelector("#btnEditarSucursal");

if (btnEditarSucursal){
    
    btnEditarSucursal.addEventListener("click", (event) => {

        const idSucursal = document.querySelector('#idSucursal').value;

        event.preventDefault();
        var formulario = new FormData();

            let url = '';
            let metodo = '';
            
            url = '/sucursales/'+idSucursal;
            metodo = 'PUT';
            

            formulario.append("nombreSucursal", document.getElementById('nombreSucursal').value);
            formulario.append("comuna", document.getElementById('comunas').value);
            formulario.append("direccion", document.getElementById('direccion').value);

            formulario.append("descripcion", document.getElementById('descripcion').value);
            formulario.append("telefono", document.getElementById('telefono').value);
            formulario.append("correo", document.getElementById('correo').value);

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
                    tablaSucursales.ajax.reload(null, false);
                }
            })
            .then(function(result){
                
            })
            .catch(function (error) {
                console.log(error);
            });

    });
}


$(document).on("click", ".eliminaSucursal", function () {
    var data = tablaSucursales.row( $(this).parents("tr") ).data();
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
                        tablaSucursales.ajax.reload(null, false);
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