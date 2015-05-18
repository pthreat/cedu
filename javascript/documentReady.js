	jQuery(document).ready(function(){

		$(this).tooltip();

		$(".boton").corner("2px");
		$("._text").corner("5px");

		$("#encabezado").shadow();
		$("#encabezado").corner("10px bottom");


		$("#cuerpo").corner("3px");
		$("._round").corner("3px");
                $("._shadow").shadow();

		$("#buscar").corner("3px");
		$("._submit_buscar").corner("3px");

		$("#pie").corner("3px");

		$("._click_clean").click(function(){
			$(this).attr("value","");
		});
                
                $(".opcionesnews").each(function(){
                    $(this).on("click",function(){
                        $(".opciones").show("slow");
                    });
                });
					 
		$(".query").draggable();

	});

