let url = 'http://localhost:3000/api/v1/users';
let token = localStorage.getItem('token');

fetch(url, {
    "GET",
    headers: {
        "Authorization": `Bearer ${token}` 
    }
}).then(res => res.json().then(console.log)).catch(console.error); 

if (token !== null) {
    fetch(url, {
        method,
        headers: {
            "Authorization": `Bearer ${token}`
        }
    }).then(res => res.json().then(console.log)).catch(console.error); 
} else {
    window.location.href = '../../index.html';
}