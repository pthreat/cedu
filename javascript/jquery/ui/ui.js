var dialog	={

	alert:function(config){

		if(config.beforeClose){
			var userBeforeClose	=	config.beforeClose;
		}

		$.extend(config,window.config.dialog.alert);

		config.buttons={
				"OK":function(){
					$(this).dialog("close");
				}
		}

		if(document.getElementById("dialog")){

			$("#dialog").remove();

		}

		if(config.content){

			$("body").append('<div id="dialog">'+config.content+'</div>');

		}else{

			$("body").append('<div id="dialog"></div>');

		}

		if(config.darken){

			if(!document.getElementById("darken")){

				var darkenStyle="background-color:#000000;width:100%;height:100%;"+
				"z-index:40;display:none;top:0;left:0;position:fixed;";

				$("body").append('<div id="darken" style="'+darkenStyle+'"></div>');

			}

			$('html, body').animate({scrollTop: '0px'}, 800);
			$("body").css("overflow","hidden");

			$("#darken").fadeTo("slow",0.33,function(){

				config.beforeClose	=	function(event,ui){

													if(userBeforeClose){
														userBeforeClose();
													}
											
													$("#darken").fadeOut("slow",function(){
													$("#darken").remove();
													$("body").css("overflow","auto");

												});
				}

				$("#dialog").dialog(config);

			});
		
		}else{

			$("#dialog").dialog(config);

		}

	},

	makeDialogFromSelect:function(selectName,config){

		var options = $.map($("select[name='"+selectName+"'] option"),function(e){return {value:e.value,text:e.text} ;});

		var z=0;	
		var inputs='<table>';

		for(i=0;options[i];i++){

			if(z==0){
				inputs+='<tr>';
			}

			inputs+='<td><label>'+
			'<input type="checkbox" class="_multi_item_select" '+
			'name="'+selectName+'['+i+']" '+
			'"value="'+options[i].value+'" '+
			'alt="'+options[i].text+'" />'+		//Hopefully this wont break anything ...
			options[i].text+
			'</label></td>';

			if(z==1){

				inputs+='</tr>';
				z=0;

			}else{

				z++;

			}

		}

		if(z==1){

			inputs+='<td></td></tr>';

		}

		inputs+="</table>";

		dialog.alert({
							title:"Seleccione las opciones que desee",
							content:inputs,
							beforeClose:function(){

								var inputs			=	'';
								var select			=	selectName;
								var toolTipText	=	'';

								$("._multi_item_select").each(function(e){

										if($(this).is(':checked')){

											toolTipText+=$(this).attr("alt")+"\n";
											inputs+='<input type="hidden" name='+select+'[]" value="'+$(this).val()+'" />';

										}

								});

								if(inputs!=''){

									$("select[name='"+selectName+"']").attr("disabled","disabled");
									$("select[name='"+selectName+"']").attr("title",toolTipText);

								}								


							}

		});

	},

	makeDialogFromIframe:function(titulo,src,config){

		var iframe	=	'<iframe src="'+src+'">';

		dialog.alert({
							title:titulo,
							content:iframe
		});

	}

}
