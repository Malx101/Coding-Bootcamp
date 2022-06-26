//Load the data once the page is loaded
function loadData() {
    listing_display = document.querySelector('.courses__listing');
    var ajax_request = new XMLHttpRequest();
    ajax_request.open("GET", "../includes/coursesListing.php");
    ajax_request.send();

    ajax_request.onreadystatechange = function() {
        if(ajax_request.readyState==4 && ajax_request.status==200) {
            listing_display.innerHTML = ajax_request.responseText;
        }
    }
}


//Onkeyup function
function searchCourse(search_value) {
    listing_display = document.querySelector('.courses__listing');

    var ajax_request = new XMLHttpRequest();
    ajax_request.open("GET", "../includes/coursesListing.php?q="+search_value);
    ajax_request.send();

    ajax_request.onreadystatechange = function() {
        if(ajax_request.readyState==4 && ajax_request.status==200) {
            listing_display.innerHTML = ajax_request.responseText;
        }
    }
}
