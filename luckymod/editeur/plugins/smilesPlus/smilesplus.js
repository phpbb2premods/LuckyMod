function SmilesPlus(editor) {
	this.editor = editor;
	var cfg = editor.config;
	var tt = SmilesPlus.I18N;
	var bl = SmilesPlus.btnList;
	var self = this;
	
	var toolbar = [];
	for (var i in bl) {
		var btn = bl[i];
		if (!btn) {
			toolbar.push("separator");
		} else {
			var id = "SC-" + btn[0];
			cfg.registerButton(id, tt[id], "plugins/SmilesPlus/img/" + btn[0] + ".gif", false,
					   function(editor, id) {
						   self.buttonPress(editor, id);
					   }, btn[1]);
			toolbar.push(id);
		}
	}
	for (var i in toolbar) {
		cfg.toolbar[0].push(toolbar[i]);
	}
};

SmilesPlus.btnList = [
	null, // separator
	["smiles"]
	];

SmilesPlus.prototype.buttonPress = function(editor, id) {
	switch (id) {
		case "SC-smiles":
		     //var uiurl = editor.config.editorURL + "..plugins/smilesplus/insertsmile.php";
			 var uiurl = "../plugins/smilesplus/insertsmile.php";
			 editor._popupDialog(uiurl, function(param) {
			     if (!param) {	// user must have pressed Cancel
			 	    return false;
			     }
			     editor._doc.execCommand("insertimage", false, param["imgUrl"]);
			 },null);
		break;		
	}
};
SmilesPlus.editor = null;

