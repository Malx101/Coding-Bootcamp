function edit_data() {
    var form_element = document.getElementById('editForm');
    var form_data = new FormData();

    //adding form information to the FormData instance 
    for (var count=0; count < form_element.length; count++) {
        form_data.append(form_element[count].name, form_element[count].value);
    }
    var newUsername = form_data.get('username');
    
    //Connect to server
    var ajax_request = new XMLHttpRequest();

    //Sets the request method, request URL.
    ajax_request.open('POST', '../includes/editValidation.php');

    //Initiates the request
    ajax_request.send(form_data);

    //This is used to perform action based on a response
    ajax_request.onreadystatechange = function() {
        let response = ajax_request.responseText;

        //Checking if the request is finished and response is ready
        if(ajax_request.readyState == 4 && ajax_request.status == 200) {
            messages(response, newUsername);
        }
    }
}

//Function to display message based on the text passed to it
function messages(message, username) {
    switch(message) {
        case "emptyField":  toastr.setPosition('top-center');
                            toastr.message("Empty Field detected", 'error', 3000);
                            break;

        case "invalidEmail": toastr.setPosition('top-center');
                             toastr.message("Invalid Email", 'error', 3000);
                             break;
        
        case "editSuccessful": toastr.setPosition('top-center');
                               toastr.message("Update Successful", 'success', 3000);
                               document.getElementById("header_username").innerHTML = `${username} Details`;
                               break;
    }
}


