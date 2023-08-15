import FroalaEditor from "froala-editor";
// froala WYSIWYG editor
import "froala-editor/css/froala_editor.pkgd.min.css";
import "froala-editor/js/plugins/paragraph_format.min.js";
import "froala-editor/js/plugins/link.min.js";
import "froala-editor/js/plugins/colors.min.js";
import "froala-editor/js/plugins/font_size.min.js";
import "froala-editor/js/plugins/align.min.js";
import "froala-editor/js/plugins/emoticons.min.js";
import "froala-editor/css/plugins/emoticons.min.css";
import "froala-editor/js/plugins/lists.min.js";

const createEditor = (selector) => {
    new FroalaEditor(selector, {
    attribution: false,
    height: 200,
    placeholderText: "Omschrijf hier belangrijke eigenschappen van je groep",
    codeBeautifierOptions: {},
    inlineStyles: {
        "Big Red": "font-size: 20px; color: red;",
        "Small Blue": "font-size: 14px; color: blue;",
    },
});
};

export default createEditor;
