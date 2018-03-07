(function () {
    tinymce.PluginManager.add('advrt_button', function (editor, url) {
        editor.addButton('advrt_button', {
            title: 'Add the advertisement',
            icon: 'icon dashicons-format-image',
            onclick: function () {
                editor.windowManager.open({
                    title: 'id',
                    body: [{
                        type: 'textbox',
                        name: 'id',
                        label: 'Введите id'
                    }],
                    onsubmit: function (e) {
                        editor.insertContent('[ad_banner ' + 'id="' + e.data.id + '"]');
                    }
                });
            }
        })
        ;
    });
})();