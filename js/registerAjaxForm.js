document.getElementById('registerBtn').addEventListener('click', (e) => {
    e.preventDefault();
    var registerForm = document.getElementById('register');
    var form_data = new FormData();

    for(var count=0; count < registerForm.length; count++) {
        form_data.append(registerForm[count].name, registerForm[count].value);
        
    }

    //Connect to server
    var ajax_request = new XMLHttpRequest();

    ajax_request.open('POST', '../includes/userValidation.php');
    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function() {
        let response = ajax_request.responseText;

        if(ajax_request.readyState == 4 && ajax_request.status == 200) {
            console.log(response);
            messages(response);
        }
    }
});


function messages(message) {
    switch(message) {
        case "passwordLength": toastr.setPosition('top-center');
                               toastr.message("Password should be greater than 8", 'error', 5000);
                               break;
        
        case "passwordMatchError":  toastr.setPosition('top-center');
                                    toastr.message("Password does not match", 'error', 3000);
                                    break;

        case "invalidName": toastr.setPosition('top-center');
                            toastr.message("Invalid Name", 'error', 3000);
                            break;

        case "emptyField":  toastr.setPosition('top-center');
                            toastr.message("Empty Field detected", 'error', 3000);
                            break;

        case "invalidEmail": toastr.setPosition('top-center');
                             toastr.message("Invalid Email", 'error', 3000);
                             break;
        
        case "registered": location.assign("../html/login.php?register=success");
                           break;
    }
}