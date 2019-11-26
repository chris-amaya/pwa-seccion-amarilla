const deferredPrompt;

if('serviceWorker' in navigator)
{
    navigator.serviceWorker
    .register('/sw.js')
    .then(() => {
        console.log("service worker registered");
    })
}

window.addEventListener('beforeinstallprompt', (event) => {
    console.log("beforeintallprompt fired");
    event.preventDefault();
    deferredPrompt = event;
    return false;
});

const promise = new Promise( (resolve, reject) => {
    setTimeout( () => {
        console.log("This is executed once the timer is done");
    }, 3000);
});

promise.then()