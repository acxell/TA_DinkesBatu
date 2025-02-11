$(document).ready(function () {
    let userTable = $("#userTable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/api/users",
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Auto-numbering
                },
            },
            { data: "name" },
            { data: "email" },
        ],
    });

    $("#userForm").submit(function (e) {
        e.preventDefault();

        let formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            _token: $('input[name="_token"]').val(),
        };

        $.ajax({
            url: "/users",
            type: "POST",
            data: formData,
            success: function (response) {
                alert("User berhasil ditambahkan!");
                $("#userForm")[0].reset();
                userTable.ajax.reload();
            },
            error: function (xhr) {
                alert("Gagal menambahkan user!");
            },
        });
    });
});
