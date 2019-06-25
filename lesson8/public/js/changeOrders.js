function handleChangeStatus(event, order) {
    
    fetch('orders/changeOrder/', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded',},
            body: `order=${order}&status=${event.target.value}`,
        });
    
}

function handleChangeContact(event, order) {
    
    fetch('orders/changeOrder/', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded',},
            body: `order=${order}&contacts=${event.target.value}`,
        });
    
}
