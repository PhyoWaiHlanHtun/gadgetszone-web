let id = $("#auth").val();
let type = id ? "agent" : "admin";
let url = type == "agent" ? `/api/agent/${id}/users` : `/api/users`;
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
                        let edit_url = `/backend/user/${e.id}/edit`;
                        let url = `/backend/user/${e.id}`;

                        let color = e.status == 1 ? "warning" : "success";

                        if (locale == "ch") {
                            var status = e.status == 1 ? "停用" : "启用";
                        } else {
                            var status =
                                e.status == 1 ? "Deactivate" : "Activate";
                        }

                        let view = locale == "ch" ? "看法" : "View";
                        let edit = locale == "ch" ? "编辑" : "Edit";
                        let del = locale == "ch" ? "删除" : "Delete";

                        return gridjs.html(`
                            <a href='${url}' class='btn btn-info btn-sm mb-1'>${view}</a>

                            <a href='${url}/edit' class='btn btn-primary btn-sm mb-1'>${edit}</a>
                            
                            <a href='#' class='btn btn-${color} btn-sm mb-1' id='activate-btn' data-id="${e.id}" data-type="user" data-status ='${e.status}'data-bs-toggle="modal" data-bs-target="#activeModal">${status}</a>

                            <a href='#' class='btn btn-danger btn-sm ml-3 mb-1' id='delete-btn' data-id="${e.id}" data-type="user" data-bs-toggle="modal" data-bs-target="#deleteModal">${del}</a>
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
