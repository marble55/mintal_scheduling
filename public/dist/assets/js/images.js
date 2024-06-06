
document.getElementById('removeImageButton').addEventListener('click', function() {
    this.classList.toggle('checked');
    const isChecked = this.classList.contains('checked');

    // Remove any existing hidden input
    const existingInput = document.querySelector('input[name="remove_img"]');
    if (existingInput) {
        existingInput.remove();
    }

    // If the button is checked, add a hidden input to the form
    if (isChecked) {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'remove_img';
        hiddenInput.value = '1';
        document.getElementById('faculty_form').appendChild(hiddenInput);
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var fileInput = document.getElementById('image');
    var removeButton = document.getElementById('removeImageButton');
    var imgElement = document.querySelector('.user-avatar img');

    removeButton.addEventListener('click', function() {
        fileInput.value = ''; // Clear the file input

        // Reset the displayed image to the default image
        imgElement.src = '{{ asset('dist/assets/images/DEFAULT-PROFILE.jpg') }}';
    });

    fileInput.addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result; // Set the img src to the selected file
            };
            reader.readAsDataURL(file); // Read the selected file as a data URL
        }
    });
});