// Fetch data from the JSON file
fetch('json/flights.json')
    .then(response => response.json())
    .then(data => {
        // Use the fetched data to render the cart, targeting the 'bookings' array
        renderCart(data.bookings);
    })
    .catch(error => console.error('Error fetching the bookings:', error));

// Function to render cart items
// Function to render cart items
function renderCart(bookings) {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = ''; // Clear previous items

    let totalPrice = 0;

    bookings.forEach(booking => {
        totalPrice += parseFloat(booking.price);

        // Create a cart item div
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <div class="item-details">
                <h4>${booking.destination}</h4>
                <p>Price: $${booking.price}</p>
                <p>Date: ${booking.bookingDate}</p>
                <p>Time: ${booking.bookingTime}</p>
            </div>
            <div class="item-actions">
                <button class="edit-btn" onclick="editBooking(${booking.id})">Edit</button>
                <button class="remove-btn" onclick="removeBooking(${booking.id})">Remove</button>
            </div>
        `;

        cartItemsContainer.appendChild(cartItem);
    });

    // Update total price
    document.getElementById('cart-total').innerHTML = `<h4>Total: $${totalPrice.toFixed(2)}</h4>`;
}


// Function to remove a booking
function removeBooking(id) {
    fetch(`http://localhost:3002/bookings/${id}`, {
        method: 'DELETE'
    })
    .then(response => {
        if (response.ok) {
            // Re-fetch the updated data and re-render the cart
            fetchBookings();
        } else {
            console.error('Failed to delete the booking.');
        }
    })
    .catch(error => console.error('Error removing booking:', error));
}


// Function to edit a booking
function editBooking(id) {
    fetch(`http://localhost:3002/bookings/${id}`)
        .then(response => response.json())
        .then(booking => {
            const newDate = prompt("Enter new booking date (YYYY-MM-DD):", booking.bookingDate);
            const newTime = prompt("Enter new booking time (HH:MM):", booking.bookingTime);
    
            if (newDate && newTime) {
                // Prepare the updated booking object
                const updatedBooking = {
                    ...booking,
                    bookingDate: newDate,
                    bookingTime: newTime
                };

                // Send a PUT request to update the booking
                fetch(`http://localhost:3002/bookings/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(updatedBooking)
                })
                .then(response => {
                    if (response.ok) {
                        // Re-fetch the updated data and re-render the cart
                        fetchBookings();
                    } else {
                        console.error('Failed to update the booking.');
                    }
                })
                .catch(error => console.error('Error updating booking:', error));
            }
        })
        .catch(error => console.error('Error fetching booking:', error));
}

function fetchBookings() {
    fetch('http://localhost:3002/bookings')
        .then(response => response.json())
        .then(data => {
            renderCart(data); // Re-render the cart with the updated data
        })
        .catch(error => console.error('Error fetching bookings:', error));
}

