$(function(){
   code 
 var Portal_button = 
 "<div class="+'col-md-3'+">"+
 "<div class="+'card'+">"+
     "<div class="+'view overlay hm-white-slight'+">"+
         "<img src="+'https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%2851%29.jpg'+" class="+'img-fluid'+" alt="+">"+
         "<a>"+
            "<div class="+'mask waves-effect waves-light'+">"+"</div>"+
         "</a>"+
     "</div>"+
     "<div class="+'card-block'+">"+
        "<a class="+'activator'+">"+"<i class="+'fa fa-share-alt'+">"+"</i>"+"</a>"+
         "<h4 class="+'card-title'+">"+'Card title'+"</h4>"+
        "<hr>"+
        "<p class="+'card-text'+">"+'Some quick example text to build on the card title and make up the bulk of the cards content.'+"</p>"+
         "<a href="+'#'+" class="+'black-text d-flex flex-row-reverse'+">"+"<h5 class="+'waves-effect p-2'+">"+'Read more '+"<i class="+'fa fa-chevron-right'+">"+"</i>"+"</h5>"+"</a>"+
     "</div>"+
    "</div>"+	
 "</div>";
 var array = [1,2,3,4,5,6,7,8];

 	$(".Portal_catalogo_").click(function(){
		alert("Cards");
 	    $.each(array, function( index, value ) {
 	    	 $("#Portal_cards").append(Portal_button);
 	    });
 	});
});







