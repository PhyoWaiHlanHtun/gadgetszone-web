let locale = $("#locale").val();

$.ajax({
    url: "/api/purchases",
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            console.log(data);
            result.push([
                index++,
                data.product.name,
                data.user.username,
                new Date(data.created_at),
                data.commission,
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
                locale == "ch" ? "产品名称" : "Product Name",
                locale == "ch" ? "用户名" : "Username",
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
                    name: locale == "ch" ? "委员会" : "Commission",
                    formatter: function (e) {
                        return gridjs.html(` $ ${e}`);
                    },
                },
            ],
            pagination: { limit: 10 },
            sort: !0,
            search: !0,
            data: result,
        }).render(document.getElementById("table-gridjs"));
});
