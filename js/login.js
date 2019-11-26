const formLogin = document.getElementById('formLogin');
formLogin.addEventListener('keydown', (event) => {
    /* event.preventDefault(); */
    console.log(event.keyCode);
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        login();
    }

});

document.addEventListener('click', (e) => 
{
    console.log(e.target);
    if(e.target.parentElement.id == 'login'){ e.preventDefault(); login() }
});

function login(e)
{
    const url = 'login.php';
    var data = {
        'user': document.getElementById('usuario').value,
        'password': document.getElementById('password').value
    };

    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {'Content-Type': 'application/json'} 
    })
    .then(resp => resp.json())
    .then(data => {
        console.log(data);
        if(data.resp == 'ok')
        {
            window.location.href = 'panel.php';
        } else if(data.error) {
            mostrarToast(data.error);
        }
    })
    .catch(err => console.error('error', err));    
}