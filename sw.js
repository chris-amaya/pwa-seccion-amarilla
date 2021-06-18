// imports
importScripts('https://cdnjs.cloudflare.com/ajax/libs/pouchdb/7.0.0/pouchdb.min.js');
importScripts('js/sw-db.js');
importScripts('js/sw-utils.js');

const STATIC_CACHE    = 'static-v1';
const DYNAMIC_CACHE   = 'dynamic-v1';
const INMUTABLE_CACHE = 'inmutable-v1';

const APP_SHELL = [/* 
    '/', */
    'index.php',
    'enterprise.php',
    'css/bundle.css',
    'css/estilos.css',
    'css/styles.css',
    'js/index.js',
    'js/sw-utils.js',
    'js/sw-db.js',
    'img/favicon.ico',
    'img/icono.jpg'
]

const APP_SHELL_INMUTABLE = [
    'css/material.min.css',
    'js/libs/material.min.js',
    'https://fonts.googleapis.com/icon?family=Material+Icons',/* 
    'https://aqueous-stream-14034.herokuapp.com/api/enterprises', */
    'https://cdnjs.cloudflare.com/ajax/libs/pouchdb/7.0.0/pouchdb.min.js'
];

self.addEventListener('install', e => {
    const cachesProm  = caches.open(STATIC_CACHE).then(cache => cache.addAll(APP_SHELL));
    const cachesProm2 = caches.open(INMUTABLE_CACHE).then(cache => cache.addAll(APP_SHELL_INMUTABLE));
    e.waitUntil(Promise.all([cachesProm, cachesProm2]));
});

self.addEventListener('fetch', e => {
    // console.log(e.request.url)
    let respuesta;
    if(e.request.url.includes('/new-enterprise.php')) {
        // respuesta = manejo
        console.log('procesando nueva empresa...')
        respuesta = manejoEmpresa(DYNAMIC_CACHE, e.request);
    }
    // INTERVINIENDO LAS PETICIONES
    // if(e.request.url.includes('uploadFotos.php')) { respuesta = manejoFotos(DYNAMIC_CACHE, e.request) } 
    else 
    {
        // ESTRATEGIA DE CACHE:
        // NETWORK FIRST
        respuesta = fetch(e.request)
        .then( newFile => {
            return actualizaCacheDinamico(DYNAMIC_CACHE, e.request, newFile)
        })
        .catch(function() {
            return caches.match(e.request);
        })



        /* respuesta = caches.match(e.request).then(file => {
            if (file) return file;
            else {
                return fetch(e.request).then(newFile => {
                    return actualizaCacheDinamico(DYNAMIC_CACHE, e.request, newFile)
                });
            }
        }); */
    }

    e.respondWith(respuesta);
});

self.addEventListener('sync', e => {

    console.log('SW: Sync');

    if (e.tag === 'nueva-foto') {
        console.log('entre al posteo');
        // postear a BD cuando hay conexión
        const respuesta = postearFotos();
        e.waitUntil(respuesta);
    }

    if(e.tag === 'nueva-empresa') {
        console.log('posteando empresa');
        const respuesta = postearEmpresa();
        e.waitUntil(respuesta);
    }

});

