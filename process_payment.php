<?php
// Start session
session_start();

// Get amount and tier from form
$amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 1;
$tier = isset($_POST['tier']) ? $_POST['tier'] : 'basic';

// Store in session for later
$_SESSION['payment_amount'] = $amount;
$_SESSION['payment_tier'] = $tier;

// In a real implementation, you'd redirect to a PayPal or Stripe payment page
// For simplicity, we'll simulate payment success here

// For actual Hostinger PayPal integration, you would:
// 1. Set up PayPal buttons in your Hostinger eCommerce settings
// 2. Replace the redirect with actual PayPal redirection
// 3. Create a PayPal IPN or webhook to process successful payments

// Simulate payment processing for now
// In a real scenario, this would be handled by PayPal's IPN or Stripe's webhook
// For now, we'll just redirect to the thank you page as if payment was successful

// Redirect to shrine page with success parameter
header('Location: shrine.html?payment=success');
exit;
?>