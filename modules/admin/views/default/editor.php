<?php
if ($_POST) {
    print_r($_POST);
}
$js = <<<JS
function submitForm() {
        var content = document.getElementById('editor').innerHTML;
        console.log(content);
    }
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css"/>

<div id="toolbar-container">
  <span class="ql-formats">
    <select class="ql-font"></select>
    <select class="ql-size"></select>
  </span>
    <span class="ql-formats">
    <button class="ql-bold"></button>
    <button class="ql-italic"></button>
    <button class="ql-underline"></button>
    <button class="ql-strike"></button>
  </span>
    <span class="ql-formats">
    <select class="ql-color"></select>
    <select class="ql-background"></select>
  </span>
    <span class="ql-formats">
    <button class="ql-script" value="sub"></button>
    <button class="ql-script" value="super"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-header" value="1"></button>
    <button class="ql-header" value="2"></button>
    <button class="ql-blockquote"></button>
    <button class="ql-code-block"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-list" value="ordered"></button>
    <button class="ql-list" value="bullet"></button>
    <button class="ql-indent" value="-1"></button>
    <button class="ql-indent" value="+1"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-direction" value="rtl"></button>
    <select class="ql-align"></select>
  </span>
    <span class="ql-formats">
    <button class="ql-link"></button>
    <button class="ql-image"></button>
    <button class="ql-video"></button>
    <button class="ql-formula"></button>
  </span>
    <span class="ql-formats">
    <button class="ql-clean"></button>
  </span>
</div>

<div id="editor">
    <div class="ql-editor" contenteditable="true" data-placeholder="Compose an epic...">
        <div class="ql-code-block-container" spellcheck="false">
            <div class="ql-code-block" data-language="php"><span class="ql-token hljs-meta">&lt;?php</span></div>
            <div class="ql-code-block" data-language="php"><span class="ql-token hljs-keyword">echo</span> <span
                        class="ql-token hljs-string">"salom"</span>;
            </div>
            <div class="ql-code-block" data-language="php"><span class="ql-token hljs-meta">?&gt;</span></div>
            <div class="ql-code-block" data-language="php"></div>
        </div>
    </div>
</div>

<button onclick="submitForm()">Submit</button>


<!-- Initialize Quill editor -->
<script>
    const quill = new Quill('#editor', {
        modules: {
            syntax: true,
            toolbar: '#toolbar-container',
        },
        placeholder: 'Compose an epic...',
        theme: 'snow',
    });
</script>
