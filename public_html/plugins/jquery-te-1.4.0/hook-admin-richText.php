			var stopBlur = false;
			a.html("<textarea "+title+"name=\"textarea\" id=\""+ a.attr('id') +"_field\">" + a.html() + "</textarea>");
			editor = a.find('textarea');
			editor.jqte({focus: function(){stopBlur=true;setTimeout(function(){stopBlur=false;},200);},blur: function(){setTimeout(function(){if(stopBlur)return;fieldSave(a.attr('id'),a.find('div.jqte_editor').html());},50)}});
			$('div.jqte_tool').click(function(){
				stopBlur = true;
				setTimeout(function(){stopBlur = false;},200);
				a.find('div.jqte_editor').focus();
			});
			a.find('div.jqte_editor').focus();
