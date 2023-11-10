function toggleModal(modalId, otherModalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.getElementById(otherModalId).classList.remove('hidden');
  }
 
 
  document.getElementById('loginButton').addEventListener('click', function() {
    document.getElementById('loginModal').classList.remove('hidden');
  });

  function toggleGcashField() {
    const accountType = document.getElementById('account-type');
    const gcashImageField = document.getElementById('gcashImageField');

    if (accountType.value === '2') {
        gcashImageField.style.display = 'block';
    } else {
        gcashImageField.style.display = 'none';
    }
}
