<? if(isset($_GET["nombre"]) && !empty($_GET["nombre"])) {
	$t = addslashes($_GET["nombre"]); } ?>


 <script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>

<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		elements : "textdesc",
		theme : "advanced",
		language : "es",
		

		save_callback : "customSave",
		plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,media,searchreplace,print,contextmenu,paste,directionality,fullscreen",
		theme_advanced_buttons1_add_before : "save,newdocument,separator,zoom",
 
		theme_advanced_buttons2_add : "",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
        theme_advanced_buttons3_add : "fontselect,fontsizeselect,tseparator,forecolor,backcolor",
		 
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		content_css : "example_word.css",
	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",
	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		media_external_list_url : "example_media_list.js",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		paste_auto_cleanup_on_paste : true,
		paste_convert_headers_to_strong : false,
		paste_strip_class_attributes : "all",
		paste_remove_spans : false,
		paste_remove_styles : false		
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}
	
	
	function myCustomExecCommandHandler(editor_id, elm, command, user_interface, value) {
		var linkElm, imageElm, inst;

		switch (command) {
			case "mceLink":
				inst = tinyMCE.getInstanceById(editor_id);
				linkElm = tinyMCE.getParentElement(inst.selection.getFocusElement(), "a");

				if (linkElm)
					alert("Link dialog has been overriden. Found link href: " + tinyMCE.getAttrib(linkElm, "href"));
				else
					alert("Link dialog has been overriden.");

				return true;

			case "mceImage":
				inst = tinyMCE.getInstanceById(editor_id);
				imageElm = tinyMCE.getParentElement(inst.selection.getFocusElement(), "img");

				if (imageElm)
					alert("Image dialog has been overriden. Found image src: " + tinyMCE.getAttrib(imageElm, "src"));
				else
					alert("Image dialog has been overriden.");

				return true;
		}

		return false; // Pass to next handler in chain
	}

	// Custom save callback, gets called when the contents is to be submitted
	function customSave(id, content) {
		 
		//window.form1.texttemp.value= "";
		//window.form1.texttemp.value= contect;
		window.opener.document.form1.<? echo $t."add"?>.value = "(Texto Temporal Adjunto.)"
		window.opener.document.form1.<? echo $t?>.value = content; 
		window.close();
	}
  window.opener.textdesc.value = window.opener.document.form1.<? echo $t?>.value 
</script>
<!-- /TinyMCE -->
<form id="opener" name="opener" method="post" action="editorw.php">
	  <textarea id="textdesc" name="textdesc" rows="15" cols="80" style="width: 100%"><?=$detalles?>
	  </textarea>
 </form>
       
	 
 
 
