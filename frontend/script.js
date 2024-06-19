

$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission          
        // Collect form data
        var formData = {
            day: $("#day").val(),
            hour: $("#hour").val(),
            date:$("#dt").val(),
            fname:$("#fname").val(),
            femail:$("#femail").val()
         
        };

        // Send AJAX request using $.ajax
        $.ajax({
            url: 'student-list.php', // PHP script to process form data
            type: 'POST',
            data: formData,
            dataType: 'html',
            success: function(response) {
                // Display the response in the #response div
                $('#response').html(response);
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
              
                $('#response').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    });

});

$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission          
        // Collect form data
        var formData2 = {
            day: $("#day").val(),
            hour: $("#hour").val(),
            date:$("#dt").val(),
            fname:$("#fname").val(),
            femail:$("#femail").val()
         
        };

        // Send AJAX request using $.ajax
        $.ajax({
            url: 'student-list2.php', // PHP script to process form data
            type: 'POST',
            data: formData2,
            dataType: 'html',
            success: function(response) {
                // Display the response in the #response div
                $('#response2').html(response);
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the request
              
                $('#response2').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    });

});




$(document).ready(function() {
    $("#newform").submit(function(event) {
        // Prevent the default form submission
        //event.preventDefault();
        // Collect form data
        var newData = {
            date: $("#date").val()
        };

        console.log("Form data to be sent:", newData); // Debugging: Log form data

        // Send AJAX request using $.ajax
        $.ajax({
            url: 'date-transfer.php', // PHP script to process form data
            type: 'POST',
            data: newData,
            dataType: 'html',
            success: function(response) {
                console.log("Response received:", response); // Debugging: Log response
                // Display the response in the #newresponse div
                $('#newresponse').html(response);
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", error); // Debugging: Log error
                // Handle any errors that occurred during the request
                $('#newresponse').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    });
});






// $(document).ready(function() {
//     $("#absentForm").submit(function(event) {
//         // Prevent the default form submission
//        event.preventDefault();
//         // Collect form data
//         var abData = {
//             Dataab: $("#atdabsent").val()
//         };

//         console.log("Form data to be sent:", abData); // Debugging: Log form data

//         // Send AJAX request using $.ajax
//         $.ajax({
//             url: 'student-list.php', // PHP script to process form data
//             method: 'POST',
//             data: abData,
//             dataType: 'html',
//             success: function(newresponse) {
//                 console.log("newresponse received:", newresponse); // Debugging: Log newresponse
//                 // Display the response in the #abst div
//                 $('#abst').html(newresponse);
//             },
//             error: function(xhr, status, error) {
//                 console.log("AJAX error:", error); // Debugging: Log error
//                 // Handle any errors that occurred during the request
//                 $('#abst').html('<p>An error occurred: ' + error + '</p>');
//             }
//         });
//     });
// });










