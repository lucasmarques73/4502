$(document).ready(function(){
	var altura = $(window).height();
	var altura_body = $("#body_website").height();
	
	if(altura_body <= altura){
		if(altura <= 545){
			$('aside').height(550);
		}
		else{
			var aside = altura - 90;
			$('aside').height(aside);
		}
	}
	else{
		var aside = altura_body + 40;
		$('aside').height(aside);
	}

	var largura = $(window).width();
	var content = largura - 320;
	$('.content').width(content);
	if($("#pager").length){
		$("#pager").width(content);
	}

	$("aside nav > ul > li").each(function(i){
		var h=$(this);
		if(h.find(".submenu").length){
			h.append("<span class='arrow_submenu'></span>")
		}

		if($(".submenu").length){
			h.click(function(){
				console.log()
				var display = h.find(".submenu").css("display");
				if(display == "none"){
					$(this).addClass("active");
					$(this).find(".submenu").stop(true).slideDown();
				}
				else{
					$(this).removeClass("active");
					$(this).find(".submenu").stop(true).slideUp();
				}
			});
		}
	});

	$("aside nav > ul").slicknav({
		label:"",
		prependTo:"#header",
		closedSymbol: "",
		openedSymbol: ""
	});

	if($(".table").length){
		$(".table")
		.tablesorter({headers: { 3:{sorter: false}}});
	}

	if($(".selectric").length){
		$('.selectric').selectric();
	}

	if($(".selectmultiple").length){
		$(".selectmultiple").multipleSelect({
            multiple: true,
            multipleWidth: '100%',
            width: '100%'
        });
	}

	$(".button_delete").click(function(){
		var r = confirm("Tem certeza que deseja excluir?");
		if (r == true) {
			alert("Você apertou Ok!");
			return false;
		}
		else {
			return false;
		}
	});
});

$(window).resize(function() {
	var altura = $(window).height();
	var altura_body = $("#body_website").height();
	if(altura_body <= altura){
		if(altura <= 545){
			$('aside').height(455);
		}
		else{
			var aside = altura - 90;
			$('aside').height(aside);
		}
	}
	else{
		var aside = altura_body;
		$('aside').height(aside);
	}

	var largura = $(window).width();
	var content = largura - 320;
	$('.content').width(content);
	if($("#pager").length){
		$("#pager").width(content);
	}
});

