let type = $("#invest_type").val();

$.ajax({
    url: `/api/invests/${$("#invest_type").val()}`,
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            // console.log(data);
            result.push([
                index++,
                data.user,
                data.bank,
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
                    name: "No.",
                    formatter: function (e) {
                        return gridjs.html(
                            '<span class="fw-semibold">' + e + "</span>"
                        );
                    },
                },
                {
                    name: locale == "ch" ? "用户名" : "Username",
                    formatter: function (e) {
                        if (e) {
                            return gridjs.html(`<span>${e.username}</span>`);
                        } else {
                            return gridjs.html("<span> - </span>");
                        }
                    },
                },
                {
                    name: locale == "ch" ? "付款方式" : "Payment Type",
                    formatter: function (e) {
                        if (e) {
                            return gridjs.html(`<span>${e.name}</span>`);
                        } else {
                            return gridjs.html(
                                "<span> From Capital Amount . </span>"
                            );
                        }
                    },
                },
                "Amount",
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
                    name: "Date",
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
                        $("#invest_type").val() == "pending"
                            ? "Status"
                            : "Actions",
                    formatter: function (e) {
                        if (type == "pending") {
                            return gridjs.html(`
                            <a href='#' class='btn btn-success btn-sm ml-3 my-2' id='invest-btn' data-id="${e.id}" data-status="1" data-type="invest" data-bs-toggle="modal" data-bs-target="#investModal"> Accept </a>

                            <a href='#' class='btn btn-danger btn-sm ml-3 my-2' id='invest-btn' data-id="${e.id}" data-status="2" data-type="invest" data-bs-toggle="modal" data-bs-target="#investModal"> Reject </a>
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
                                    ? "Pending"
                                    : e.status == 1
                                    ? "Accept"
                                    : "Reject";

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
