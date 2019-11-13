
function getJugadoresJson() {
    var http = new XMLHttpRequest();
    http.open('GET', 'http://localhost:3000/api/getjugadores', true);
    http.send();
    http.addEventListener('readystatechange', function () {
        if (http.readyState === 4 && http.status === 200) {
            pintaTabla(JSON.parse(http.responseText));
        }
    });

}

function cargaInicio() {
    
}