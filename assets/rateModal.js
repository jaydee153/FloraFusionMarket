const openModalButton = document.getElementById('openModalButton');
const closeModalButton = document.getElementById('closeModalButton');
const rateModal = document.getElementById('rateModal');

openModalButton.addEventListener('click', () => {
    rateModal.classList.remove('hidden');
});
