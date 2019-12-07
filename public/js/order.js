$().ready(function() { 
    // Validate order form on keyup and submit
    $("#addForm, #editForm").validate({
        rules: {
            user: {
                required: true
            },
            product: {
                required: true
            },
            quantity: {
                required: true,
                digits: true
            }
        },
        messages: {
            user: {
                required: "Please Select a user"
            },
            product: {
                required: "Please enter a product"
            },
            quantity: {
                required: "Please enter quantity",
                digits: "Please enter only positive digits"
            }
        }
    });
});