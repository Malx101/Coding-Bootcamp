document.getElementById('submitcontactFormBtn').addEventListener('click', (e) => {
    e.preventDefault();
    var form_element = document.getElementById("contactForm");
    var form_data = new FormData();

    for(let count=0; count < form_element.length; count++) {
        form_data.append(form_element[count].name, form_element[count].value);
    }

    //Connection 
    var ajax_request = new XMLHttpRequest();

    ajax_request.open("POST", "../includes/contactValidation.php");
    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function() {
        let response = ajax_request.responseText;

        if(ajax_request.readyState==4 && ajax_request.status==200) {
            console.log(response);
            messages(response, form_element);
        }
    }

});

function messages(message, myForm) {
    switch(message) {

        case "invalidName": toastr.setPosition('top-center');
                            toastr.message("Invalid Name", 'error', 3000);
                            break;

        case "emptyField":  toastr.setPosition('top-center');
                            toastr.message("Empty Field detected", 'error', 3000);
                            break;

        case "invalidEmail": toastr.setPosition('top-center');
                             toastr.message("Invalid Email", 'error', 3000);
                             break;
        
        case "success": myForm.reset();
                        toastr.setPosition('top-center');
                        toastr.message("Message Sent", 'success', 3000);
                        break;
    }
}