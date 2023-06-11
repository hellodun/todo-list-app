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

const getUser = document.querySelector('.hello-user');
const logoutDiv = document.querySelector('.logout');
getUser.addEventListener("click", function () {
    if (logoutDiv.style.display == 'none') {
        logoutDiv.style.display = "block";
    }
    else {
        logoutDiv.style.display = 'none';
    }
});