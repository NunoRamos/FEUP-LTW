
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