let form = document.getElementById('form');
let pseudo = document.getElementById('pseudo');
let password = document.getElementById('password');

let url = 'http://localhost:3000/api/v1/users';
let token = localStorage.getItem('token');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    fetch(url, {
        method: 'POST',
        body: JSON.stringify({
            pseudo: pseudo.value,
            password: password.value
        }),
    }).then(res => res.json()
    .then(
        
    ))
    .catch(console.error);     
});



fetch(url, {
    method: 'GET',
}).then(res => res.json()
.then(console.log))
.catch(console.error); 

if (token) {
    fetch(url, {
        method: 'POST',
        headers: {
            "Authorization": `Bearer ${token}`
        }
    }).then(res => res.json()
    .then(console.log))
    .catch(console.error); 


} else {
    window.location.href = '../../index.html';
}