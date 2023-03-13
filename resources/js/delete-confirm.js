const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const confirm = window.confirm('Sei sicuro che vuoi eliminare il progetto?')
        if (confirm) form.submit();
    })
})

