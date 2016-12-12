

$(function() {
    $('.showRepliesLink').click(function() {
        $(this).hide();
        $(this).next().show();
    });
});

$(function() {
    $('.hideRepliesLink').click(function() {
        $(".showRepliesLink").show();
        $(this).parent().hide();
    });
});
/*
$(function() {
    $('.deleteReview').click(function() {

        /*$.ajax({
            url: "actions/deleteReviews.php",
            type: 'POST',
            data: { isAReview: 1}
        }).done(function () {
            window.location = "actions/deleteReviews.php";
        }).fail(function () {
            console.log('error');
        });

        window.location = 'actions/deleteReviews.php';
    });
});*/
