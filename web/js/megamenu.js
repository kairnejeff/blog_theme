//link
$(document).ready(function(e) { // On attend que la page soit chargée
    $('.obflink').click(function(e) { // On écoute le clic sur un lien obfusqué
        var t = $(this);
        var link = atob(t.data('o')) // On décode l'url
        window.location.href = link // On renvoi l'utilisateur vers la page
    })
})

function dekstopToMobile() {
    $("*[id^='_desktop_']").each(function(t, e) {
        $("#" + e.id.replace("_desktop_", "_mobile_")).append($(e).children())
    })

}

function mobileToDekstop() {
    $("*[id^='_mobile_']").each(function(t, e) {
        $("#" + e.id.replace("_mobile_", "_desktop_")).append($(e).children())
    })
}

function changeMobileDekstop() {
    var width = $(window).width()
    if (width < 768) {
        dekstopToMobile()
    } else {
        mobileToDekstop()
    }
}

$(document).ready(function(e) {
    changeMobileDekstop()
    $(window).resize(changeMobileDekstop)
})