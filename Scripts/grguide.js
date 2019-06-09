	$(document).ready(function() 
    {
		//Thumbnailer.config.shaderOpacity = 1;
		var tn1 = $('.mygallery').tn3({
            autoplay: true,
            skinDir:"skins",
            imageClick:"fullscreen",
            image:{
            maxZoom:1.5,
            crop:true,
            clickEvent:"dblclick",
            transitions:[{
            type:"blinds"
            },{
            type:"grid"
            },{
            type:"grid",
            duration:460,
            easing:"easeInQuad",
            gridX:1,
            gridY:8,
            // flat, diagonal, circle, random
            sort:"random",
            sortReverse:false,
            diagonalStart:"bl",
            // fade, scale
            method:"scale",
            partDuration:360,
            partEasing:"easeOutSine",
            partDirection:"left"
            }]
            }
		});
	});

    function GetCurrentPage()
    {
        var sPath = window.location.pathname;
        var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
        sParam = window.location.search.substr(1);
    }

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function SetLang(lngID)
    {
        var sPath = window.location.pathname;
        var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
        var prmID = getParameterByName('id');
        if (prmID.length > 0)
            window.location.href = sPage + '?id=' + prmID + '&lng=' + lngID;
        else
            window.location.href = sPage + '?lng=' + lngID;
    }

    function SetHomeLang(lngID)
    {
         window.location.href = 'Index.php?lng=' + lngID;
    }
