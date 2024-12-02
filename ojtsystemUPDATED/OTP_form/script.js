function handleSubmit(event) {
    event.preventDefault();
    
    const email = document.getElementById('email').value;
    
    // Here you would typically make an API call to your backend
    console.log('Password reset requested for:', email);
    
    // Example of showing feedback to user
    alert('If an account exists with this email, you will receive a password reset link shortly.');
}