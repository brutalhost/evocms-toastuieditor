// evoImagePickerButton.js

// Создание контейнера
const container = document.createElement("div");

// Определение кнопки Evo Image Picker
const EvoImagePickerButton = {
    name: "Evo Image Picker",
    tooltip: "Insert image",
    className: "image toastui-editor-toolbar-icons",
    popup: {
        className: "toastui-editor-popup-add-image",
        body: container,
        style: { width: "auto" },
    },
};

// HTML форма
const formHTML = `
<div>
    <label for="toastuiImageUrlInput">Select image or enter URL</label>
    <div class="d-flex">
        <input id="toastuiImageUrlInput" type="text" class="w-100"/>
        <input type="button" class="toastui-editor-file-select-button w-auto" onclick="BrowseServer('toastuiImageUrlInput')" value="Choose a file">
    </div>
    <label for="toastuiAltTextInput">Description</label>
    <input id="toastuiAltTextInput" class="w-100" type="text">
    <div class="toastui-editor-button-container">
        <button type="button" class="toastui-editor-close-button">Cancel</button>
        <button type="button" class="toastui-editor-ok-button">OK</button>
    </div>
`;

container.innerHTML = formHTML;

export { EvoImagePickerButton, container };
