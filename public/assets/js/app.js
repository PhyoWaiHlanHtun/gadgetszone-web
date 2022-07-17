$(document).on("click", "#copyReferral", function (event) {
    event.preventDefault();
    var code = document.getElementById("referralCode").innerText;
    copyfunc(code, "referral");
});

$(document).on("click", "#copyAccount", function (event) {
    event.preventDefault();
    var code = document.getElementById("accountCode").innerText;
    copyfunc(code, "account");
});

// Invite Copy Code
$(document).on("click", "#inviteReferral", function (event) {
    event.preventDefault();
    var code = document.getElementById("referralCode").value;

    if (code == 0) {
        $("#inviteModalAlert").modal("show");
    } else {
        copyfunc(code, "referral");
    }
});

function copyfunc(code, type) {
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = code;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    // alert("success");
    let text = type == "referral" ? `Your Referral Code '${code}'` : `${code}`;
    $("#copySuccessModal #copyText").text(text);
    $("#copySuccessModal").modal("show");
}

$(document).on("click", "#alertModal .btn-close", function (event) {
    event.preventDefault();
    $("#alertModal").removeClass("show").addClass("d-none");
});
