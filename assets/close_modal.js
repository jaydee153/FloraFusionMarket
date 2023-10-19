 // JavaScript function to close a modal
 function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
}

// JavaScript function to toggle between modals
function toggleModal(openModalId, closeModalId) {
    closeModal(closeModalId);
    var modal = document.getElementById(openModalId);
    if (modal) {
        modal.classList.remove('hidden');
    }
}

//close for products
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}