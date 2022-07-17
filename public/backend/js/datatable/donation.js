let locale = $("#locale").val();

$.ajax({
    url: `/api/donations`,
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
                    name: locale == "ch" ? "不。" : "No.",
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
            ],
            pagination: { limit: 10 },
            sort: !0,
            search: !0,
            data: result,
        }).render(document.getElementById("table-gridjs"));
});
