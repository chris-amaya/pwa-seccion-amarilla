const dialog            = document.querySelector('dialog');
var   snackbarContainer = document.querySelector('#demo-toast-example');
var   dataToast         = {message: null}

function mostrarToast(message)
{
    dataToast.message = message;
    snackbarContainer.MaterialSnackbar.showSnackbar(dataToast);
}