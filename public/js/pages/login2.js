'use strict';
$(window).on("load",function() {
    $('.preloader img').fadeOut();
    $('.preloader').fadeOut(1000);
});
$(document).ready(function() {

        new WOW().init();
        $('#login_validator').bootstrapValidator({
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Se requiere la dirección de correo electrónico'
                        },
                        regexp: {
                            regexp: /^\S+@\S{1,}\.\S{1,}$/,
                            message: 'La entrada no es una dirección de correo electrónico válida'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Por favor ingrese una contraseña'
                        }
                    }
                }
            }
        });
    $('#register_valid').bootstrapValidator({
        fields: {
            UserName: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es obligatorio y no puede estar vacío'
                    }
                }
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su nombre por favor'
                    }
                }
            },
            sur_name: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su apellido por favor'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su ciudad por favor'
                    }
                }
            }, 
            address: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su dirección por favor'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su teléfono por favor'
                    }
                }
            },            
            email: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere la dirección de correo electrónico'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'La entrada no es una dirección de correo electrónico válida'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese una contraseña'
                    }
                }
            },
            confirmpassword: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña de confirmación es obligatoria y no puede estar vacía'
                    },
                    identical: {
                        field: 'contraseña',
                        message: 'Ingrese la misma contraseña que la anterior'
                    }
                }
            }
        }
    });
        $('#login_validator1').bootstrapValidator({
            fields: {
                email_modal: {
                    validators: {
                        notEmpty: {
                            message: 'ingrese su correo electrónico válido'
                        },
                        regexp: {
                            regexp: /^\S+@\S{1,}\.\S{1,}$/,
                            message: 'La entrada no es una dirección de correo electrónico válida'
                        }
                    }
                }
            }
        });
        validate();
        function validate() {
            if ($('.email_forgot').val() > 0) {
                $(".submit_email").prop("disabled", false);
            } else {
                $(".submit_email").prop("disabled", true);
            }
        }
    $("button[type='reset']").on("click",function () {
        $("#register_valid").bootstrapValidator("resetForm",true);
    })
});
