
const googleMapKey      = 'AIzaSyA5mjCwx1TRLuBAjwQw84WE6h5ErSe7Uj8';/* 
url               = window.location.href; */
let   url               = window.location.href;
let   enterprise        = url.split('/');

const dialog            = document.querySelector('dialog');
var   snackbarContainer = document.querySelector('#demo-toast-example');
var   dataToast         = {message: null}

const contenedorFotos = document.querySelector('.my-image-list');
const camara = new Camara(document.querySelector('.photo-container video'));
const subirFotosHTML = document.getElementById('subirFotosHTML');
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
        let url = 'controladores/fotos/borrarFoto.controlador.php';
        const request = async () => {
            const response = await fetch(`${url}?namePhoto=${newID}`);
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

let i = 1;
function htmlFoto(foto)
{
    let plantillaPhoto = `
    <li class="mdc-image-list__item">
        <div class="borrarImg"><i class="material-icons" id="idBorrarNueva" >close</i></div>
        <div class="mdc-image-list__image-aspect-container">
            <img class="mdc-image-list__image" src="${foto}" data-img="img-${i}">
        </div>
    </li>`;
    i++;
    contenedorFotos.lastElementChild.insertAdjacentHTML('afterend', plantillaPhoto);
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
    }
    

    const url = 'new-enterprise.php';
    var photos = [];

    if(PhotosToUpload.length > 0)
    {
        for (let i = 0; i < PhotosToUpload.length; i++) {
            let photoToUpload = PhotosToUpload[i];
            photos.push(photoToUpload.src);
        }
    }

    console.log(info, photos);
        fetch(url, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                photos, 
                info
            })
              
        })
        .then(resp => resp.json())
        .then(data => {
            console.log(data);
            if(data.resp)
            {
                mostrarToast(data.resp);
                // window.location.href = 'index.php';
            } else if(data.offline) {
                mostrarToast('Estado sin conexión, se enviara apenas se recupere la señal')
            }
            
            if(data.error)
            {
                mostrarToast(data.error);
            }
        })
        // .catch(err => console.error('error', err));
        .catch(err => {
            console.log(err);
        })
}

function tomarFoto()
{
    foto = camara.tomarFoto();
    document.querySelector('.photo-container').classList.add('oculto');
    htmlFoto(foto);
    camara.apagar();
}

function cerrarFoto()
{
    document.querySelector('.photo-container').classList.add('oculto');
    camara.apagar();
}

function configurarDialogo(titulo, cuerpo)
{
    dialog.children[0].innerText = titulo;
    dialog.children[1].innerText = cuerpo;
}



