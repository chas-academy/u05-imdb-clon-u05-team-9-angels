var openDeleteModal = document.querySelectorAll(".delete-modal-open");
for (var i = 0; i < openDeleteModal.length; i++) {
    openDeleteModal[i].addEventListener("click", function (event) {
        event.preventDefault();
        toggleDeleteModal();
    });
}

const deleteOverlay = document.querySelector(".delete-modal-open");
deleteOverlay.addEventListener("click", toggleDeleteModal);

var closeDeleteModal = document.querySelectorAll(".delete-modal-close");
for (var i = 0; i < closeDeleteModal.length; i++) {
    closeDeleteModal[i].addEventListener("click", function (event) {
        event.preventDefault();
        toggleDeleteModal();
    });
}

document.onkeydown = function (evt) {
    evt = evt || window.event;
    var isEscape = false;
    if ("key" in evt) {
        isEscape = evt.key === "Escape" || evt.key === "Esc";
    } else {
        isEscape = evt.keyCode === 27;
    }
    if (isEscape && document.body.classList.contains("delete-modal-active")) {
        toggleDeleteModal();
    }
};

function toggleDeleteModal() {
    const deleteBody = document.querySelector("body");
    const deleteModal = document.querySelector(".delete-modal");
    deleteModal.classList.toggle("opacity-0");
    deleteModal.classList.toggle("pointer-events-none");
    deleteBody.classList.toggle("delete-modal-active");
}
