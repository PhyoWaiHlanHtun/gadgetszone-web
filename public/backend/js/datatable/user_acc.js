let url = `/api/users`;
let locale = $("#locale").val();

$.ajax({
    url: url,
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            result.push([
                index++,
                data.username,
                data.email,
                data.phone,
                data.referral.code,
                data.referral.level.name,
                data.created_at,
                data.agent,
                data.status,
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
                locale == "ch" ? "电子邮件" : "Email",
                locale == "ch" ? "电话" : "Phone",
                locale == "ch" ? "推荐代码" : "Referral Code",
                locale == "ch" ? "等级" : "Level",
                locale == "ch" ? "注册时间" : "Register Time",
                {
                    name: locale == "ch" ? "代理人" : "Agent",
                    formatter: function (e) {
                        if (e) {
                            console.log(e);
                            return gridjs.html(`
                                <span class=""> ${e.username} </span>
                            `);
                        } else {
                            return gridjs.html(`
                                <span class=""> - </span>
                            `);
                        }
                    },
                },
                {
                    name: locale == "ch" ? "地位" : "Status",
                    formatter: function (e) {
                        let color = e == 1 ? "success" : "warning";

                        if (locale == "ch") {
                            var status = e == 1 ? "积极的" : "不活跃";
                        } else {
                            var status = e == 1 ? "Active" : "Inactive";
                        }
                        return gridjs.html(`
                            <span class="badge bg-${color} rounded-pill"> ${status} </span>
                        `);
                    },
                },
                {
                    name: locale == "ch" ? "行动" : "Actions",
                    width: "120px",
                    formatter: function (e) {
                        let url = `/backend/user/${e.id}`;

                        let view = locale == "ch" ? "看法" : "View";

                        return gridjs.html(`
                            <a href='${url}' class='btn btn-info btn-sm mb-1'>${view}</a>
                        `);
                    },
                },
            ],
            pagination: { limit: 10 },
            sort: !0,
            search: !0,
            data: result,
        }).render(document.getElementById("table-gridjs"));
});
