fetch('http://localhost:8000/api/clients', {
    method: 'GET',
})
.then(response => response.json())
.then(data => {
    console.log(data);
})

let token = document.querySelector('token');

if (token !== null) {
    
} else {
    redirect('../../index.html');
}