function filtro(ev){
    ev.preventDefault();
    const nombre = document.getElementById('nombreEquipo').value;
    window.location.href = '/equipos/filtro/' + encodeURIComponent(nombre);
}