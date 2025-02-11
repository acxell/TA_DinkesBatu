$(document).ready(function () {
    let userTable = $("#userTable").DataTable({
        serverSide: false,
    });

    $("#reload").click(function () {
        userTable.ajax.reload();
        log
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
            header: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                alert("User berhasil ditambahkan!");
                $("#userForm")[0].reset();
                $("#createModal").hide();
                userTable.ajax.reload();

            },
            error: function (xhr) {
                alert("Gagal menambahkan user!");
            },
        });
    });
});
