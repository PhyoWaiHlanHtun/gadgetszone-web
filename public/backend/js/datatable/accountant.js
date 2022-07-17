let locale = $("#locale").val();

$.ajax({
    url: "/api/accountant",
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            // console.log(data);
            result.push([
                index++,
                data.username,
                data.email,
                data.phone,
                data.id,
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
                locale == "ch" ? "电子邮件" : "Email",
                locale == "ch" ? "电话" : "Phone",
                // {
                //     name: locale == "ch" ? "行动" : "Actions",
                //     width: "120px",
                //     formatter: function (e) {
                //         let url = `/backend/accountant/${e}/edit`;
                //         let edit = locale == "ch" ? "编辑" : "Edit";
                //         let del = locale == "ch" ? "删除" : "Delete";

                //         return gridjs.html(`
                //             <a href='${url}' class='btn btn-primary btn-sm'>${edit}</a>
                //         `);
                //     },
                // },
            ],
            pagination: { limit: 10 },
            sort: !0,
            search: !0,
            data: result,
        }).render(document.getElementById("table-gridjs"));
});
