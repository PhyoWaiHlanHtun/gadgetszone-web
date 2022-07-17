$.ajax({
    url: "/api/levels",
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
                {
                    name: "Commission",
                    formatter: function (e) {
                        return gridjs.html(`${e} %`);
                    },
                },
            ],
            pagination: { limit: 10 },
            sort: !0,
            search: !0,
            data: result,
        }).render(document.getElementById("table-gridjs"));
});
