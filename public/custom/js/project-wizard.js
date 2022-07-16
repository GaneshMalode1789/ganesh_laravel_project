"use strict";

// Class definition
var KTWizard1 = function() {
    // Base elements

    var formEl;
    var validator;
    var wizard;

    // Private functions
    var initWizard = function() {
        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v1', {
            startStep: 1, // initial active step number
            clickableSteps: true // allow step clicking
        });


        // Validation before going to next page
        wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop(); // don't go to the next step
            }

        });

        wizard.on('beforePrev', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop(); // don't go to the next step
            }
        });



        // Change event
        wizard.on('change', function(wizard) {

            setTimeout(function() {
                KTUtil.scrollTop();
            }, 500);

        });
    }

    $(function() {
        $("#myform").validate();
        $("[name=field]").each(function() {
            $(this).rules("add", {
                required: true,
                email: true,
                messages: {
                    required: "Specify a valid email"
                }
            });
        });
    });
    var initValidation = function() {
        validator = formEl.validate({
            ignore: ":hidden",
            // Display error
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();


                swal.fire({
                    "title": "",
                    "text": "Please fill all required fields...",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });
            },
        });

    }

    return {
        // public functions
        init: function() {
            formEl = $('#kt_form');
            initWizard();
            initValidation();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard1.init();

});
