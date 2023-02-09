jQuery(window).on('load', function() {
	
		    // Tagline Start
    var tagline = $('#main-tagline');
    if (tagline.length) {
            var mtButton = $('#mt-button');
            //tagline.addClass('contract');
            //mtButton.removeClass('hide');
            mtButton.on("click", function (e){
                e.preventDefault();
				console.log("read more clicked!");
                var tagline = $('#main-tagline');
                var mtButton = $('#mt-button');
                if(tagline.hasClass('contract')){
                    tagline.removeClass('contract');
                    tagline.addClass('expand');
                    mtButton.text('Cerrar');
                }else{
                    tagline.removeClass('expand');
                    tagline.addClass('contract');
                    mtButton.text('Lee mas');
                }
            });
    }
    // Tagline End

    var casinoSelection = $('#current-casinolist-selection');
	
	document.querySelectorAll('.read-more-link').forEach(function(readMoreButton){
        //console.log("event listener", readMoreButton);
        readMoreButton.addEventListener("click", expandSection);
    });
	
	document.querySelectorAll('.read-less-link').forEach(function(readLessButton){
		readLessButton.addEventListener("click", contractSection);
	});

    var summaryContainer = $('#summary-container');
    if (summaryContainer.length) {
        var roiAll = parseFloat(summaryContainer.attr('roiAll'));
        var roiMonth = parseFloat(summaryContainer.attr('roiMonth'));
        var roiWeek = parseFloat(summaryContainer.attr('roiWeek'));

        removeClassesForRoiSummary();

        if(roiWeek > roiMonth && roiWeek > roiAll){
            summaryContainer.addClass("week");
        } else if(roiMonth > roiAll){
            summaryContainer.addClass("month");
        } else {
            summaryContainer.addClass("all");
        }

        $("#all-summary").click(function(){
            removeClassesForRoiSummary();
            summaryContainer.addClass("all");
        }); 
        $("#month-summary").click(function(){
            removeClassesForRoiSummary();
            summaryContainer.addClass("month");
        }); 
        $("#week-summary").click(function(){
            removeClassesForRoiSummary();
            summaryContainer.addClass("week");
        }); 

    }

    function removeClassesForRoiSummary(){
        summaryContainer.removeClass("all");
        summaryContainer.removeClass("month");
        summaryContainer.removeClass("week");
    }

    function allButtonClick(){
        removeClassesForRoiSummary();
        summaryContainer.addClass("all");
    }
    function weekButtonClick(){
        removeClassesForRoiSummary();
        summaryContainer.addClass("week");
    }
    function monthButtonClick(){
        removeClassesForRoiSummary();
        summaryContainer.addClass("month");
    }

    function expandSection(e){
        e.preventDefault();
        //var closest = e.closest(".featured-odd"); 
        //console.log(e);
        var targetElement = e.target || e.srcElement;
        //console.log(targetElement);
        var parentElement = targetElement.parentElement;
		//console.log("First", parentElement);
        if(!parentElement.classList.contains('fe-odd')){
			//console.log("Second", parentElement);
            parentElement = parentElement.parentElement
        }
		if(!parentElement.classList.contains('fe-odd')){
			//console.log("Third", parentElement);
            parentElement = parentElement.parentElement
        }
		if(!parentElement.classList.contains('fe-odd')){
			//console.log("Fourth", parentElement);
            parentElement = parentElement.parentElement
        }
		if(!parentElement.classList.contains('fe-odd')){
			//console.log("Fifth", parentElement);
            parentElement = parentElement.parentElement
        }
        //console.log("Clicked", parentElement);
        parentElement.classList.add("expanded");
    }
	function contractSection(e){
        e.preventDefault();
        //var closest = e.closest(".featured-odd"); 
        //console.log(e);
        var targetElement = e.target || e.srcElement;
        //console.log(targetElement);
        var parentElement = targetElement.parentElement;
		//console.log("First", parentElement);
        if(!parentElement.classList.contains('fe-odd')){
			//console.log("Second", parentElement);
            parentElement = parentElement.parentElement
        }
		if(!parentElement.classList.contains('fe-odd')){
			//console.log("Third", parentElement);
            parentElement = parentElement.parentElement
        }
		if(!parentElement.classList.contains('fe-odd')){
			//console.log("Fourth", parentElement);
            parentElement = parentElement.parentElement
        }
		if(!parentElement.classList.contains('fe-odd')){
			//console.log("Fifth", parentElement);
            parentElement = parentElement.parentElement
        }
        //console.log("Clicked", parentElement);
        parentElement.classList.remove("expanded");
		
		// Maybe add a scroll to?
    }

    if (casinoSelection.length) {
        $('#rank').addClass('focus');
        var canBeLoaded = true; // this param allows to initiate the AJAX call only if necessary
        var bottomOffset = ($(document).height() - $('.toplist-box-new .table-row:nth-child(5)').offset().top); // the distance (in px) from the page bottom when you want to load more posts
    
        var loadingElement = $('#toplist-loading');
    
        var parentElement = $('#casinoliste-list-section');
    
        var newlyAdded = $('#newlyadded');
		
		var action  = 'loadmore';

        if ($(".oddsliste-template")[0]){
            action  = 'loadmorebookies';
        }
    
        var data = {
            'action': action,
            'query': misha_loadmore_params.posts,
            'page' : misha_loadmore_params.current_page
        };
    
        parentElement.on('click', '#rank', function(e){
            console.log("clicked Rank");
            e.preventDefault();
			if ( !casinoSelection ){
				casinoSelection = $('#current-casinolist-selection');
			}
            if ( casinoSelection.attr('class') !== 'default' && canBeLoaded){
                casinoSelection.removeClass();
                casinoSelection.addClass('default');
                removeFocusFromButtons();
                $('#rank').addClass('focus');
                data = {
                    'action': action,
                    'query': misha_loadmore_params.posts,
                    'page' : 0
                };
                ajaxCall(true);
            }
        });
        
        parentElement.on('click', '#newlyadded', function(e){
            console.log("clicked New");
            e.preventDefault();
			if ( !casinoSelection ){
				casinoSelection = $('#current-casinolist-selection');
			}
            if ( casinoSelection.attr('class') !== 'newlyAdded' && canBeLoaded){
                console.log("can be loaded");
                casinoSelection.removeClass();
                casinoSelection.addClass('newlyAdded');
                removeFocusFromButtons();
                $('#newlyadded').addClass('focus');
                data = {
                    'action': action,
                    'sort': 'new',
                    'query': misha_loadmore_params.posts,
                    'page' : 0
                };
                ajaxCall(true);
            }
        });
    
        parentElement.on('click', '#crypto', function(e){
            e.preventDefault();
			if ( !casinoSelection ){
				casinoSelection = $('#current-casinolist-selection');
			}
            if ( casinoSelection.attr('class') !== 'crypto' && canBeLoaded){
                casinoSelection.removeClass();
                casinoSelection.addClass('crypto');
                removeFocusFromButtons();
                $('#crypto').addClass('focus');
                data = {
                    'action': action,
                    'filter': 'crypto',
                    'query': misha_loadmore_params.posts,
                    'page' : 0
                };
                ajaxCall(true);
            }
        });
    
        parentElement.on('click', '#exclusive', function(e){
            e.preventDefault();
            if ( casinoSelection.attr('class') !== 'exclusive' && canBeLoaded){
                casinoSelection.removeClass();
                casinoSelection.addClass('exclusive');
                removeFocusFromButtons();
                $('#exclusive').addClass('focus');
                data = {
                    'action': action,
                    'filter': 'exclusive',
                    'query': misha_loadmore_params.posts,
                    'page' : 0
                };
                ajaxCall(true);
            }
        });

        function removeFocusFromButtons(){
            $('#rank').removeClass('focus');
            $('#newlyadded').removeClass('focus');
            $('#crypto').removeClass('focus');
            $('#exclusive').removeClass('focus');
        }
    
    
        $(window).scroll(function(){
            // Check whether element with id stop_querying exists
            if( $('#stop_querying').length == 0 ){
                if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
                    data['page'] = parseInt(data['page']) + 1;
                    $.ajax({
                        url : misha_loadmore_params.ajaxurl,
                        data:data,
                        type:'POST',
                        beforeSend: function( xhr ){
                            // you can also add your own preloader here
                            // you see, the AJAX call is in process, we shouldn't run it again until complete
                            canBeLoaded = false; 
                            loadingElement.addClass('show');
                        },
                        success:function(data){
                            if( data ) {
                                //$('#casinoliste-list-section').find('.toplist-box:last-of-type').after( data ); // where to insert posts
                                $('#casinoliste-list-section').find('.toplist-box-new .table-row:last-of-type').after( data ); // where to insert posts
                                canBeLoaded = true; // the ajax is completed, now we can run it again
                                misha_loadmore_params.current_page++;
                            }
                        },
                        error:function(error){
                            console.log("error");
                        },
                        complete:function(data){
                            loadingElement.removeClass('show');
                            console.log("complete");
                            canBeLoaded = true;
                        }
                    });
                }
            }
        });
    
        function ajaxCall(newList){
            $.ajax({
                url : misha_loadmore_params.ajaxurl,
                data:data,
                type:'POST',
                beforeSend: function( xhr ){
                    // you can also add your own preloader here
                    // you see, the AJAX call is in process, we shouldn't run it again until complete
                    canBeLoaded = false; 
                    loadingElement.addClass('show');
                    if( newList ) {
						//console.log(data);
						if(data.action == 'loadmorebookies'){
							$('#toplist-boxes-new').replaceWith('<table id="toplist-boxes-new"><thead class="toplist-box-new"><tr class="main"><th class="vanish-mobile ninth"></th><th class="title vanish-mobile twoninth">Bettingside</th><th class="vanish-mobile center ninth">Bonus</th><th class="vanish-mobile center ninth">Wager</th><th class="vanish-mobile center ninth">Spesial</th><th class="vanish-mobile twoninth">Lenke</th></tr></thead><tbody class="toplist-box-new"></tbody></table>');	
						}else{
							$('#toplist-boxes-new').replaceWith('<table id="toplist-boxes-new"><thead class="toplist-box-new"><tr class="main"><th class="vanish-mobile ninth"></th><th class="title vanish-mobile twoninth">Casino</th><th class="vanish-mobile center ninth">Prosent</th><th class="vanish-mobile center ninth">OPPTIL</th><th class="vanish-mobile center ninth">FREESPINS</th><th class="vanish-mobile center ninth">WAGER</th><th class="vanish-mobile twoninth">Lenke</th></tr></thead><tbody class="toplist-box-new"></tbody></table>');	
						}
                    }
                },
                success:function(data){
                    if (!data){
                        return false;
                    }
					//console.log(data);
                    if( newList ) {
                        $( '#toplist-boxes-new tbody.toplist-box-new' ).append( data );
                        //$('#casinoliste-list-section').find('.toplist-box:last-of-type').after( data ); // where to insert posts
                        canBeLoaded = true; // the ajax is completed, now we can run it again
                        misha_loadmore_params.current_page++;
                    }else{
                        $('#casinoliste-list-section').find('.toplist-box-new .table-row:last-of-type').after( data ); // where to insert posts
                        canBeLoaded = true; // the ajax is completed, now we can run it again
                        misha_loadmore_params.current_page++;
                    }
                },
                error:function(error){
					console.log("error 2");
                },
                complete:function(data){
                    loadingElement.removeClass('show');
					console.log("complete 2");
                }
            });
        }
    }
	
	function setCollapsable(){
        var parentElement = $('#casinoliste-list-section');
        parentElement.on('click', '.collapsible', function(e){
            e.currentTarget.classList.toggle("active");
            var l = e.currentTarget.nextElementSibling;
            l.style.maxHeight?l.style.maxHeight=null:l.style.maxHeight=l.scrollHeight+"px";
        });
		var parentElement = $('#boxes');
		parentElement.on('click', '.collapsible', function(e){
            e.currentTarget.classList.toggle("active");
            var l = e.currentTarget.nextElementSibling;
            l.style.maxHeight?l.style.maxHeight=null:l.style.maxHeight=l.scrollHeight+"px";
        });
    }

    setCollapsable();
});