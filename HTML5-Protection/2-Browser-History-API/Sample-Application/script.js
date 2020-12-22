$('document').ready(function () {

    $('.nav-link').on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');

        // Getting Content
        getContent(href, true);

        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    $('#back').on('click', function (e) {
        window.history.back();
    });

    $('#forward').on('click', function (e) {
        window.history.forward();
    });

    $('#replace').on('click', function (e) {
        var state = {};
        var title = "HACKED!";
        var url   = "hacked.html";
        //var url   = "//google.com";

        history.replaceState(state, title, url);
    });

});

function getContent(url, addEntry) {
    $.get(url)
        .done(function (data) {

            // Updating Content on Page
            $('#content').html(data);

            if (addEntry == true) {
                // Add History Entry using pushState
                history.pushState(null, null, url);
            }

        });
}

// Adding popstate event listener to handle browser back button  
window.addEventListener("popstate", function (e) {

    // Get State value using e.state
    getContent(location.pathname, false);
    console.log("Popstate has been fired");
    console.log("history changed to: " + document.location.href);
});