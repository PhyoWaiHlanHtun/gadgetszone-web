$(document).on("click", "#pay-money a", function (event) {
    event.preventDefault();
    let a = $(event.target).closest("a");
    let amount = a.data("amount");
    $("#pay-amount").val(amount);
    $("#payform #pay_amount").val(amount);
    $("#pay-money a").removeClass("active");
    $(this).addClass("active");
});

$(document).on("keyup", "#pay-amount", function (event) {
    event.preventDefault();
    $("#pay-money a").removeClass("active");
});

$(document).on("click", "#pay-type a", function (event) {
    event.preventDefault();
    let a = $(event.target).closest("a");
    let id = a.data("id");
    // console.log(id);
    let amount = $("#pay-amount").val()
        ? $("#pay-amount").val()
        : $("#payform #pay_amount").val();
    // console.log(amount);
    $("#payform #pay_amount").val(amount);
    if (!amount) {
        alert("Error ! Please add payment amount first.");
        return;
    }
    $("#payform #pay_type").val(id);
    $("#pay-type a").removeClass("active");
    $(this).addClass("active");
    $("#payform").submit();
});
