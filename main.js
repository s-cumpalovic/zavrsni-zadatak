// Using JS DOM to implement color change on gender

var genderColor = document.querySelector("select");

genderColor.addEventListener("change", () => {
    if (genderColor.querySelector(`option[value="${genderColor.value}"]`).className === 'Female') {
        genderColor.style.color = "#F731D6";
    } else {
        genderColor.style.color = "#3355FF";
    }
});