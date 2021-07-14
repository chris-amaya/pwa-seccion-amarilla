var url = window.location.href;
var swLocation = '/pwa-seccion-amarilla/sw.js';

if ('serviceWorker' in navigator) 
{
    window.addEventListener('load', () => {
        if ( url.includes('localhost') ) { swLocation = 'sw.js'; }
        navigator.serviceWorker.register( swLocation )
        .then(registration => {
            let newWorker = registration.installing;
            newWorker.onstatechange = function() {
                if(newWorker.state == 'activated' && !navigator.serviceWorker.controller) {
                    mostrarToast('Ahora este sitio puede ser accedido sin uso de conexión');
                }
            }
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

document.addEventListener('DOMContentLoaded', () => {
    console.log('asdfasfd');
    cutDescInCards();
})

// slice card's text description
function cutDescInCards() {
    document.querySelectorAll('.mdl-card div p')
    .forEach(el => el.textContent = (el.textContent.slice(0, 120)) + '...')
}