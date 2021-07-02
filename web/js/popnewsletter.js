$(document).ready(function() {
    var cookie = localStorage.getItem("newsletter_close");
    if (cookie == undefined || cookie == null) {
        cookie = 0;
    }


    if (((new Date()).getTime() - cookie) / (1000 * 60 * 60 * 24) > cookie_expire) {
        $("#list-builder").delay(delay).fadeIn("fast", () => {
            $("#popup-box").fadeIn("fast", () => {});
        });

        $('#popup-box-content form').on('submit', function() {
            if (typeof psemailsubscription_subscription === 'undefined') {
                return true;
            }
            $('.block_newsletter_alert').remove();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: psemailsubscription_subscription,
                cache: false,
                data: $(this).serialize(),
                success: function(data) {
                    if (data.nw_error) {
                        $('#popup-box-content form .description').prepend('<p class="alert alert-danger block_newsletter_alert">' + data.msg + '</p>');
                        $('#popupimage').css('height', $('#popup-box').innerHeight());
                    } else {
                        $('#popup-box-content form .description').prepend('<p class="alert alert-success block_newsletter_alert">' + data.msg + '</p>');
                        $('#popupimage').css('height', $('#popup-box').innerHeight());
                        localStorage.setItem("newsletter_close", (new Date()).getTime());
                    }

                },
                error: function(err) {
                    console.log(err);
                }
            });
            return false;
        });

        $("#popup-close").click(() => {
            $("#list-builder, #popup-box").hide();
            localStorage.setItem("newsletter_close", (new Date()).getTime());
        });
    }
    $('#popupimage').css('height', $('#popup-box').innerHeight());

});