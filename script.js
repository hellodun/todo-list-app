function applyStrikethrough() {
    const checkboxes = document.querySelectorAll("input[type='checkbox']");
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", function () {
            const label = this.nextElementSibling;
            if (this.checked) {
                label.style.textDecoration = "line-through";
            } else {
                label.style.textDecoration = "none";
            }
        });
    });
}
applyStrikethrough();