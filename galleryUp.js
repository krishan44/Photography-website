const selectImage = document.querySelector('.select-image');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('.img-area');

// Function to handle file input change
function handleFileInputChange() {
    const image = this.files[0];
    if (image) {
        if (image.size < 20000000000) {
            const reader = new FileReader();
            reader.onload = () => {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item => item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
                selectImage.textContent = 'Upload Image';
            };
            reader.readAsDataURL(image);
        } else {
            alert("Image size should be less than 2MB.");
        }
    } else {
        alert("Please select an image before uploading");
    }
}

// Event listener to trigger file input click
selectImage.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default behavior
    if (!imgArea.classList.contains('active')) {
        inputFile.click();
    }
});

// Event listener for file input change
inputFile.addEventListener('change', handleFileInputChange);

// Event listener for "Upload Image" button click
selectImage.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default behavior
    if (imgArea.classList.contains('active')) {
        // Redirect to imageUpload.php
        window.location.href = 'imageUpload.php';
    }
});
