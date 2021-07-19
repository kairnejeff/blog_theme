//link
$(document).ready(function(e) { // On attend que la page soit chargée
    $('.obflink').click(function(e) { // On écoute le clic sur un lien obfusqué
        var t = $(this);
        var link = atob(t.data('o')) // On décode l'url
        window.location.href = link // On renvoi l'utilisateur vers la page
    })
})