var stripe = Stripe('pk_test_iy15cB4bbShznBaA6Fu7cCJe00W10O4NxK');

// Create an instance of Elements.
var elements = stripe.elements();

var style = {
    base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    //document.getElementById('buy-now').disabled = true;
    //document.getElementById('buy-now').setAttribute("style", "color: #ccc");
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}

// Stripe.setPublishableKey('pk_test_iy15cB4bbShznBaA6Fu7cCJe00W10O4NxK');
//
// var form = $('#checkout');
// $(document).ready(function() {
//     form.submit(function (event) {
//         event.preventDefault();
//         console.log('1');
//         $('#error').addClass('hidden');
//         form.find('button').prop('disabled', true);
//
//         Stripe.card.createToken({
//             cvc: $('#card-cvc').val(),
//             exp_month: $('#card-exp-month').val(),
//             exp_year: $('#card-exp-year').val(),
//             name: $('#credit-card-name').val(),
//         }, stripeResponseHandler);
//         return false;
//     });
// });
//
// function stripeResponseHandler(status, response) {
//     if (response.error) {
//         $('#error').removeClass("hidden");
//         $("#error").text(response.error.message);
//         form.find('button').prop('disabled', false);
//
//
//     } else {
//         var token = response['id'];
//
//         form.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
//
//         form.get(0).submit();
//     }
// }
