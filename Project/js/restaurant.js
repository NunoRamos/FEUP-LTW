
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

$(function() {
    $('.deleteReview').click(function() {
        console.log('boas');
        window.location = 'actions/deleteReviewsReplies.php';
        $.ajax({
            type: 'POST',
            url: 'actions/deleteReviewsReplies.php',
            data: { isAReview: 1}
        });
    });
});
