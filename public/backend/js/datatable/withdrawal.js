let type = $("#withdrawl_type").val();
let locale = $("#locale").val();

$.ajax({
    url: `/api/withdrawls/${$("#withdrawl_type").val()}`,
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            // console.log(data);
            result.push([
                index++,
                data.user.username,
                data.bank.name,
                data.amount,
                data.account,
                data.type,
                new Date(data.created_at),
                {
                    id: data.id,
                    status: data.status,
                    identity: data.identity,
                },
            ]);
        }
    }

    document.getElementById("table-gridjs") &&
        new gridjs.Grid({
            columns: [
                {
                    name: locale == "ch" ? "不。" : "No.",
                    formatter: function (e) {
                        return gridjs.html(
                            '<span class="fw-semibold">' + e + "</span>"
                        );
                    },
                },
                locale == "ch" ? "用户名" : "Username",
                locale == "ch" ? "付款方式" : "Payment Type",
                locale == "ch" ? "数量" : "Amount",
                locale == "ch" ? "用户提现地址" : "User Withdrawal Address",
                {
                    name: locale == "ch" ? "提款" : "Withdrawal From",
                    formatter: function (e) {
                        if (e == 2) {
                            var type = "Level Commission";
                        } else if (e == 3) {
                            var type = "Capital Amount";
                        } else if (e == 4) {
                            var type = "Investment Amount";
                        } else {
                            var type = "Click Commission";
                        }
                        return gridjs.html(`${type}`);
                    },
                },
                {
                    name: locale == "ch" ? "日期" : "Date",
                    formatter: function (e) {
                        return gridjs.html(
                            `${e.getDate()}/${
                                e.getMonth() + 1
                            }/${e.getFullYear()}`
                        );
                    },
                },
                {
                    name:
                        $("#withdrawl_type").val() == "pending"
                            ? locale == "ch"
                                ? "地位"
                                : "Status"
                            : locale == "ch"
                            ? "行动"
                            : "Actions",
                    formatter: function (e) {
                        let pending = locale == "ch" ? "待办的" : "Pending";
                        let view = locale == "ch" ? "看法" : "View";
                        let accept = locale == "ch" ? "接受" : "Accept";
                        let reject = locale == "ch" ? "拒绝" : "Reject";

                        let view_btn = e.identity
                            ? `<a href='/withdrawal/identity/${e.identity.id}' class='btn btn-info btn-sm ml-3 my-2'> ${view} </a>`
                            : "";
                        if (type == "pending") {
                            return gridjs.html(`
                            
                                ${view_btn}
                                
                                <a href='#' class='btn btn-success btn-sm ml-3 my-2' id='withdrawal-btn' data-id="${e.id}" data-status="1" data-type="withdrawal" data-bs-toggle="modal" data-bs-target="#withdrawlModal"> ${accept} </a>
                                
                                <a href='#' class='btn btn-danger btn-sm ml-3 my-2' id='withdrawal-btn' data-id="${e.id}" data-status="2" data-type="withdrawal" data-bs-toggle="modal" data-bs-target="#withdrawlModal"> ${reject} </a>
                            `);
                        } else {
                            let color =
                                e.status == 0
                                    ? "warning"
                                    : e.status == 1
                                    ? "success"
                                    : "danger";
                            let status =
                                e.status == 0
                                    ? pending
                                    : e.status == 1
                                    ? accept
                                    : reject;

                            return gridjs.html(`
                                <span class="badge bg-${color} rounded-pill"> ${status} </span>
                            `);
                        }
                    },
                },
            ],
            pagination: { limit: 10 },
            sort: !0,
            search: !0,
            data: result,
        }).render(document.getElementById("table-gridjs"));
});
