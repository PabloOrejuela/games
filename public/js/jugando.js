let btnFavorito = document.getElementById("btn-favorito")


const activaFavorito = (id) => {
    $.ajax({
        url: 'activaFavorito',
        method: 'GET',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(res) { 
            setTimeout(function(){
                location.replace('jugando');
            }, 50);
        }
    });
}