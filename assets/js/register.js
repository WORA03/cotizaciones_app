document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;

    fetch('/cotizaciones_app/controllers/authController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'action': 'register',
            'username': username,
            'password': password,
            'email': email
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.id) {
            // Registro exitoso
            window.location.href = '/cotizaciones_app/views/auth/login.php';
        } else {
            // Mostrar mensaje de error
            alert('Registration failed: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
