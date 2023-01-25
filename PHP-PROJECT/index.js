$(".location").attr('disabled', 'disabled');
$(".type").attr('disabled', 'disabled');
$('.lang').change(function() {
    $(".location").attr({ disabled: false });

});
$('.location').change(function() {
    $(".type").attr({ disabled: false });

});



// $('.type').on('change', function() {
//     var chosenIndex = $('.type:checked', '#myForm').val();
//     console.log(chosenIndex);

//     if (chosenIndex == 1) { programs
//         $("#n1").html("Accounting and Management Technology - on-campus (LCA71)");
//         $("#n2").html("Business Management - on-campus (LCA70)");
//         $("#n3").html("Residential Real Estate Broker - on-campus (EEC24)");
//         $("#n4").html("video Game 3D Modeling - online (NTL0Y)");
//     } else if (chosenIndex == 2) {
//         $("#n1").html("Hairdressing - on-campus (A5745)");
//         $("#n2").html("Aesthetics - on-campus (A5839)");
//         $("#n3").remove();
//         $("#n4").remove();

//     } else if (chosenIndex == 3) {
//         $("#n1").html("Business Management - on-campus (410.D0) ");
//         $("#n2").html("Computer Science Technology – Network and Security Management - on-campus (profil 420.BR) ");
//         $("#n3").html("Computer Science Technology – Video Game Programming - on-campus (profil 420.BX)");
//         $("#n4").html("Hotel Management Technique - on-campus (430.A0)");

//     } else if (chosenIndex == 4) {
//         $("#n1").html("There is no programs for this option. Please select another option");
//         $("#n2").remove();
//         $("#n3").remove();
//         $("#n4").remove();

//     } else {
//         $("#n1").remove();
//         $("#n2").remove();
//         $("#n3").remove();
//         $("#n4").remove();

//     }
// });

// $('.type').on('change', function() {

//  = $('.type:checked', '#myForm').val();
var val1 = document.querySelector('input[name="programm"]:checked').value;
getState(val1);

function getState(val) {


    $.ajax({
        type: "POST",
        url: "getState.php",
        data: "program_id =" + val,
        success: function(data) {
            $("#proOptions").html(data);

        }

    });
}