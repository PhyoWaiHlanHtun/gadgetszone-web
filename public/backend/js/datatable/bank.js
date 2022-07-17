let locale = $("#locale").val();

$.ajax({
    url: "/api/banks",
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            // console.log(data);
            result.push([
                index++,
                data.name,
                data.account,
                data.phone,
                data.type,
                data.image,
                // data.id,
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
                locale == "ch" ? "姓名" : "Name",
                locale == "ch" ? "帐户" : "Account",
                locale == "ch" ? "电话" : "Phone",
                {
                    name: locale == "ch" ? "类型" : "Type",
                    formatter: function (e) {
                        let type =
                            e == 1
                                ? "Topup"
                                : e == 2
                                ? "Investment"
                                : e == 3
                                ? "Donation"
                                : "-";
                        return gridjs.html(`${type}`);
                    },
                },
                {
                    name: locale == "ch" ? "图片" : "Image",
                    formatter: function (e) {
                        return gridjs.html(
                            `<img src='/storage/images/${e}' width='150'>`
                        );
                    },
                },
                // {
                //     name: locale == "ch" ? "行动" : "Actions",
                //     width: "120px",
                //     formatter: function (e) {
                //         let url = `/backend/bank/${e}/edit`;
                //         let edit = locale == "ch" ? "编辑" : "Edit";
                //         let del = locale == "ch" ? "删除" : "Delete";
                //         return gridjs.html(`
                //             <a href='${url}' class='btn btn-primary btn-sm my-2'>${edit}</a>

                //             <a href='#' class='btn btn-danger btn-sm ml-3 my-2' id='delete-btn' data-id="${e}" data-type="bank" data-bs-toggle="modal" data-bs-target="#deleteModal">${del}</a>
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
