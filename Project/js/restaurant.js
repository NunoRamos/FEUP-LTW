
$(function() {
    $('#showRepliesLink').click(function() {
        $("#showRepliesLink").hide();
        $("#showRepliesLink").next().show();
    });
});

$(function() {
    $('#hideRepliesLink').click(function() {
        $("#showRepliesLink").show();
        $("#showRepliesLink").next().hide();
    });
});