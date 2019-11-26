var   snackbarContainer = document.querySelector('#demo-toast-example');
var   dataToast         = {message: null}
const dialog            = document.querySelector('dialog');


document.addEventListener('click', (e) => {
    if(e.target.id == 'delete') {

        e.preventDefault();
        // console.log(e.target.dataset.enterpriseid);
        // let id = e.target.dataset.enterpriseid;

        if(confirm('esta seguro que desea borrar esta empresa?')) {
            fetch(`deleteEnterprise/${e.target.dataset.enterpriseid}`)
            .then(resp => resp.json())
            .then(data => {
                console.log(data);
                if(data.status == 'ok') {
                    // removeElement(e.target)
                    e.target.parentElement.parentElement.remove();
                    mostrarToast(data.msg)
                } else {
                    mostrarToast(data.msg)
                }

            })
            .catch(err => console.error('error', err));  
        }
        // e.preventDefault()
        // configurarDialogo("¿Esta seguro?", "Esta seguro que desea borrar esta empresa?");
        // dialog.showModal();
        // dialog.querySelector('button.agree').addEventListener('click', (event) => {
        // event.stopImmediatePropagation();
        //     dialog.close()
        //     fetch(`deleteEnterprise/${id}`)
        //     .then(resp => resp.json())
        //     .then(data => {
        //         console.log(data);
        //         if(data.status == 'ok') {
        //             removeElement(e.target)
        //             // e.target.parentElement.parentElement.remove();
        //             mostrarToast(data.msg)
        //         } else {
        //             mostrarToast(data.msg)
        //         }

        //     })
        //     .catch(err => console.error('error', err));  
        //     dialog.querySelector('button.agree').removeEventListener('click', (e));
        // });

        // dialog.querySelector('button.close').addEventListener('click', (event) => {
        //     dialog.close();
        // })



         
    }
})

function removeElement(elementId) {
    // Removes an element from the document
    // var element = document.getElementById(elementId);
    elementId.parentNode.parentNode.removeChild(elementId);
}



function mostrarToast(message)
{
    dataToast.message = message;
    console.log(dataToast);
    snackbarContainer.MaterialSnackbar.showSnackbar(dataToast);
}


function configurarDialogo(titulo, cuerpo)
{
    dialog.children[0].innerText = titulo;
    dialog.children[1].innerText = cuerpo;
}