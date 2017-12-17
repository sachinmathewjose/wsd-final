$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fname: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your First Name'
                    }
                }
            },
            lname: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your Last Name'
                    }
                }
            },
            gender: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your gender'
                    }
                }
            },
            birthday: {
                validators: {
                    stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please enter your Birthday'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            phone: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 10,
                    },
                    notEmpty: {
                            message: 'Please enter your Contact No.'
                    }
                }
            },
        },
    })
    $('#pswd' +
        '_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            old_password: {
                validators: {
                    stringLength: {
                        min: 6,
                    },
                    notEmpty: {
                        message: 'Please enter your old Password'
                    }
                }
            },
            password: {
                validators: {
                    stringLength: {
                        min: 6,
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
            confirm_password: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        min: 6,
                    },
                    notEmpty: {
                        message: 'Please confirm your Password'
                    }
                }
            },
        }
    })
});

function canceledit() {
    window.location = "index.php?page=accounts&action=displaytasks";
};
function deleteaccount() {
    window.location = "index.php?page=accounts&action=delete";
};
