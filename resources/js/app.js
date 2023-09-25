import './bootstrap';

const options = {
  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};

CKEDITOR.replace('description', options);


const lfm = function (id, type, options) {
  let button = document.getElementById(id);

  button.addEventListener('click', function () {
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
    var target_input = document.getElementById(button.getAttribute('data-input'));
    var target_preview = document.getElementById(button.getAttribute('data-preview'));

    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = function (items) {
      var file_path = items.map(function (item) {
        return item.url;
      }).join(',');

      // set the value of the desired input to image url
      target_input.value = file_path;
      target_input.dispatchEvent(new Event('change'));

      // clear previous preview
      target_preview.innerHTML = '';

      // set or change the preview image src
      items.forEach(function (item) {
        let img = document.createElement('img')
        img.setAttribute('style', 'height: 5rem')
        img.setAttribute('src', item.thumb_url)
        target_preview.appendChild(img);
      });

      // trigger change event
      target_preview.dispatchEvent(new Event('change'));
    };
  });
};


const route_prefix = "/laravel-filemanager";
lfm('lfm', 'image', { prefix: route_prefix, type: 'images' });



// http://laravel/admin/product/url-to-filemanager?type=undefined

// http://laravel/laravel-filemanager?type=Images&CKEditor=description&CKEditorFuncNum=1&langCode=ru