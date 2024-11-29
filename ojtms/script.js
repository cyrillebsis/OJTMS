document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('#create-account-form input');

    inputs.forEach(input => {
        input.addEventListener('input', () => {
            const formData = new FormData();
            formData.append(input.name, input.value);

            // Send AJAX request to save data
            fetch('save_data.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Log server response
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Optional: Handle the Save button
    document.getElementById('submit-btn').addEventListener('click', () => {
        alert('Data saved successfully!');
    });
});
