<div class="error"></div>
{{ Form::open(array(
        'url' => '/home', 
        'method' => 'GET', 
        'id' => 'searchForm', 
        'name' => 'searchForm'
        )
    ) 
}}                
    <div class="row search">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">       
                {{ Form::select('filter', $filters, $filter, array(
                        'class' => 'form-control', 
                        'id' => 'filter'
                        )
                    ) 
                }}
            </div>
        </div>   
        <div class="col-lg-5 col-md-5">
            <div class="form-group">       
                {{ Form::text('query', $query, array(
                        'class' => 'form-control', 
                        'id' => 'query', 
                        'placeholder' => 'Enter search query'
                        )
                    ) 
                }}
            </div>
        </div>   
        <div class="col-lg-3 col-md-3">
            <div class="form-group btn-search">
                {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
            </div>
        </div>   
    </div>    
{{ Form::close() }} 
<script src="{{ asset('js/search.js') }}"></script>