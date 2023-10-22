const openModalButton = document.getElementById('openModalButton');
const closeModalButton = document.getElementById('closeModalButton');
const plantModal = document.getElementById('plantModal');

openModalButton.addEventListener('click', () => {
    plantModal.style.display = 'block';
});

// closeModalButton.addEventListener('click', () => {
//     plantModal.style.display = 'none';
// });

// // Close modal if user clicks outside the content
// window.addEventListener('click', (event) => {
//     if (event.target === plantModal) {
//         plantModal.style.display = 'none';
//     }
// });