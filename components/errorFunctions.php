<?php 

    function showError ($error) {
        switch ($error) {
            case "emptyField": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('Empty Field Detected', 'error', 3000);
                                    </script>";
                            break;
            
            case "invalidName": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('Name Error', 'error', 3000);
                                      </script>";
                            break;
            
            case "invalidEmail": echo "<script>
                                            toastr.setPosition('top-center');
                                            toastr.message('Invalid Email', 'error', 3000);
                                        </script>";
                            break;
            
            case "incorrectCredential": echo "<script>
                                                toastr.setPosition('top-center');
                                                toastr.message('Incorrect credential', 'error', 3000);
                                              </script>";
                            break;
            
            case "loginNeeded": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('Login is required to view page', 'error', 3000);
                                      </script>";
                            break;

            case "passwordMatchError": echo "<script>
                                                toastr.setPosition('top-center');
                                                toastr.message('Password does not match', 'error', 3000);
                                            </script>";
                            break;

            case "passwordLengthError": echo "<script>
                                            toastr.setPosition('top-center');
                                            toastr.message('Password is too short', 'error', 3000);
                                        </script>";
                            break;
            
            case "sqlfail": echo "<script>
                                    toastr.setPosition('top-center');
                                    toastr.message('Password is too short', 'error', 3000);
                                  </script>";
                            break;

            default: echo "<script>
                                toastr.setPosition('top-center');
                                toastr.message('Unknown Error', 'error', 3000);
                            </script>";
                            break;
        }
    }

    function successMessage ($success) {
        switch ($success) {

            case "sendEmail": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('Message Sent', 'success', 3000);
                                    </script>";
                            break;
            
            case "registered": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('You are registered', 'success', 3000);
                                     </script>";
                            break;
            
            case "loggedIn": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('You are logged in', 'success', 3000);
                                   </script>";
                            break;
            
            case "loggedout": echo "<script>
                                        toastr.setPosition('top-center');
                                        toastr.message('You are logged out', 'success', 3000);
                                    </script>";
                            break;
            
            case "deleted": echo "<script>
                                    toastr.setPosition('top-center');
                                    toastr.message('Account Removed', 'success', 3000);
                                  </script>";
                            break;

            default: echo "<script>
                                toastr.setPosition('top-center');
                                toastr.message('Unknown Error', 'error', 3000);
                            </script>";
                            break;
            
        }
    }

?>