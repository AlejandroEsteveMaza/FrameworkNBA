/* 
function getJugadoresJson() {
    var http = new XMLHttpRequest();
    http.open('GET', 'http://localhost:3000/api/getjugadores', true);
    http.send();
     http.addEventListener('readystatechange', function () {
        if (http.readyState === 4 && http.status === 200) {
            //pintaTabla(JSON.parse(http.responseText));
        }
    }); 

} */

function login() {

    var data = new FormData();
    data.append('user', document.getElementById('nomUsuario').value);
    data.append('password', document.getElementById('password').value);

    var http = new XMLHttpRequest();
    http.open('POST', 'http://localhost:3000/api/validateuser', true);
    http.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded");
    //queryString= "user="+data.user+"&password="+data.password;

    http.send(data);
    http.addEventListener('readystatechange', function () {
        if (http.readyState === 4 && http.status === 200) {
            console.log("AAAA");
        }
    });
}