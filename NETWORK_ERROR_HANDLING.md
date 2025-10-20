# Network Error Handling Implementation

## Overview

This document describes the network error handling improvements implemented to handle connection errors, timeouts, and network disconnections gracefully in the ERP system.

## Features Implemented

### 1. **Automatic Retry Logic with Exponential Backoff**
   - API calls automatically retry on network failures
   - Configurable number of retry attempts (default: 3)
   - Exponential backoff between retries to avoid overwhelming the server
   - Configurable retry delay (default: 1000ms)

### 2. **Network State Detection**
   - Real-time monitoring of network connection status
   - Event listeners for online/offline state changes
   - Automatic detection of network disconnections
   - Prevents unnecessary API calls when offline

### 3. **Improved Error Classification**
   - Network errors (connection failed, DNS resolution)
   - Timeout errors (request took too long)
   - HTTP errors (4xx, 5xx status codes)
   - Parse errors (invalid JSON response)

### 4. **Timeout Handling with Cancellation**
   - AbortController-based timeout implementation
   - Configurable timeout per request (default: 30 seconds)
   - Proper cleanup of pending requests

### 5. **User-Friendly Error Messages**
   - Translated error messages in French
   - Context-aware error notifications
   - Helpful suggestions for error resolution

## API Configuration

The API can be configured through the global `API_CONFIG` object:

```javascript
window.API_CONFIG = {
    baseUrl: 'https://toure.gestiem.com/api',
    timeout: 30000,              // Request timeout in milliseconds
    maxRetries: 3,               // Maximum number of retry attempts
    retryDelay: 1000,            // Initial delay between retries in milliseconds
    exponentialBackoff: true     // Use exponential backoff for retries
};
```

## Usage Examples

### Basic API Call
```javascript
const result = await apiCall('/products', 'GET');
if (result.success) {
    console.log('Data:', result.data);
} else {
    handleApiError(result);
}
```

### API Call with Custom Options
```javascript
const result = await apiCall('/products', 'POST', productData, {
    maxRetries: 5,           // Override default retry count
    retryDelay: 2000,        // Override default retry delay
    timeout: 60000,          // Override default timeout
    exponentialBackoff: true
});
```

### Handling Network State Changes
```javascript
// Add a listener for network state changes
window.NetworkState.addListener(function(isOnline) {
    if (isOnline) {
        console.log('Connection restored');
        // Retry failed operations
    } else {
        console.log('Connection lost');
        // Show offline mode UI
    }
});
```

## Error Types

### Network Errors (Retriable)
- `Network disconnected` - No internet connection
- `Failed to fetch` - Network request failed
- `DNS resolution failed` - Cannot resolve hostname
- Status codes: 408 (Timeout), 429 (Too Many Requests), 500-504 (Server errors)

### Non-Retriable Errors
- `401 Unauthorized` - Session expired, redirects to login
- `403 Forbidden` - Insufficient permissions
- `404 Not Found` - Resource doesn't exist
- `400 Bad Request` - Invalid request data

## Retry Logic

The retry logic follows this pattern:

1. **Check network state** - Don't attempt if offline
2. **Make API call** - Execute the request
3. **Evaluate response** - Check if successful or retriable
4. **Wait and retry** - If retriable, wait with exponential backoff
5. **Return result** - After all retries or success

### Exponential Backoff Formula
```
delay = initialDelay * (2 ^ attemptNumber)

Example with initialDelay = 1000ms:
- Attempt 1: 1000ms (1s)
- Attempt 2: 2000ms (2s)
- Attempt 3: 4000ms (4s)
```

## PHP Implementation

The same error handling logic has been implemented in PHP for server-side API calls:

```php
$result = makeApiCall('/products', 'GET', null, [], [
    'max_retries' => 3,
    'retry_delay' => 1000000, // microseconds (1 second)
    'exponential_backoff' => true
]);
```

## Testing

A comprehensive test page has been created at `/test-network-error-handling.html` to:

- Test normal API calls
- Simulate network errors
- Simulate timeouts
- Test retry logic with custom configuration
- Monitor network state changes
- View detailed logs of all operations

### Running Tests

1. Open `test-network-error-handling.html` in a browser
2. Adjust configuration parameters (retries, delay, timeout)
3. Run different test scenarios
4. Monitor the event log for detailed information

## Error Handling Best Practices

### For Developers

1. **Always use `apiCall` function** - Don't use `fetch` directly
2. **Check `result.success`** - Handle both success and failure cases
3. **Use `handleApiError`** - For consistent error messaging
4. **Provide user feedback** - Show loading states during retries

### Example Implementation

```javascript
async function loadProducts() {
    // Show loading indicator
    showLoading(true);
    
    try {
        const result = await apiCall('/products', 'GET');
        
        if (result.success) {
            displayProducts(result.data);
            showNotification('success', 'Produits chargés avec succès');
        } else {
            handleApiError(result, 'Impossible de charger les produits');
        }
    } finally {
        showLoading(false);
    }
}
```

## Error Messages

All error messages are in French and provide clear guidance:

| Error Type | Message |
|------------|---------|
| Offline | "Vous êtes hors ligne. Veuillez vérifier votre connexion internet." |
| Network Error | "Erreur de connexion au serveur. Veuillez réessayer." |
| Timeout | "Le serveur met trop de temps à répondre. Veuillez réessayer." |
| Session Expired | "Session expirée. Veuillez vous reconnecter." |
| Server Error | "Erreur serveur. Veuillez réessayer plus tard." |

## Monitoring and Debugging

### Console Logs

The system logs important events to the console:

```
[Network] Connection lost
[API] Retry attempt 1/3 after 1000ms for /products
[API] Retry attempt 2/3 after 2000ms for /products
[API] All retry attempts failed for /products
[Network] Connection restored
```

### Error Object Structure

```javascript
{
    success: false,
    error: "Network disconnected",
    errorType: "network",
    isNetworkError: true,
    status: 0,
    data: null
}
```

## Browser Compatibility

This implementation uses modern browser APIs:

- **Fetch API** - For HTTP requests
- **AbortController** - For request cancellation
- **Navigator.onLine** - For network state detection
- **Promises/Async-Await** - For asynchronous operations

Supported browsers:
- Chrome 66+
- Firefox 57+
- Safari 12.1+
- Edge 16+

## Future Improvements

Potential enhancements for consideration:

1. **Request queuing** - Queue requests while offline and retry when back online
2. **Local caching** - Cache responses for offline access
3. **Request deduplication** - Avoid duplicate concurrent requests
4. **Progressive retry** - Reduce request frequency for long outages
5. **Health check endpoint** - Periodic connectivity checks
6. **Metrics collection** - Track error rates and retry success

## Related Files

- `/assets/js/api.js` - JavaScript API client implementation
- `/configs/api-config.php` - PHP API configuration and utilities
- `/test-network-error-handling.html` - Test page for error handling
- `/api/local-api.php` - Local API endpoint handlers

## Support

For issues or questions about the error handling system, please refer to:
- This documentation
- Test page examples
- Code comments in `api.js`
- Console logs during development
