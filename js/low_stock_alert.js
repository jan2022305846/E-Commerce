document.addEventListener('DOMContentLoaded', function() {
    setTimeout(checkLowStock, 1000); // Check for low stock after 1 second delay

    function checkLowStock() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_stock.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    const lowStockProducts = JSON.parse(xhr.responseText);
                    if (lowStockProducts.length > 0) {
                        let message = 'The following products are low in stock:\n';
                        lowStockProducts.forEach(product => {
                            message += `- ${product.product_name} (Quantity: ${product.product_quantity})\n`;
                        });
                        displayLowStockNotification(message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON response:', e);
                }
            } else {
                console.error('Request failed with status:', xhr.status);
            }
        };
        xhr.onerror = function() {
            console.error('Request error');
        };
        xhr.send();
    }

    function displayLowStockNotification(message) {
        const notification = document.createElement('div');
        notification.style.position = 'fixed';
        notification.style.bottom = '10px';
        notification.style.right = '10px';
        notification.style.padding = '15px';
        notification.style.backgroundColor = '#f44336';
        notification.style.color = 'white';
        notification.style.boxShadow = '0 2px 4px rgba(0,0,0,0.2)';
        notification.style.zIndex = '1000';
        notification.style.borderRadius = '5px';
        notification.textContent = message;

        const closeButton = document.createElement('span');
        closeButton.textContent = 'x';
        closeButton.style.marginLeft = '10px';
        closeButton.style.cursor = 'pointer';
        closeButton.onclick = function() {
            notification.remove();
        };

        notification.appendChild(closeButton);
        document.body.appendChild(notification);
    }
});
