
let   url               = window.location.href;
let   enterprise        = url.split('/');

const dialog            = document.querySelector('dialog');
var   snackbarContainer = document.querySelector('#demo-toast-example');
var   dataToast         = {message: null}

const contenedorFotos = document.querySelector('.my-image-list');
const body = document.querySelector('body');

// ID que será actualizado cada ver que se quiera eliminar una foto
var newID;
// variable que se requiere para que ahí se almacene cada foto tomada
let foto;
var elementoTocado;
let online = true;

window.addEventListener('online', () => {
    online = true;
});

window.addEventListener('offline', () => {
    online = false;
});

body.addEventListener('click', (event) => {
    /* console.log(event); */
    elementoTocado = event.target;
    if(event.target.id == 'idBorrarNueva') { newID = event.target.parentElement.nextElementSibling.children[0].getAttribute('data-img'); borrarFotoReciente(); }
    if(event.target.id == 'idBorrar'){ newID = event.target.parentElement.nextElementSibling.children[0].getAttribute('data-name'); confirmacionBorrarFoto(newID); }
    if(event.target.id == 'iconCamera') { document.querySelector('.photo-container').classList.remove('oculto'); camara.encender();    }
    if(event.target.parentElement.id == 'subirFotosHTML') { subirInfo(); }
    if(event.target.parentElement.id == 'button-photo') { tomarFoto(); }
    if(event.target.classList.contains('cerrar')) { cerrarFoto(); };
    if(event.target.classList.contains('close') && event.target.type == 'button') { dialog.close(); } 
});

function borrarFotoReciente()
{
    configurarDialogo("¿Esta seguro?", "Esta seguro que desea borrar esta imagen reciente?");
    dialog.showModal();
    dialog.querySelector('button.agree').addEventListener('click', (event) => {
        event.stopImmediatePropagation();
        {
            document.querySelector(`[data-img="${newID}"]`).parentElement.parentElement.remove();
            mostrarToast("Foto borrada");
            dialog.close();
        }
    });
}

function confirmacionBorrarFoto(id)
{
    configurarDialogo("¿Esta seguro?", "Esta seguro que desea borrar este archivo?");
    dialog.showModal();
    dialog.querySelector('button.agree').addEventListener('click', (event) => {
        event.stopImmediatePropagation();
        let url = 'controladores/borrarFoto.controlador.php';
        const request = async () => {
            const response = await fetch(`${url}?nombreFoto=${newID}`);
            const data = await response.json();
            dialog.close();
            if(data.respuesta)
            {
                document.querySelector(`[data-name="${newID}"]`).parentElement.parentElement.remove()
                mostrarToast(data.respuesta);
            } else if (data.error) {
                mostrarToast(data.error);
            }
        }
        request();
    });
}

function mostrarToast(message)
{
    dataToast.message = message;
    console.log(dataToast);
    snackbarContainer.MaterialSnackbar.showSnackbar(dataToast);
}

async function eliminarFoto(id, url)
{
    const resp = await fetch(`${url}?nombreFoto=${id}`);
    const json = await resp.json(); 
    return json;
}

function subirInfo()
{
    var PhotosToUpload   = document.querySelectorAll(`[data-img]`);

    const info = {
        enterpriseName: document.getElementById('titulo').value,
        desc: document.getElementById('descripcion').value,
        coordinates: document.getElementById('coordenadas').value,
        type: Number(document.getElementById('type').value),
        telephone: document.getElementById('telephone').value,
        email: document.getElementById('email').value,
        facebook: document.getElementById('facebook').value,
        twitter: document.getElementById('twitter').value,
        IsActive: Number(document.getElementById('active').value),
        update: 1,
        oldName: decodeURIComponent(enterprise[enterprise.length - 1])
    }
    
    const url = 'edit-enterprise.php';
    var photos = [];

    if(PhotosToUpload.length > 0)
    {
        for (let i = 0; i < PhotosToUpload.length; i++) {
            let photoToUpload = PhotosToUpload[i];
            photos.push(photoToUpload.src);
        }
    }
        fetch(url, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                info
            })
              
        })
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            if(data.resp == 'ok')
            {
                window.location.href = 'index.php';
            } else if(data.error)
            {
                mostrarToast(data.error);
            }
        })
        .catch(err => console.error('error', err));
}

function configurarDialogo(titulo, cuerpo)
{
    dialog.children[0].innerText = titulo;
    dialog.children[1].innerText = cuerpo;
}




