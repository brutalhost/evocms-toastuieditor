<?php
/**
 * ToastUI Editor
 *
 * Javascript Markdown Editor
 *
 * @category    plugin
 * @version     1.0
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @properties &extendedAutolinks=Automatically wrap URL in a tag;list;true,false;true;true &initialEditType=Default editor;list;markdown,wysiwyg;markdown;markdown;Toggles at the bottom of the editor; &previewStyle=Preview style;list;vertical,tab;vertical;vertical;<b>vertical</b> - editor on the left, preview on the right<br><b>tab</b> - modes switch using tabs; &height=Height;text;500px;500px;<b>auto</b> - editor stretches to fit content height<br><b>500px</b> - height in pixels
 * @internal    @events OnRichTextEditorInit,OnRichTextEditorRegister
 * @internal    @modx_category Manager and Admin
 * @internal    @installset base
 *
 * @author Brutalhost / updated: 2024-22-07
 */

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

require(MODX_BASE_PATH . "assets/plugins/toastuieditor/plugin.toastuieditor.inc.php");
