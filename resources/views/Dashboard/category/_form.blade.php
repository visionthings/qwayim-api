<div>
    <input type="text" name="name" placeholder="اسم القسم">
</div>
<div>
    <input type="text" name="slug" placeholder="رابط القسم باللغة الإنجليزية">
</div>

<button type="submit">{{$btn_text}}</button>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

<script>
    // The DOM element you wish to replace with Tagify
var input = document.querySelector('textarea[name=categories]');

// initialize Tagify on the above input node reference
new Tagify(input)
</script>
