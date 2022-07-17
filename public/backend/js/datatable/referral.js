$.ajax({
    url: "/api/referrals",
}).done(function (response) {
    if (response) {
        var result = [];
        let index = 1;
        for (let data of response.data) {
            // console.log(data);
            result.push([index++, data.name, data.commission, data.id]);
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
                "Name",
                "Commission",
                // {
                //     name: "Actions",
                //     width: "120px",
                //     formatter: function (e) {
                //         let url = `/backend/staff/${e}/edit`;

                //         return gridjs.html(`
                //             <a href='${url}' class='btn btn-primary btn-sm'>Edit</a>

                //             <a href='#' class='btn btn-danger btn-sm ml-3' id='delete-btn' data-id="${e}" data-type="staff" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
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
