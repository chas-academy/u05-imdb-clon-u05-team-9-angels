const openDeleteModal = document.querySelectorAll(".delete-modal-open");
openDeleteModal.forEach((element) => {
    element.addEventListener("click", function (event) {
        event.preventDefault();
        toggleDeleteModal();
    });
});

const closeDeleteModal = document.querySelectorAll(".delete-modal-close");
closeDeleteModal.forEach((element) => {
    element.addEventListener("click", function (event) {
        event.preventDefault();
        toggleDeleteModal();
    });
});

document.onkeydown = function (evt) {
    evt = evt || window.event;
    let isEscape = false;
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
