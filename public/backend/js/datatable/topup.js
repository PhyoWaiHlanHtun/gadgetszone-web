let type = $("#topup_type").val();
let locale = $("#locale").val();

$.ajax({
    url: `/api/topups/${$("#topup_type").val()}`,
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
                data.trans_id,
                new Date(data.created_at),
                {
                    id: data.id,
                    status: data.status,
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
                {
                    name:
                        locale == "ch"
                            ? "交易屏幕截图"
                            : "Transaction Screenshot",
                    formatter: function (e) {
                        if (!e || e == 0) {
                            return gridjs.html(
                                `<img src='/default.png' class='img-fluid' >`
                            );
                        } else {
                            return gridjs.html(
                                `<img src='/storage/images/${e}' class='img-fluid' >`
                            );
                        }
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
                        $("#topup_type").val() == "pending"
                            ? locale == "ch"
                                ? "地位"
                                : "Status"
                            : locale == "ch"
                            ? "行动"
                            : "Actions",
                    formatter: function (e) {
                        let pending = locale == "ch" ? "待办的" : "Pending";
                        let accept = locale == "ch" ? "接受" : "Accept";
                        let reject = locale == "ch" ? "拒绝" : "Reject";

                        if (type == "pending") {
                            return gridjs.html(`
                            <a href='#' class='btn btn-success btn-sm ml-3 my-2' id='topup-btn' data-id="${e.id}" data-status="1" data-type="topup" data-bs-toggle="modal" data-bs-target="#topupModal"> ${accept} </a>
                            
                            <a href='#' class='btn btn-danger btn-sm ml-3 my-2' id='topup-btn' data-id="${e.id}" data-status="2" data-type="topup" data-bs-toggle="modal" data-bs-target="#topupModal"> ${reject} </a>
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
