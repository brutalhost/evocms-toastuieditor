// initEvoImagePicker.js

import { EvoImagePickerButton, container } from './evoImagePickerButton.js';

// Функция для инициализации событий для элементов формы
function initializeImagePickerEvents(editor) {
    const cancelButton = container.querySelector('.toastui-editor-close-button');
    const chooseFileButton = container.querySelector('.toastui-editor-file-select-button');
    const applyButton = container.querySelector('.toastui-editor-ok-button');
    const urlInput = container.querySelector("#toastuiImageUrlInput");
    const altInput = container.querySelector("#toastuiAltTextInput");

    // События
    cancelButton.addEventListener('click', () => {
        editor.eventEmitter.emit('closePopup');
    });

    chooseFileButton.addEventListener('click', () => {
        urlInput.classList.remove('wrong');
    });

    applyButton.addEventListener('click', () => {
        if (urlInput.value.trim() === '') {
            urlInput.classList.add('wrong');
        } else {
            const url = (urlInput.value.startsWith('http') || urlInput.value.startsWith('/')) ? urlInput.value : '/' + urlInput.value;
            const alt = altInput.value;

            editor.eventEmitter.emit('command', 'addImage', { imageUrl: url, altText: alt });
            editor.eventEmitter.emit('closePopup');

            urlInput.value = '';
            altInput.value = '';

            urlInput.classList.remove('wrong');
        }
    });

    urlInput.addEventListener('focus', () => {
        urlInput.classList.remove('wrong');
    });
}

export { initializeImagePickerEvents };
