document.addEventListener('DOMContentLoaded', function() {
    // Fetch doctor's name from docssignup.php
    fetch('docsignup.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('doctorName').innerText = data;
        })
        .catch(error => {
            console.error('Error fetching doctor name:', error);
        });

    // Fetch hospital analytics and upcoming appointments dynamically
    // Display them in the respective divs
    // Example:
    // fetchHospitalAnalytics().then(data => {
    //     document.querySelector('.hospital-analytics').innerHTML = data;
    // });
    // fetchUpcomingAppointments().then(data => {
    //     document.querySelector('.upcoming-appointments').innerHTML = data;
    // });
});
