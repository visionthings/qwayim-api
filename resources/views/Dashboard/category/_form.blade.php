<div class="w-50 m-auto shadow rounded-3 p-3">
    <div class="mb-3">
        <label for="cat-name">اسم القسم</label>
        <input type="text" class="form-control" id="cat-name" name="name" placeholder="اسم القسم">
    </div>
    <div class="mb-3">
        <label for="link">رابط القسم</label>
        <input type="text" class="form-control" id="link" name="slug" placeholder="رابط القسم باللغة الإنجليزية">
    </div>
    
    <button type="submit" class="main-btn small p-2">{{$btn_text}}</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

<script>
    // The DOM element you wish to replace with Tagify
var input = document.querySelector('textarea[name=categories]');

// initialize Tagify on the above input node reference
new Tagify(input)
</script>
