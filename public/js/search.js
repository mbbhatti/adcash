$().ready(function() { 
    // Search on submit
    $("#searchForm").validate({        
        submitHandler: function(form) {
            filter = $('#filter').val();
            query = $('#query').val(); 
            let params = {};          
            let url = '';           
            
            if(filter != 'all') params.filter = filter;
            if(query != '') params.q = query;                        
            
            url = new URLSearchParams(params);
            if(url != '') window.location = '?' + url;
            else window.location = '/';
        }
    });
});