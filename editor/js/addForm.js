(function() {
	tinymce.PluginManager.add('addForm', function(editor, url) {
		editor.addButton('addForm', {
			text: 'Form',
			icon: false,
			onclick: function() {
				editor.windowManager.open({
					title: 'Add a Marketo Form',
					body: [{
							type: 'textbox', 
							name: 'formID', 
							label: 'Form ID'
						},
					],
					onsubmit: function(event) {
						var formID = event.data.formID
						var html = `<form id="mktoForm_${formID}" class="marketo__form"></form>`
						editor.execCommand('mceReplaceContent', false, html)
					}
				})
			}
		})
	})
})()
