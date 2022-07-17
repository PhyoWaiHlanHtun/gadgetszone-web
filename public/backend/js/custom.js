// For Modal Box Delete btn
$(document).on("click", "#delete-btn", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let type = link.data("type");
    let id = link.data("id");
    let route = `/backend/${type}/${id}`;
    // console.log(route);
    // return;
    $("#modal_del_form").attr("action", route);
});

// For Modal Box Delete btn
$(document).on("click", "#delete-customer-tree", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let route = link.data("route");
    // console.log(route);
    // return;
    $("#modal_del_tree").attr("action", route);
});

// For Modal Box Activae or Deactivate btn
$(document).on("click", "#activate-btn", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let type = link.data("type");
    let id = link.data("id");
    let status = link.data("status") ? "deactivate" : "activate";
    let locale = $("#locale").val();
    if (locale == "ch") {
        let status_lang = link.data("status") == 1 ? "停用" : "启用";
        $("#activeModal #text").text(`您确定要 ${status_lang} 这个用户 ？`);
    } else {
        let status_lang = link.data("status") == 1 ? "deactivate" : "activate";
        $("#activeModal #text").text(
            `Are you sure you want to ${status_lang} this user ?`
        );
    }

    let route = `/backend/${type}/${status}/${id}`;
    // $("#activeModal #text").text(
    //     `Are you sure you want to ${status} this user ?`
    // );
    $("#modal_activate_form").attr("action", route);
});

// For Modal Box Top Up Accept or Reject btn
$(document).on("click", "#topup-btn", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let type = link.data("type");
    let id = link.data("id");
    let locale = $("#locale").val();
    if (locale == "ch") {
        let status_lang = link.data("status") == 1 ? "接受" : "拒绝";
        $("#topupModal #text").text(`您确定要 ${status_lang} 此提款吗 ？`);
    } else {
        let status_lang = link.data("status") == 1 ? "accept" : "reject";
        $("#topupModal #text").text(
            `Are you sure you want to ${status_lang} this top-up ?`
        );
    }
    let status = link.data("status") == 1 ? "accept" : "reject";
    let route = `/backend/${type}/${status}/${id}`;
    $("#modal_topup_form").attr("action", route);
});

// For Modal Box Investment Accept or Reject btn
$(document).on("click", "#invest-btn", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let type = link.data("type");
    let id = link.data("id");
    let status = link.data("status") == 1 ? "accept" : "reject";
    let route = `/backend/${type}/${status}/${id}`;
    console.log(route);
    $("#investModal #text").text(
        `Are you sure you want to ${status} this Investment ?`
    );
    $("#modal_invest_form").attr("action", route);
});

// For Modal Box Withdrawl Accept or Reject btn
$(document).on("click", "#withdrawal-btn", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let type = link.data("type");
    let id = link.data("id");
    let locale = $("#locale").val();
    if (locale == "ch") {
        let status_lang = link.data("status") == 1 ? "接受" : "拒绝";
        $("#withdrawlModal #text").text(`您确定要 ${status_lang} 此提款吗 ？`);
    } else {
        let status_lang = link.data("status") == 1 ? "accept" : "reject";
        $("#withdrawlModal #text").text(
            `Are you sure you want to ${status_lang} this withdrawal ?`
        );
    }
    let status = link.data("status") == 1 ? "accept" : "reject";
    let route = `/backend/${type}/${status}/${id}`;
    $("#modal_withdrawl_form").attr("action", route);
});

// For Modal Box Identity Accept or Reject btn
$(document).on("click", "#identity-btn", function (event) {
    event.preventDefault();
    let link = $(event.target).closest("a");
    let type = link.data("type");
    let id = link.data("id");
    let locale = $("#locale").val();
    if (locale == "ch") {
        let status_lang = link.data("status") == 1 ? "接受" : "拒绝";
        $("#identityModal #text").text(`您确定要 ${status_lang} 用户身份证 ？`);
    } else {
        let status_lang = link.data("status") == 1 ? "accept" : "reject";
        $("#identityModal #text").text(
            `Are you sure you want to ${status_lang} this user id card ?`
        );
    }
    let status = link.data("status") == 1 ? "accept" : "reject";
    let route = `/backend/${type}/${status}/${id}`;
    $("#modal_identity_form").attr("action", route);
});

// let current_effect = 'bounce';

// document.getElementsByTagName("body")[0].setAttribute("onload", "waitMe(current_effect)");
// let beforeLoad = (new Date()).getTime();

// function getPageLoadTime(){
//     let afterLoad = (new Date()).getTime();
//     return (afterLoad - beforeLoad) / 1000;
// }

// function waitMe(effect){
//     $('body').waitMe({
//         effect: effect,
//         text: '',
//         bg: 'rgba(255,255,255,0.7)',
//         color: ['#FFF90C','#2DFF09','#FF1407'],
//         maxSize: '',
//         waitTime: getPageLoadTime(),
//         source: '',
//         textPos: 'vertical',
//         fontSize: '',
//         onClose: function() {}
//     });
// }

// waitMe();

// $("form").on("submit",function () {
//     waitMe(current_effect);
// });

// window.onload = () => {

//     waitMe(current_effect);

// };
