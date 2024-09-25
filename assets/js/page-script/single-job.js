/*=======Upload Input=======*/
document.addEventListener("DOMContentLoaded", function () {
    const uploads = document.querySelectorAll(".upload");

    uploads.forEach(upload => {
        const fileInput = upload.querySelector('input[type="file"]');
        const label = upload.querySelector("label");
        const labelText = label.querySelector("span");
        const labelRemove = upload.querySelector("i.remove");
        const labelDefault = labelText.textContent;

        fileInput.addEventListener("change", function () {
            const fileName = fileInput.value.split("\\").pop();
            if (fileName) {
                labelText.textContent = fileName;
                labelRemove.style.display = "inline";
            } else {
                labelText.textContent = labelDefault;
                labelRemove.style.display = "none";
            }
        });

        labelRemove.addEventListener("click", function () {
            fileInput.value = "";
            labelText.textContent = labelDefault;
            labelRemove.style.display = "none";
        });

        label.addEventListener("click", function () {
            fileInput.click();
        });
    });
});
/*=======Upload Input=======*/