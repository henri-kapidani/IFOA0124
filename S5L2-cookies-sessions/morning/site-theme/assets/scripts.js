const languageForm = document.querySelector('#change-language');
const selectLanguage = document.querySelector('#select-language');

selectLanguage.addEventListener('change', function(event) {
    languageForm.submit();
});
