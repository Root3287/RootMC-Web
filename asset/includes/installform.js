$(function(){
	$("#Submit").click(function(){
		var Host = $("#Host").val();
		var User = $("#User").val();
		var Pass = $("#Pass").val();
		var Port = $("#Port").val();
		val DB = $("#Database").val();
		if(Host !=""){
			if(User !=""){
				if(Pass !=""){
					if(Port !=""){
						if(DB !=""){
							return true;
						}else{
							
						}
					}else{
						
					}
				}else{
					
				}
			}else{
				
			}
		}else{
			Host
			if(User !=""){
				if(Pass !=""){
					if(Port !=""){
						if(DB !=""){
							return true;
						}else{
							
						}
					}else{
						
					}
				}else{
					
				}
			}else{
				
			}
		}
	});
});