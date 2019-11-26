
var url = window.location.href;
var swLocation = '/pwa-seccion-amarilla/sw.js';

if ('serviceWorker' in navigator) 
{
    window.addEventListener('load', () => {
        if ( url.includes('localhost') ) { swLocation = 'sw.js'; }
        navigator.serviceWorker.register( swLocation )
        .then(registration => {
            // newWorker = registration.installing;
            // newWorker.addEventListener('change', (e) => {
            //     if(newWorker.state == 'activated' && !navigator.serviceWorker.controller) {
            //         mostrarToast('Ahora este sitio puede ser accedido sin uso de conexión');
            //         newWorker.removeEventListener('change', e, false);
            //     }
            // })
            // localStorage.getItem('SW') || localStorage.setItem('SW', true);
            // if(!localStorage.getItem('SW')) {
            // }
            // let SW = localStorage.getItem('SW') ? localStorage.setItem('SW', true) : 
            // if()
            
            let newWorker = registration.installing;
            newWorker.onstatechange = function() {
                if(newWorker.state == 'activated' && !navigator.serviceWorker.controller) {
                    mostrarToast('Ahora este sitio puede ser accedido sin uso de conexión');
                }
            }
            // console.log(registration);
        }).catch(err => {
            console.error(err);
        });
    })   
}

document.addEventListener('click', (e) => {
    if(e.target.id == 'nuevo') {
        window.location.href = 'new-enterprise/';
    }
})