const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
    const li = item.parentElement;

    item.addEventListener("click", function () {
        allSideMenu.forEach((i) => {
            i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
    });
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
    if (this.checked) {
        document.body.classList.add("dark");
    } else {
        document.body.classList.remove("dark");
    }
});

const dropBtn = document.querySelector(".dropdown-btn"),
    dropdown = document.querySelectorAll(".drop-item");

dropBtn.addEventListener("click", () => {
    dropdown.forEach((drop) => {
        if (drop.classList.contains("show-item")) {
            drop.classList.remove("show-item");
        } else {
            drop.classList.add("show-item");
        }
    });
});

$(document).ready(function () {
    // Listen for a click on the single "Edit" button
    $(".edit-button").click(function () {
        // Retrieve the item ID from the button's data-id attribute
        var itemId = $(this).data("id");

        // Set the form action with the correct URL
        $("#editItemForm").attr(
            "action",
            "/eloading-best-seller/update/" + itemId
        );

        // Fetch item data by ID via AJAX and populate the modal fields
        $.ajax({
            url: "/eloading-best-seller/" + itemId,
            type: "GET",
            dataType: "json",
            success: function (data) {
                // Populate the modal fields with the fetched data
                $("#editItemId").val(data.id);
                $("#editItemName").val(data.Item);
                // Populate other fields as needed
            },
            error: function () {
                alert("Item not found");
            },
        });
    });

    // Submit the form using Axios when the "Save Changes" button is clicked
    $("#editItemForm").submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var action = $(this).attr("action");

        axios
            .put(action, formData)
            .then(function (response) {
                // Handle the response as needed
                console.log(response);
            })
            .catch(function (error) {
                // Handle errors
                console.error(error);
            });
    });
});
