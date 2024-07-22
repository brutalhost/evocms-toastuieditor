<?php
if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

$e = &$modx->Event;
switch ($e->name) {
    case 'OnRichTextEditorRegister':
        $e->addOutput('ToastUI Editor');
        break;

    case 'OnRichTextEditorInit':

        if (isset($modx->pluginCache['ToastUI EditorProps'])) {
            $params = $modx->parseProperties($modx->pluginCache['ToastUI EditorProps']);
            $paramsJson = json_encode($params);
        }
        $elementsJson = json_encode($elements);
        if ($editor == 'ToastUI Editor') {
            $modx->regClientHTMLBlock(<<<EOD
                <link rel="stylesheet" href="/assets/plugins/toastuieditor/css/toastui-editor.min.css">
                <link rel="stylesheet" href="/assets/plugins/toastuieditor/css/toastui-editor-fix.css">
                <script src="/assets/plugins/toastuieditor/js/toastui-editor-all.min.js"></script>

                <script type="module">
                const params = $paramsJson;
                console.log(params)
                    import { EvoImagePickerButton } from "/assets/plugins/toastuieditor/js/evoImagePickerButton.js";
                    import { initializeImagePickerEvents } from "/assets/plugins/toastuieditor/js/initEvoImagePicker.js";
                    document.addEventListener("DOMContentLoaded", function() {
                        const editors = $elementsJson;

                        editors.forEach(function(element, index) {
                            const textarea = document.getElementById(element);
                            textarea.style.display = "none"; // Скрыть оригинальное текстовое поле
                            const editorContainer = document.createElement("div");
                            textarea.parentNode.insertBefore(editorContainer, textarea);

                            const editor = new toastui.Editor({
                                el: editorContainer,
                                toolbarItems: [
                                    ['heading', 'bold', 'italic', 'strike'],
                                    ['hr', 'quote'],
                                    ['ul', 'ol', 'task', 'indent', 'outdent'],
                                    ['table', EvoImagePickerButton, 'link'],
                                    ['code', 'codeblock'],
                                    // ['scrollSync'],
                                ],
                                extendedAutolinks: (params['extendedAutolinks'] === "true"),
                                height: params['height'],
                                initialEditType: params['initialEditType'],
                                previewStyle: params['previewStyle'],
                                initialValue: textarea.value,
                                useCommandShortcut: false,
                            });

                            initializeImagePickerEvents(editor);

                            editor.on("change", function() {
                                textarea.value = editor.getMarkdown();
                            });
                        });
                    });
                </script>
            EOD);
        }
        break;
}
