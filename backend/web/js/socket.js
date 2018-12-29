$(document).ready(function () {
    $('#addSocket').on('click', function () {
        let parent = $(this).parent().parent().prev();
        let cln = parent.clone();
        cln.insertAfter(parent)
    });

    $('body').on('click', '.deleteSocket', function () {
        let parent = $(this).parent().parent();
        if (!parent.prev().hasClass('finally') || !parent.next().hasClass('finally')) {
            parent.remove();
        }
    })
});